@extends('layout')

@section('title', 'Home Page')

@section('content')

@section('styles')
<style>
    .background {
        position: relative;
        width: 100vw;
        height: 100vh;
        filter: brightness(0.8);
    }
    .floating-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .circle {
        position: absolute;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        animation: float 6s infinite ease-in-out, fadeIn 1.5s ease-out forwards;
        opacity: 0;
        transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
        cursor: pointer;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .circle:hover img { transform: scale(1.2); }
    .circle:hover {
        transform: scale(1.3);
        box-shadow: 0 0 40px rgba(255, 255, 255, 0.6);
        background: rgba(255, 255, 255, 0.2);
    }
    .info {
        position: absolute;
        color: white;
        padding: 10px 20px;
        font-size: 14px;
        pointer-events: none;
        width: 300px;
        text-align: left;
        opacity: 0;
        transform: translateY(0);
        animation: fadeIn 1.5s ease-out forwards;
    }
    .always-visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    .info h2 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }
    .info p {
        margin: 5px 0 0;
        font-size: 14px;
    }
    .title-container {
        position: absolute;
        bottom: 40px;
        left: 40px;
        color: white;
        opacity: 0;
        animation: slideUp 1.5s ease-out 0.5s forwards;
        width: 30%;
    }
    .title-container h1 { margin: 0; font-size: 35px; font-weight: bold; }
    .title-container p {
        margin: 10px 0 0;
        font-size: 18px;
        color: rgba(255, 255, 255, 0.8);
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .video-container {
        text-align: center;
        margin-top: 40px;
        padding: 20px;
        background-color: #f8f9fa;
    }
    .video-wrapper {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        max-width: 800px;
        margin: 0 auto;
    }
    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .video-title {
        font-size: 20px;
        color: #333;
        margin-top: 15px;
    }
    @media (max-width: 768px) {
        .circle { width: 50px; height: 50px; }
        .info { width: 120px; font-size: 12px; padding: 5px 10px; }
        .info h2 { font-size: 14px; }
        .title-container { width: 80%; left: 10%; bottom: 20px; }
        .title-container h1 { font-size: 24px; }
        .title-container p { font-size: 14px; }
        #circle-japan { top: 10% !important; left: 15% !important; }
        #circle-indonesia { top: 10% !important; left: 45% !important; }
        #circle-philippines { top: 10% !important; left: 75% !important; }
        #info-japan { top: 20% !important; left: 16% !important; }
        #info-indonesia { top: 20% !important; left: 40% !important; }
        #info-philippines { top: 20% !important; left: 75% !important; }
        #circle-srilanka { top: 30% !important; left: 15% !important; }
        #circle-cambodia { top: 30% !important; left: 45% !important; }
        #circle-india { top: 30% !important; left: 75% !important; }
        #info-srilanka { top: 40% !important; left: 14% !important; }
        #info-cambodia { top: 40% !important; left: 43% !important; }
        #info-india { top: 40% !important; left: 75% !important; }
        #circle-myanmar { top: 50% !important; left: 15% !important; }
        #circle-foyer { top: 50% !important; left: 45% !important; }
        #circle-nepal { top: 50% !important; left: 75% !important; }
        #info-myanmar { top: 60% !important; left: 15% !important; }
        #info-foyer { top: 60% !important; left: 43% !important; }
        #info-nepal { top: 60% !important; left: 74% !important; }
    }
</style>
@endsection

<div class="background">
    <div class="floating-container">
        @foreach([['japan','8%','20%','日本','#FF0000'],['indonesia','50%','15%','インドネシア','#6B5B95'],['cambodia','35%','40%','カンボジア','#88B04B'],['foyer','60%','70%','FOYER','#88B04B'],['philippines','80%','10%','フィリピン','#92A8D1'],['srilanka','25%','10%','スリランカ','#92A8D1'],['nepal','80%','65%','ネパール','#955251'],['india','60%','40%','インド','#FFA500'],['myanmar','45%','70%','ミャンマー','#FFD700']] as $c)
        <div id="circle-{{ $c[0] }}" class="circle" style="left: {{ $c[1] }}; top: {{ $c[2] }};" onclick="goToPage('{{ $c[0] }}')">
            <img src="{{ asset('img/'.$c[0].'.jpg') }}" alt="{{ ucfirst($c[0]) }}">
        </div>
        <div id="info-{{ $c[0] }}" class="info always-visible" style="left: calc({{ $c[1] }} - 1%); top: calc({{ $c[2] }} + 10%);">
            <h2 style="color: {{ $c[4] }}">{{ $c[3] }}</h2>
        </div>
        @endforeach
    </div>
    <div class="title-container">
        <h1>CWB</h1>
        <p>CWBはコミュニテイーワークを広げていくアジア８か国のネットワークです。情報の交換だけでなく、現場（フィールド）での実践を重視し、違いを超えて（BEYOND）共生社会を目指します。そこから互いに学べますが問題も発生します。その課題解決の一つ一つが社会の変革になります。自分の常識を超え、組織の限界を超え、宗教も国境も超えて挑戦を続けることがCWBの使命です。</p>
    </div>
</div>

@php $homeVideo = \App\Models\HomeVideo::first(); @endphp
@if($homeVideo)
<div class="video-container">
    <div class="video-wrapper">
        <iframe src="{{ $homeVideo->video_url }}" frameborder="0" allowfullscreen></iframe>
    </div>
    <h3 class="video-title">{{ $homeVideo->video_title }}</h3>
</div>
@endif

<script>
    function goToPage(country) {
        window.location.href = `/${country}`;
    }
</script>
@endsection
