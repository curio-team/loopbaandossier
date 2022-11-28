@extends('layouts.app')

@section('content')

@auth
    @if (Auth::user()->student->slug == $student->slug)
        @include('components.edit-button')
    @endif
@endauth

@endsection