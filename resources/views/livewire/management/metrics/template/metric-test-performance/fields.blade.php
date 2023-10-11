<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3" style="width: 3em;">
                Estado</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">
                Nombre</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                style="max-width: 1em;">
                Medida</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Modulo</th>
            <th class="text-secondary opacity-7" style="width: .3em;"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($metrics as $metric)
        @forelse ($metric->fields as $field)
        <tr>
            <td>
                <a href="javascript:void(0)">
                    @if ($field->enable) <span class="badge badge-sm bg-gradient-success"
                        style="font-size: .7em;">activo</span>
                    @else <span class="badge badge-sm bg-gradient-secondary" style="font-size: .7em;">inactivo</span>
                    @endif
                </a>
            </td>
            <td>
                <div class="d-flex px-2 py-1">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs mx-1" data-toggle="tooltip"
                        data-original-title="ESTADISTICA">
                        <i class="far fa-chart-bar fa-lg"></i>
                    </a>
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs mx-2" data-toggle="tooltip"
                        data-original-title="NORMA">
                        <i class="fas fa-scroll"></i>
                    </a>


                    <h6 class="mb-0 text-sm">{{ $field->name }}</h6>
                </div>
            </td>
            <td class="ps-2">
                <p class="text-center text-xs font-weight-bold mb-0">

                    {{ $field->unit }}
                </p>
            </td>
            <td class="align-middle text-center">
                @foreach ($field->metric as $metric)
                <span class="badge badge-sm bg-gradient-info" style="font-size: .75em;">
                    {{ $metric->name }}
                </span>
                @endforeach
            </td>
            <td class="align-middle text-center p-0 m-0">
                <a href="javascript:;" class="text-secondary font-weight-bold text-sm mx-1" data-toggle="tooltip"
                    data-original-title="ACTUALIZAR">
                    <i class="far fa-edit"></i>
                </a>
                <a href="javascript:;" class="text-secondary font-weight-bold text-sm mx-1" data-toggle="tooltip"
                    data-original-title="AZTUALIZAR NORMA">
                    <i class="fas fa-scroll"></i>
                </a>
                <a href="javascript:;" class="text-secondary font-weight-bold text-sm mx-1" data-toggle="tooltip"
                    data-original-title="ELIMINAR">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @empty
        <sub><span class="badge badge-sm bg-gradient-danger mx-1">{{ $metric->name }}</span></sub>
        @endforelse
        @empty
        Necesita crear un nuevo modulo
        @endforelse
    </tbody>
</table>
