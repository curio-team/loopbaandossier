<header class="header-manage">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
                <a href="{{ route('teacher_dashboard') }}" class="font-semibold leading-tight">
                    <div class="flex items-center">
                        <div class="w-20">
                                <image src="{{asset('assets/images/curio-02-wit-logo-rgb.png')}}" alt="Curio Logo">
                        </div>
                        <p class="text-white mx-3">{{__('Loopbaandossier Student')}}</p>
                    </div>
                </a>
            <div class="flex items-center nav-links">
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