@extends('layouts.app')

@section('content')

<div class="w-2/3 flex flex-wrap mx-auto mt-5 text-white text-justify">
    <div class="mb-2 w-full">
        @include('components.modals.image', ['modalId' => 'imageModal', 'imageSrc' => $pageData['contentImage']])
    </div>
    <div class="w-full">
        <div class="text-left revert">
            {!! $pageData['contentText'] !!}
        </div>
    </div>
</div>

@auth
    @if (Auth::user()->student)
        @if (Auth::user()->student->slug == $student->slug)
            @include('components.edit-button')
        @endif
    @endif

    @if (Auth::user()->teacher)
        @include('components.teacher-feedback-button')
        @include('components.teacher-feedback-form')
    @endif
@endauth
@endsection
