<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name ='';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $password = '';

    protected $rules=[
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'message' => 'required|min:3|max:250',
        'password' => 'required|min:5',
    ];


    public function store(){

        // $attributes = $this->validate();

        // $user = User::create($attributes);

        // auth()->login($user);
        // return redirect('/dashboard');
        //return back()->with('status', "En breve se le enviará un email con la respuesta a su solicitud");

        return back()->with('in_process', "Esta función aun esta en construcción");
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
