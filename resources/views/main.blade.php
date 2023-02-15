@extends('layouts.app')

@section('content')
    <div class="content-home font-sans">
        <div class="container flex justify-center mx-auto py-6">
            @include('components.home-card', ['student' => $student, 'route' => 'introduction', 'title' => 'Voorstellen', 'image' => $student->pages->introduction_content_image])
            @include('components.home-card', ['student' => $student, 'route' => 'qualities', 'title' => 'Kwaliteiten', 'image' => $student->pages->qualities_content_image])
            @include('components.home-card', ['student' => $student, 'route' => 'motives', 'title' => 'Motieven', 'image' => $student->pages->motives_content_image])
            @include('components.home-card', ['student' => $student, 'route' => 'exploration', 'title' => 'Werkexploratie', 'image' => $student->pages->exploration_content_image])
            @include('components.home-card', ['student' => $student, 'route' => 'experience', 'title' => 'Loopbaansturing', 'image' => $student->pages->experience_content_image])
            @include('components.home-card', ['student' => $student, 'route' => 'networks', 'title' => 'Netwerken', 'image' => $student->pages->networks_content_image])
        </div>
    </div>
@endsection
