@extends('layouts.admin')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <div class="grid grid-cols-3 gap-4">
                <a class="flex items-center" href="{{ route('admin_manage_teachers') }}">< Terug</a>
                <h1 class="text-3xl font-bold text-center">Docent Beheren - {{ $teacher->user->name }}</h1>
                <div></div>
            </div>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6 flex flex-col">
                    <label for="name">Naam</label>
                    <input type="text" value="{{ $teacher->user->name }}" disabled class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                </div>
                <div class="col-span-6 flex flex-col">
                    <label for="email">Email</label>
                    <input type="email" value="{{ $teacher->user->email }}" disabled class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                </div>
                <div class="col-span-6 flex flex-col">
                    <label for="class">Klassen</label>
                    <div class="grid sm:grid-cols-3 grid-cols-1 gap-4">
                        @foreach ($classes as $class)
                            <div class="flex items-center">
                                <label for="class">{{ $class->code }}</label>
                                <form action="{{ route('admin_toggle_teacher_class', [$teacher->id, $class->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="mx-1 disabled:text-gray-400"><i class="fa text-4xl {{ $teacher->classes->contains($class) ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i></button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
