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
}
