<!DOCTYPE html>
<html lang="es">

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body id="page-top">
    <div id="wrapper">

        @auth
        @include('layouts.sidebar')
        @endauth

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <v-app>
                    <v-main>
                        @auth
                        @include('layouts.navbar')
                        @endauth
                        @include('layouts.main')
                    </v-main>
                </v-app>
            </div>
            @include('layouts.footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts.scripts')
    @stack('scripts')
</body>

</html>