<header class="header-manage">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <a href="{{ route('home') }}" class="font-semibold leading-tight">
                <div class="flex items-center">
                    <div class="w-20">
                        <img src="{{asset('assets/images/curio-02-wit-logo-rgb.png')}}" alt="Curio Logo">
                    </div>
                    <p class="text-white mx-3">{{__('Loopbaandossier Student')}}</p>
                </div>
            </a>
            <div class="flex items-center nav-links md:text-base sm:text-sm font-bold">
                <a class="text-white hover:text-gray-200" href="{{ route('main', $student->id) }}">Homepagina</a>
                <a class="text-white hover:text-gray-200" href="{{ route('introduction', $student->id) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="text-white hover:text-gray-200" href="{{ route('qualities', $student->id) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="text-white hover:text-gray-200" href="{{ route('motives', $student->id) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="text-white hover:text-gray-200" href="{{ route('exploration', $student->id) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="text-white hover:text-gray-200" href="{{ route('experience', $student->id) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="text-white hover:text-gray-200" href="{{ route('networks', $student->id) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                </form>
                {{-- <a href="#"><i class="fa-solid fa-search"></i></a> --}}
            </div>
        </div>
        <div class="flex items-center justify-center h-24">
            <p class="text-5xl font-semibold header-title-manage">{{ $title }}</p>
        </div>
    </div>
</header>
