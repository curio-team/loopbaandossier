@extends('layouts.admin')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <div class="grid grid-cols-3 gap-4">
                <a class="flex items-center" href="{{ route('admin_dashboard') }}">< Terug</a>
                <h1 class="text-3xl font-bold text-center">Klassen Beheren</h1>
                <div></div>
                {{-- Content --}}
                @foreach($classes as $class)
                <a href="{{ route('admin_manage_students', $class->code) }}" class="text-center shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-4 px-6 rounded">
                    {{ $class->code }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
