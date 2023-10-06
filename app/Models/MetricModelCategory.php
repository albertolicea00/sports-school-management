<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricModelCategory extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];

    // Relaciones
    public function metric_models()
    {
        return $this->hasMany(MetricModel::class, 'category_id');
    }
}
