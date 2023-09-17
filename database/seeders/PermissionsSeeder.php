<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['name' => 'crear atleta']);
        Permission::create(['name' => 'eliminar atleta']);
        Permission::create(['name' => 'editar atleta']);

        Permission::create(['name' => 'crear coach']);
        Permission::create(['name' => 'eliminar coach']);
        Permission::create(['name' => 'editar coach']);

        Permission::create(['name' => 'crear instructor']);
        Permission::create(['name' => 'eliminar instructor']);
        Permission::create(['name' => 'editar instructor']);

         // Permisos para Atletas
        Permission::create(['name' => 'ver-todos-atletas']);
        Permission::create(['name' => 'ver-atletas-de-tu-ciudad']);
        Permission::create(['name' => 'ver-atletas-de-tu-provincia']);
        Permission::create(['name' => 'crear-atleta']);
        Permission::create(['name' => 'editar-atleta']);
        Permission::create(['name' => 'eliminar-atleta']);
        Permission::create(['name' => 'ver-lista-de-atletas']);

         // Permisos para Entrenadores
        Permission::create(['name' => 'ver-todos-entrenadores']);
        Permission::create(['name' => 'ver-entrenadores-de-tu-ciudad']);
        Permission::create(['name' => 'ver-entrenadores-de-tu-provincia']);
        Permission::create(['name' => 'crear-entrenador']);
        Permission::create(['name' => 'editar-entrenador']);
        Permission::create(['name' => 'eliminar-entrenador']);
        Permission::create(['name' => 'ver-lista-de-entrenadores']);

         // Permisos para Instructores
        Permission::create(['name' => 'ver-todos-instructores']);
        Permission::create(['name' => 'ver-instructores-de-tu-ciudad']);
        Permission::create(['name' => 'ver-instructores-de-tu-provincia']);
        Permission::create(['name' => 'crear-instructor']);
        Permission::create(['name' => 'editar-instructor']);
        Permission::create(['name' => 'eliminar-instructor']);
        Permission::create(['name' => 'ver-lista-de-instructores']);

        // Permisos para Roles y Usuarios
        Permission::create(['name' => 'ver-rol']);
        Permission::create(['name' => 'crear-rol']);
        Permission::create(['name' => 'editar-rol']);
        Permission::create(['name' => 'eliminar-rol']);
        Permission::create(['name' => 'ver-lista-de-roles']);
        Permission::create(['name' => 'ver-usuario']);
        Permission::create(['name' => 'crear-usuario']);
        Permission::create(['name' => 'editar-usuario']);
        Permission::create(['name' => 'eliminar-usuario']);
        Permission::create(['name' => 'ver-lista-de-usuarios']);



    }
}
