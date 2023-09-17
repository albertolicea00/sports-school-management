<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = [
            [
                'name' => 'Fútbol',
                'about' => 'Apasionante deporte de equipo que se juega en un campo rectangular con dos equipos compuestos por once jugadores cada uno.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Baloncesto',
                'about' => 'Emocionante deporte de equipo que se juega en una cancha rectangular con dos equipos compuestos por cinco jugadores cada uno.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Tenis',
                'about' => 'Deporte individual o en parejas que se juega en una cancha dividida por una red.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Natación',
                'about' => 'Deporte individual que implica moverse a través del agua usando brazadas y patadas.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Atletismo',
                'about' => 'Deporte individual que incluye una variedad de disciplinas, como carreras, saltos y lanzamientos.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Voleibol',
                'about' => 'EDeporte de equipo que se juega en una cancha dividida por una red.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Ciclismo',
                'about' => 'Deporte individual o en grupo que implica montar en bicicleta en diversas superficies y terrenos.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Karate',
                'about' => 'Arte marcial y deporte de autodefensa que se originó en Japón.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
        ];

        foreach ($sports as $sport) {
            Sport::create($sport);
        }
    }
}
