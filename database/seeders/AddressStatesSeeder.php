<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AddressState as AddressStates;

class AddressStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country_id = 56; // CUBA id

        $json_string = file_get_contents('./database/seeders/data/address_states.json');
        if (json_last_error() !== JSON_ERROR_NONE) die('Error: No se pudo decodificar el archivo JSON');
        $decoded_data = json_decode($json_string, true);

        foreach($decoded_data as $state){
            if($state["country_id"] === $country_id){
                AddressStates::create([
                    "id" => $state["id"],
                    "name" =>  $state["name"],
                    "country_id" => $state["country_id"],
                    "country_code" => $state["country_code"],
                    "country_name" => $state["country_name"],
                    "state_code" => $state["state_code"],
                    "type" => $state["type"],
                    "latitude" => $state["latitude"],
                    "longitude" => $state["longitude"],
                ]);
            }
        };
    }
}
