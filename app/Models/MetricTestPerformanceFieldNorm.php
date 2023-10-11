<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricTestPerformanceFieldNorm extends Model
{
    protected $table = 'metric_test_performance_field_norms';
    protected $fillable = [
        'norm_scores',
        'standard_scores',
        'enable',
        'meta'
    ];


    // Relaciones
    public function field()
    {
        return $this->belongsTo(MetricTestPerformanceField::class, 'field_id');
    }
}
