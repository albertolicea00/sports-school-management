<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembersHasSports extends Model
{
    protected $fillable = [
        'member_id',
        'sport_id',
        'exp_years',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
