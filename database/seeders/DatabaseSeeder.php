<?php

namespace Database\Seeders;

use App\Http\Livewire\Management\RolesPermissions\AllPermissions;
use App\Models\MemberType;
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
        $this->call(RolesPermissionsSeeder::class);
        // $this->call(RolesSeeder::class);
        // $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);



        $this->call(AddressCountriesSeeder::class);
        $this->call(AddressStatesSeeder::class);
        $this->call(AddressCitiesSeeder::class);

        $this->call(GendersTitlesSeeder::class);
        $this->call(MembersTypesSeeder::class);
    }
}
