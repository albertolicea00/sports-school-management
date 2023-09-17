<button type="button" id="new-my-player" class="btn btn-light mt-1" style="margin-right: 2em;"
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
                        <label class="form-label fix-label-form" for="name" wire:ignore>Nombre</label>
                        <input wire:model="name" type="text" class="form-control mt-1" name="name" id="swal-name"
                            required>
                    </div>
                    @error('name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="name" wire:ignore>Apellidos</label>
                        <input wire:model="lastName" type="text" class="form-control mt-1" name="lastName"
                            id="swal-lastName" required>
                    </div>
                    @error('lastName')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="edad" wire:ignore>Edad</label>
                        <input wire:model="age" type="number" class="form-control mt-1" name="edad" id="swal-name"
                            required>
                    </div>
                    @error('age')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="dni" wire:ignore>Dni</label>
                        <input wire:model="dni" type="text" class="form-control mt-1" name="dni" id="swal-dni" required>
                    </div>
                    @error('dni')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror



                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="gender" wire:ignore>Sexo :</label>
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
                        <label class="form-label fix-label-form" for="birth" wire:ignore>Fecha de cumpleaños</label>
                        <input wire:model="birth" type="date" class="form-control mt-1" name="birth" id="swal-birth"
                            required>
                    </div>
                    @error('birth')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <input wire:model="location" type="text" class="form-control mt-1" name="location"
                            id="swal-location" required>
                        <label class="form-label fix-label-form" for="location" wire:ignore>Dirección</label>
                    </div>
                    @error('location')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <input wire:model="skinColor" type="text" class="form-control mt-1" name="skinColor"
                            id="swal-skinColor" required>
                        <label class="form-label fix-label-form" for="skinColor" wire:ignore>Color de piel</label>
                    </div>
                    @error('skinColor')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="expeYears" wire:ignore>Experiencia</label>
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
