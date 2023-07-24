<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AddressCity as AddressCities;

class AddressCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $country_id = 56; // CUBA id

        $json_string = file_get_contents('./database/seeders/data/address_cities.json');
        if (json_last_error() !== JSON_ERROR_NONE) die('Error: No se pudo decodificar el archivo JSON');
        $decoded_data = json_decode($json_string, true);


        foreach($decoded_data as $city){
            if($city["country_id"] === $country_id){
                AddressCities::create([
                    "id" => $city["id"],
                    "name" => $city["name"],
                    "state_id" => $city["state_id"],
                    "state_code" => $city["state_code"],
                    "state_name" => $city["state_name"],
                    "country_id" => $city["country_id"],
                    "country_code" => $city["country_code"],
                    "country_name" => $city["country_name"],
                    "latitude" => $city["latitude"],
                    "longitude" => $city["longitude"],
                    "wikiDataId" => $city["wikiDataId"],
                ]);
            }
        };
    }
}
