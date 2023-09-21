<button type="button" id="new-my-player" class="btn btn-primary mt-1" style="margin-right: 2em;"
    wire:click="$set('createMode', true)">NUEVO
    ATLETA</button>

@if($createMode)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Atleta</h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label fix-label-form" for="state_id" wire:ignore>Provincia :</label>
                        <select name="state_id" id="swal-state_id" class="form-control" wire:model="state_id" required>
                            <option value="">Seleccione</option>
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="city_id" wire:ignore>Municipio :</label>
                        <select name="city_id" id="swal-city_id" class="form-control" wire:model="city_id" required>
                            <option value="">Seleccione</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <input wire:model="location" type="text" class="form-control mt-1" name="location"
                            id="swal-location" required>
                        <label class="form-label fix-label-form" for="location" wire:ignore>Dirección: </label>
                    </div>
                    @error('location')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <input wire:model="zip" type="text" class="form-control mt-1" name="zip" id="swal-zip" required>
                        <label class="form-label fix-label-form" for="zip" wire:ignore>Código Postal: </label>
                    </div>
                    @error('zip')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="name" wire:ignore>Nombre Completo: </label>
                        <input wire:model="name" type="text" class="form-control mt-1" name="name" id="swal-name"
                            required>
                    </div>
                    @error('name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="dni" wire:ignore>Carnet de Identidad: </label>
                        <input wire:model="dni" type="text" class="form-control mt-1" name="dni" id="swal-dni" required>
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



                    @error('birth')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="birth" wire:ignore>Fecha de nacimiento: </label>
                        <input wire:model="birth" type="date" class="form-control mt-1" name="birth" id="swal-birth"
                            required>
                    </div>
                    @error('birth')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="skinColor" wire:ignore>Color de piel: </label>
                        <select name="skinColor" id="swal-skinColor" class="form-control" wire:model="skinColor"
                            required>
                            <option value="">Seleccione</option>
                            @foreach ($skin_colors as $sk)
                            <option value="{{ $sk }}">{{ $sk }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('skinColor')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="expeYears" wire:ignore>Años de experiencia en el
                            deporte: </label>
                        <input wire:model="expeYears" type="number" class="form-control mt-1" name="expeYears"
                            id="swal-expeYears" required>
                    </div>
                    @error('expeYears')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror




                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" wire:click="exitcreateMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click=" crearAtleta">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>

@endif