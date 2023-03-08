<header class="header-admin">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-baseline">
            <a href="{{ route('admin_dashboard') }}" class="font-semibold leading-tight text-white mr-3">
                Admin Dashboard
            </a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="font-semibold leading-tight text-white h-full">Uitloggen</button>
            </form>
        </div>
    </div>
</header>
