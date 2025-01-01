<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First create roles and permissions
        $this->call(RoleAndPermissionSeeder::class);

        // Development environment only: create dev users and assign roles
        if (app()->environment() !== 'production') {
            $this->call(DevEnvironmentSeeder::class);
        }
    }
}
