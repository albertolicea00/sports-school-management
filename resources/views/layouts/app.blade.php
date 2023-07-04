<x-layouts.base>
    @if (in_array(request()->route()->getName(),['static-sign-in', 'static-sign-up', 'register', 'login','password.forgot','reset-password']))
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <x-navbars.navs.guest></x-navbars.navs.guest>
                </div>
            </div>
        </div>
        @if (in_array(request()->route()->getName(),['static-sign-in', 'login','password.forgot','reset-password']))
        <main class="main-content  mt-0">
            <div class="page-header page-header-bg align-items-start min-vh-100">
                    <span class="mask bg-gradient-dark opacity-6"></span>
            {{ $slot }}
            <x-footers.guest></x-footers.guest>
             </div>
        </main>
        @else
        {{ $slot }}
        @endif

    @elseif (in_array(request()->route()->getName(),['rtl']))
    {{ $slot }}
    @elseif (in_array(request()->route()->getName(),['virtual-reality']))
    <div class="virtual-reality">
        <style wire:ignore>
            body{
                background-image: url('{{ asset('assets') }}/img/vr-bg.jpg'); background-size: cover;
                /* overflow : hidden; */
            }
        </style>
        {{-- <x-navbars.navs.auth></x-navbars.navs.auth> --}}

        <div class="border-radius-xl mx-0 mx-md-0 position-relative">
        {{-- style="background-image: url('{{ asset('assets') }}/img/vr-bg.jpg'); background-size: cover;"> --}}
            <main class="main-content border-radius-lg h-100 z-index-2">
                {{  $slot }}
            </main>
        </div>
        {{-- <div class="position-fixed bottom-0 w-100 z-index-0" style="width: -webkit-fill-available;"> --}}
            <x-footers.auth></x-footers.auth>
        {{-- </div> --}}
        {{-- <x-plugins></x-plugins> --}}
    </div>
    @else
    <x-navbars.sidebar></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth></x-navbars.navs.auth>

        {{ $slot }}

        <x-footers.auth></x-footers.auth>
    </main>
    {{-- <x-plugins></x-plugins> --}}
    @endif
</x-layouts.base>
