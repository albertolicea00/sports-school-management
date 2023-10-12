@extends('livewire\management\metrics\layout\metric-template',[
    'title' => $model->name_s,
    'sport' => $model->sport ? $model->sport->name : '' ,
    'icon' => $model->icon ,
    'is_coache_test' => $metric_coache_test != null ? true : false,
    'is_athlete_test' => $metric_athlete_test != null ? true : false,
])


@section('metric-template-actions')
    @include('livewire.management.metrics.template.metric-test-performance.list-modules')
    @include('livewire.management.metrics.template.metric-test-performance.create-module')
    @include('livewire.management.metrics.template.metric-test-performance.create-field')
    @include('livewire.management.metrics.template.metric-test-performance.edit-metric')
@endsection



@section('metric-template-content')
    <div class="m-4">
        <div class="row">
            <div class="col">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3 pt-2 d-flex justify-content-between">
                        <div>
                            <h6 class="text-uppercase text-body text-md font-weight-bolder pt-1"><i
                                    class="fas fa-ruler"></i>
                                Evaluaciones</h6>
                        </div>
                        <div class="px-2">
                            <div class="input-group input-group-outline">
                                <label class="form-label">Buscar...</label>
                                <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)"
                                    spellcheck="false" data-ms-editor="true">
                            </div>
                            {{-- <span class="badge badge-sm bg-gradient-primary pt-3 cursor-pointer">FILTROS</span> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0 p-3">
                        @if ($metrics_with_out_fields->count() == 1)
                        <sub class="mt-3"> Necesita asignar/crear nuevos test para el modulo: </sub>
                        @elseif ($metrics_with_out_fields->count() > 1)
                        <sub class="mt-3"> Necesita asignar/crear nuevos test para los modulos : </sub>
                        @endif

                        @include('livewire\management\metrics\template\metric-test-performance.fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
