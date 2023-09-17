<?php

namespace App\Http\Livewire\Management\Sports;

use Livewire\Component;
use App\Models\Sport as Sports;


class AllSports extends Component
{
    public $sports;
    public $teams;


    public function render()
    {
        return view('livewire.management.sports.all-sports');
    }
    public function mount ()
    {
        $this->sports = Sports::all()->where('enable', true);
    }
}
