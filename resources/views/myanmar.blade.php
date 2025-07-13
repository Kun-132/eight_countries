<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Myanmar')

@section('content')
<style>
    .cover-image {
        width: 100%;
        height: 800px;
        background: url('{{ asset('img/Myanmar Main.jpg') }}') no-repeat center center/cover;
        position: relative;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        color: white;
        text-align: center;
        padding-bottom: 40px;
    }

    @media (max-width: 768px) {
        .cover-image {
            height: 300px;
            padding-bottom: 20px;
        }
    }
</style>
@section('cover-title')
Myanmar ミャンマー
@endsection

@section('cover-paragraph')
ミャンマーは、壮大なバガンの仏塔群に象徴される仏教文化と、多様な民族が織りなす豊かな伝統を持つ国です。近年は政治的混乱により社会は揺れ動いていますが、自分たちの道をなんとか切り開こうとする若者たちが活動しています。ヤンゴンメンバーは各々自分たちの得意なスキルを活かしながら、仕事を通じて自立を目指し活動を続けています。もちろん、停電やインターネットが通じないときもあります。それでも自分たちから新しい学びを求め続けていく姿勢を持っています。 ヤンゴンでは「ものづくり」「コミュニケーション」「日本文化」の三つが主な活動の柱です。
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