<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AddressCountry as AddressCountries;


class AddressCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country_id = 56; // CUBA id

        $json_string = file_get_contents('./database/seeders/data/address_countries.json');
        if (json_last_error() !== JSON_ERROR_NONE) die('Error: No se pudo decodificar el archivo JSON');
        $decoded_data = json_decode($json_string, true);


        foreach($decoded_data as $country){
            if($country["id"] === $country_id){
                AddressCountries::create([
                    "id" => $country["id"],
                    "name" =>  $country["name"],
                    "iso3" =>  $country["iso3"],
                    "iso2" =>  $country["iso2"],
                    "numeric_code" =>  $country["numeric_code"],
                    "phone_code" =>  $country["phone_code"],
                    "capital" =>  $country["capital"],
                    "currency" =>  $country["currency"],
                    "currency_name" =>  $country["currency_name"],
                    "currency_symbol" =>  $country["currency_symbol"],
                    "tld" =>  $country["tld"],
                    "native" =>  $country["native"],
                    "region" =>  $country["region"],
                    "subregion" =>  $country["subregion"],
                    "timezones" => json_encode($country["timezones"][0]),
                    "translations" => json_encode($country["translations"]),
                    "latitude" => $country["latitude"],
                    "longitude" => $country["longitude"],
                    "emoji" => $country["emoji"],
                    "emojiU" => $country["emojiU"],
                ]);
                break;
            }
        };
    }
}
