<button type="button" id="new-my-trainer" class="btn btn-light mt-1" style="margin-right: 2em;" wire:click="$set('create_mode', true)">NUEVO ENTRENADOR</button>

@if($create_mode)
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
                        <label class="form-label" for="name" wire:ignore>Nombre</label>
                        <input wire:model="name" type="text" class="form-control" name="name" id="swal-name" required>
                    </div>
                    @error('name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="age" wire:ignore>Edad</label>
                        <input wire:model="age" type="text" class="form-control" name="age" id="swal-name" required>
                    </div>
                    @error('age')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary"
                    wire:click="exitCreateMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="crearEntrenador">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>

@endif
