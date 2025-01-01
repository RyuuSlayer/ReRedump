<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create default permissions
        $permissions = [
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',
        ];

        $createdPermissions = collect();
        foreach ($permissions as $permission) {
            $createdPermissions->push(
                Permission::firstOrCreate([
                    'name' => $permission,
                    'guard_name' => 'web'
                ])
            );
        }

        // Create default roles
        $roles = [
            'admin' => $permissions, // Previously super-admin, now admin
            'moderator' => [ // Previously admin, now moderator
                'user.view',
                'user.create',
                'user.edit',
                'role.view',
                'permission.view',
            ],
            'dumper' => [ // Previously user, now dumper
                'user.view',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web'
            ]);
            
            $role->permissions()->sync(
                Permission::whereIn('name', $rolePermissions)->pluck('id')
            );
        }

        $this->command->info('Created roles: ' . implode(', ', array_keys($roles)));
        $this->command->info('Created permissions: ' . implode(', ', $permissions));
    }
}
