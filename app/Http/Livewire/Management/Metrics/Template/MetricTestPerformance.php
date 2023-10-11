<?php

namespace App\Http\Livewire\Management\Metrics\Template;

use Illuminate\Support\Facades\DB;

use App\Models\MetricTestPerformance as MetricTestPerformances;
use App\Models\MetricTestPerformanceField as MetricTestPerformanceFields;

// useful
use App\Models\SchoolGrade as SchoolGrades;
use App\Models\Sport as Sports;

use Livewire\Component;
use App\Traits\MetricsModelTools;


class MetricTestPerformance extends Component // MetricsModelTools::getComponent($this->model->component)::all();
{
    public $error_message = 'Lamentamos este inconveniente, por favor sea paciente, en breve solucionaremos este problema';
    protected $listeners = [
        // 'deleteSport', 'updateSport', 'newSport'
    ];
    public $metrics_with_out_fields;
    public $sport, $school_grades;
    public $metrics;
    public $metric_coache_test, $metric_athlete_test;
    public $route = 'upps';
    public $model;
    public $template;
    public $norm_scores, $standard_scores;

    public $saved_table;
    public $coaches, $athletes, $instructors;


    //  ------------------------- RENDERIZADO ----------------------------

    private function general_metric($id = null)
    {
        $this->route = \Illuminate\Support\Facades\Route::currentRouteName();

        if ($id != -1){
            if ($id != null) $this->model = MetricsModelTools::findById($id);
            else $this->model = MetricsModelTools::findByRoute($this->route);
        }

        $this->sport = $this->model->sport;
        $this->school_grades = $this->model->school_grade;

        $this->template = MetricsModelTools::getTemplate($this->model->template);
        // $this->metric_coache_test = MetricsModelTools::getModelTest($this->model->model_coache_test);
        // $this->metric_athlete_test = MetricsModelTools::getModelTest($this->model->model_athlete_test);
        $this->metrics = MetricsModelTools::getMetricModel($this->model);
    }
    protected function self_metric($parent = true)
    {
        if ($parent) $this->general_metric();

        $this->metrics_with_out_fields = $this->metrics->filter(function ($metric) {
            return $metric->fields->isEmpty();
        });
    }
    public function mount($id = null)
    {
        $this->self_metric(true, $id);
    }
    public function render()
    {
        return view($this->template, ['metrics' => $this->metrics]);
    }
    public function restart(){
        $model = $this->model;
        $this->reset();
        $this->model = $model;
        $this->general_metric(-1);
        $this->self_metric(false);
    }
    public function getNewMetrics(){
        $this->metrics = MetricsModelTools::getMetricModel($this->model);
        // dd($this->metrics);
    }



    public $modules;
    //  ------------------------- CRUD MÓDULOS ----------------------------
    public $createModuleMode = false;
    public $editModuleMode = false;

    public $module_name, $module_sport_id,
        $module_school_grades_ids;
    public $module_new_name, $module_new_sport_id, $module_new_school_grades_ids;
    public $module_edit_name, $module_edit_school_grades_ids;
    public $module_id_to_delete;
    public $module_id_to_edit;

    public function updatedCreateModuleMode()
    {
        $this->module_new_school_grades_ids = [];
        $this->module_new_sport_id = $this->sport->id;
    }
    public function exitModuleMode($mode)
    {
        $this->createModuleMode = false;
        $this->editModuleMode = false;
        $this->restart();
        $this->resetValidation();
        $this->getNewMetrics();
    }

    public function newModule()
    {
        $this->validate([
            'module_new_name' => 'required|string|max:30',
            'module_new_sport_id' => 'required',
            'module_new_school_grades_ids' => 'required',
        ], [
            'required' => 'El campo es obligatorio.',
            'module_new_school_grades_ids.required' => 'Necesita seleccionar al menos un grado escolar.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
        ]);

        $this->createModuleMode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción

            $module = MetricTestPerformances::create([
                'name' => $this->module_new_name,
                'sport_id' => $this->module_new_sport_id,
                'meta' => json_encode(['seed' => false]),
            ]);
            $school_grades = $module->school_grade()->sync( array_keys($this->module_new_school_grades_ids, 'true'));

            $this->restart();

            DB::commit(); // Confirma la transacción
            $this->dispatchBrowserEvent('show-created-message', [
                'object' => 'MODULO',
                'target' =>  $module->name,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            $this->dispatchBrowserEvent('ddbb-error', [
                'message' =>  $this->error_message,
                'redirect' =>  '\metrics-management',
            ]);
        }
        $this->getNewMetrics();
    }

    //  ------------------------- CRUD TEXT ----------------------------
    public $createFieldMode = false;
    public $editFieldMode = false;

    public $field_name, $field_unit, $field_measure, $field_about, $field_status,
        $field_modules_ids;
    public $field_new_name, $field_new_unit, $field_new_measure, $field_new_about, $field_new_status, $field_new_modules_ids;
    public $field_edit_name, $field_edit_unit, $field_edit_measure, $field_edit_about, $field_edit_status, $field_edit_modules_ids;
    public $field_id_to_delete;
    public $field_id_to_edit;

    public function updatedCreateFieldMode()
    {
        $this->modules = MetricTestPerformances::all();
        $this->field_new_modules_ids = [];
    }
    public function exitFieldMode($mode)
    {
        $this->createFieldMode = false;
        $this->editFieldMode = false;
        $this->restart();
        $this->resetValidation();
        $this->getNewMetrics();
    }
    public function newField()
    {
        $this->validate([
            'field_new_name' => 'required|string|max:30',
            'field_new_unit' => 'nullable',
            'field_new_measure' => 'nullable|numeric',
            'field_new_about' => 'nullable|max:255',
            // 'field_new_status' => 'required|max:255',
            'field_new_modules_ids' => 'required',
        ], [
            'required' => 'El campo es obligatorio.',
            'field_new_modules_ids.required' => 'Necesita seleccionar al menos un modulo.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
        ]);

        $this->createFieldMode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción

            $field = MetricTestPerformanceFields::create([
                'name' => $this->field_new_name,
                'unit' => $this->field_new_unit,
                'measure' => $this->field_new_measure,
                'about' => $this->field_new_about,
                'enable' => false,
                'meta' => json_encode(['seed' => false]),
            ]);
            $module = $field->metric()->sync(array_keys($this->field_new_modules_ids, 'true'));

            $this->restart();

            DB::commit(); // Confirma la transacción
            $this->dispatchBrowserEvent('show-created-message', [
                'object' => 'TEST',
                'target' =>  $field->name,
            ]);

        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            $this->dispatchBrowserEvent('ddbb-error', [
                'message' =>  $this->error_message,
                'redirect' =>  '\metrics-management',
            ]);
        }
        $this->getNewMetrics();
    }
}
