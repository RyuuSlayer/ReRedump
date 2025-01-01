<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user.view')->only(['index', 'show']);
        $this->middleware('permission:user.create')->only(['create', 'store']);
        $this->middleware('permission:user.edit')->only(['edit', 'update']);
        $this->middleware('permission:user.delete')->only('destroy');
    }

    public function index()
    {
        // Add debug information
        $user = auth()->user();
        $roles = $user->roles()->pluck('name');
        $permissions = $user->permissions()->pluck('name');
        
        \Log::info('User Roles:', ['roles' => $roles]);
        \Log::info('User Permissions:', ['permissions' => $permissions]);

        $users = User::with('roles')->paginate(10);
        return view('user-management.users.index', compact('users'));
    }

    public function create()
    {
        // If user is moderator, only show non-admin roles
        $roles = auth()->user()->hasRole('admin') 
            ? Role::all()
            : Role::where('name', '!=', 'admin')->get();
            
        return view('user-management.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array|size:1', // Ensure only one role is selected
        ]);

        // Prevent moderators from creating admin users
        $role = Role::findById($request->roles[0], 'web');
        if (!auth()->user()->hasRole('admin') && $role->name === 'admin') {
            abort(403, 'You are not authorized to create admin users.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($role->name);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        // Prevent moderators from editing admin users
        if (!auth()->user()->hasRole('admin') && $user->hasRole('admin')) {
            abort(403, 'You are not authorized to edit admin users.');
        }

        // Prevent users from editing their own role
        if ($user->id === auth()->id()) {
            abort(403, 'You cannot edit your own role.');
        }

        // If user is moderator, only show non-admin roles
        $roles = auth()->user()->hasRole('admin') 
            ? Role::all()
            : Role::where('name', '!=', 'admin')->get();

        return view('user-management.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Prevent moderators from editing admin users
        if (!auth()->user()->hasRole('admin') && $user->hasRole('admin')) {
            abort(403, 'You are not authorized to edit admin users.');
        }

        // Prevent users from changing their own role
        if ($user->id === auth()->id()) {
            abort(403, 'You cannot change your own role.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'required|array|size:1', // Ensure only one role is selected
        ]);

        // Prevent moderators from assigning admin role
        $role = Role::findById($request->roles[0], 'web');
        if (!auth()->user()->hasRole('admin') && $role->name === 'admin') {
            abort(403, 'You are not authorized to assign admin role.');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles([$role->name]);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // Prevent moderators from deleting admin users
        if (!auth()->user()->hasRole('admin') && $user->hasRole('admin')) {
            abort(403, 'You are not authorized to delete admin users.');
        }

        // Prevent users from deleting themselves
        if ($user->id === auth()->id()) {
            abort(403, 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
