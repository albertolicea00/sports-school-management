<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Member;


class Profile extends Component
{

    public $edit_mode = false;
    public $name, $phone, $email, $gender, $birth, $location;

    public function exitEditMode()
    {
        $this->edit_mode = false;
        $this->reset();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.account.profile');
    }
    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:155',
            'gender' => 'required|in:M,F',
            'birth' => 'required|date',
            'location' => 'required|string|max:255',
        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'email' => 'El campo debe ser una dirección de correo electrónico válida.',
            'numeric' => 'El campo debe ser un número.',
            'in' => 'El campo debe ser uno de los siguientes valores: :values.',
            'date' => 'El campo debe ser una fecha válida.'
        ]);

        $this->edit_mode = false;

        try {
            DB::beginTransaction(); // Inicia la transacción

            $user = User::findOrFail(auth()->user()->id);
            $user->name = isset(explode(' ', $this->name)[0]) ? explode(' ', $this->name)[0] : $this->name;
            $user->phone = $this->phone;
            $user->email = $this->email;

            $linkedMember = $user->linkedMember;
            if ($linkedMember) {
                $member = $linkedMember->first();
                if ($member) {
                    $member->update([
                        'name' => $this->name,
                        'gender' => $this->gender,
                        'birth_date' => $this->birth,
                    ]);
                }
            } else {
                // Handle the case where the user doesn't have a linked member associated.
            }
            $user->save();
            $this->reset();

            DB::commit(); // Confirma la transacción
            session()->flash('message', 'Información de perfil actualizado con éxito.');
        } catch (\Throwable $th) {
            DB::rollBack(); // Revierte la transacción en caso de error
            session()->flash('message', 'El perfil no se ha podido actualizar.');
        }
    }
}
