@extends('layouts.admin')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <div class="grid grid-cols-3 gap-4">
                <a class="flex items-center" href="{{ route('admin_dashboard') }}">< Terug</a>
                <h1 class="text-3xl font-bold text-center">Docenten Beheren</h1>
                <div></div>
            </div>
            <table class="w-full whitespace-nowrap mb-3">
                <thead>
                    <tr class="text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Naam
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Email
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Bewerk / Actief
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                            <td>
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $user->name }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $user->email }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center pl-5">
                                    <a href="{{ route('admin_manage_teacher', $user->teacher->id) }}" class="text-center shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 mx-1 rounded"><i class="fa fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin_toggle_teacher_active', $user->teacher->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="mx-1"><i class="fa text-4xl {{ $user->active ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
