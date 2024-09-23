@extends('layouts.manage')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
        <div class="my-2 mx-5">
            <form action="#" method="POST" enctype="multipart/form-data" class="w-full max-w-7xl">
                @csrf

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="header_title">
                            Koptitel:
                        </label>
                    </div>
                    <div class="md:w-4/5">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-400" name="header_title" type="text" value="{{ $pageData['header_title'] }}">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="content_text">
                            Pagina tekst:
                        </label>
                    </div>
                    <div class="md:w-4/5">
                        <textarea name="content_text" class="ckeditor">{{ $pageData['content_text'] }}</textarea>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="content_image">
                            Pagina afbeelding:
                        </label>
                    </div>
                    <div class="md:w-1/5">
                        <input type="file" name="content_image" placeholder="Choose image" id="image" name="image"
                               class="hidden" accept="image/png, image/gif, image/jpeg">
                        <button type="button" onclick="document.getElementById('image').click();" class="shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Afbeelding Uploaden
                        </button>
                        <span class="text-xs">Max 10MB</span>
                    </div>
                    <div class="md:w-3/5 md:ml-3 md:mt-0 ml-0 mt-3 flex">
                        <img id="imagePreview" src="{{ $pageData['content_image'] ? asset($pageData['content_image']) : asset('/images/default.jpg') }}" alt="preview image" class="max-h-xl rounded-md shadow-sm">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="header_color">
                            Pagina kop kleur:
                        </label>
                    </div>
                    <div class="md:w-4/5 grid grid-cols-5 gap-3 justify-items-center py-4 border-2 border-black">
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="1" {{ ($pageData['header_color'] == 1) ? 'checked' : '' }}>
                            <div class="color-1"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="2" {{ ($pageData['header_color'] == 2) ? 'checked' : '' }}>
                            <div class="color-2"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="3" {{ ($pageData['header_color'] == 3) ? 'checked' : '' }}>
                            <div class="color-3"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="4" {{ ($pageData['header_color'] == 4) ? 'checked' : '' }}>
                            <div class="color-4"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="5" {{ ($pageData['header_color'] == 5) ? 'checked' : '' }}>
                            <div class="color-5"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="6" {{ ($pageData['header_color'] == 6) ? 'checked' : '' }}>
                            <div class="color-6"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="7" {{ ($pageData['header_color'] == 7) ? 'checked' : '' }}>
                            <div class="color-7"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="8" {{ ($pageData['header_color'] == 8) ? 'checked' : '' }}>
                            <div class="color-8"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="9" {{ ($pageData['header_color'] == 9) ? 'checked' : '' }}>
                            <div class="color-9"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="10" {{ ($pageData['header_color'] == 10) ? 'checked' : '' }}>
                            <div class="color-10"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="11" {{ ($pageData['header_color'] == 11) ? 'checked' : '' }}>
                            <div class="color-11"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="12" {{ ($pageData['header_color'] == 12) ? 'checked' : '' }}>
                            <div class="color-12"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="13" {{ ($pageData['header_color'] == 13) ? 'checked' : '' }}>
                            <div class="color-13"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="14" {{ ($pageData['header_color'] == 14) ? 'checked' : '' }}>
                            <div class="color-14"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="header_color" value="15" {{ ($pageData['header_color'] == 15) ? 'checked' : '' }}>
                            <div class="color-15"></div>
                        </label>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="content_color">
                            Pagina inhoud kleur:
                        </label>
                    </div>
                    <div class="md:w-4/5 grid grid-cols-5 gap-3 justify-items-center py-4 border-2 border-black">
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="1" {{ ($pageData['content_color'] == 1) ? 'checked' : '' }}>
                            <div class="color-1"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="2" {{ ($pageData['content_color'] == 2) ? 'checked' : '' }}>
                            <div class="color-2"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="3" {{ ($pageData['content_color'] == 3) ? 'checked' : '' }}>
                            <div class="color-3"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="4" {{ ($pageData['content_color'] == 4) ? 'checked' : '' }}>
                            <div class="color-4"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="5" {{ ($pageData['content_color'] == 5) ? 'checked' : '' }}>
                            <div class="color-5"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="6" {{ ($pageData['content_color'] == 6) ? 'checked' : '' }}>
                            <div class="color-6"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="7" {{ ($pageData['content_color'] == 7) ? 'checked' : '' }}>
                            <div class="color-7"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="8" {{ ($pageData['content_color'] == 8) ? 'checked' : '' }}>
                            <div class="color-8"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="9" {{ ($pageData['content_color'] == 9) ? 'checked' : '' }}>
                            <div class="color-9"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="10" {{ ($pageData['content_color'] == 10) ? 'checked' : '' }}>
                            <div class="color-10"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="11" {{ ($pageData['content_color'] == 11) ? 'checked' : '' }}>
                            <div class="color-11"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="12" {{ ($pageData['content_color'] == 12) ? 'checked' : '' }}>
                            <div class="color-12"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="13" {{ ($pageData['content_color'] == 13) ? 'checked' : '' }}>
                            <div class="color-13"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="14" {{ ($pageData['content_color'] == 14) ? 'checked' : '' }}>
                            <div class="color-14"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="15" {{ ($pageData['content_color'] == 15) ? 'checked' : '' }}>
                            <div class="color-15"></div>
                        </label>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="content_text">
                            Pagina layout:
                        </label>
                    </div>
                    <div class="md:w-4/5 flex max-w-3xl">
                        <label class="mr-2">
                            <input type="radio" name="content_layout" value="1" {{ ($pageData['content_layout'] == 1) ? 'checked' : '' }}>
                            <img src="{{ asset('assets/images/type_1.png') }}" alt="">
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_layout" value="2" {{ ($pageData['content_layout'] == 2) ? 'checked' : '' }}>
                            <img src="{{ asset('assets/images/type_2.png') }}" alt="">
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_layout" value="3" {{ ($pageData['content_layout'] == 3) ? 'checked' : '' }}>
                            <img src="{{ asset('assets/images/type_3.png') }}" alt="">
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_layout" value="4" {{ ($pageData['content_layout'] == 4) ? 'checked' : '' }}>
                            <img src="{{ asset('assets/images/type_4.png') }}" alt="">
                        </label>
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/5"></div>
                    <div class="md:w-4/5">
                        <button class="shadow bg-blue-400 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Opslaan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>

@if($student->feedback->count() > 0)
    <div class="flex justify-center">
        <div class="bg-white bg-opacity-80 py-6 m-5 rounded-md w-3/4">
            <div class="w-full max-w-7xl md:flex md:flex-col md:items-center pr-12 mb-6 mx-6">
                <label class="block text-gray-500 font-bold text-3xl" for="content_text">
                    Feedback:
                </label>
                @foreach ($student->feedback as $feedback)
                    <div class="border-b-2 border-gray-300 py-2 mt-4 w-full">
                        <p class="font-bold">{{ $feedback->teacher->user->name }} ({{ $feedback->created_at->format('d-m-Y H:i') }})</p>
                        <div class="my-2 flex">
                            @if ($feedback->confirmed)
                                <p class="text-green-500"><i class="fa fa-check"></i> Verwerkt</p>
                            @else
                                <label class="text-red-500"><i class="fa fa-times"></i> Nog niet verwerkt -</label>
                                <form action="{{ route('process_feedback', ['studentId' => $student->id, 'feedbackId' => $feedback->id]) }}" method="post">
                                    @csrf
                                    <button class="shadow bg-green-400 hover:bg-green-300 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 ml-2 rounded" type="submit"><i class="fa fa-check"></i> Gedaan</button>
                                </form>
                            @endif
                        </div>
                        <p>{{ $feedback->feedback }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<script type="application/javascript">
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            imagePreview.src = URL.createObjectURL(file);
        }
    }
</script>

@include('components.ckeditor', [
    'textareaIds' => [
        'content_text',
    ]
])

@endsection
