<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Loopbaandossier van {{ $student->user->name }}</title>
    </head>

    <style>
        @font-face {
            font-family: 'Fellix-Regular';
            src: url({{ storage_path("fonts/Fellix-Regular.ttf") }}) format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Fellix-Bold';
            src: url({{ storage_path("fonts/Fellix-Bold.ttf") }}) format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        body {
            font-family: 'Fellix-Regular';
        }

        p {
            font-size: 14px;
        }

        .page-break {
            page-break-before: always;
        }

        header {
            position: fixed;
            top: 1cm;
            left: 0cm;
            right: 1cm;
            height: 2cm;
        }

        .image-left {
            max-width: 300px;
            max-height: 300px;
            float: left;
            margin: 10px;
        }

        .image-right{
            max-width: 300px;
            max-height: 300px;
            float: right;
            margin: 10px;
        }
    </style>

    <body style="background-color:rgba(120, 3, 74, 1); padding: 30px;">
        <header>
            <img src="{{ asset('assets/images/curio-01-zwart-logo-rgb.png') }}" alt="Curio Logo" style="width: 20%; margin: 15px; float: right;">
        </header>
        <main>

        <div style="background-color:white; height: 255mm; width: 100%; position: relative;">
            {{-- <div style="float: right; margin-bottom: 30px;"> --}}
            <table>
                {{-- Introduction --}}
                @if($student->pages->introduction_content_text)
                    <tr><td>
                        <div style="padding: 0px 0px 10px 30px; margin: 15px;">
                            <h1>{{ $student->pages->introduction_header_title ?? 'Dit ben ik!' }}</h1>
                            @if($student->pages->introduction_content_image)
                                @php
                                    // get image filetype
                                    $filetype = pathinfo($student->pages->introduction_content_image, PATHINFO_EXTENSION);
                                    // base64 encode image
                                    $imageData = base64_encode(file_get_contents(asset($student->pages->introduction_content_image)));
                                @endphp
                                <img src="data:image/{{ $filetype }};base64,{{ $imageData }}" class="image-right">
                            @endif
                            {!! $student->pages->introduction_content_text !!}
                        </div>
                    </td></tr>
                    @php
                        $pageBreak = true;
                    @endphp

                @endif

                {{-- Qualities --}}
                @if($student->pages->qualities_content_text)
                    @if ($pageBreak)
                        <div class="page-break"></div>
                        @php
                            $pageBreak = false;
                        @endphp
                    @endif
                    <tr><td>
                        <div style="padding: 0px 0px 10px 30px; margin: 15px;">
                            <h1>{{ $student->pages->qualities_header_title ?? 'Dit zijn mijn kwaliteiten!' }}</h1>
                            @if($student->pages->qualities_content_image)
                                @php
                                    // get image filetype
                                    $filetype = pathinfo($student->pages->qualities_content_image, PATHINFO_EXTENSION);
                                    // base64 encode image
                                    $imageData = base64_encode(file_get_contents(asset($student->pages->qualities_content_image)));
                                @endphp
                                <img src="data:image/{{ $filetype }};base64,{{ $imageData }}" class="image-left">
                            @endif
                            {!! $student->pages->qualities_content_text !!}
                        </div>
                    </td></tr>

                    @php
                        $pageBreak = true;
                    @endphp
                @endif

                {{-- Motives --}}
                @if($student->pages->motives_content_text)
                    @if ($pageBreak)
                        <div class="page-break"></div>
                        @php
                            $pageBreak = false;
                        @endphp
                    @endif
                    <tr><td>
                        <div style="padding: 0px 0px 10px 30px; margin: 15px;">
                            <h1>{{ $student->pages->motives_header_title ?? 'Hierdoor raak ik gemotiveerd!' }}</h1>
                            @if($student->pages->motives_content_image)
                                @php
                                    // get image filetype
                                    $filetype = pathinfo($student->pages->motives_content_image, PATHINFO_EXTENSION);
                                    // base64 encode image
                                    $imageData = base64_encode(file_get_contents(asset($student->pages->motives_content_image)));
                                @endphp
                                <img src="data:image/{{ $filetype }};base64,{{ $imageData }}" class="image-right">
                            @endif
                            {!! $student->pages->motives_content_text !!}
                        </div>
                    </td></tr>
                    @php
                        $pageBreak = true;
                    @endphp
                @endif

                {{-- Exploration --}}
                @if($student->pages->exploration_content_text)
                    @if ($pageBreak)
                        <div class="page-break"></div>
                        @php
                            $pageBreak = false;
                        @endphp
                    @endif
                    <tr><td>
                        <div style="padding: 0px 0px 10px 30px; margin: 15px;">
                            <h1>{{ $student->pages->exploration_header_title ?? 'Dit is mijn onderzoek!' }}</h1>
                            @if($student->pages->exploration_content_image)
                                @php
                                    // get image filetype
                                    $filetype = pathinfo($student->pages->exploration_content_image, PATHINFO_EXTENSION);
                                    // base64 encode image
                                    $imageData = base64_encode(file_get_contents(asset($student->pages->exploration_content_image)));
                                @endphp
                                <img src="data:image/{{ $filetype }};base64,{{ $imageData }}" class="image-left">
                            @endif
                            {!! $student->pages->exploration_content_text !!}
                        </div>
                    </td></tr>
                    @php
                        $pageBreak = true;
                    @endphp
                @endif

                {{-- Experience --}}
                @if($student->pages->experience_content_text)
                    @if ($pageBreak)
                        <div class="page-break"></div>
                        @php
                            $pageBreak = false;
                        @endphp
                    @endif
                    <tr><td>
                        <div style="padding: 0px 0px 10px 30px; margin: 15px;">
                            <h1>{{ $student->pages->experience_header_title ?? 'Hier komt mijn ervaring vandaan!'}}</h1>
                            @if($student->pages->experience_content_image)
                                @php
                                    // get image filetype
                                    $filetype = pathinfo($student->pages->experience_content_image, PATHINFO_EXTENSION);
                                    // base64 encode image
                                    $imageData = base64_encode(file_get_contents(asset($student->pages->experience_content_image)));
                                @endphp
                                <img src="data:image/{{ $filetype }};base64,{{ $imageData }}" class="image-right">
                            @endif
                            {!! $student->pages->experience_content_text !!}
                        </div>
                    </td></tr>
                    @php
                        $pageBreak = true;
                    @endphp
                @endif

                {{-- Networks --}}
                @if($student->pages->networks_content_text)
                    @if ($pageBreak)
                        <div class="page-break"></div>
                        @php
                            $pageBreak = false;
                        @endphp
                    @endif
                    <tr><td>
                        <div style="padding: 0px 0px 10px 30px; margin: 15px;">
                            <h1>{{ $student->pages->networks_header_title ?? 'Deze mensen en bedrijven kennen mij!' }}</h1>
                            @if($student->pages->networks_content_image)
                                @php
                                    // get image filetype
                                    $filetype = pathinfo($student->pages->networks_content_image, PATHINFO_EXTENSION);
                                    // base64 encode image
                                    $imageData = base64_encode(file_get_contents(asset($student->pages->networks_content_image)));
                                @endphp
                                <img src="data:image/{{ $filetype }};base64,{{ $imageData }}" class="image-left">
                            @endif
                            {!! $student->pages->networks_content_text !!}
                        </div>
                    </td></tr>
                @endif
            </table>

        </div>
        </main>
    </body>


</html>
