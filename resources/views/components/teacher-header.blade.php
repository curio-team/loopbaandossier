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
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-white hover:text-gray-200" type="submit">Uitloggen</button>
                </form>
            </div>
        </div>
    </div>
</header>
