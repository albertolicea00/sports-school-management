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
        'middle_name',
        'first_lastname',
        'second_lastname',
        'birth_date',
        // 'gender_id',
        // 'title_id',
        'about',
        'enable',
        // 'states',
        'meta',
    ];
}
