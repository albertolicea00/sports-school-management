<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Panel de control</h5>
                <p>Opciones de personalización.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
                <!-- End Toggle Button -->
                <div class="text-start pb-3">
                    <a href="https://www.buymeacoffee.com/albertolicea00" target="_blank"><img src="https://img.buymeacoffee.com/button-api/?text=Invitame un café&emoji=&slug=albertolicea00&button_colour=FFDD00&font_colour=000000&font_family=Comic&outline_colour=000000&coffee_colour=ffffff" /></a>
                </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Colores de la barra lateral.</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Tipo de barra lateral.</h6>
                <p class="text-sm">Elija entre 2 tipos diferentes de barra lateral.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                    onclick="sidebarType(this)">Negro</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                    onclick="sidebarType(this)">Cristalino</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">Blanco</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">Puedes cambiar el tipo de barra lateral solo en la vista de escritorio.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navegacion fijada</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Modo: Claro / Oscuro</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn btn-outline-dark w-100" href="../../documentation/getting-started/installation.html">View documentation</a>
            <a class="btn btn-outline-dark w-100" href="https://github.com/albertolicea00/sports-school-management">View source code</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/albertolicea00/sports-school-management"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star albertolicea00/sports-school-management on GitHub">Star</a>
                <h6 class="mt-3">Gracias por compartir!</h6>
                <a href="https://twitter.com/intent/tweet?text=Echa%20un%20vistazo%20al%20proyecto%20desarrollado%20por%20%40albertolicea00%2C%20Rafael%20Cardenas%20y%20Carlos%20Alberto.%20BCImpulsado%20por%20CreativeTim%20y%20%40UPDIVISION%21%20%23webdesign%20%23dashboard%20%23bootstrap5%20%23laravel%20%23livewire&amp;url=https%3A%2F%2Fgithub.com%2Falbertolicea00%2Fsports-school-management"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://github.com/albertolicea00/sports-school-management"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
