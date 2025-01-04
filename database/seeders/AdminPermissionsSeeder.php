<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define all permissions
        $permissions = [
            // User permissions
            'view users',
            'create users',
            'edit users',
            'delete users',
            // Role permissions
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            // Permission permissions (if needed)
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions'
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // Get or create admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign all permissions to admin role
        $adminRole->syncPermissions($permissions);

        // Create moderator role with limited permissions
        $moderatorRole = Role::firstOrCreate(['name' => 'moderator']);
        $moderatorRole->syncPermissions([
            'view users',
            'edit users',
            'view roles'
        ]);

        // Create admin user if it doesn't exist
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@reredump.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Ensure admin user has admin role
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }
    }
}
