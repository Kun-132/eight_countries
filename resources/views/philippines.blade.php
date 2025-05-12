<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Philippines')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/Phip Main.jpg') }}') no-repeat center center/cover;
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
    Philippines フィリピン
    @endsection

@section('cover-paragraph')
フィリピンは数多くの島からなる国です。CWBの拠点があるのは南に位置するミンダナオ島。海に面し山を後ろに控える杷にあります。ここにはPA・第三世界ショップと長年の付き合いがあるSHAPII: SALAY HANDMADE PRODUCTSがあります。PAの創業者である片岡が、農民を苦しめるコゴン草を有効活用しようとしていたロレッタさんと出会い、彼女を日本に招き、日本の和紙づくりの技術を紹介したのが長い付き合いの始まりです。@endsection
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