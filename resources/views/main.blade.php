@extends('layouts.app')

@section('content')
    <div class="content-home font-sans">
        <div class="container flex justify-center mx-auto py-6">
            @include('components.home-card', ['student' => $student, 'route' => 'introduction', 'title' => 'Voorstellen', 'image' => 'placeholder.png'])
            @include('components.home-card', ['student' => $student, 'route' => 'qualities', 'title' => 'Kwaliteiten', 'image' => 'placeholder.png'])
            @include('components.home-card', ['student' => $student, 'route' => 'motives', 'title' => 'Motieven', 'image' => 'placeholder.png'])
            @include('components.home-card', ['student' => $student, 'route' => 'exploration', 'title' => 'Werkexploratie', 'image' => 'placeholder.png'])
            @include('components.home-card', ['student' => $student, 'route' => 'experience', 'title' => 'Loopbaansturing', 'image' => 'placeholder.png'])
            @include('components.home-card', ['student' => $student, 'route' => 'networks', 'title' => 'Netwerken', 'image' => 'placeholder.png'])
        </div>
    </div>
@endsection