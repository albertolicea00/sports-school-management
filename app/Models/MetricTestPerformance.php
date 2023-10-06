<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricTestPerformance extends Model
{
    protected $table = 'metric_test_performance';
    protected $fillable = [
        'name',
        'tests',
        'meta',
    ];

    // Relaciones
    public function fields()
    {
        return $this->belongsToMany(MetricTestPerformanceField::class, 'metric_test_performance_has_fields')
            ->withTimestamps();
    }
}
