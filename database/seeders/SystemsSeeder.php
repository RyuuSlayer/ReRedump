<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System;
use Illuminate\Support\Str;

class SystemsSeeder extends Seeder
{
    public function run(): void
    {
        $systems = [
            'PlayStation' => 'Sony\'s flagship gaming console series',
            'Xbox' => 'Microsoft\'s gaming console series',
            'Nintendo Switch' => 'Nintendo\'s hybrid gaming console',
            'PC' => 'Personal Computer gaming platform',
            'Nintendo 3DS' => 'Nintendo\'s handheld gaming system',
            'PlayStation Vita' => 'Sony\'s handheld gaming system',
        ];

        foreach ($systems as $name => $description) {
            System::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $description,
            ]);
        }
    }
}
