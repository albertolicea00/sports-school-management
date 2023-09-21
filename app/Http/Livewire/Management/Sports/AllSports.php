<?php

namespace App\Http\Livewire\Management\Sports;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Sport as Sports;
use Ramsey\Uuid\Uuid;

class AllSports extends Component
{
    protected $listeners = [
        'deleteSport', 'updateSport', 'newSport'
    ];

    public $sports;
    public $teams;

    public $createMode = false;
    public $editMode = false;


    public $new_name, $new_about, $new_img;
    public $edit_name, $edit_img, $edit_about;
    public $id_to_delete;
    public $id_to_edit;


    public $error_message = 'Lamentamos este inconveniente, por favor sea paciente, en breve solucionaremos este problema';

    public function render()
    {
        return view('livewire.management.sports.all-sports');
    }
    public function mount ()
    {
        $this->getSports();
    }

    private function getSports(){
        $this->sports = Sports::all()->where('enable', true);
    }

    public function exitCreateMode(){
        $this->createMode = false;
        $this->reset();
        $this->resetValidation();
        $this->getSports();
    }
    public function exitEditMode(){
        $this->editMode = false;
        $this->reset();
        $this->resetValidation();
        $this->getSports();
    }


    public function editMode($id)
    {
        $this->editMode = true;
        $sport = Sports::findOrFail($id);

        $this->id_to_edit = $sport->id;
        $this->edit_name = $sport->name;
        $this->edit_img = $sport->imgen;
        $this->edit_about = $sport->about;

    }

    public function askConfirmSave($emit_action, $action)
    {
        $action_id = mt_rand(1000, 99999); // Uuid::uuid4();
        $this->dispatchBrowserEvent('show-save-confirm', [
            'object' => 'DEPORTE',
            'action' =>  $action,
            'action_id' =>  $action_id,
            'emit_action' =>  $emit_action,
        ]);
    }

    public function updateSport()
    {
        $this->validate([
            'edit_name' => 'required|string|max:30',
            // 'edit_img' => 'required',
            'edit_about' => 'required|max:255',
        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
        ]);

        $this->editMode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción

            $sport = Sports::findOrFail($this->id_to_edit);
            $sport->update([
                'name' => $this->edit_name,
                // 'imagen' => $this->edit_img,
                'about' => $this->edit_about,
            ]);
            $this->reset();

            DB::commit(); // Confirma la transacción
            $this->dispatchBrowserEvent('show-updated-message', [
                'object' => 'DEPORTE',
                'target' =>  $sport->name,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            $this->dispatchBrowserEvent('ddbb-error', [
                'message' =>  $this->error_message,
                'redirect' =>  '\sports-management',
            ]);
        }
        $this->getSports();


    }
    public function newSport()
    {
        $this->validate([
            'new_name' => 'required|string|max:30',
            // 'new_img' => 'required',
            'new_about' => 'required|max:255',
        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
        ]);

        $this->createMode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción

            $sport = Sports::create([
                'name' => $this->new_name,
                'about' => $this->new_about,
                // 'imagen' => $this->new_img,
                'meta' => json_encode(['seed' => false]),
            ]);

            $this->reset();

            DB::commit(); // Confirma la transacción
            $this->dispatchBrowserEvent('show-created-message', [
                'object' => 'DEPORTE',
                'target' =>  $sport->name,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error\
            $this->dispatchBrowserEvent('ddbb-error', [
                'message' =>  $this->error_message,
                'redirect' =>  '\sports-management',
            ]);
        }
        $this->getSports();

    }
    public function askDeleteSport($id)
    {
        $action_id = mt_rand(1000, 99999); // Uuid::uuid4();
        $sport = Sports::findOrFail($id);
        $this->id_to_delete = $sport->id;

        $this->dispatchBrowserEvent('show-delete-confirm', [
            'object' => 'DEPORTE',
            'target' =>  $sport->name,
            'action_id' =>  $action_id,
            'emit_action' =>  'deleteSport',
        ]);
    }
    public function deleteSport()
    {
        $sport = Sports::findOrFail($this->id_to_delete);
        $sport->update(['enable' => false]);
        // $this->id_to_delete = null;
        $this->getSports();
        $this->dispatchBrowserEvent('show-deleted-message', [
            'object' => 'DEPORTE',
            'target' =>  $sport->name,
        ]);
    }

}
