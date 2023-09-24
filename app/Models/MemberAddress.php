<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberAddress extends Model
{
    protected $table = 'members_addresses';
    protected $fillable = [
        'member_id',
        'city_id',
        'state_id',
        'location',
        'zip_code',
        'geo',
        'about',
        'enable',
        'meta',
    ];

    // Relaciones
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function city()
    {
        return $this->belongsTo(AddressCity::class);
    }

    public function state()
    {
        return $this->belongsTo(AddressState::class);
    }
}
