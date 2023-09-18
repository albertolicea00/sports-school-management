<?php

namespace App\Http\Livewire\Management\Memebers;

use App\Models\AddressState as AddressStates;
use App\Models\AddressCity as AddressCities;
use App\Models\CoachesSchoolGrades;
use App\Models\Coach as Couches;
use App\Models\SchoolGrade as SchoolGrades;
use App\Models\Sport as Sports;
use App\Models\Member as Members;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AllTrainers extends Component
{
    public $error_message = 'Lamentamos este inconveniente, por favor sea paciente, en breve solucionaremos este problema';
    public $CreateMode = false;
    public $dni, $full_name, $gender, $birth_date, $location, $zip_code, $city_id, $state_id, $exp_years, $sport_id, $school_grade_id;
    public $states, $cities;
    public $sports;
    public $school_grades;

    public function mount()
    {
        $this->states = AddressStates::all()->where('enable', true);
        $this->cities = AddressCities::all()->where('enable', true);
        $this->gender = 'M';
        $this->sports = Sports::all()->where('enable', true);
        $this->school_grades = SchoolGrades::all()->where('enable', true);
    }

    public function updatedStateId()
    {
        $this->cities = $this->states->find($this->state_id)->cities;
    }


    public function render()
    {
        return view('livewire.management.trainers.all-trainers');
    }

    public function exitCreateMode()
    {
        $this->CreateMode = false;
        $this->reset();
        $this->mount();
        $this->resetValidation();
    }

    public function crearEntrenador()
    {
        $this->validate([
            'dni' => 'required|string|max:255',
            //'full_name' => 'required|alpha|regex:/^[a-zA-Z]+$/|max:100|',
            'full_name' => 'required|string|max:100',
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

        $this->CreateMode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción
            $member = Members::create([
                'dni' => $this->dni,
                'name' => $this->full_name,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender == 'M' ? 'Masculino' : 'Femenino',
            ]);
            $address = $member->addresses()->create([
                'city_id' => $this->city_id,
                'state_id' => $this->state_id,
                'location' => $this->location,
                'zip_code' => $this->zip_code,
            ]);

            $coach = $member->coaches()->create([]);

            //$sport = $member->sports();
            //school-grade
            $this->reset();


            DB::commit(); // Confirma la transacción

            $this->dispatchBrowserEvent('show-created-message', [
                'object' => 'ENTRENADOR',
                'target' => $member->name,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            $this->dispatchBrowserEvent('ddbb-error', [
                'message' => $this->error_message,
                'redirect' => '\trainer-management',
            ]);
        }
    }
}
