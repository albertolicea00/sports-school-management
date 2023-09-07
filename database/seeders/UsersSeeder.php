<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Member;
use App\Models\UserLinkMember;

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
        $user1 = User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto@schoolsports.com',
            'phone' => '+53 54771264',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);

        $user2 = User::factory()->create([
            'name' => 'Rafael',
            'email' => 'rafael@schoolsports.com',
            'phone' => '+53 55934035',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);

        $user3 = User::factory()->create([
            'name' => 'Carlos',
            'email' => 'carlos@schoolsports.com',
            'phone' => '+53 56247162',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ]);
        // ->assignRole('SuperAdmin');


        // Crear miembros
        $member1 = Member::create([
            'dni' => '12345678',
            'name' => 'Alberto Licea Vallejo',
            'nickname' => 'Al',
            'birth_date' => '2000-01-09',
            'gender' => 'Masculino',
            'about' => 'Nada',
        ]);


        // Establecer relaciones entre usuarios y miembros a través de la tabla intermedia
        UserLinkMember::create([
            'user_id' => $user1->id,
            'member_id' => $member1->id,
            'meta' => json_encode(['relation' => 'Amigo']),
        ]);


    }
}
