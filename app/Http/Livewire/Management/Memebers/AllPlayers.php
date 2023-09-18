<?php

namespace App\Http\Livewire\Management\Memebers;

use Illuminate\Support\Facades\DB;
use App\Models\AddressState as AddressStates;
use App\Models\AddressCity as AddressCities;

use Livewire\Component;

class AllPlayers extends Component
{
    public $createMode = false;
    public $name, $dni, $gender, $birth, $location, $skinColor, $expeYears, $city_id, $state_id, $zip;
    public $skin_colors = ['Piel caucásica o blanca', 'Piel negra o afrodescendiente', 'Piel asiática o amarilla'];
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
        return view('livewire.management.players.all-players');
    }

    public function exitcreateMode()
    {
        $this->createMode = false;
        $this->reset();
        $this->resetValidation();
    }
    public function crearAtleta()
    {
        $this->validate([
            // 'name' => 'required|alpha|regex:/^[a-zA-Z]+$/|max:100|',
            'name' => 'required|alpha|max:100|',
            'zip' => 'required',

            'dni' => 'required|regex:/^[0-9]+$/|size:11',

            'gender' => 'required|in:M,F',
            'birth' => 'required|date',
            'location' => 'required|string|max:255',
            'skinColor' => 'required|max:255',
            'expeYears' => 'required|numeric|max:20',

        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cade na de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'numeric' => 'El campo debe ser un número.',
            'alpha' => 'El campo no debe contener numeros ni caracteres especiales',
            'size' => 'El DNI debe tener :size caracteres.',



        ]);

        $this->createMode = false;

        try {
            DB::beginTransaction();



            DB::commit(); // Confirma la transacción
            session()->flash('message', 'Nuevo Atleta creado con éxito.');
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            session()->flash('message', 'Error al crear el atleta.');
        }
    }
}
