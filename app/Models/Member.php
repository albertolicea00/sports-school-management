<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nickname',
        'name',
        'birth_date',
        'gender',
        // 'title_id',
        'about',
        'enable',
        // 'states',
        'meta',
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function linkedUser()
    {
        return $this->belongsToMany(User::class, 'user_link_members', 'member_id', 'user_id')
            ->withPivot('meta')
            ->withTimestamps();
            // ->first();
    }

}
