<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'India')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 700px; /* Adjust height as needed */
    background: url('{{ asset('img/India Main.png') }}') no-repeat center center/cover;
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
    India インド
@endsection

@section('cover-paragraph')
インド、特に南インドは南アジアから東南アジアに至る広い文化の源流です。伝統舞踊、建築、彫像などをを通じて、それぞれの人が生まれた文化の原点と、それぞれの文化がどう派生し変化したのか体験することができます。伝統は止まっているものではなく、さまざまなものの中で揺らぎ姿を変えていくものだということを実感できる場所です。その拠点となるのが、私たちと協働しているバンガロールのチャナカ大学、ウジレのSDMカレッジです。
@endsection
    <!-- Section 1: Image, Title, Paragraph -->
    @foreach($contents as $content)
    <div id="{{ $content->section_id }}" class="content-section">
    <h2>{{ $content->title }}</h2>
    <p>{{ $content->paragraph }}</p> <br>


        @if($content->media_type === 'image')
            <img src="{{ asset('storage/' . $content->media_path) }}" alt="{{ $content->title }}">
        @else
            <iframe src="{{ $content->media_path }}" allowfullscreen></iframe>
        @endif

        <br>
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