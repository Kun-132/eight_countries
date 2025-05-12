<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Myanmar')

@section('content')
<style>
    .cover-image {
        width: 100%;
        height: 800px; /* Adjust height as needed */
        background: url('{{ asset('img/Myanmar Main.jpg') }}') no-repeat center center/cover;
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
Myanmar ミャンマー
@endsection

@section('cover-paragraph')
ミャンマーは、壮大なバガンの仏塔群に象徴される仏教文化と、多様な民族が織りなす豊かな伝統を持つ国です。近年は政治的混乱により社会は揺れ動いていますが、自分たちの道をなんとか切り開こうとする若者たちが活動しています。ヤンゴンメンバーは各々自分たちの得意なスキルを活かしながら、仕事を通じて自立を目指し活動を続けています。もちろん、停電やインターネットが通じないときもあります。それでも自分たちから新しい学びを求め続けていく姿勢を持っています。 ヤンゴンでは「ものづくり」「コミュニケーション」「日本文化」の三つが主な活動の柱です。
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
