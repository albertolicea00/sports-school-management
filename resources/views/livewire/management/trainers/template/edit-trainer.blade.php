<span rel="tooltip" class="btn btn-success btn-link" data-original-title="" title=""
  wire:click='editMode({{ $couch_id }})'>
  <i class="material-icons">edit</i>
  <div class="ripple-container"></div>
</span>



@if($EditMode && $couch_id == $id_to_edit)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" wire:ignore>Editando el entrenador {{ $edit_full_name }}</h5>
      </div>
      <div class="modal-body">
        <div class="px-2">

          <div class="input-group input-group-outline mt-3">
            <label class="form-label fix-label-form" for="edit_state_id" wire:ignore>Provincia: </label>
            <select name="edit_state_id" id="swal-edit_state_id" class="form-control" wire:model='edit_state_id'
              required>
              @foreach ($states as $state)
              <option value="{{ $state->id }}">{{ $state->name }}</option>
              @endforeach
            </select>
          </div>
          @error('edit_state_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="city_id" wire:ignore>Municipio: </label>
            <select name="city_id" id="swal-city_id" class="form-control" wire:model="edit_city_id" required>
              <option value="">Seleccione</option>
              @foreach ($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
          </div>
          @error('city_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror



          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="location" wire:ignore>Dirección: </label>
            <input wire:model="location" type="text" class="form-control" name="location" id="swal-location" required>
          </div>
          @error('location')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="zip_code" wire:ignore>Código Postal: </label>
            <input wire:model="edit_zip_code" type="text" class="form-control" name="zip_code" id="swal-zip_code">
          </div>
          @error('zip_code')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="edit_full_name" wire:ignore>Nombre Completo: </label>
            <input wire:model="edit_full_name" type="text" class="form-control" name="edit_full_name"
              id="swal-edit_full_name" required>
          </div>
          @error('edit_full_name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="edit_dni" wire:ignore>Carnet de Identidad: </label>
            <input wire:model="edit_dni" type="text" class="form-control" name="edit_dni" id="swal-edit_dni" required>
          </div>
          @error('edit_dni')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="edit_gender" wire:ignore>Sexo: </label>
            <div class="form-check d-inline p-0">
              <input class="form-check-input" type="radio" name="gender_m" id="gender_m" checked
                wire:model='edit_gender' value="M">
              <label class="custom-control-label" for="gender_m">Masculino</label>
            </div>
            <div class="form-check d-inline">
              <input class="form-check-input" type="radio" name="gender_f" id="gender_f" wire:model='edit_gender'
                value='F'>
              <label class="custom-control-label" for="gender_f">Femenino</label>
            </div>
          </div>
          @error('edit_gender')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="edit_birth_date" wire:ignore>Fecha de
              nacimiento: </label>
            <input wire:model="edit_birth_date" type="date" class="form-control" name="edit_birth_date"
              id="swal-edit_birth_date" required min="{{ now()->subYears(100)->format('Y-m-d') }}"
              max="{{ now()->subYears(18)->format('Y-m-d') }}">
          </div>
          @error('edit_birth_date')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="edit_sport_id" wire:ignore>Deporte (principal):
            </label>
            <select name="state_id" id="swal-edit_sport_id" class="form-control" wire:model="edit_sport_id" required>
              @foreach ($sports as $sport)
              <option value="{{ $sport->id }}">{{ $sport->name }}</option>
              @endforeach
            </select>
          </div>
          @error('edit_sport_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror



          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="edit_exp_years" wire:ignore>Años de experiencia: </label>
            <input wire:model="edit_exp_years" type="number" class="form-control" name="edit_exp_years"
              id="swal-edit_exp_years" wire:model='edit_exp_years' required>
          </div>
          @error('edit_exp_years')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


          <div class="input-group input-group-outline mt-4">
            <label class="form-label fix-label-form" for="school_grade_id" wire:ignore>Grado escolar:
            </label>
            <select name="school_grade_id" id="swal-school_grade_id" class="form-control">
              @foreach ($school_grades as $school_grade)
              <option value="{{ $school_grade->id }}">{{ $school_grade->name }}</option>
              @endforeach
            </select>
          </div>
          @error('school_grade_id')<p class="text-danger inputerror text-start">{{ $message }}</p>
          @enderror




        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" wire:click="exitEditMode">cancelar</button>
        <button type="button" class="btn bg-gradient-primary" wire:click="updateEntrenador">Guardar
          cambios</button>
      </div>
    </div>
  </div>
</div>
<div class="modal-backdrop fade show"></div>

@endif