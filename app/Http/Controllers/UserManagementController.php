<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    /**
     * Constructor to apply middleware
     */
    public function __construct()
    {
        $this->middleware('permission:view_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create', 'store']);
        $this->middleware('permission:edit_users')->only(['edit', 'update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    public function index()
    {
        // Get all users with their roles and check for custom permissions
        $users = User::with('roles')
            ->withCount(['permissions as has_custom_permissions' => function($query) {
                $query->whereNotIn('permissions.id', function($q) {
                    $q->select('permission_id')
                      ->from('role_has_permissions')
                      ->join('model_has_roles', 'role_has_permissions.role_id', '=', 'model_has_roles.role_id')
                      ->whereColumn('model_has_roles.model_id', 'users.id');
                })
                ->where(function($q) {
                    $q->where('name', 'like', 'submit_%')
                      ->orWhere('name', 'like', 'approve_%');
                });
            }])
            ->withCount(['systemPermissions as has_system_permissions' => function($query) {
                $query->join('permissions', 'system_permissions.permission_id', '=', 'permissions.id')
                      ->where(function($q) {
                          $q->where('permissions.name', 'like', 'submit_%')
                            ->orWhere('permissions.name', 'like', 'approve_%');
                      });
            }])
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['array'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'roles' => ['array'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
