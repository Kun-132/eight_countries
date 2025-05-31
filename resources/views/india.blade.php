<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'India')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 700px; /* Adjust height as needed */
    background: url('{{ asset('img/India Main.png') }}') no-repeat center center/cover;
    position: relative;
    display: flex;
    align-items: flex-end; /* Align content at the bottom */
    justify-content: center;
    color: white;
    text-align: center;
    padding-bottom: 40px; /* Space for text or content */
}

    </style>
    @section('cover-title')
    India インド
@endsection

@section('cover-paragraph')
インド、特に南インドは南アジアから東南アジアに至る広い文化の源流です。伝統舞踊、建築、彫像などをを通じて、それぞれの人が生まれた文化の原点と、それぞれの文化がどう派生し変化したのか体験することができます。伝統は止まっているものではなく、さまざまなものの中で揺らぎ姿を変えていくものだということを実感できる場所です。その拠点となるのが、私たちと協働しているバンガロールのチャナカ大学、ウジレのSDMカレッジです。
@endsection
    <!-- Section 1: Image, Title, Paragraph -->
@foreach($contents as $content)
    <div id="{{ $content->section_id }}" class="content-section">
    <h2>{{ $content->title }}</h2>

        @php
            $blocks = $content->blocks->sortBy('order')->values(); // Reset keys for indexing
            $i = 0;
        @endphp

        @while($i < $blocks->count())
            @php $block = $blocks[$i]; @endphp

            @if($block->type === 'title')
                <h2>{{ $block->content }}</h2>

            @elseif($block->type === 'paragraph')
                <p>{{ $block->content }}</p>

            @elseif(
                $i + 2 < $blocks->count() &&
                $block->type === 'image' &&
                $blocks[$i+1]->type === 'image' &&
                $blocks[$i+2]->type === 'image'
            )
                {{-- ✅ Three consecutive images: special layout --}}
                <div class="mb-4">
                    {{-- Large image --}}
                    <img src="{{ asset('storage/' . $block->media_path) }}"
                         alt="Main image"
                         class="img-fluid w-100 mb-3"
                         style="height: 500px; object-fit: cover;">

                    {{-- Additional images container --}}
                    <div class="additional-images d-flex gap-3">
                        <img src="{{ asset('storage/' . $blocks[$i+1]->media_path) }}"
                             class="img-fluid"
                             style="width: 50%; height: 250px; object-fit: cover;"
                             alt="Additional image 1">

                        <img src="{{ asset('storage/' . $blocks[$i+2]->media_path) }}"
                             class="img-fluid"
                             style="width: 50%; height: 250px; object-fit: cover;"
                             alt="Additional image 2">
                    </div>
                </div>

                @php $i += 3; continue; @endphp

            @elseif($block->type === 'image')
                {{-- ✅ Single image --}}
                <img src="{{ asset('storage/' . $block->media_path) }}"
                     alt="image block"
                     class="img-fluid mb-3">

            @elseif($block->type === 'video')
                <iframe src="{{ $block->media_path }}"
                        allowfullscreen
                        class="w-100 mb-4"
                        style="height: 400px;"></iframe>
            @endif

            @php $i++; @endphp
        @endwhile
    </div>
@endforeach
@endsection