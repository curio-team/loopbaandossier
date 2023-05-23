<header class="color-background-{{ $headerColor }}">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
                <a href="{{ route('home') }}" class="font-semibold leading-tight">
                    <div class="flex items-center">
                        <div class="w-20">
                            <image src="{{asset('assets/images/curio-02-wit-logo-rgb.png')}}" alt="Curio Logo">
                        </div>
                        <p class="text-white mx-3">{{__('Loopbaandossier Student')}}</p>
                    </div>
                </a>
            <div class="flex items-center nav-links md:text-base sm:text-sm font-bold">
                <a class="text-white hover:text-gray-200" href="{{ route('main', $student->id) }}" class="{{ (request()->is('main')) ? 'nav-active' : '' }}">Homepagina</a>
                @auth
                    @if(Auth::user()->student)
                        @if($student->id == Auth::user()->student->id)
                            {{-- Owner --}}
                            <a class="text-white hover:text-gray-200" href="{{ route('introduction', $student->id) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('qualities', $student->id) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('motives', $student->id) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('exploration', $student->id) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('experience', $student->id) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('networks', $student->id) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                            <div class="group">
                                <button class="text-white hover:text-gray-200 hover:nav-dropdown:block">Menu <i class="fa fa-chevron-down"></i></button>
                                <div class="hidden group-hover:block relative w-0 h-0" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="nav-dropdown-links absolute origin-top-right w-28 z-10 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none group-hover:block" role="none">
                                        <a class="text-black" href="{{ route('export', $student->id) }}">PDF Export</a>
                                        <button id="confirm-online-modal-button" type="button">
                                            <span class="hover:text-gray-400">Online</span>
                                            @if(Auth::user()->student->online)
                                                <i class="fa fa-toggle-on text-xl text-green-600 inline-block align-[-3px]"></i>
                                            @else
                                                <i class="fa fa-toggle-off text-xl text-red-600 inline-block align-[-3px]"></i>
                                            @endif
                                        </button>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="text-black pb-2" type="submit">Uitloggen</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @include('components.modals.toggle-online')

                        @else
                            {{-- Other Student --}}
                            <a class="text-white hover:text-gray-200" href="{{ route('introduction', $student->id) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('qualities', $student->id) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('motives', $student->id) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('exploration', $student->id) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('experience', $student->id) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing</a>
                            <a class="text-white hover:text-gray-200" href="{{ route('networks', $student->id) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                            </form>
                        @endif
                    @if(Auth::user()->teacher || Auth::user()->is_admin)
                        {{-- Teacher or Admin --}}
                        <a class="text-white hover:text-gray-200" href="{{ route('introduction', $student->id) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('qualities', $student->id) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('motives', $student->id) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('exploration', $student->id) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('experience', $student->id) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('networks', $student->id) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('export', $student->id) }}">PDF</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                        </form>
                    @endif
                    @else
                        {{-- Visitor --}}
                        <a class="text-white hover:text-gray-200" href="{{ route('introduction', $student->id) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('qualities', $student->id) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('motives', $student->id) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('exploration', $student->id) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('experience', $student->id) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing</a>
                        <a class="text-white hover:text-gray-200" href="{{ route('networks', $student->id) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                        </form>
                    @endif
                @endauth

                @guest
                    <a class="text-white hover:text-gray-200" href="{{ route('introduction', $student->id) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('qualities', $student->id) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('motives', $student->id) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('exploration', $student->id) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('experience', $student->id) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('networks', $student->id) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('login') }}">Login</a>
                @endguest
                {{-- <a href="#"><i class="fa-solid fa-search"></i></a> --}}
            </div>
        </div>
        <div class="flex flex-col items-center justify-center h-80">
            <div>
                <p class="text-7xl font-semibold color-text-{{ $pageColor }}">{{ $student->user->name }}</p>
            </div>
            <div>
                <p class="text-3xl mt-2 font-semibold color-text-{{ $pageColor }}">
                    @isset($pageData)
                        {{ $pageData['headerTitle'] }}
                    @endisset
                </p>
            </div>
        </div>
    </div>
</header>
