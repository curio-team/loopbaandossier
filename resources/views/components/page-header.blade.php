<header class="page-header {{ $header_type }}">
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
            <div class="flex items-center nav-links">
                <a href="{{ route('home') }}" class="{{ (request()->is('/')) ? 'nav-active' : '' }}">Homepagina</a>
                <a href="{{ route('introduction') }}" class="{{ (request()->is('voorstellen')) ? 'nav-active' : '' }}">Voortsellen</a>
                <a href="{{ route('qualities') }}" class="{{ (request()->is('kwaliteiten')) ? 'nav-active' : '' }}">Kwaliteiten</a>
                <a href="{{ route('motives') }}" class="{{ (request()->is('motieven')) ? 'nav-active' : '' }}">Motieven</a>
                <a href="{{ route('exploration') }}" class="{{ (request()->is('werkexploratie')) ? 'nav-active' : '' }}">Werkexploratie</a>
                <a href="{{ route('experience') }}" class="{{ (request()->is('loopbaansturing')) ? 'nav-active' : '' }}">Loopbaansturing</a>
                <a href="{{ route('networks') }}" class="{{ (request()->is('netwerken')) ? 'nav-active' : '' }}">Netwerken</a>
                <a href="#"><i class="fa-solid fa-search"></i></a>
            </div>
        </div>
        <div class="flex items-center justify-center h-80">
            <p class="{{ $title_color }} text-7xl font-semibold">{{ $title }}</p>
        </div>
    </div>
</header>