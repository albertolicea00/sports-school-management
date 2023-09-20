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

    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'members_has_sports')
            ->withPivot('about', 'enable', 'meta')
            ->withTimestamps();
    }

    public function addresses()
    {
        return $this->hasMany(MemberAddress::class);
    }

}
