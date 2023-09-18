<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    protected $fillable = [
        'model',
        'table',
        'route',
        'visual_name_s',
        'visual_name_p',
        'icon',
        'color',
        'enable',
    ];

    // Relaciones
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
