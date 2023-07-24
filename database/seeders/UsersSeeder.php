<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create default users with roles
        User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto@schoolsports.com',
            'phone' => '+53 54771264',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);

        User::factory()->create([
            'name' => 'Rafael',
            'email' => 'rafael@schoolsports.com',
            'phone' => '+53 55934035',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);

        User::factory()->create([
            'name' => 'Carlos',
            'email' => 'carlos@schoolsports.com',
            'phone' => '+53 56247162',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);
        // ->assignRole('SuperAdmin');


    }
}
