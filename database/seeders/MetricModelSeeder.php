<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MetricModel;
use App\Models\MetricModelCategory;

class MetricModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // categorías
        $tests = MetricModelCategory::create([
            'icon' => 'fas fa-heartbeat',
            'route' => 'test/',
            'name' => 'TESTS',
        ]);
        $plann = MetricModelCategory::create([
            'icon' => 'fas fa-book',
            'route' => 'plann/',
            'name' => 'PLANES Y FRECUENCIAS',
        ]);



// -------------------- TESTS --------------------
        $test_performance_1  = MetricModel::create([
            "template" => "metric-test-performance",
            "component" => 'App\\Http\\Livewire\\Management\\Metrics\\Template\\MetricTestPerformance',
            "model" => "App\\Models\\MetricTestPerformance",
            "model_coache_test" => "App\\Models\\",
            "model_athlete_test" => "App\\Models\\",
            'model_id' => null,
            "table" => "metric_test_performance",
            "route" => "balonmano/metric_test_performance",
            "name_s" => "Test Físico",
            "name_p" => "Tests Físico",
            "icon" => "fas fa-weight",
            "color" => "#ff9b85",
            "category_id" => $tests->id,
            "sport_id" => 2
        ]);
        $test_performance_1->school_grade()->sync([1, 2, 3, 4, 5, 6, 7, 8]);



// --------------- PLANES Y FRECUENCIAS ------------
        $distribution_accents  = MetricModel::create([
            "model" => "App\Models\MetricDistributionAccent",
            'model_id' => 1,
            "table" => "metric_distribution_accents",
            "route" => "metric_distribution_accents",
            "name_s" => "Distribución de acentos",
            "name_p" => "Distribuciones de acentos",
            "icon" => "fas fa-book",
            "color" => "#ff9b85",
            "category_id" => $plann->id
        ]);




        // CLASIFIQUE BY AGE RANGE
        // -- SELECT * FROM school_grades WHERE mix_range = 7 and max_range = 9

    }
}
