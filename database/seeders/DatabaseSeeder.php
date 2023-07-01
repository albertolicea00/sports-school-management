<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'rafael@schoolsports.com',
            'password' => ('secret123')
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'alberto@schoolsports.com',
            'password' => ('secret123')
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'carlos@schoolsports.com',
            'password' => ('secret123')
        ]);
    }
}
