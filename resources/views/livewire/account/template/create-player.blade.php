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
                        <label class="form-label" for="name" wire:ignore>Nombre</label>
                        <input wire:model="name" type="text" class="form-control" name="name" id="swal-name" required>
                    </div>
                    @error('name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="name" wire:ignore>Apellidos</label>
                        <input wire:model="lastName" type="text" class="form-control" name="lastName" id="swal-lastName"
                            required>
                    </div>
                    @error('lastName')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="edad" wire:ignore>Edad</label>
                        <input wire:model="age" type="text" class="form-control" name="edad" id="swal-name" required>
                    </div>
                    @error('age')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="dni" wire:ignore>Dni</label>
                        <input wire:model="dni" type="text" class="form-control" name="dni" id="swal-dni" required>
                    </div>

                    @error('gender')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="gender" wire:ignore>Género</label>
                        <input wire:model="gender" type="text" class="form-control" name="gender" id="swal-gender"
                            required>
                    </div>

                    @error('birth')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="birth" wire:ignore>Fecha de cumpleaños</label>
                        <input wire:model="birth" type="date" class="form-control" name="birth" id="swal-birth"
                            required>
                    </div>
                    @error('birth')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="location" wire:ignore>Dirección</label>
                        <input wire:model="location" type="text" class="form-control" name="location" id="swal-location"
                            required>
                    </div>
                    @error('location')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="skinColor" wire:ignore>Color de piel</label>
                        <input wire:model="skinColor" type="text" class="form-control" name="skinColor"
                            id="swal-skinColor" required>
                    </div>
                    @error('skinColor')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="expeYears" wire:ignore>Experiencia</label>
                        <input wire:model="expeYears" type="text" class="form-control" name="expeYears"
                            id="swal-expeYears" required>
                    </div>
                    @error('expeYears')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror




                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" wire:click="exitcreateMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="crearAtleta">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>

@endif