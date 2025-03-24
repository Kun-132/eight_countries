<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Cambodia')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/cambodia.jpg') }}') no-repeat center center/cover;
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

        <p>{{ $content->paragraph }}</p>  <!-- ✅ Changed 'content' to 'paragraph' -->
    </div>
    @endforeach

@endsection