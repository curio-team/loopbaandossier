<div class="mx-4">
    @if($image)
        <img src="{{ $image  }}" alt="{{ $title }}" class="h-40 w-40 object-cover"><br>
    @else
        <img src="{{ asset('assets/images/default.jpg') }}" alt="{{ $title }}" class="h-40 w-40 object-cover"><br>
    @endif
    <a href="{{ route($route, $student->slug) }}" class="border rounded-md border-white text-white w-full inline-block text-center py-2 mb-2">{{ $title }}</a>
    <p class="text-center text-white w-40 text-sm">{{ $subtext }}</p>
</div>
