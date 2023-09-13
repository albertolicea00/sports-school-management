<?php

namespace App\Http\Livewire\Management\Users;

use Livewire\Component;

class CrudUsers extends Component
{
    public $createTrainerMode = false;
    public $createInstructorMode = false;

    public function render()
    {
        return view('livewire.management.users.crud-users');
    }
}
