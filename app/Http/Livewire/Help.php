<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Help extends Component
{
    public $page;


//     dashboard')
// tables')
// machine-learning
// my-profile
// my-notifications
// my-players
// my-trainers
// my-tasks
// players-management
// users-management
// roles-management
// accents-management
// sports-management
// database-0709
// database-1012
// database-1315
// database-1518
// virtual-reality
// more-tools


    
    public function mount($section = null){
        $this->page = $section;
    }


    public function render()
    {
       return view('livewire.help');
    }
}
