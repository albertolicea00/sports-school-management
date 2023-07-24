<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MassAssignmentConcerns;

class Title extends Model
{
    use HasFactory, MassAssignmentConcerns;
    protected $table='titles';
    protected $fillable = [
        'label',
        'icon',
        'meta',
        'enable'
    ];

    public function genders(){
        return $this->belongsToMany('App\Models\Gender', 'genders_has_titles', 'title_id', 'gender_id');
    }
}
