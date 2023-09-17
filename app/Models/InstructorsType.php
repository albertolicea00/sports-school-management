<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorsType extends Model
{
    protected $fillable = [
        'name',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }
}
