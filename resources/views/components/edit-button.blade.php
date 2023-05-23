<div class="fixed bottom-0 right-0 flex flex-col items-center">
    @if($student->feedback->where('page', Route::currentRouteName())->where('confirmed', false)->count())
        <span class="absolute w-48 px-2 py-1 bg-red-500 rounded-lg text-center text-white text-sm after:content-[''] after:absolute after:left-1/2 after:top-[100%] after:-translate-x-1/2 after:border-8 after:border-x-transparent after:border-b-transparent after:border-t-red-500">Je hebt {{ $student->feedback->where('page', Route::currentRouteName())->where('confirmed', false)->count() }} onverwerkte feedback op deze pagina.</span>
    @endif
    <a href="{{route('manage_'.Route::currentRouteName(), $student->id) }}" class="mb-8 my-14 mx-4 float-right px-5 py-2 bg-blue-500 hover:bg-blue-300 text-white font-bold tracking-wide rounded-full focus:outline-none text-lg">
        <i class="fa fa-pen-to-square"></i>
        Pagina aanpassen
    </a>
</div>
