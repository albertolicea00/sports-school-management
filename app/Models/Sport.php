<?php

namespace App\Models;

use App\Http\Livewire\Account\Players;
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
            ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }
    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coaches_has_sports')
            ->withPivot('exp_years', 'about', 'enable', 'meta')
            ->withTimestamps();
    }
    public function athletes()
    {
        return $this->belongsToMany(Athlete::class, 'athletes_has_sports')
            ->withPivot('exp_years', 'about', 'enable', 'meta')
            ->withTimestamps();
    }
}
