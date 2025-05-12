<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Indonesia')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/Indo Main.jpg') }}') no-repeat center center/cover;
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
Indonesia インドネシア
@endsection

@section('cover-paragraph')
人口は日本の倍以上の２億８千万（２０２３年）、１万以上の島からなる、世界でイスラム教徒が最も多い国として知られていますが、バリ島はヒンドゥー教、東にあるパプア島やフローレス島などはキリスト教が多数を占め、IDカードには宗教を書く欄が設けられています。島ごとに言葉も食文化なども異なるのが面白いところです。また、織物のイカット、ろうけつ染めのバティック、ガムランの音楽、影絵のワヤン、ケチャやレゴンなどのバリ舞踊など、独特の文化も有名。
インドネシアのバリ島のアディさんと共に活動をしています。子供に週2回日本語も教えています。
@endsection
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