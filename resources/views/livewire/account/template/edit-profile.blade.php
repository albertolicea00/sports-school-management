<!-- Button trigger modal -->
<a href="javascript:;" wire:click="$set('edit_mode', true)">
    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top"
        title="Editar Perfil"></i>
</a>

<!-- Modal -->
@if ($edit_mode)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar el Perfil</h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="name" wire:ignore>Nombre</label>
                        <input wire:model="name" type="text" class="form-control" name="name" id="swal-name" required>
                    </div>
                    @error('name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="phone" wire:ignore>Teléfono</label>
                        <input wire:model="phone" type="tel" class="form-control" name="phone" id="swal-phone" required>
                    </div>
                    @error('phone')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="email" wire:ignore>Email</label>
                        <input wire:model="email" type="email" class="form-control" name="email" id="swal-email"required>
                    </div>
                    @error('email')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label" for="location" wire:ignore>Ubicación</label>
                        <input wire:model="location" type="text" class="form-control" name="location" id="swal-location"required>
                    </div>
                    @error('location')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary"
                    wire:click="exitEditMode">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="updateProfile">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
@endif
