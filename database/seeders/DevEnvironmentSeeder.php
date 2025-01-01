<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DevEnvironmentSeeder extends Seeder
{
    public function run()
    {
        if (app()->environment() !== 'production') {
            // Create the Ryuu user first
            $user = User::firstOrCreate(
                ['email' => 'ryuu@example.com'],
                [
                    'name' => 'Ryuu',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]
            );
            
            // Get the admin role
            $adminRole = Role::where('name', 'admin')->first();
            
            if ($adminRole) {
                // Assign the admin role to Ryuu
                $user->syncRoles([$adminRole]);
                $this->command->info('DEV ENV ONLY: Assigned admin role to user "Ryuu"');
                $this->command->info('User roles: ' . implode(', ', $user->getRoleNames()->toArray()));
            } else {
                $this->command->error('DEV ENV ONLY: Admin role not found. Please run RoleAndPermissionSeeder first.');
            }
        } else {
            $this->command->warn('This seeder should not be run in production!');
        }
    }
}
