<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [
        'member_id',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function athletes()
    {
        return $this->belongsToMany(Athlete::class, 'coaches_has_athetes')
            ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'coaches_has_teams')
            ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }

    public function schoolGrades()
    {
        return $this->belongsToMany(SchoolGrade::class, 'coaches_school_grades')
            ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }
}
