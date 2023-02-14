<div id="teacherFeedbackForm" class="relative z-10 hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto relative w-screen max-w-md">
                    <div class="flex flex-wrap h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                        <div class="flex justify-between align-middle">
                            <div class="pl-4 sm:pl-6">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Feedback</h2>
                            </div>
                            <div class="pr-4 sm:pr-6">
                                <button onclick="document.getElementById('teacherFeedbackForm').classList.toggle('hidden');" type="button" class="rounded-md text-gray-300 hover:text-black focus:outline-none focus:ring-2 focus:ring-white">
                                    <span class="sr-only">Paneel Verbergen</span>
                                    <i class="fas fa-greater-than text-xl"></i>
                                </button>
                            </div>
                        </div>
                        <div class="relative mt-6 flex-1 px-4 sm:px-6">
                            <div class="absolute inset-0 px-4 sm:px-6">
                                <form action="{{ route('teacher_process_feedback', ['studentId' => $student->id, 'page' => Route::currentRouteName()]) }}" method="post">
                                    @csrf
                                    <div class="flex flex-wrap">
                                        <div class="w-full">
                                            <div class="mt-1">
                                                <textarea id="feedback" name="feedback" rows="20" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="mt-3 shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                        Feedback versturen
                                    </button>
                                </form>

                                <div class="mt-6">
                                    @foreach ($feedback as $singleFeedback)
                                        <div class="border-b-2 border-gray-300 py-2 mt-4">
                                            <p class="font-bold">{{ $singleFeedback->teacher->user->name }} ({{ $singleFeedback->created_at->format('d-m-Y H:i') }})</p>
                                            @if ($singleFeedback->confirmed)
                                                <p class="text-green-500"><i class="fa fa-check"></i> Verwerkt</p>
                                            @else
                                                <p class="text-red-500"><i class="fa fa-times"></i> Nog niet verwerkt</p>
                                            @endif
                                            <p>{{ $singleFeedback->feedback }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
