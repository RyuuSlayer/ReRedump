<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Schema::disableForeignKeyConstraints();

        // Clear all tables first
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('model_has_permissions')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        // Create permissions
        $permissions = [
            // User management
            'view_users' => 'View Users',
            'edit_users' => 'Edit Users',
            'edit_users_permissions' => 'Edit User Permissions',
            'delete_users' => 'Delete Users',
            'create_users' => 'Create Users',
            
            // Role management
            'view_roles' => 'View Roles',
            'create_roles' => 'Create Roles',
            'edit_roles' => 'Edit Roles',
            'delete_roles' => 'Delete Roles',
            
            // Permission management
            'view_permissions' => 'View Permissions',
            'create_permissions' => 'Create Permissions',
            'edit_permissions' => 'Edit Permissions',
            'delete_permissions' => 'Delete Permissions',
            
            // Disc management - Global
            'submit_new_discs_all' => 'Submit New Discs (All Systems)',
            'submit_disc_verifications_all' => 'Submit Disc Verifications (All Systems)',
            'approve_new_disc_submissions_all' => 'Approve New Disc Submissions (All Systems)',
            'approve_disc_verifications_all' => 'Approve Disc Verifications (All Systems)',
            
            // Disc management - System specific
            'submit_new_discs' => 'Submit New Discs (Specific Systems)',
            'submit_disc_verifications' => 'Submit Disc Verifications (Specific Systems)',
            'approve_new_disc_submissions' => 'Approve New Disc Submissions (Specific Systems)',
            'approve_disc_verifications' => 'Approve Disc Verifications (Specific Systems)',
        ];

        foreach ($permissions as $name => $display_name) {
            Permission::create([
                'name' => $name,
                'display_name' => $display_name,
                'guard_name' => 'web'
            ]);
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo([
            // User management
            'create_users',
            'edit_users',
            'delete_users',
            'view_users',
            'edit_users_permissions',
            
            // Role management
            'view_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
            
            // Permission management
            'view_permissions',
            'create_permissions',
            'edit_permissions',
            'delete_permissions',
            
            // Disc management
            'submit_new_discs_all',
            'submit_disc_verifications_all',
            'approve_new_disc_submissions_all',
            'approve_disc_verifications_all',
            'submit_new_discs',
            'submit_disc_verifications',
            'approve_new_disc_submissions',
            'approve_disc_verifications'
        ]);

        $moderator = Role::create(['name' => 'moderator', 'guard_name' => 'web']);
        $moderator->givePermissionTo([
            'view_users',
            'edit_users',
            'edit_users_permissions',
            'submit_new_discs_all',
            'submit_disc_verifications_all',
            'approve_new_disc_submissions_all',
            'approve_disc_verifications_all',
            'submit_new_discs',
            'submit_disc_verifications',
            'approve_new_disc_submissions',
            'approve_disc_verifications'
        ]);

        $submitter = Role::create(['name' => 'submitter', 'guard_name' => 'web']);
        $submitter->givePermissionTo([
            'submit_new_discs',
            'submit_disc_verifications'
        ]);

        // Create user role with no permissions - this is the default role for new registrations
        Role::create(['name' => 'user', 'guard_name' => 'web']);

        Schema::enableForeignKeyConstraints();

        // Create admin user if it doesn't exist
        if (!User::where('email', 'admin@reredump.com')->exists()) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@reredump.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $user->assignRole('admin');
        }
    }
}
