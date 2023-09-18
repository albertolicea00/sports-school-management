<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InstructorsType;

class InstructorTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instructorTypes = [
            [
                'name' => 'Presidente de la Federación y Comisionado Nacional',
                'about' => 'Responsable de la gestión a nivel nacional.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Metodologo Nacional',
                'about' => 'Encargado de la metodología a nivel nacional.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Jefe de Cátedra de la Selección Nacional (los atletas de todo el país)',
                'about' => 'Encargado de los atletas de la selección nacional.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Provincia: Metodologos provinciales (información de sus atletas y sus entrenadores)',
                'about' => 'Metodólogos a nivel provincial.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Jefes de Cátedra de los centros provinciales (atletas de los municipios)',
                'about' => 'Responsable de los atletas de los centros provinciales.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Jefe de Cátedra de municipios (ve a los entrenadores y atletas de los combinados deportivos de su municipio)',
                'about' => 'Responsable de los atletas y entrenadores municipales.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
            [
                'name' => 'Entrenadores (gestiona sus atletas)',
                'about' => 'Entrenadores responsables de la gestión de sus atletas.',
                'enable' => true,
                'meta' => json_encode(['field' => 'Value']),
            ],
        ];

        foreach ($instructorTypes as $instructorType) {
            InstructorsType::create($instructorType);
        }
    }
}
