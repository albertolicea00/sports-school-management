<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MassAssignmentConcerns;



// !! analizar si elimino esto o no
class GendersHasTitles extends Model
{
    use HasFactory, MassAssignmentConcerns;
    protected $table='genders_has_titles';
    protected $fillable = [
        'gender_id',
        'prefix_id'
    ];

    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    public function titles()
    {
        return $this->belongsTo('App\Models\Titles', 'title_id');
    }
}
