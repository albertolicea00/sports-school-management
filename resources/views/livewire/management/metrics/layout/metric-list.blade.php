@forelse ($metric_categories as $category)
<h6 class="text-uppercase text-body text-xs font-weight-bolder mt-3"><i
        class="{{ $category->icon }}"></i> {{ $category->name }}</h6>

@forelse ($category->metric_models as $metric)
<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
    <div class="d-flex align-items-center">
        <a href="metric/{{ $category->route . $metric->route }}"
            class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"
            style="border-color: {{ $metric->color }};color:{{ $metric->color }}">
            <i class="{{ $metric->icon }}" style="transform: scale(1.9);"></i>
        </a>

        <div class="d-flex flex-column">
            <h6 class="mb-1 text-dark text-sm">{{ $metric->name_p }}</h6>
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
    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">

    </div>
</li>
@empty
No hay nada
@endforelse

</ul>
@empty
No hay nada
@endforelse
