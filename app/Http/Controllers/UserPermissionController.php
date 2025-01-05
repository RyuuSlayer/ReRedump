<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\System;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPermissionController extends Controller
{
    private $permissionGroups = [
        'submit_new_discs' => [
            'all' => 'Submit New Discs (All Systems)',
            'specific' => 'Submit New Discs (Specific Systems)'
        ],
        'submit_disc_verifications' => [
            'all' => 'Submit Disc Verifications (All Systems)',
            'specific' => 'Submit Disc Verifications (Specific Systems)'
        ],
        'approve_new_disc_submissions' => [
            'all' => 'Approve New Disc Submissions (All Systems)',
            'specific' => 'Approve New Disc Submissions (Specific Systems)'
        ],
        'approve_disc_verifications' => [
            'all' => 'Approve Disc Verifications (All Systems)',
            'specific' => 'Approve Disc Verifications (Specific Systems)'
        ]
    ];

    public function __construct()
    {
        $this->middleware('permission:edit_users_permissions');
    }

    public function edit(User $user)
    {
        if (!auth()->user()->can('edit_users_permissions') || 
            ($user->hasRole('admin') && !auth()->user()->hasRole('admin')) || 
            ($user->hasRole('moderator') && !auth()->user()->hasRole('admin'))) {
            abort(403, 'You cannot edit permissions for administrators or other moderators.');
        }

        // Get all systems
        $systems = System::orderBy('name')->get();

        // Get all permissions
        $permissions = Permission::all();
        
        // Get user's direct and role-based permissions
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        
        // Group permissions by type
        $groupedPermissions = [];
        foreach ($this->permissionGroups as $basePermission => $labels) {
            $allPermission = $permissions->firstWhere('name', $basePermission . '_all');
            $specificPermission = $permissions->firstWhere('name', $basePermission);
            
            // Only add to grouped permissions if both permissions exist
            if ($allPermission && $specificPermission) {
                $groupedPermissions[$basePermission] = [
                    'all' => [
                        'permission' => $allPermission,
                        'label' => $labels['all'],
                        'checked' => in_array($allPermission->name, $userPermissions)
                    ],
                    'specific' => [
                        'permission' => $specificPermission,
                        'label' => $labels['specific'],
                        'checked' => in_array($specificPermission->name, $userPermissions)
                    ]
                ];
            }
        }

        // Get user's system permissions
        $userSystemPermissions = [];
        $systemPermissions = $user->systemPermissions()->get();
        foreach ($systemPermissions as $permission) {
            if (!isset($userSystemPermissions[$permission->permission_id])) {
                $userSystemPermissions[$permission->permission_id] = [];
            }
            $userSystemPermissions[$permission->permission_id][] = $permission->system_id;
        }

        return view('admin.users.permissions', compact('user', 'groupedPermissions', 'systems', 'userSystemPermissions'));
    }

    public function update(Request $request, User $user)
    {
        // Prevent moderators from editing admin or other moderator permissions
        if (auth()->user()->hasRole('moderator') && ($user->hasRole('admin') || $user->hasRole('moderator'))) {
            abort(403, 'You cannot edit permissions for administrators or other moderators.');
        }

        $request->validate([
            'permissions.*' => 'exists:permissions,name',
            'system_permissions' => 'array',
            'system_permissions.*' => 'array',
            'system_permissions.*.*' => 'exists:permissions,id'
        ]);

        DB::transaction(function () use ($user, $request) {
            // Get permissions from request
            $permissions = $request->input('permissions', []);
            $systemPermissions = $request->input('system_permissions', []);
            
            // Get role-based permissions that should be preserved
            $rolePermissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();
            
            // Only sync permissions that aren't from roles
            $directPermissions = array_diff($permissions, $rolePermissions);
            $user->syncPermissions($directPermissions);

            // Remove all existing system permissions
            $user->systemPermissions()->delete();

            // Add new system permissions, but only if corresponding global permission is not checked
            foreach ($systemPermissions as $systemId => $permissionIds) {
                foreach ($permissionIds as $permissionId) {
                    // Get the base permission name for this system permission
                    $permission = Permission::find($permissionId);
                    $basePermission = str_replace('_all', '', $permission->name);
                    
                    // Only add if global permission is not selected
                    if (!in_array($basePermission . '_all', $permissions)) {
                        $user->systemPermissions()->create([
                            'system_id' => $systemId,
                            'permission_id' => $permissionId
                        ]);
                    }
                }
            }
        });

        return redirect()->back()->with('success', 'User permissions updated successfully.');
    }
}
