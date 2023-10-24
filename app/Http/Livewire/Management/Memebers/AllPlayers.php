<?php

namespace App\Http\Livewire\Management\Memebers;

use App\Models\AddressState as AddressStates;
use App\Models\AddressCity as AddressCities;
use App\Models\Sport as Sports;
use App\Models\Member as Members;
use App\Models\Athlete as Athletes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AllPlayers extends Component
{
    public $error_message = 'Lamentamos este inconveniente, por favor sea paciente, en breve solucionaremos este problema';
    public $createMode = false;
    public $name, $dni, $gender, $birth, $location, $skinColor, $expeYears, $city_id, $state_id, $zip;
    public $skin_colors = ['Piel caucásica o blanca', 'Piel negra o afrodescendiente', 'Piel asiática o amarilla'];
    public $states, $cities;
    public $sports;
    public $athletes;

    public function mount()
    {
        $this->states = AddressStates::all()->where('enable', true);
        $this->cities = AddressCities::all()->where('enable', true);
        $this->sports = Sports::all()->where('enable', true);
        $this->gender = 'M';
        $this->getAthletes();
    }

    public function updatedStateId()
    {
        $this->cities = $this->states->find($this->state_id)->cities;
    }

    public function render()
    {
        return view('livewire.management.players.all-players');
    }

    public function getAthletes()
    {
        $this->athletes = Athletes::all()->where('enable', true);
    }

    public function exitcreateMode()
    {
        $this->createMode = false;
        $this->reset();
        $this->mount();
        $this->resetValidation();
        $this->getAthletes();
    }


    public function crearAtleta()
    {
        $this->validate([
            // 'name' => 'required|alpha|regex:/^[a-zA-Z]+$/|max:100|',
            'name' => 'required|alpha|max:100|',
            'zip' => 'numeric',
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


            $member = Members::create([
                'dni' => $this->dni,
                'name' => $this->name,
                'birth_date' => $this->birth,
                'gender' => $this->gender == 'M' ? 'Masculino' : 'Femenino',
            ]);
            $address = $member->addresses()->create([
                'city_id' => $this->city_id,
                'state_id' => $this->state_id,
                'location' => $this->location,
                'zip_code' => $this->zip,
            ]);


            $athletes = $member->athletes()->create([
                'skin_color' => $this->skin_colors,
            ]);

            // como crear un registo de una relacion en laravel de mucho a muchos donde el campo que necesito llenar esta en la tabla intermedia 
            //$sport = $athletes->sports()->attach($this->athletes_has_sport);

            $this->reset();

            DB::commit(); // Confirma la transacción

            $this->dispatchBrowserEvent('show-created-message', [
                'object' => 'ATLETA',
                'target' => $member->name,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            $this->dispatchBrowserEvent('ddbb-error', [
                'message' => $this->error_message,
                'redirect' => '\players-management',
            ]);
        }
        $this->getAthletes();
    }
}
