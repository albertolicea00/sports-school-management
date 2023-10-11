<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricTestPerformance extends Model
{
    protected $table = 'metric_test_performance';
    protected $fillable = [
        'name',
        'sport_id',
        'meta'
    ];




    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function school_grade()
    {
        return $this->belongsToMany(SchoolGrade::class, 'metric_test_performance_in_school_grades', 'metric_id', 'school_grade_id')
            ->withTimestamps();
    }

    // Relaciones PROPIAS
    public function fields()
    {
        return $this->belongsToMany(MetricTestPerformanceField::class, 'metric_test_performance_has_fields', 'metric_id', 'filed_id');
    }
}
