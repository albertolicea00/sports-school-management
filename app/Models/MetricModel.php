<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricModel extends Model
{
    protected $fillable = [
        'model',
        'model_id',
        'table',
        'route',
        'name_s',
        'name_p',
        'icon',
        'color',
        'sport_id',
        'category_id',
    ];


    // Relaciones
    public function category()
    {
        return $this->belongsTo(MetricModelCategory::class, 'category_id');
    }
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function school_grade()
    {
        return $this->belongsToMany(SchoolGrade::class, 'school_grades_has_metrics')
            // ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }
}
