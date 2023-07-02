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
            'name' => 'Rafael',
            'email' => 'rafael@schoolsports.com',
            'phone' => '+53 56247162',
            'location' => 'Camagüey',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);
        User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto@schoolsports.com',
            'phone' => '+53 54771264',
            'location' => 'Camagüey',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);
        User::factory()->create([
            'name' => 'Carlos',
            'email' => 'carlos@schoolsports.com',
            'phone' => '+53 56247162',
            'location' => 'Camagüey',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);

        User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto@schoolsports.cu',
            'phone' => '+53 52626444',
            'location' => 'Camagüey',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);
    }
}
