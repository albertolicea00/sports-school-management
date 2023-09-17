<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang='en' dir="{{ Route::currentRouteName() == 'rtl' ? 'rtl' : '' }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
        <title>
            Gestión docente al deporte cubano
        </title>

        <!-- Metas -->
        <meta name="keywords" content="deportes cubanos, análisis deportivo, docencia deportiva, gestión deportiva, Cuba, entrenamiento deportivo, educación física" />
        <meta name="description" content="Página web dedicada a la gestión y análisis de la docencia de los deportes cubanos. Encuentra recursos educativos y herramientas de análisis relacionadas con el deporte en Cuba." />
        <meta itemprop="name" content="Gestión y Análisis de la Docencia de Deportes Cubanos" />
        <meta itemprop="description" content="Recursos educativos, herramientas de análisis relacionadas con el deporte en Cuba." />
        {{-- <meta itemprop="image" content="URL_DE_LA_IMAGEN_REPRESENTATIVA_DE_LA_PAGINA" /> --}}
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@TuUsuarioDeTwitter" />
        <meta name="twitter:title" content="Gestión y Análisis de la Docencia de Deportes Cubanos" />
        <meta name="twitter:description" content="Recursos educativos, herramientas de análisis relacionadas con el deporte en Cuba." />
        <meta name="twitter:image" content="URL_DE_LA_IMAGEN_REPRESENTATIVA_DE_LA_PAGINA" />
        <meta property="og:title" content="Gestión y Análisis de la Docencia de Deportes Cubanos" />
        <meta property="og:type" content="website" />
        {{-- <meta property="og:url" content="URL_DE_LA_PAGINA_WEB" /> --}}
        {{-- <meta property="og:image" content="URL_DE_LA_IMAGEN_REPRESENTATIVA_DE_LA_PAGINA" /> --}}
        <meta property="og:description" content="Recursos educativos, herramientas de análisis relacionadas con el deporte en Cuba." />
        <meta property="og:site_name" content="Gestión docente al deporte cubano" />



        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&display=swap" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- Tailwindcss -->
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        {{-- Plugins --}}
        <link rel="stylesheet" href="../assets/js/plugins/shepherd/shepherd.css"/>
        <script src="../assets/js/plugins/shepherd/shepherd.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        {{-- <link href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.5.0/css/flag-icon.min.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="../assets/js/plugins/intl-tel-input/css/intlTelInput.css">
        @livewireStyles
    </head>
    <body class="g-sidenav-show {{ Route::currentRouteName() == 'rtl' ? 'rtl' : '' }} {{ Route::currentRouteName() == 'register' || Route::currentRouteName() == 'static-sign-up'  ? '' : 'bg-gray-200' }}">


        {{ $slot }}


        <!--   Plugins JS  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        {{-- <script src="{{ asset('assets') }}/js/plugins/sweetalert.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!--   Core JS Files   -->
        <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
        @stack('js')
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }

            </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.0"></script>
        @livewireScripts
        <script type="module"  src="{{ asset('assets') }}/js/custom/app.js"></script>
    </body>
</html>
