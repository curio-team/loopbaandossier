@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="max-w-6xl container grid lg:grid-cols-6 sm:grid-cols-3 grid-cols-2 mx-auto py-6 font-sans">
            @include('components.home-card', ['student' => $student, 'route' => 'introduction', 'title' => 'Voorstellen', 'image' => $student->pages->introduction_content_image, 'subtext' => $student->pages->introduction_header_title])
            @include('components.home-card', ['student' => $student, 'route' => 'qualities', 'title' => 'Kwaliteiten', 'image' => $student->pages->qualities_content_image, 'subtext' => $student->pages->qualities_header_title])
            @include('components.home-card', ['student' => $student, 'route' => 'motives', 'title' => 'Motieven', 'image' => $student->pages->motives_content_image, 'subtext' => $student->pages->motives_header_title])
            @include('components.home-card', ['student' => $student, 'route' => 'exploration', 'title' => 'Werkexploratie', 'image' => $student->pages->exploration_content_image, 'subtext' => $student->pages->exploration_header_title])
            @include('components.home-card', ['student' => $student, 'route' => 'experience', 'title' => 'Loopbaansturing', 'image' => $student->pages->experience_content_image, 'subtext' => $student->pages->experience_header_title])
            @include('components.home-card', ['student' => $student, 'route' => 'networks', 'title' => 'Netwerken', 'image' => $student->pages->networks_content_image, 'subtext' => $student->pages->networks_header_title])
        </div>
    </div>
@endsection
