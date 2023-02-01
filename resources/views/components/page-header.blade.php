<header class="header-{{ $pageColor }}">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
                <a href="{{ route('main', $student->slug) }}" class="font-semibold leading-tight">
                    <div class="flex items-center">
                        <div class="w-20">
                                <image src="{{asset('assets/images/curio-02-wit-logo-rgb.png')}}" alt="Curio Logo">
                        </div>
                        <p class="text-white mx-3">{{__('Loopbaandossier Student')}}</p>
                    </div>
                </a>
            <div class="flex items-center nav-links">
                <a href="{{ route('main', $student->slug) }}" class="{{ (request()->is('main')) ? 'nav-active' : '' }}">Homepagina</a>
                <a href="{{ route('introduction', $student->slug) }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voorstellen</a>
                <a href="{{ route('qualities', $student->slug) }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten</a>
                <a href="{{ route('motives', $student->slug) }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven</a>
                <a href="{{ route('exploration', $student->slug) }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie</a>
                <a href="{{ route('experience', $student->slug) }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing</a>
                <a href="{{ route('networks', $student->slug) }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Uitloggen</button>
                </form>
                {{-- <a href="#"><i class="fa-solid fa-search"></i></a> --}}
            </div>
        </div>
        <div class="flex flex-col items-center justify-center h-80">
            <div>
                <p class="text-7xl font-semibold header-title-{{ $pageColor }}">{{ $student->user->name }}</p>
            </div>
            <div>
                <p class="text-3xl mt-2 font-semibold header-title-{{ $pageColor }}">
                    @isset($pageData)
                        {{ $pageData['headerTitle'] }}
                    @endisset
                </p>
            </div>
        </div>
    </div>
</header>