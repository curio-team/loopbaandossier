<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        @include('layouts.fonts')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-purple-500">
        @auth
            @if (Auth::user()->is_admin)
                @include('components.admin-header')
            @endif

            @if (Auth::user()->teacher)
                @include('components.teacher-header')
            @endif
        @endauth

        @include('components.home-header')

        <main>
            @yield('content')
        </main>
    </body>
</html>
