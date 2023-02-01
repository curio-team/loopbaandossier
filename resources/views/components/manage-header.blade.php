<header class="header-manage">
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
                <a href="{{ route('main', $student->slug) }}">Homepagina</a>
                <a href="{{ route('introduction', $student->slug) }}">Voorstellen</a>
                <a href="{{ route('qualities', $student->slug) }}">Kwaliteiten</a>
                <a href="{{ route('motives', $student->slug) }}">Motieven</a>
                <a href="{{ route('exploration', $student->slug) }}">Werkexploratie</a>
                <a href="{{ route('experience', $student->slug) }}">Loopbaansturing</a>
                <a href="{{ route('networks', $student->slug) }}">Netwerken</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Uitloggen</button>
                </form>
                {{-- <a href="#"><i class="fa-solid fa-search"></i></a> --}}
            </div>
        </div>
        <div class="flex items-center justify-center h-24">
            <p class="text-5xl font-semibold header-title-manage">{{ $title }}</p>
        </div>
    </div>
</header>