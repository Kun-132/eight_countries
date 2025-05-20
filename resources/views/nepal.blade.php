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