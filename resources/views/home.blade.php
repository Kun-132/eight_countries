@extends('layout') <!-- Extend the layout file -->

@section('title', 'Home Page') <!-- Set the title -->

@section('content') <!-- Inject content into the layout -->

<!-- Nav Bar -->

<div class="wrapper">
  <input type="checkbox" id="toogle" class="hidden-trigger">
  <label for="toogle" class="cc">
<svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="48" xml:space="preserve" version="1.1" viewBox="0 0 48 48">
    <image width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAbElEQVR4Ae3XwQnFQAiE4eVVsGAP1mkPFjwvQvYSWCQYCYGZv4Dv5MGB5ghcIiDQI+kCftCzNsAR8y5gYu2rwCBAgMBTgEC3rek2yQEtAZoDjso8AyaKexmIDJUZD40AAQIE0gwx449GgMC9/t0b7GTsa7J+AAAAAElFTkSuQmCC"></image>
  </svg>
  </label>
  
  <div class="subs">
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub1" class="hidden-sub-trigger"  onclick="goToPage('japan')">
        <label for="sub1">
            <img src="{{ asset('img/flags/japan.png') }}" alt="Japan Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub2" class="hidden-sub-trigger"  onclick="goToPage('philippines')">
        <label for="sub2">
            <img src="{{ asset('img/flags/phillipine.png') }}" alt="Philippines Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub3" class="hidden-sub-trigger"  onclick="goToPage('indonesia')">
        <label for="sub3">
            <img src="{{ asset('img/flags/indonesia.jpg') }}" alt="Indonesia Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub4" class="hidden-sub-trigger"  onclick="goToPage('india')">
        <label for="sub4">
            <img src="{{ asset('img/flags/india.png') }}" alt="India Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub5" class="hidden-sub-trigger"  onclick="goToPage('nepal')">
        <label for="sub5">
            <img src="{{ asset('img/flags/nepal.png') }}" alt="Nepal Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub6" class="hidden-sub-trigger"  onclick="goToPage('japan')">
        <label for="sub6">
            <img src="{{ asset('img/flags/philippines.png') }}" alt="Philippines Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub7" class="hidden-sub-trigger"  onclick="goToPage('japan')">
        <label for="sub7">
            <img src="{{ asset('img/flags/cambodia.png') }}" alt="Cambodia Flag">
        </label>
    </button>
    <button class="sub-cc">
        <input value="1" name="sub-circle" type="radio" id="sub8" class="hidden-sub-trigger"  onclick="goToPage('japan')">
        <label for="sub8">
            <img src="{{ asset('img/flags/myanmar.png') }}" alt="Myanmar Flag">
        </label>
    </button>
</div>
</div>

<!-- Nav Bar ends here -->

<!-- Home page starts here -->
    <div class="background">

        <div class="floating-container">
            <!-- Japan -->
            <div class="circle" style="top: 20%; left: 15%;" onclick="goToPage('japan')">
    <img src="{{ asset('img/japan.jpg') }}" alt="Japan">
            </div>
            <div class="info" style="top: 20%; left: 20%; animation-delay: 0.5s;">
                <h2 style="color: #FF0000;">CWBジャパン</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>

            <!-- Indonesia -->
            <div class="circle" style="top: 15%; left: 50%; animation-delay: 0.7s;" onclick="goToPage('indonesia')">
                <img src="{{ asset('img/indonesia.jpg') }}" alt="Indonesia"></div>
            <div class="info" style="top: 15%; left: 35%;">
                <h2 style="color: #6B5B95;">CWBインドネシア</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>

            <!-- Cambodia -->
            <div class="circle" style="top: 40%; left: 35%; animation-delay: 0.9s;" onclick="goToPage('cambodia')">
            <img src="{{ asset('img/cambodia.jpg') }}" alt="Cambodia">
            </div>
            <div class="info" style="top: 40%; left: 40%;">
                <h2 style="color: #88B04B;">CWBカンボジア</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>

            <!-- Malaysia -->
            <!-- <div class="circle" style="top: 60%; left: 70%;">
            <img src="{{ asset('img/napal.jpg') }}" alt="Indonesia">
            </div>
            <div class="info" style="top: 60%; left: 75%;">
                <h2 style="color: #F7CAC9;">Vietnam</h2>
                <p>Truly Asia</p>
            </div> -->

            <!-- Phillipine -->
            <div class="circle" style="top: 10%; left: 80%; animation-delay: 1.1s;" onclick="goToPage('philippines')">
            <img src="{{ asset('img/philippines.jpg') }}" alt="Philippines">
            </div>
            <div class="info" style="top: 10%; left: 65%;">
                <h2 style="color: #92A8D1;">CWBフィリピン</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>

            <!-- Nepal -->
            <div class="circle" style="top: 65%; left: 70%; animation-delay: 1.3s" onclick="goToPage('nepal')">
                <img src="{{ asset('img/nepal.jpg') }}" alt="Nepal">
            </div>
            <div class="info" style="top: 65%; left: 55%;">
                <h2 style="color: #955251;">CWBネパール</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>

            <!-- India -->
            <div class="circle" style="top: 40%; left: 60%; animation-delay: 1.5s" onclick="goToPage('india')">
            <img src="{{ asset('img/india.jpg') }}" alt="India">
            </div>
            <div class="info" style="top: 40%; left: 65%;">
                <h2 style="color: #FFA500;">CWBインド</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>

            <!-- Myanmar -->
            <div class="circle" style="top: 70%; left: 45%;animation-delay: 1.7s" onclick="goToPage('myanmar')">
                <img src="{{ asset('img/myanmar.jpg') }}" alt="Myanmar">
            </div>
            <div class="info" style="top: 70%; left: 50%; ">
                <h2 style="color: #FFD700">CWBミャンマー</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit labore ipsum, maxime libero architecto dolorem ear</p>
            </div>
        </div>
        <div class="title-container">
            <h1>CWB</h1>
            <p>CWBはコミュニテイーワークを広げていくアジア８か国のネットワークです。情報の交換だけでなく、現場（フィールド）での実践を重視し、違いを超えて（BEYOND）共生社会を目指します。そこから互いに学べますが問題も発生します。その課題解決の一つ一つが社会の変革になります。自分の常識を超え、組織の限界を超え、宗教も国境も超えて挑戦を続けることがCWBの使命です。</p>
        </div>  

    </div>
    
    @php
    $homeVideo = \App\Models\HomeVideo::first();
@endphp

@if($homeVideo)
<div style="text-align: center; margin-top: 40px;">

    <div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; max-width: 90%; margin: 0 auto;">
        <iframe 
            src="{{ $homeVideo->video_url }}"
            style="position: absolute; top: 40%; left: 50%; width: 70%; height: 70%; transform: translate(-50%, -50%); border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
            frameborder="0"
            allowfullscreen>
        </iframe>
        <h3 style="font-size: 20px; color:white">{{ $homeVideo->video_title }}</h3>

    </div>

</div>
@endif


    <script>
    function goToPage(country) {
        window.location.href = `/${country}`;
    }
</script>
    @endsection
