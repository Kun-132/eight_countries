<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Japan')

@section('content')
<style>
    .cover-image {
        width: 100%;
        height: 800px;
        background: url('{{ asset('img/Japan Main.png') }}') no-repeat center center/cover;
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
Japan-PA 日本ーPA
@endsection

@section('cover-paragraph')
PA（プレスオルタナテイブ・株）が日本で最初にフェアートレードを始めて４０周年です
。途中、モノを買うだけでは社会の問題解決は難しくコミュトレードと改名しました。日
本では楠や天草で畑や森をテーマに、アジアとはコミュニテイーワーク（「超える
）ＣＷＢ）で国境を越えた課題解決に取り組んでいます。このサイトは、そのオープンプ
ラットフォームです。文化、人材、技術、モノの交流から競創を目指します。「超える」
では国境だけでなく宗教、民族、経済格差、世代を超えて繋がれればと思います。@endsection
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