<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MassAssignmentConcerns;

class Gender extends Model
{
    use HasFactory, MassAssignmentConcerns;
    protected $table='genders';
    protected $fillable = [
        'label',
        'pronoun',
        'icon',
        'meta',
        'enable'
    ];

    public function titles(){
        return $this->belongsToMany('App\Models\Title', 'genders_has_titles', 'gender_id', 'title_id');
    }
}
