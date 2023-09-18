<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Players extends Component
{
    public $createMode = false;
    public $name, $lastName, $age, $dni, $gender, $birth, $location, $skinColor, $expeYears;
    // public $name, $age;


    public function render()
    {
        return view('livewire.account.players');
    }

    public function exitcreateMode()
    {
        Log::info('cerrando modal');

        $this->createMode = false;
        $this->reset();
        $this->resetValidation();
    }
    public function crearAtleta()
    {

        $this->validate([
            'name' => 'required|alpha|regex:/^[a-zA-Z]+$/|max:100|',
            'lastName' => 'required|alpha|regex:/^[a-zA-Z]+$/|max:255',
            'dni' => 'required|regex:/^[0-9]+$/|size:11',
            'age' => 'required|numeric',
            'gender' => 'required|in:M,F',
            'birth' => 'required|date',
            'location' => 'required|string|max:255',
            'skinColor' => 'required|alpha|regex:/^[a-zA-Z]+$/|max:255',
            'expeYears' => 'required|numeric|max:20',

        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cade na de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'numeric' => 'El campo debe ser un número.',
            'alpha' => 'El campo no debe contener numeros ni caracteres especiales',
            'size' => 'El DNI debe tener :size caracteres.',


        ]);

        session()->flash('Deberia haberse cerrado');
        $this->createMode = false;

        try {
            DB::beginTransaction();


            // .. 

            Log::info('Mermelada');
            DB::commit(); // Confirma la transacción
            session()->flash('message', 'Nuevo Atleta creado con éxito.');
            Log::info('Conqueso');
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            session()->flash('message', 'Error al crear el atleta.');
        }
    }
}

jaj