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
        return $this->belongsToMany(Coach::class, 'coaches_school_grades')
            // ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }
    public function metric_models()
    {
        return $this->belongsToMany(MetricModel::class, 'school_grades_has_metrics')
            // ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }
}
