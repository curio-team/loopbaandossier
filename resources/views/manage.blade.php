@extends('layouts.manage')

@section('content')
<div class="flex justify-center">
    <div class="bg-white bg-opacity-80 min-h-screen pt-6 m-5 rounded-md w-3/4">
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
                        <textarea name="content_text">{{ $pageData['content_text'] }}</textarea>
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
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="content_text">
                            Pagina kleur:
                        </label>
                    </div>
                    <div class="md:w-4/5 flex">
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="1" {{ ($pageData['content_color'] == 1) ? 'checked' : '' }}>
                            <div class="color-box-1"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="2" {{ ($pageData['content_color'] == 2) ? 'checked' : '' }}>
                            <div class="color-box-2"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="3" {{ ($pageData['content_color'] == 3) ? 'checked' : '' }}>
                            <div class="color-box-3"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="4" {{ ($pageData['content_color'] == 4) ? 'checked' : '' }}>
                            <div class="color-box-4"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="5" {{ ($pageData['content_color'] == 5) ? 'checked' : '' }}>
                            <div class="color-box-5"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="6" {{ ($pageData['content_color'] == 6) ? 'checked' : '' }}>
                            <div class="color-box-6"></div>
                        </label>
                        <label class="mr-2">
                            <input type="radio" name="content_color" value="7" {{ ($pageData['content_color'] == 7) ? 'checked' : '' }}>
                            <div class="color-box-7"></div>
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
<script type="application/javascript">
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            imagePreview.src = URL.createObjectURL(file);
        }
    }
</script>

@include('components.ckeditor', [
    'textareaNames' => [
        'content_text',
    ]
])

@endsection