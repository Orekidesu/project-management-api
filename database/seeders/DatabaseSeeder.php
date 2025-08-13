<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'first_name' => 'Carl Michael',
            'last_name' => 'Codog',
            'email' => 'admin@gmail.com',
            'password' => 'Hash::make'('password'),
            'role' => 'admin',
        ]);

        User::create([
            'first_name' => 'Roslyn',
            'last_name' => 'Timtim',
            'email' => 'manager@gmail.com',
            'password' => 'Hash::make'('password'),
            'role' => 'manager',
        ]);
        User::create([
            'first_name' => 'Felizardo',
            'last_name' => 'Timtim',
            'email' => 'staff@gmail.com',
            'password' => 'Hash::make'('password'),
            'role' => 'staff',
        ]);

        Client::create([
            'first_name' => 'Axeneth',
            'last_name' => 'Codog',
            'email' => 'client@gmail.com',
            'phone_no' => '09012345678',
            'comapny' => 'Axen Foundation Inc.',
            'notes' => 'Some sample Notes',

        ]);
    }
}
