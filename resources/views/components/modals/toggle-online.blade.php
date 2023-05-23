<div id="confirm-online-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal h-full justify-center items-center bg-opacity-70 bg-black">
    <div class="relative md:h-auto">
        <div class="p-6 space-y-6 bg-white rounded-lg max-w-2xl">
            @if(Auth::user()->student->online)
                <h2 class="text-2xl font-bold">Offline halen</h2>
                <p class="font-normal">Je staat op het punt je pagina offline te halen. Dit betekent dat bezoekers en andere studenten je pagina niet meer kunnen bezoeken. Weet je zeker dat je dit wilt doen? Je kunt altijd je pagina ook weer online zetten.</p>
            @else
                <h2 class="text-2xl font-bold">Online zetten</h2>
                <p class="font-normal">Je staat op het punt je pagina online te zetten. Dit betekent dat bezoekers en andere studenten je pagina kunnen bezoeken. Weet je zeker dat je dit wilt doen? Je kunt altijd je pagina ook weer offline halen.</p>
            @endif
            <button class="px-4 py-2 rounded-lg bg-green-600 hover:bg-green-400 modal-button" id="confirm-online-modal-confirm-button" href="">Ok</a>
            <button class="px-4 py-2 mt-0 rounded-lg bg-red-600 hover:bg-red-400 modal-button" id="confirm-online-modal-cancel-button">Annuleren</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("confirm-online-modal-button").addEventListener("click", function () {
        document.getElementById("confirm-online-modal").classList.remove("hidden");
        document.getElementById("confirm-online-modal").classList.add("flex");
    });

    document.getElementById("confirm-online-modal").addEventListener("click", function () {
        document.getElementById("confirm-online-modal").classList.add("hidden");
        document.getElementById("confirm-online-modal").classList.remove("flex");
    });

    document.getElementById("confirm-online-modal-cancel-button").addEventListener("click", function () {
        document.getElementById("confirm-online-modal").classList.add("hidden");
        document.getElementById("confirm-online-modal").classList.remove("flex");
    });

    document.getElementById("confirm-online-modal-confirm-button").addEventListener("click", function () {
        // javascript redirect
        window.location.href = "{{ route('toggle_online', $student->slug) }}";
    });
</script>
