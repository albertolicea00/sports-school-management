<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Trainers extends Component
{
    public $create_mode = false;
    public $name, $age;


    public function render()
    {
        return view('livewire.account.trainers');
    }

    public function exitCreateMode()
    {
        $this->create_mode = false;
        $this->reset();
        $this->resetValidation();
    }

    public function crearEntrenador()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
        ],[
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'numeric' => 'El campo debe ser un número.',
        ]);

        $this->create_mode = false;

        try{
            DB::beginTransaction(); // Inicia la transacción



            DB::commit(); // Confirma la transacción
            session()->flash('message', 'Información del entrenador creado con éxito.');

        } catch (\Throwable $th) {
                DB::rollBack(); // Revierte la transacción en caso de error
                session()->flash('message', 'El entrenador no se ha podido crear.');
        }


    }  
}

