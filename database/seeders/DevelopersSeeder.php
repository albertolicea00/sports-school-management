<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Member;
use App\Models\UserLinkMember;

class DevelopersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'name' => 'Developer',
            'email' => 'developer@schoolsports.com',
            'phone' => '',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ])->assignRole('Developer');




        $user1 = User::factory()->create([
            'name' => 'Alberto',
            'email' => 'alberto@schoolsports.com',
            'phone' => '+53 54771264',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ])->assignRole('Developer');

        $member1 = Member::create([
            'dni' => '12345678',
            'name' => 'Alberto Licea Vallejo',
            'nickname' => 'Al',
            'birth_date' => '2000-01-09',
            'gender' => 'Masculino',
            'about' => 'Nada',
        ]);
        UserLinkMember::create([
            'user_id' => $user1->id,
            'member_id' => $member1->id,
        ]);






        $member2 = Member::create([
            'dni' => '9871092834',
            'name' => 'Rafael Cardenas',
            'nickname' => 'Rafa',
            'birth_date' => '2000-09-02',
            'gender' => 'Masculino',
            'about' => 'About de miembro',
        ]);
        $user2 = User::factory()->create([
            'name' => 'Rafael',
            'email' => 'rafael@schoolsports.com',
            'phone' => '+53 55934035',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ])->assignRole('Developer');

        UserLinkMember::create([
            'user_id' => $user2->id,
            'member_id' => $member2->id,
        ]);






        $member3 = Member::create([
            'dni' => '56172394',
            'name' => 'Carlos Alberto',
            'nickname' => 'CA',
            'birth_date' => '2002-10-19',
            'gender' => 'Masculino',
            'about' => 'About de miembro',
        ]);
        $user3 = User::factory()->create([
            'name' => 'Carlos',
            'email' => 'carlos@schoolsports.com',
            'phone' => '+53 56247162',
            'about' => 'Desarrollador de la plataforma de gestión deportiva',
            'password' => ('secret123')
        ])->assignRole('Developer');

        UserLinkMember::create([
            'user_id' => $user3->id,
            'member_id' => $member3->id,
        ]);


    }
}
