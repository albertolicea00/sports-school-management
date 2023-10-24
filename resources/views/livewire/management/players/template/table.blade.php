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
                    Color de Piel</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Años de experiencia en el deporte</th>
                <th class="text-secondary opacity-7"></th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ( $athletes as $athlete )

            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm">{{ $athlete->member->dni }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <p class="mb-0 text-sm">{{ $athlete->member->name }}</p>
                        </div>

                    </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="mb-0 text-sm">
                            @php
                            $fechaNacimiento = new DateTime($athlete->member->birth_date);

                            $fechaActual = new DateTime();

                            $edad = $fechaActual->diff($fechaNacimiento)->y;
                            @endphp
                            {{ $edad }} años


                        </p>
                    </div>
                </td>
                <td class="align-middle text-center text-sm">
                    <p class="mb-0 text-sm">{{ $athlete->member->gender }}</p>
                </td>
                <td class="align-middle text-center">
                    <p class="mb-0 text-sm">
                        {{ !empty($athlete->member->addresses) ? $athlete->member->addresses->first()->state->name : '' }},
                        {{ !empty($athlete->member->addresses) ? $athlete->member->addresses->first()->city->name : '' }}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p class="mb-0 text-sm">
                        {{ $athlete->skin_color }}
                    </p>
                </td>

                {{-- <td class="align-middle text-center">
                    <p class="mb-0 text-sm">
                        {{ $athlete->expeYears }}
                </p>
                </td> --}}

                {{-- <td class="align-middle text-center">
                    <p class="mb-0 text-sm">
                        {{ !empty($athlete->sports) ? $athlete->sports() : '' }}
                </p>
                </td> --}}

                <td class="align-middle">
                    @include('livewire.management.players.template.edit-player', ['player_id' => $athlete->id])

                    <button type="button" class="btn btn-danger btn-link"
                        wire:click='askDeletePlayer({{ $athlete->id }})' data-original-title="" title="">
                        <i class="material-icons">close</i>
                        <div class="ripple-container"></div>
                    </button>
                </td>
            </tr>
            @empty

            @endforelse


        </tbody>
    </table>
</div>