<div class="row">
    @forelse ($category->metric_models as $metric)
    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4 col-xl-3">
        <div class="d-flex align-items-center py-4 px-3" style="background-color: ghostwhite;border-radius: 20px;">
            <a href="metric/{{ $category->route . $metric->route }}"
                class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"
                style="border-color: {{ $metric->color }};color:{{ $metric->color }}">
                <i class="{{ $metric->icon }}" style="transform: scale(1.9);"></i>
            </a>

            <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-md">{{ $metric->name_p }}</h6>
                <span class="text-xs">
                    {{ $metric->sport ? $metric->sport->name : ''}}
                    @if (count($metric->school_grade) != 0 && $metric->sport)
                    &nbsp; || &nbsp;
                    @endif
                    {{ count($metric->school_grade) != 0 ? implode(', ',
                    $metric->school_grade->pluck('name')->toArray()) . ' años' : '' }}
                </span>
            </div>
        </div>
        {{-- <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">

        </div> --}}
    </div>
    @empty
    No hay nada
    @endforelse
</div>

