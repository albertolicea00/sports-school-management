<button type="button" id="new-sport" class="btn btn-primary mt-1" style="margin-right: 2em;"
    wire:click="$set('createMode', true)">NUEVO DEPORTE</button>

@if($createMode)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo DEPORTE</h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label fix-label-form" for="new_name" wire:ignore>Nombre: </label>
                        <input wire:model="new_name" type="text" class="form-control mt-1" name="new_name"
                            id="swal-new_name" required>
                    </div>
                    @error('new_name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    {{-- <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="new_img" wire:ignore>Imagen: </label>
                        <input wire:model="new_img" type="text" class="form-control mt-1" name="new_img"
                            id="swal-new_img" required>
                    </div>
                    @error('new_img')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror --}}

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="new_about" wire:ignore>Info: </label>
                        <textarea wire:model="new_about" class="form-control mt-1" name="new_about" id="swal-new_about" rows="3"
                            required></textarea>
                    </div>
                    @error('new_about')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" wire:click="exitCreateMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="newSport">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
@endif
