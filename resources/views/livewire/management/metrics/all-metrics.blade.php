<div>
    <div class="d-flex justify-content-between mx-5 my-3">
        <h6 class="h2">Todas las Metricas</h6>
        {{-- ACCIONES --}}
        <div>
            <div class="btn btn-outline-primary mt-2">FILTRAR</div>
            {{-- <div class="btn btn-outline-primary mt-2">BUSCAR</div>
            <div class="btn btn-primary mt-2">NUEVO TEST</div>
            <div class="btn btn-primary mt-2">NUEVO EVALUACIÓN</div> --}}
        </div>
    </div>


    @forelse ($metric_categories as $category)
    <div class="m-4">
        <div class="row">
            <div class="col">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3 pt-2">
                        <h6 class="text-uppercase text-body text-md font-weight-bolder "><i
                                class="{{ $category->icon }}"></i> {{ $category->name }}</h6>
                    </div>
                    <div class="card-body pt-2 p-3">
                        @include('livewire.management.metrics.layout.metric-list', ['category' => $category])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    No hay nada
    @endforelse

</div>