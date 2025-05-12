<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Japan')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/Japan Main.png') }}') no-repeat center center/cover;
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
        @if($content->media_type === 'image')
            <img src="{{ asset('storage/' . $content->media_path) }}" alt="{{ $content->title }}">
        @else
            <iframe src="{{ $content->media_path }}" allowfullscreen></iframe>
        @endif

        <h2>{{ $content->title }}</h2>
        <p>{{ $content->paragraph }}</p>

        {{-- ✅ Show image1 and image2 only if they exist --}}
        @if($content->image1 || $content->image2)
            <div class="additional-images">
                @if($content->image1)
                    <img src="{{ asset('storage/' . $content->image1) }}" class="img-fluid mt-2" alt="{{ $content->title }}">
                @endif

                @if($content->image2)
                    <img src="{{ asset('storage/' . $content->image2) }}" class="img-fluid mt-2" alt="{{ $content->title }}">
                @endif
            </div>
        @endif
    </div>
@endforeach
@endsection