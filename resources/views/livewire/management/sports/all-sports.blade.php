<div class="">
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="title-form mx-4 mb-3 h1">Todos los deportes</h2>
                    {{-- <button type="button" id="new-sport" class="btn btn-primary mt-1" style="margin-right: 2em;">NUEVO DEPORTE</button> --}}

                </div>

                <div class="row  justify-content-center">
                    @php $i=0 @endphp
                    @foreach ($sports as $sport)
                        <div class="card col-3 m-2 p-0" style="width: 18rem;">
                            <img src="{{ $sport->imagen || $sport->imagen != '' ? $sport->imagen : 'https://picsum.photos/seed/123/500/300' }}" class="card-img-top" alt="{{ $sport->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sport->name }}</h5>
                                <p class="card-text">{{ $sport->about }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                {{-- <li class="list-group-item">0 Entrenadores</li> --}}
                                <li class="list-group-item">{{ count($sport->members) }} Atletas</li>
                                <li class="list-group-item">0 Equipos</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
