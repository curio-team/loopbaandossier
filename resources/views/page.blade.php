@extends('layouts.app')

@section('content')

@if (Auth::user()->student->slug == $student->slug)
    @include('components.edit-button')
@endif
@endsection