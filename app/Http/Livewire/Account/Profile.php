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

    public function updatedEditMode()
    {
        if ($this->edit_mode){
            $this->name = auth()->user()->linkedMember->first() ? auth()->user()->linkedMember->first()->name : auth()->user()->name ;
            $this->phone = auth()->user()->phone;
            $this->email = auth()->user()->email;
            $this->gender = null;
            $this->birth = null;
            $this->location = null;
        }
    }

    public function render()
    {
        return view('livewire.account.profile');
    }
    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|max:155',
            // 'gender' => 'required|in:M,F',
            // 'birth' => 'required|date',
            // 'location' => 'required|string|max:255',
        ], [
            'required' => 'El campo es obligatorio.',
            'string' => 'El campo debe ser una cadena de caracteres.',
            'max' => 'El campo no debe superar :max caracteres.',
            'email' => 'El campo debe ser una dirección de correo electrónico válida.',
            'phone' => 'El campo debe ser un número telefónico.',
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
                        // 'gender' => $this->gender,
                        // 'birth_date' => $this->birth,
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


    public function randomize_img(){
        $defaultImage = asset('assets') . '/img/profile-default-bg.jpg';

        $sportNameLowerCase = strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú'], ['a', 'e', 'i', 'o', 'u'],  auth()->user()->getFirstSport() != null ? auth()->user()->getFirstSport()->name : null));
        $imageFolder = public_path("assets/img/xsports/{$sportNameLowerCase}");
        if (!is_dir($imageFolder)){ return $defaultImage; }

        $imageFiles = scandir($imageFolder);
        $imageFiles = array_diff($imageFiles, ['.', '..']);
        $imageFileArray = array_values($imageFiles);
        if (!$imageFileArray){ return $defaultImage; }

        $randomIndex = array_rand($imageFileArray);
        $randomImageName = $imageFileArray[$randomIndex];
        $sportImage = asset('assets') . '/img/xsports/' . $sportNameLowerCase . '/img.jpg';
        $sportImage = asset('assets') . '/img/xsports/' . $sportNameLowerCase . '/' . $randomImageName;

        return $sportImage;
    }
}
