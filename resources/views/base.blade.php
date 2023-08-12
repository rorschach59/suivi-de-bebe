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

</head>
<body>

    @include('layout/header')

    @yield('content')

    @livewireScripts

</body>
</html>
