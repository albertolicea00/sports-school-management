<div class="d-flex justify-content-between mx-5 my-3">
    <div class="d-flex flex-column justify-content-center">
        <h6 class="h2 mb-0">
            <i class="{{ $icon }}" style="transform: scale(.8);"></i>
            {{ $title }}
        </h6>
        <small class="h5 px-1" style="font-weight: initial;">
            {{ $sport }}
        </small>
    </div>

    {{-- ACCIONES --}}
    <div>
        @yield('metric-template-actions')
        {{-- <div class="btn btn-outline-primary mt-2">NORMA</div> --}}
        {{-- <div class="btn btn-outline-primary mt-2">BUSCAR</div> --}}
        {{-- <div class="btn btn-outline-primary mt-2">NORMA</div> --}}
        @if ($is_coache_test) <div class="btn btn-primary mt-2">EVALUAR ATLETA</div> @endif
        @if ($is_athlete_test) <div class="btn btn-primary mt-2">EVALUAR ENTRENADOR</div> @endif
    </div>
</div>

@yield('metric-template-info')
@yield('metric-template-content')
@yield('metric-template-specific-section')

{{-- ESTADISTICAS --}} {{-- CONVERTIRLO EN UN COMPONENTE LIVEWIRE APARTE --}}
<div class="m-4">
    <div class="row">
        <div class="col">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3 pt-2">
                    <h6 class="text-uppercase text-body text-md font-weight-bolder"><i class="far fa-chart-bar"></i>
                        Estadisticas</h6>
                </div>
                <div class="card-body pt-2 p-3">
                    {{-- @include('livewire\management\metrics\layout\metric-list') --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- HISTORICO --}} {{-- CONVERTIRLO EN UN COMPONENTE LIVEWIRE APARTE --}}
<div class="m-4">
    <div class="row">
        <div class="col">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3 pt-2">
                    <h6 class="text-uppercase text-body text-md font-weight-bolder"><i class="fas fa-calendar-alt"></i>
                        Historico</h6>
                </div>
                <div class="card-body pt-2 p-3">
                    {{-- @include('livewire\management\metrics\layout\metric-list') --}}
                </div>
            </div>
        </div>
    </div>
</div>
