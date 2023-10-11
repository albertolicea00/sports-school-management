<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    protected $fillable = [
        'name',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }
    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coaches_school_grades', 'school_grade_id', 'coach_id');
    }
    public function metric_models()
    {
        return $this->belongsToMany(MetricTestPerformance::class, 'school_grades_has_metrics', 'school_grade_id', 'metric_model_id');
    }

    // test especificos
    public function metric_performance()
    {
        return $this->belongsToMany(MetricTestPerformanceField::class, 'school_grades_has_metrics', 'school_grade_id', 'metric_id');
    }

}
