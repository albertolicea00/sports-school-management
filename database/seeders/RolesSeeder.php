<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // STAFF ROLES
        Role::create(['name' => 'Developer']);
        Role::create(['name' => 'WebMaster']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Staff']);

        // INSTRUCTOR ROLES
        Role::create(['name' => 'Presidente de la Federación']);
        Role::create(['name' => 'Comisionado Nacional']);
        Role::create(['name' => 'Metodologo Nacional']);
        // por deporte
        Role::create(['name' => 'Jefe de Cátedra de la Selección Nacional']);
        Role::create(['name' => 'Metodologo provinciales']);
        Role::create(['name' => 'Jefes de Cátedra de centros provincial']);
        Role::create(['name' => 'Jefe de Cátedra de centro municipal']);

        // COACHES ROLES
        Role::create(['name' => 'Entrenadores']);

        // TEST
        Role::create(['name' => 'Guest']);
        // Role::create(['name' => 'Atleta']);
    }
}
