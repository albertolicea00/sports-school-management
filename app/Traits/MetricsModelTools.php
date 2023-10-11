<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use App\Models\MetricModel;
use App\Models\MetricModelCategory;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

trait MetricsModelTools
{
    // SEARCH
    public static function findById(int $id): ?object
    {
        $metric = MetricModel::find($id);
        return $metric;
    }
    public static function findByName(string $name): ?object
    {
        $metric = MetricModel::where('name_s', '%LIKE%', $name)
            ->orWhere('name_p', '%LIKE%', $name);
        return $metric;
    }
    public static function findByRoute(string $route): ?object
    {
        $metric = MetricModel::where('route', $route)->first();
        return $metric;
    }


    // INTERNOS
    private static function resolveClassName(string $className, string $type = null): string
    {
        $base = "App\\";
        switch ($type) {
            case 'model':
                $base .= "Models\\";
                break;
            case 'component':
                $base .= "Http\\Livewire\\";
                break;
        }
        $className = ucwords($className, ".-");
        $className = str_replace('.', '\\', $className);
        $className = str_replace('-', '', $className);

        if ($type != null) {
            if (strpos($className, $base) !== 0) {
                $className =  $base . $className;
            }
        }
        return $className;
    }

    // GET TRANSFORM IN THE ENVIRONMENT
    public static function getTemplate(string $template, string $prefix = 'livewire.management.metrics.template.'): string
    {
        $default_template = 'livewire.inprogress';
        $template = $prefix . $template;

        if (view()->exists($template)) return $template;

        return $default_template;
    }
    public static function getMetricModel($model)
    {
        $retorno = null;
        $model = json_decode($model);
        $metric_model = self::getModel($model->model);
        // $metric = MetricModel::find($model->id)->school_grade();

        $sport_id = $model->sport_id;
        $model_id = $model->model_id;

        $retorno = $metric_model::
            where('id', $model_id != null ? '=' : '<>' , $model_id )
            ->where('sport_id', $sport_id != null ? '=' : '<>' , $sport_id )
            ->get();

        return $retorno;
    }

    public static function getModel(string $model): ?string
    {
        $default_model = null;
        $className = self::resolveClassName($model, 'model');
        $modelExist = class_exists($className);

        if ($modelExist) {
            return $className;
        }

        return $default_model;
    }
    public static function getModelTest($model, string $member = null): ?string
    {
        if ($model != null) {
            return self::getModel($model);
        }
        return null;
    }

    public static function getComponent(string $component): ?string
    {
        // @livewire($component)        // render a component
        $default_component = null;
        $className = self::resolveClassName($component, 'component');
        $componentExist = class_exists($className);

        if ($componentExist) {
            return $className;
        }

        return $default_component;
    }
    public static function getComponentTest(string $component, string $member): ?object
    {
        $default_component = null;
        switch (strtolower($member)) {
            case 'coaches':
            case 'coache':
            case 'trainers':
            case 'trainer':
                # code...
                break;


            case 'athletes':
            case 'athlete':
            case 'players':
            case 'player':
            default:
                # code...
                break;
        }


        return $default_component;
    }
}
