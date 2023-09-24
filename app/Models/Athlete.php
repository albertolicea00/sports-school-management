<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $fillable = [
        'member_id',
        'team_id',
        'school_grade_id',
        'skin_color',
        'livewiths',
        'is_parents_decreased',
        'about',
        'meta',
        'enable',
    ];

    // Relaciones
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function schoolGrade()
    {
        return $this->belongsTo(SchoolGrade::class);
    }

    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coaches_has_athetes')
            ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }
    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'athletes_has_sports')
            ->withPivot('exp_years', 'about', 'enable', 'meta')
            ->withTimestamps();
    }
}
