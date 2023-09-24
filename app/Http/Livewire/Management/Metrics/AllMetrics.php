<?php

namespace App\Http\Livewire\Management\Metrics;

use App\Models\MetricModelCategory as MetricModelCategories;
use App\Models\MetricModel as MetricModels;
use Livewire\Component;

class AllMetrics extends Component
{
    public $metric_categories;
    public $metric_models;

    public function getMetrics()
    {
        $this->metric_categories = MetricModelCategories::all()->where('enable', true);
    }
    public function mount()
    {
        $this->getMetrics();
    }
    public function render()
    {
        return view('livewire.management.metrics.all-metrics');
    }


    public function openComponent(){
        dd('hola');
    }


}
