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
        // Create moderator user if it doesn't exist
        $moderator = User::firstOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Test Moderator',
                'password' => Hash::make('password'),
            ]
        );

        // Assign moderator role to moderator user
        $moderator->assignRole('moderator');

        // Create submitter user if it doesn't exist
        $submitter = User::firstOrCreate(
            ['email' => 'submitter@example.com'],
            [
                'name' => 'Test Submitter',
                'password' => Hash::make('password'),
            ]
        );

        // Assign submitter role and permissions
        $submitter->assignRole('submitter');
        $submitter->givePermissionTo([
            'submit_new_discs',
            'submit_disc_verifications'
        ]);
    }
}
