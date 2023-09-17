<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachesHasTeams extends Model
{
    protected $fillable = [
        'athlete_id',
        'coach_id',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
