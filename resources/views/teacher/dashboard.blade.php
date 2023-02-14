@extends('layouts.teacher')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 min-h-screen pt-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <h2>Klassen</h2>
            <div class="flex flex-wrap">
                <table class="border-collapse table-auto text-sm w-full">
                    <thead>
                        <tr>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Code</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Aantal studenten</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Na te kijken</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        @foreach ($classes as $class)
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <a href="{{ route('teacher_class', $class->code) }}" class="text-blue-500">{{ $class->code }}</a>
                                </td>
                                <td>
                                    {{ $class->students->count() }}
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ $class->students->where('requires_feedback', true)->count() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
