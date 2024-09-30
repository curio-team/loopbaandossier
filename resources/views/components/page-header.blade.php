<header class="color-background-{{ $headerColor }}">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <nav>
            {{-- Desktop menu --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="font-semibold leading-tight">
                    <div class="flex items-center">
                        <div class="w-20">
                            <img src="{{asset('assets/images/curio-02-wit-logo-rgb.png')}}" alt="Curio Logo">
                        </div>
                        <p class="text-white mx-3">{{__('Loopbaandossier Student')}}</p>
                    </div>
                </a>
                <div class="flex items-center xl:hidden">
                    <button id="hamburger" class="text-white focus:outline-none">
                        <i class="fa fa-bars text-2xl"></i>
                    </button>
                </div>
                <div id="nav-links" class="hidden xl:flex items-center nav-links md:text-base sm:text-sm font-bold">
                    <a class="text-white hover:text-gray-200 {{ (request()->is('main')) ? 'nav-active' : '' }}" href="{{ route('main', $student->id) }}">Homepagina</a>
                    @auth
                    @if(Auth::user()->student)
                    @if($student->id == Auth::user()->student->id)
                    {{-- Owner --}}
                    <a class="text-white hover:text-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                    <div class="group relative">
                        <button class="text-white hover:text-gray-200">Menu <i class="fa fa-chevron-down"></i></button>
                        <div class="hidden group-hover:block absolute right-0 w-56 bg-white shadow-lg rounded-md z-10">
                            <a class="block px-4 py-2 !mx-0 rounded-t-md !text-black hover:bg-gray-200" href="{{ route('export', $student->id) }}">PDF Export</a>
                            <div class="block px-4 py-2 !mx-0 hover:bg-gray-200">
                                <button id="confirm-online-modal-button" type="button" class="w-full text-left text-black !mx-0">
                                    <span class="text-black">Online</span>
                                    @if(Auth::user()->student->online)
                                    <i class="fa fa-toggle-on text-xl text-green-600 inline-block align-[-3px]"></i>
                                    @else
                                    <i class="fa fa-toggle-off text-xl text-red-600 inline-block align-[-3px]"></i>
                                    @endif
                                </button>
                            </div>
                            <div class="block px-4 py-2 !mx-0 rounded-b-md hover:bg-gray-200">
                                <form action="{{ route('logout') }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="w-full text-left !text-black !mx-0">Uitloggen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('components.modals.toggle-online')
                    @else
                    {{-- Other Student --}}
                    <a class="text-white hover:text-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                    </form>
                    @endif
                    @if(Auth::user()->teacher || Auth::user()->is_admin)
                    {{-- Teacher or Admin --}}
                    <a class="text-white hover:text-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('export', $student->id) }}">PDF</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                    </form>
                    @endif
                    @else
                    {{-- Visitor --}}
                    <a class="text-white hover:text-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                    </form>
                    @endif
                    @endauth

                    @guest
                    <a class="text-white hover:text-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing</a>
                    <a class="text-white hover:text-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken</a>
                    <a class="text-white hover:text-gray-200" href="{{ route('login') }}">Login</a>
                    @endguest
                    {{-- <a href="#"><i class="fa-solid fa-search"></i></a> --}}
                </div>
            </div>
            {{-- Mobile menu --}}
            <div id="mobile-menu" class="hidden xl:hidden flex flex-col items-center bg-white text-black w-full">
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('main')) ? 'nav-active' : '' }}" href="{{ route('main', $student->id) }}">Homepagina</a>
                @auth
                @if(Auth::user()->student)
                @if($student->id == Auth::user()->student->id)
                <!-- Owner links -->
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200" href="{{ route('export', $student->id) }}">PDF Export</a>
                <button id="confirm-online-modal-button" type="button" class="py-2 w-full text-center hover:bg-gray-200">
                    <span class="hover:text-gray-400">Online</span>
                    @if(Auth::user()->student->online)
                    <i class="fa fa-toggle-on text-xl text-green-600 inline-block align-[-3px]"></i>
                    @else
                    <i class="fa fa-toggle-off text-xl text-red-600 inline-block align-[-3px]"></i>
                    @endif
                </button>
                <form action="{{ route('logout') }}" method="POST" class="w-full text-center">
                    @csrf
                    <button type="submit" class="py-2 w-full text-center hover:bg-gray-200">Uitloggen</button>
                </form>
                @else
                <!-- Other Student links -->
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken</a>
                <form action="{{ route('logout') }}" method="POST" class="w-full text-center">
                    @csrf
                    <button type="submit" class="py-2 w-full text-center hover:bg-gray-200">Uitloggen</button>
                </form>
                @endif
                @if(Auth::user()->teacher || Auth::user()->is_admin)
                <!-- Teacher or Admin links -->
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen {{ $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'introduction')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten {{ $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'qualities')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven {{ $student->feedback->where('page', 'motives')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'motives')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie {{ $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'exploration')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing {{ $student->feedback->where('page', 'experience')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'experience')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken {{ $student->feedback->where('page', 'networks')->where('confirmed', false)->count() ? '('. $student->feedback->where('page', 'networks')->where('confirmed', false)->count() .')' : '' }}</a>
                <a class="py-2 w-full text-center hover:bg-gray-200" href="{{ route('export', $student->id) }}">PDF</a>
                <form action="{{ route('logout') }}" method="POST" class="w-full text-center">
                    @csrf
                    <button type="submit" class="py-2 w-full text-center hover:bg-gray-200">Uitloggen</button>
                </form>
                @endif
                @else
                <!-- Visitor links -->
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing</a>
                <a class="py-2 w-full text-center hover:bg-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken</a>
                <a class="py-2 w-full text-center hover:bg-gray-200" href="{{ route('login') }}">Login</a>
                @endif
                @endauth
                @guest
                <a class="text-white hover:text-gray-200 {{ (request()->is('voorstellen')) ? 'nav-active' : '' }}" href="{{ route('introduction', $student->id) }}">Voorstellen</a>
                <a class="text-white hover:text-gray-200 {{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}" href="{{ route('qualities', $student->id) }}">Kwaliteiten</a>
                <a class="text-white hover:text-gray-200 {{ (request()->is('motieven')) ? 'nav-active' : '' }}" href="{{ route('motives', $student->id) }}">Motieven</a>
                <a class="text-white hover:text-gray-200 {{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}" href="{{ route('exploration', $student->id) }}">Werkexploratie</a>
                <a class="text-white hover:text-gray-200 {{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}" href="{{ route('experience', $student->id) }}">Loopbaansturing</a>
                <a class="text-white hover:text-gray-200 {{ (request()->is('netwerken')) ? 'nav-active' : '' }}" href="{{ route('networks', $student->id) }}">Netwerken</a>
                <a class="text-white hover:text-gray-200" href="{{ route('login') }}">Login</a>
                @endguest
            </div>
        </nav>
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
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
