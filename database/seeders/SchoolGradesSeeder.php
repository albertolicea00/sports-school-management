<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolGrade as SchoolGrades;

class SchoolGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// ------------------ 7-9 ------------------
        $_7 = SchoolGrades::create([
            'name' => '7',
            'age' => '7 años',
            'mix_range' => '7',
            'max_range' => '9',
            'about' => '',
        ]);
        $_8 = SchoolGrades::create([
            'name' => '8',
            'age' => '8 años',
            'mix_range' => '7',
            'max_range' => '9',
            'about' => '',
        ]);
        $_9 = SchoolGrades::create([
            'name' => '9',
            'age' => '9 años',
            'mix_range' => '7',
            'max_range' => '9',
            'about' => '',
        ]);

// ------------------ 10-12 ------------------
        $_10 = SchoolGrades::create([
            'name' => '10',
            'age' => '10 años',
            'mix_range' => '10',
            'max_range' => '12',
            'about' => '',
        ]);
        $_11 = SchoolGrades::create([
            'name' => '11',
            'age' => '11 años',
            'mix_range' => '10',
            'max_range' => '12',
            'about' => '',
        ]);
        $_12 = SchoolGrades::create([
            'name' => '12',
            'age' => '12 años',
            'mix_range' => '10',
            'max_range' => '12',
            'about' => '',
        ]);

// ------------------ 13-15 ------------------
        $_13 = SchoolGrades::create([
            'name' => '13',
            'age' => '13 años',
            'mix_range' => '13',
            'max_range' => '15',
            'about' => '',
        ]);
        $_14 = SchoolGrades::create([
            'name' => '14',
            'age' => '14 años',
            'mix_range' => '13',
            'max_range' => '15',
            'about' => '',
        ]);
        $_15 = SchoolGrades::create([
            'name' => '15',
            'age' => '15 años',
            'mix_range' => '13',
            'max_range' => '15',
            'about' => '',
        ]);

// ------------------ 16-18 ------------------
        $_16 = SchoolGrades::create([
            'name' => '16',
            'age' => '16 años',
            'mix_range' => '16',
            'max_range' => '18',
            'about' => '',
        ]);
        $_17 = SchoolGrades::create([
            'name' => '17',
            'age' => '17 años',
            'mix_range' => '16',
            'max_range' => '18',
            'about' => '',
        ]);
        $_18 = SchoolGrades::create([
            'name' => '18',
            'age' => '18 años',
            'mix_range' => '16',
            'max_range' => '18',
            'about' => '',
        ]);
    }
}
