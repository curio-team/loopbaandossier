<header class="bg-yellow-400">
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
            <div class="flex items-center nav-links text-xl font-bold">
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
        <div class="flex items-center justify-center h-80">
            <p class="text-7xl font-semibold">Curio Loopbaandossiers</p>
        </div>
    </div>
</header>