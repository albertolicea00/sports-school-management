<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
                <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white">Logo o marca de la applicacion web</span>
            </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-auto-100" id="sidenav-collapse-main"
    {{-- style="height: calc(100vh - 180px);"> --}}
        style="height: fit-content;">
        <ul class="navbar-nav">
{{----------------------------------------------------------------------------------------------------------------------------}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tablas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'machine-learning' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('machine-learning') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-robot ps-0 pe-0 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Inteligente Automatica</span>
                </a>
            </li>
{{----------------------------------------------------------------------------------------------------------------------------}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Mi Cuenta</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'my-profile' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('my-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Mi Perfil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'my-notifications' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('my-notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notificationes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'my-players' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('my-players') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-0 pe-0 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-2">Mis atletas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'my-trainers' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('my-trainers') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-0 pe-0 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-2">Mis entrenadores</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'my-tasks' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('my-tasks') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-tasks ps-1 pe-1 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mis tareas</span>
                </a>
            </li>
{{----------------------------------------------------------------------------------------------------------------------------}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Gestión</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'players-management' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('players-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-running ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Gestión de atletas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'users-management' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('users-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-users-cog ps-1 pe-1 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Gestión de usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'permisions-management' || Route::currentRouteName() == 'roles-management' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('roles-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-shield-alt ps-1 pe-1 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">G. Roles y Permisos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'accents-management' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('accents-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-school ps-1 pe-1 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">G. Métricas y Acentos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'sports-management' ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('sports-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-volleyball-ball ps-1 pe-1 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Gestión de deportes</span>
                </a>
            </li>
{{----------------------------------------------------------------------------------------------------------------------------}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Banco de datos</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'database-0709' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('database-0709') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-server ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Base Datos &nbsp; 07 - 09</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'database-1012' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('database-1012') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-server ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Base Datos &nbsp; 10 - 12</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'database-1315' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('database-1315') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-server ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Base Datos &nbsp; 13 - 15</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'database-1518' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('database-1518') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-server ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Base Datos &nbsp; 15 - 18</span>
                </a>
            </li>
{{----------------------------------------------------------------------------------------------------------------------------}}
            <li class="nav-item mt-3">
                {{-- <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Extras</h6> --}}
                <hr class="horizontal light mt-0 mb-2">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'virtual-reality' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('virtual-reality') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Vista inmersiva</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'more-tools' ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('more-tools') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-tools ps-0 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Mas Herramientas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white 
                {{ substr(Route::currentRouteName(), -4)  == 'help' || substr(Route::currentRouteName(), 4)  == 'help' 
                    ? ' active bg-gradient-primary' : '' }}  "
                    href="{{ route('help') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-book-reader ps-0 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-0">Ayuda y Soporte</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        <livewire:auth.logout/>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        {{-- <div class="mx-3">
            <a class="btn bg-gradient-secondary w-100 disabled" href="javascript:void(0)" target="_blank">App Movil</a>
        </div> --}}
        {{-- <div class="m-3">
            <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="albertolicea00" data-color="#FFDD00" data-emoji=""  data-font="Cookie" data-text="Comprame un café" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff" ></script>
        </div> --}}
    </div>
</aside>
