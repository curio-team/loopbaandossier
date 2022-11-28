@extends('layouts.app')

@section('content')

<div class="w-2/3 flex flex-wrap mx-auto mt-5 text-white text-justify">
    <div class="w-full">
        <div class="text-left revert">
            {!! $pageData['contentText'] !!}
        </div>
    </div>
    <img src="{{ $pageData['contentImage'] }}" alt="" class="mt-2 w-full">
</div>

@auth
    @if (Auth::user()->student->slug == $student->slug)
        @include('components.edit-button')
    @endif
@endauth
@endsection