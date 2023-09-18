<button type="button" id="new-my-trainer" class="btn btn-primary mt-1" style="margin-right: 2em;"
    wire:click="$set('CreateMode', true)">NUEVO
    ENTRENADOR</button>

@if($CreateMode)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Entrenador</h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label fix-label-form" for="state_id" wire:ignore>Provincia: </label>
                        <select name="state_id" id="swal-state_id" class="form-control" wire:model="state_id" required>
                            <option value="">Seleccione</option>
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="city_id" wire:ignore>Municipio: </label>
                        <select name="city_id" id="swal-city_id" class="form-control" wire:model="city_id" required>
                            <option value="">Seleccione</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror



                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="location" wire:ignore>Dirección: </label>
                        <input wire:model="location" type="text" class="form-control" name="location" id="swal-location"
                            required>
                    </div>
                    @error('location')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="zip_code" wire:ignore>Código Postal: </label>
                        <input wire:model="zip_code" type="text" class="form-control" name="zip_code"
                            id="swal-zip_code">
                    </div>
                    @error('zip_code')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="full_name" wire:ignore>Nombre Completo: </label>
                        <input wire:model="full_name" type="text" class="form-control" name="full_name"
                            id="swal-full_name" required>
                    </div>
                    @error('full_name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="dni" wire:ignore>Carnet de Identidad: </label>
                        <input wire:model="dni" type="text" class="form-control" name="dni" id="swal-dni" required>
                    </div>
                    @error('dni')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="gender" wire:ignore>Sexo: </label>
                        <div class="form-check d-inline p-0">
                            <input class="form-check-input" type="radio" name="gender_m" id="gender_m" checked
                                wire:model='gender' value="M">
                            <label class="custom-control-label" for="gender_m">Masculino</label>
                        </div>
                        <div class="form-check d-inline">
                            <input class="form-check-input" type="radio" name="gender_f" id="gender_f"
                                wire:model='gender' value='F'>
                            <label class="custom-control-label" for="gender_f">Femenino</label>
                        </div>
                    </div>
                    @error('gender')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="birth_date" wire:ignore>Fecha de
                            nacimiento: </label>
                        <input wire:model="birth_date" type="date" class="form-control" name="birth_date"
                            id="swal-birth_date" required>
                    </div>
                    @error('birth_date')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="sport_id" wire:ignore>Deporte (principal):
                        </label>
                        <select name="state_id" id="swal-sport_id" class="form-control" wire:model="sport_id" required>
                            <option value="">Seleccione</option>
                            @foreach ($sports as $sport)
                            <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('sport_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror



                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="exp_years" wire:ignore>Años de experiencia
                            : </label>
                        <input wire:model="exp_years" type="number" class="form-control" name="exp_years"
                            id="swal-exp_years" required>
                    </div>
                    @error('exp_years')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="school_grade_id" wire:ignore>Grado escolar:
                        </label>
                        <select name="school_grade_id" id="swal-school_grade_id" class="form-control">
                            <option value="">Seleccione</option>
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
                <button type="button" class="btn bg-gradient-secondary" wire:click="exitCreateMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="crearEntrenador">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>

@endif