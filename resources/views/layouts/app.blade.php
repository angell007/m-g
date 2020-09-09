<!DOCTYPE html>
<html lang="en">

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body id="page-top">
    <div id="wrapper">

        @auth
        @include('layouts.sidebar')
        @endauth

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @auth
                @include('layouts.navbar')
                @endauth
                <div id="app">
                    @include('layouts.main')
                </div>
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