<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricTestPerformanceField extends Model
{
    protected $table = 'metric_test_performance_fields';
    protected $fillable = [
        'name',
        'unit',
        'measure',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function metric()
    {
        return $this->belongsToMany(MetricTestPerformance::class, 'metric_test_performance_has_fields', 'field_id', 'metric_id');
    }
    public function norm()
    {
        return $this->belongsToMany(MetricTestPerformanceNorm::class, 'metric_test_performance_has_fields', 'field_id', 'metric_id');
    }
}
