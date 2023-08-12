<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Suivi de bébé</title>

    <link rel="apple-touch-icon" sizes="60x60" href="{{ Vite::asset('resources/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ Vite::asset('resources/images/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ Vite::asset('resources/images/safari-pinned-tab.svg') }}" color="#5bbad5">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @yield('assets')

    <!-- PushAlert -->
    <script type="text/javascript">
        (function(d, t) {
            var g = d.createElement(t),
                s = d.getElementsByTagName(t)[0];
            g.src = "https://cdn.pushalert.co/integrate_533c32d219712dc07804c93abff52b3f.js";
            s.parentNode.insertBefore(g, s);
        }(document, "script"));
    </script>
    <!-- End PushAlert -->

</head>
<body>

    @include('layout/header')

    @yield('content')

    @livewireScripts

</body>
</html>
