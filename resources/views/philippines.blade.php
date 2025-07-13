<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Philippines')

@section('content')
<style>

.cover-image {
        width: 100%;
        height: 800px;
        background: url('{{ asset('img/Phip Main.jpg') }}') no-repeat center center/cover;
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
    Philippines フィリピン
    @endsection

@section('cover-paragraph')
フィリピンは数多くの島からなる国です。CWBの拠点があるのは南に位置するミンダナオ島。海に面し山を後ろに控える杷にあります。ここにはPA・第三世界ショップと長年の付き合いがあるSHAPII: SALAY HANDMADE PRODUCTSがあります。PAの創業者である片岡が、農民を苦しめるコゴン草を有効活用しようとしていたロレッタさんと出会い、彼女を日本に招き、日本の和紙づくりの技術を紹介したのが長い付き合いの始まりです。@endsection
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