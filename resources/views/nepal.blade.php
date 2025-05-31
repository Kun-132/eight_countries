<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Nepal')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/nepal.jpg') }}') no-repeat center center/cover;
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
    Nepal ネパール
    @endsection

@section('cover-paragraph')
ネパールは２０１５年の大地震の復興で訪ねてからの関係です。ネパールは寒いことから
編み物が盛んで、その支援のための組織化で活躍してくれたのがスジャンナとアリヤです
（今年３月に結婚）。アリヤは去年１２月の「武器のない平和を！」に通訳兼役者として
参加、英語・ヒンズー語・ネパール語のバイリンガルで大活躍。実は３か国語を話せるの
は当たり前で、更に日本語も話せるプレビアさんも、これから加わります。上智大学の英
文を卒業し、日本の家電販販店で働いています。稀少言語・日本語を話す人材は貴重です
(VTRメッセージをご案下さい)
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