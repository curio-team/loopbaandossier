@extends('layouts.app')

@section('content')

<div class="w-2/3 flex flex-wrap mx-auto mt-5 text-white text-justify">
    <div class="w-full">
        <div class="text-left revert">
            {!! $pageData['contentText'] !!}
        </div>
    </div>
    <div class="mt-2 w-full">
        @include('components.modals.image', ['modalId' => 'imageModal', 'imageSrc' => $pageData['contentImage']])
    </div>
</div>

@auth
    @if (Auth::user()->student->slug == $student->slug)
        @include('components.edit-button')
    @endif
@endauth
@endsection