@extends('layouts.admin')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <div class="grid grid-cols-3 gap-4">
                <a class="flex items-center" href="{{ route('admin_manage_students', $student->class->code) }}">< Terug</a>
                <h1 class="text-3xl font-bold text-center">Student Beheren - {{ $student->user->name }}</h1>
                <div></div>
            </div>
            <form action="{{ route('admin_process_manage_student', $student->id) }}" method="post">
                @csrf
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6 flex flex-col">
                        <label for="name">Naam</label>
                        <input type="text" value="{{ $student->user->name }}" disabled class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                    </div>
                    <div class="col-span-6 flex flex-col">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $student->user->email }}" disabled class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                    </div>
                    <div class="col-span-6 flex flex-col">
                        <label for="class">Klas</label>
                        <select name="schoolClass" id="class">
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ $class->id == $student->class_id ? 'selected' : '' }}>{{ $class->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-start-1 col-span-1 flex flex-col">
                        <input type="submit" value="Opslaan" class="text-center shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-3 rounded">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
