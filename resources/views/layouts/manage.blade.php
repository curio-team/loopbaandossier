<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CKEditor -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css">

    <!-- Favicons -->
    @include('layouts.favicons')

    <!-- Fonts -->
    @include('layouts.fonts')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="content-manage">
    @auth
        @if (Auth::user()->is_admin)
            @include('components.admin-header')
        @endif
    @endauth

    @include('components.manage-header')

    @if ($errors->any())
        <div class="mt-4 w-3/4 mx-auto flex justify-center">
            @foreach ($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2 w-full" role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">{{ $error }}</span>
            </div>
            @endforeach
        </div>
    @endif

    <main>
        @yield('content')
    </main>

</body>
</html>
