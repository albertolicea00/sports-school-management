<span wire:click="editMode({{ $sport_id }})" id="edit-sport-{{ $sport_id }}">
    <i title="EDITAR" class="fas fa-edit" style="font-size: .7em;"></i>
</span>

@if($editMode && $sport_id == $id_to_edit)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editando el deporte <span wire:ignore>{{ $edit_name }}</span></h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label fix-label-form" for="edit_name" wire:ignore>Nombre: </label>
                        <input wire:model="edit_name" type="text" class="form-control mt-1" name="edit_name"
                            id="swal-edit_name" required>
                    </div>
                    @error('edit_name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                    {{-- <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="edit_img" wire:ignore>Imagen: </label>
                        <input wire:model="edit_img" type="text" class="form-control mt-1" name="edit_img"
                            id="swal-edit_img" required>
                    </div>
                    @error('edit_img')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror --}}


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="edit_about" wire:ignore>Info: </label>
                        <textarea wire:model="edit_about" class="form-control mt-1" name="edit_about" id="swal-edit_about" rows="4"
                            required></textarea>
                    </div>
                    @error('edit_about')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" wire:click="exitEditMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="updateSport">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
@endif
