<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vinny's Place</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script> --}}
    </head>
    <body>
        <div id="app">
            {{-- <navbar></navbar> --}}
            <div class="main-wrapper">
                <router-view></router-view>
            </div>
        </div>
    </body>
</html>
