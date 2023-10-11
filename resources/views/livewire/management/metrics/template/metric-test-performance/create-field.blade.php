<div class="btn btn-primary mt-2" wire:click="$set('createFieldMode', true)">NUEVO TEST</div>

@if($createFieldMode)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo TEST</h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="row">
                        <div class="col-8">
                            <div class="input-group input-group-outline mt-3">
                                <label class="form-label fix-label-form" for="field_new_name" wire:ignore>Nombre: </label>
                                <input wire:model="field_new_name" type="text" class="form-control mt-1" name="field_new_name"
                                id="swal-field_new_name" required>
                            </div>
                            @error('field_new_name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                        </div>
                        <div class="col-4">
                            <div class="input-group input-group-outline mt-3">
                                <label class="form-label fix-label-form" for="field_new_unit" wire:ignore>Unidad: </label>
                                <input wire:model="field_new_unit" type="text" class="form-control mt-1" name="field_new_unit"
                                id="swal-field_new_unit" required>
                            </div>
                            @error('field_new_unit')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="field_new_about" wire:ignore>Info: </label>
                        <textarea wire:model="field_new_about" class="form-control mt-1" name="field_new_about" id="swal-field_new_about"
                            rows="3" required></textarea>
                    </div>
                    @error('field_new_about')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror



                    <div class="input-group input-group-outline mt-5">
                        <label class="form-label fix-label-form" for="gender" wire:ignore> Modulos: </label>
                        <div class="row px-2">
                            @foreach ($modules as $module)
                                <div class="col form-check px-0">
                                    <input class="form-check-input" type="checkbox" name="{{ $module->name }}" id="{{ $module->name }}"
                                        wire:model="field_new_modules_ids.{{ $module->id }}" value='true'>
                                    <label class="custom-control-label mt-1" for="{{ $module->name }}"
                                        style="height: fit-content;width: 4em;">
                                        {{ $module->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary"
                    wire:click="exitFieldMode('create')">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="newField">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
@endif
