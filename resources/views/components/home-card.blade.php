<div class="mx-4">
    <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $title }}" class="h-40 w-40"><br>
    <a href="{{ route($route, $student->slug) }}" class="border rounded-md border-white text-white w-full inline-block text-center py-2">{{ $title }}</a>
</div>