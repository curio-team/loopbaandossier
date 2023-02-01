@extends('layouts.admin')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <div class="grid grid-cols-3 gap-4">
                <h1 class="text-3xl font-bold text-center col-span-3">Admin Dashboard</h1>
                <a href="{{ route('admin_manage_admins') }}" class="text-center shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-4 px-6 rounded">
                    Admins Toewijzen
                </a>
                <a href="{{ route('admin_manage_teachers') }}" class="text-center shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-4 px-6 rounded">
                    Docenten Beheren
                </a>
                <a href="{{ route('admin_manage_classes') }}" class="text-center shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-4 px-6 rounded">
                    Klassen Beheren
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
