<!-- resources/views/myanmar.blade.php -->
@extends('country-layout')

@section('title', 'SriLanka')

@section('content')
<style>
        .cover-image {
    width: 100%;
    height: 800px; /* Adjust height as needed */
    background: url('{{ asset('img/Sri Main.png') }}') no-repeat center center/cover;
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
Sri Lanka スリランカ
@endsection

@section('cover-paragraph')
スリランカはインド洋に浮かぶ島国で、豊かな自然とスパイス文化を誇ります。現在PAの主力商品であるカレーの壺はスリランカから生まれました。スパイスの国ですが、当時は日本のカレールウみたいなものはなく、スパイスを買って各家庭で調合するところから作っていたため時間がかかっていました。日本で働いた経験を持つマリオさんはペーストを作り販売することで主婦の時間を解放し、また、スリランカの農家に品質管理の面で付加価値をつけて自立の手助けをするなど、地域を向上させる活動を行っています。@endsection
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