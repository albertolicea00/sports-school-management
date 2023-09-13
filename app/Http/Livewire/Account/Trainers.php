<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\AddressState as AddressStates;
use App\Models\AddressCity as AddressCities;

class Trainers extends Component
{
    public $create_mode = false;
    public $dni, $full_name, $gender, $birth_date, $location, $zip_code, $city_id, $state_id, $exp_years;
    public $states, $cities;

    public function mount()
    {
        $this->states = AddressStates::all()->where('enable', true);
        $this->cities = AddressCities::all()->where('enable', true);
        $this->gender = 'M';
    }

    public function updatedStateId()
    {
        $this->cities = $this->states->find($this->state_id)->cities;
    }


    public function render()
    {
        return view('livewire.account.trainers');
    }

    public function exitCreateMode()
    {
        $this->create_mode = false;
        $this->reset();
        $this->mount();
        $this->resetValidation();
    }

    public function crearEntrenador()
    {
        $this->validate([
            'dni' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'birth_date' => 'required|date',
            'location' => 'required|string',
            'zip_code' => 'numeric',
            'city_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'exp_years' => 'required|numeric',


        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'numeric' => 'El campo debe ser un número.',
        ]);

        $this->create_mode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción



            DB::commit(); // Confirma la transacción
            session()->flash('message', 'Información del entrenador creado con éxito.');
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            session()->flash('message', 'El entrenador no se ha podido crear.');
        }
    }
}
