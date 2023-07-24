<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Title as Titles;
use App\Models\Gender as Genders;

class GendersTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ------------------------ GENDERS ------------------------
        $male = Genders::create([
            'label' => "Masculino",
            'pronoun' => "El",
            'meta' => null,
            'icon'=> '<i class="fas fa-male fa-lg"></i>'
        ]);
        $female = Genders::create([
            'label' => "Femenino",
            'pronoun' => "Ella",
            'meta' => null,
            'icon'=> '<i class="fas fa-female fa-lg"></i>'
        ]);



        // ------------------------ PREFIXS ------------------------
        $Sr = Titles::create([
            'label' => json_encode([
                'abb' => "Sr",
                'exp' => "Señor",
                ]),
            'meta' => null,
            'icon'=> ''
            ])->id;

        $Sra = Titles::create([
            'label' => json_encode([
                'abb' => "Sra",
                'exp' => "Señora",
                ]),
            'meta' => null,
            'icon'=> ''
            ])->id;

        $Srta = Titles::create([
            'label' => json_encode([
                'abb' => "Srta",
                'exp' => "Señorita",
                ]),
            'meta' => null,
            'icon'=> ''
            ])->id;

        $Mr = Titles::create([
            'label' => json_encode([
                'abb' => "Mr",
                'exp' => "Master",
                ]),
            'meta' => null,
            'icon'=> ''
            ])->id;

        $Dr = Titles::create([
            'label' => json_encode([
                'abb' => "Dr",
                'exp' => "Doctor",
                ]),
            'meta' => null,
            'icon'=> ''
            ])->id;

        $Lic = Titles::create([
            'label' => json_encode([
                'abb' => "Lic",
                'exp' => "Licenciado",
                ]),
            'meta' => null,
            'icon'=> ''
            ])->id;

        $Ing = Titles::create([
            'label' => json_encode([
                'abb' => "Ing",
                'exp' => "Ingeniero",
                ]),
            'meta' => null,
            'icon'=> ''
        ])->id;




        // ------------------------ RELATIONS ------------------------

        $male->titles()->attach([
            $Sr,
            $Mr,
            $Dr,
            $Lic,
            $Ing,
        ]);

        $female->titles()->attach([
            $Sra,
            $Srta,
            $Mr,
            $Dr,
            $Lic,
            $Ing,
        ]);


    }
}
