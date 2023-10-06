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

    protected $listeners = [
        'deleteCoach'
    ];

    public $error_message = 'Lamentamos este inconveniente, por favor sea paciente, en breve solucionaremos este problema';
    public $CreateMode = false;
    public $EditMode = false;
    public $dni, $full_name, $gender, $birth_date, $location, $zip_code, $city_id, $state_id, $exp_years, $sport_id, $school_grade_id;
    public $edit_dni, $edit_full_name, $edit_gender, $edit_birth_date, $edit_location, $edit_zip_code, $edit_city_id, $edit_state_id, $edit_exp_years, $edit_sport_id, $edit_school_grade_id;
    public $states, $cities, $sports, $school_grades;
    public $coaches;
    public $id_to_delete;
    public $id_to_edit;
    public $can_restore = false;

    public function mount()
    {
        $this->states = AddressStates::all()->where('enable', true);
        $this->cities = AddressCities::all()->where('enable', true);
        $this->gender = 'M';
        $this->sports = Sports::all()->where('enable', true);
        $this->school_grades = SchoolGrades::all()->where('enable', true);
        $this->getCoaches();
    }

    public function updatedStateId()
    {
        $this->cities = $this->states->find($this->state_id)->cities;
    }


    public function render()
    {
        return view('livewire.management.trainers.all-trainers');
    }

    // MOSTRAR

    public function getCoaches()
    {
        $this->coaches = Couches::all()->where('enable', true);
    }

    //ACTUALIZAR
    public function exitEditMode()
    {
        $this->EditMode = false;
        $this->reset();
        $this->mount();
        $this->resetValidation();
        $this->getCoaches();
    }

    public function editMode($id)
    {
        $this->EditMode = true;
        $coach = Couches::findOrFail($id);
        $this->id_to_edit = $id;

        $this->edit_dni = $coach->member->dni;
        $this->edit_full_name = $coach->member->name;
        $this->edit_gender = $coach->member->gender;
        $this->edit_birth_date = $coach->member->birth_date;
        $this->edit_location =  !empty($coach->member->addresses) ? $coach->member->addresses->first()->location : '';
        $this->edit_zip_code = !empty($coach->member->addresses) ? $coach->member->addresses->first()->zip_code : '';
        $this->edit_city_id =  !empty($coach->member->addresses) ? $coach->member->addresses->first()->city->id : '';
        $this->edit_state_id = !empty($coach->member->addresses) ? $coach->member->addresses->first()->state->id : '';
        $this->edit_exp_years = '';
        $this->edit_sport_id = !empty($coach->sports) ? $coach->sports->first()->name : '';
        $this->edit_school_grade_id = '';
    }

    public function updateEntrenador()
    {
        $this->validate([
            'edit_dni' => 'required|string|max:255',
            'edit_full_name' => 'required|string|max:100',
            'edit_gender' => 'required|string|max:1',
            'edit_birth_date' => 'required|date',
            'edit_location' => 'required|string',
            'edit_zip_code' => 'numeric',
            'edit_city_id' => 'required|numeric',
            'edit_state_id' => 'required|numeric',
            'edit_exp_years' => 'required|numeric',

        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'numeric' => 'El campo debe ser un número.',
        ]);
        $this->EditMode = false;


        try {
            DB::beginTransaction(); // Inicia la transacción
            $member = Members::create([
                'dni' => $this->edit_dni,
                'name' => $this->edit_full_name,
                'birth_date' => $this->edit_birth_date,
                'gender' => $this->edit_gender == 'M' ? 'Masculino' : 'Femenino',
            ]);
            $address = $member->addresses()->create([
                'city_id' => $this->edit_city_id,
                'state_id' => $this->edit_state_id,
                'location' => $this->edit_location,
                'zip_code' => $this->edit_zip_code,
            ]);

            $coach = $member->coaches()->update([]);

            $sport = $coach->sports()->attach($this->sport_id);

            $school_grade = $coach->schoolGrades()->attach($this->school_grade_id);


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
        $this->getCoaches();
    }


    //ELIMINAR

    public function askDeleteCoach($id)
    {
        $action_id = mt_rand(1000, 99999);
        $coach = Couches::findOrFail($id);
        $this->id_to_delete = $id;

        $this->dispatchBrowserEvent('show-delete-confirm', [
            'object' => 'ENTRENADOR',
            'target' => $coach->member->name,
            'action_id' => $action_id,
            'emit_action' => 'deleteCoach',
        ]);
    }

    public function deleteCoach()
    {
        $coach = Couches::findOrFail($this->id_to_delete);
        $coach->update(['enable' =>  false]);

        $this->dispatchBrowserEvent('show-deleted-message', [
            'object' => 'ENTRENADOR',
            'target' => $coach->member->name,
        ]);
        $this->can_restore = true;
        $this->getCoaches();
    }

    public function restoreCouch()
    {
        $coach = Couches::findOrFail($this->id_to_delete);
        $coach->update(['enable' => true]);

        $this->dispatchBrowserEvent('show-restored-message', [
            'object' => 'ENTRENADOR',
            'target' => $coach->member->name,
        ]);

        $this->can_restore = false;

        $this->getCoaches();
    }


    // CREAR 
    public function exitCreateMode()
    {
        $this->CreateMode = false;
        $this->reset();
        $this->mount();
        $this->resetValidation();
        $this->getCoaches();
    }


    public function crearEntrenador()
    {
        $this->validate([
            'dni' => 'required|regex:/^[0-9]+$/|size:11',
            'full_name' => 'required|alpha|max:100|',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
            'location' => 'required|string',
            'zip_code' => 'numeric',
            'city_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'exp_years' => 'required|numeric|max:20',

        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'numeric' => 'El campo debe ser un número.',
            'alpha' => 'El campo no debe contener números ni caracteres especiales',
            'size' => 'El DNI debe tener :size caracteres.',
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

            $sport = $coach->sports()->attach($this->sport_id);

            $school_grade = $coach->schoolGrades()->attach($this->school_grade_id);

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
        $this->getCoaches();
    }
}
