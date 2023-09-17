<?php

namespace Database\Seeders;

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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(DevelopersSeeder::class);
        $this->call(UsersSeeder::class);


        $this->call(AddressCountriesSeeder::class);
        $this->call(AddressStatesSeeder::class);
        $this->call(AddressCitiesSeeder::class);

        $this->call(MembersTypesSeeder::class);
        // $this->call(InstructorTypesSeeder::class);

        $this->call(SportsSeeder::class);

    }
}
