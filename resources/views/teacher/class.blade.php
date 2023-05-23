@extends('layouts.teacher')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 min-h-screen pt-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <div class="mb-4">
                <a class="px-4 py-2 font-semibold text-sm bg-sky-500 text-white rounded-none shadow-sm" href="{{ route('teacher_dashboard') }}">&lt; Terug</a>
            </div>
            <div class="flex flex-wrap">
                <table class="border-collapse table-auto text-sm">
                    <thead>
                        <tr>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Student</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Laatst bewerkt</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Nagekeken</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        @foreach ($students as $student)
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <a href="{{ route('main', $student->id) }}" class="text-blue-500">{{ $student->user->name }}</a>
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ date_format($student->updated_at, 'j F Y - H:i') }}
                                </td>
                                <td>
                                    @if($student->requires_feedback == true)
                                        <form action="{{ route('teacher_feedback_student', $student->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="text-center shadow bg-green-400 hover:bg-green-300 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 mx-1 rounded"><i class="fa fa-check"></i> Bevestigen</button>
                                        </form>
                                    @else
                                    <button disabled class="text-center shadow bg-gray-200 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 mx-1 rounded"><i class="fa fa-check"></i> Nagekeken</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
