<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Indonesia')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/indonesia.jpg') }}') no-repeat center center/cover;
    position: relative;
    display: flex;
    align-items: flex-end; /* Align content at the bottom */
    justify-content: center;
    color: white;
    text-align: center;
    padding-bottom: 40px; /* Space for text or content */
}

    </style>
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