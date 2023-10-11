<div class="btn btn-primary mt-2" wire:click="$set('createModuleMode', true)">NUEVO MODULO</div>

@if($createModuleMode)
<div class="modal fade show d-block" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo MODULO</h5>
            </div>
            <div class="modal-body">
                <div class="px-2">

                    <div class="input-group input-group-outline mt-3">
                        <label class="form-label fix-label-form" for="swal-module_new_name" wire:ignore>Nombre: </label>
                        <input wire:model="module_new_name" type="text" class="form-control mt-1" name="module_new_name"
                            id="swal-module_new_name" required>
                    </div>
                    @error('module_new_name')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror


                    <div class="input-group input-group-outline mt-4">
                        <label class="form-label fix-label-form" for="swal-module_new_sport_id" wire:ignore>Deporte: </label>
                        <input type="text" class="form-control mt-1" name="module_new_sport_id" value="{{ $sport->name }}" disabled
                            id="swal-module_new_sport_id">
                    </div>
                    @error('module_new_sport_id')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror




                    <div class="input-group input-group-outline mt-5">
                        <label class="form-label fix-label-form" for="gender" wire:ignore>Grados escolares: </label>
                        <div class="row px-2">
                            @php $min_range = $school_grades->first()->min_range; @endphp
                            @foreach ($school_grades as $school_grade)
                            @if ($min_range != $school_grade->min_range)
                                @php $min_range = $school_grade->min_range; @endphp
                                <div class="clearfix"></div>
                            @endif
                                    <div class="col form-check px-0">
                                        <input class="form-check-input" type="checkbox" name="{{ $school_grade->name }}" id="{{ $school_grade->name }}"
                                            wire:model="module_new_school_grades_ids.{{ $school_grade->id }}" value='true'>
                                        <label class="custom-control-label mt-1" for="{{ $school_grade->name }}"
                                            style="height: fit-content;width: 4em;">
                                            {{ $school_grade->age }}</label>
                                    </div>
                            @endforeach
                            @error('module_new_school_grades_ids')<p class="text-danger inputerror text-start">{{ $message }}</p>@enderror

                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary"
                    wire:click="exitModuleMode('create')">cancelar</button>
                <button type="button" class="btn bg-gradient-primary" wire:click="newModule">Guardar
                    cambios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
@endif
