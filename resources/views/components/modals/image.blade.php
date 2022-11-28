<button id="{{$modalId}}-button" type="button">
    <img src="{{ $imageSrc }}">
</button>

<!-- {{$modalId}} -->
<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal h-full justify-center items-center bg-opacity-70 bg-black">
    <div class="relative max-h-7xl max-w-7xl md:h-auto">
        <div class="p-6 space-y-6">
            <img src="{{ $imageSrc }}">
        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("{{ $modalId }}-button").addEventListener("click", function () {
        document.getElementById("{{ $modalId }}").classList.remove("hidden");
        document.getElementById("{{ $modalId }}").classList.add("flex");
    });

    document.getElementById("{{ $modalId }}").addEventListener("click", function () {
        document.getElementById("{{ $modalId }}").classList.add("hidden");
        document.getElementById("{{ $modalId }}").classList.remove("flex");
    });
</script>