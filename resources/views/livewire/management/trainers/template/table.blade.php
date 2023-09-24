<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    CI
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Nombre</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Edad</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Genero</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Localidad</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Deporte
                </th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($coaches as $coach)

            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm">{{ $coach->member->dni }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <p class="mb-0 text-sm">{{ $coach->member->name }}</p>
                        </div>

                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="mb-0 text-sm">
                            @php
                            $fechaNacimiento = new DateTime($coach->member->birth_date);

                            $fechaActual = new DateTime();

                            $edad = $fechaActual->diff($fechaNacimiento)->y;
                            @endphp
                            {{ $edad }} años


                        </p>
                    </div>
                </td>
                <td class="align-middle text-center text-sm">
                    <p class="mb-0 text-sm">{{ $coach->member->gender }}</p>
                </td>
                <td class="align-middle text-center">
                    <p class="mb-0 text-sm">
                        {{ !empty($coach->member->addresses) ? $coach->member->addresses->first()->state->name : '' }},
                        {{ !empty($coach->member->addresses) ? $coach->member->addresses->first()->city->name : '' }}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p class="mb-0 text-sm">
                        {{ !empty($coach->sports) ? $coach->sports->first()->name : '' }}
                    </p>
                </td>
                <td class="align-middle">
                    <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                    </a>

                    <button type="button" class="btn btn-danger btn-link" wire:click='askDeleteCoach({{ $coach->id }})'
                        data-original-title="" title="">
                        <i class="material-icons">close</i>
                        <div class="ripple-container"></div>
                    </button>
                </td>
            </tr>


            @empty
            No hay nada
            @endforelse


        </tbody>
    </table>
</div>