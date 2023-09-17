<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = [
        'name',
        'about',
        'enable',
        'meta',
        'image',
    ];

    // Relaciones
    public function members()
    {
        return $this->belongsToMany(Member::class, 'members_has_sports')
            ->withPivot('exp_years', 'about', 'enable', 'meta')
            ->withTimestamps();
    }
}
