<x-guest-layout>
    <x-slot name="header">
        @include('components.page-header', $header)
    </x-slot>

    <div class="content-home font-sans">
        <div class="container flex justify-center mx-auto py-6">
            @include('components.home-card', ['title' => 'Voorstellen', 'image' => 'placeholder.png'])
            @include('components.home-card', ['title' => 'Kwaliteiten', 'image' => 'placeholder.png'])
            @include('components.home-card', ['title' => 'Motieven', 'image' => 'placeholder.png'])
            @include('components.home-card', ['title' => 'Werkexploratie', 'image' => 'placeholder.png'])
            @include('components.home-card', ['title' => 'Loopbaansturing', 'image' => 'placeholder.png'])
            @include('components.home-card', ['title' => 'Netwerken', 'image' => 'placeholder.png'])
        </div>
    </div>
</x-guest-layout>
