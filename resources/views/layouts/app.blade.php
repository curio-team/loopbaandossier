<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicons -->
        @include('layouts.favicons')

        <!-- Fonts -->
        @include('layouts.fonts')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="color-background-{{ $pageColor }}">
        @auth
            @if (Auth::user()->is_admin)
                @include('components.admin-header')
            @endif
        @endauth

        @include('components.page-header')

        <main>
            @yield('content')
        </main>
    </body>
</html>
