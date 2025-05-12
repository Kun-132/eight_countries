<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'Cambodia')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 700px; /* Adjust height as needed */
    background: url('{{ asset('img/Cam Main.jpg') }}') no-repeat center center/cover;
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
Cambodia カンボジア
@endsection

@section('cover-paragraph')
カンボジアは千年の歴史を持つクメール文明の地で、世界遺産アンコール遺跡群に代表される豊かな文化遺産を受け継いでいます。私たちは「文化活動」「コミュニティ・ビジット」「仕事づくり」の３つの軸で活動を行っています。他の国やチームと、マッシュアップを通して新たな商品や価値を生み出します。また、動画での発信を行っています。
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