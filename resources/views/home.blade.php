@extends('layout') <!-- Extend the layout file -->

@section('title', 'Home Page') <!-- Set the title -->

@section('content') <!-- Inject content into the layout -->

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
  overflow: hidden; /* Ensures the image stays within the circle */
  border: 2px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
  animation: float 6s infinite ease-in-out, fadeIn 1.5s ease-out forwards;
  opacity: 0; /* Start invisible */
  transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
  cursor: pointer;
}
@keyframes fadeIn {
  from {
      opacity: 0;
  }
  to {
      opacity: 1;
  }
}
.circle img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures the image covers the circle without distortion */
  transition: transform 0.3s;
}

.circle:hover img {
  transform: scale(1.2); /* Zoom effect on hover */
}
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
  opacity: 0; /* Start invisible */
  transform: translateY(0); /* No initial offset */
  animation: fadeIn 1.5s ease-out forwards; /* Add animation */
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
  opacity: 0; /* Start invisible */
  animation: slideUp 1.5s ease-out 0.5s forwards; /* Animation */
  width: 30%;
}

.title-container h1 {
  margin: 0;
  font-size: 35px;
  font-weight: bold;
}

.title-container p {
  margin: 10px 0 0;
  font-size: 18px;
  color: rgba(255, 255, 255, 0.8);
}

/* Animation Keyframes */
@keyframes slideUp {
  from {
      opacity: 0;
      transform: translateY(50px);
  }
  to {
      opacity: 1;
      transform: translateY(0);
  }
}

footer .demo {
  position: absolute;
  bottom: 10px;
  width: 500px;
  margin: 0 auto;
}

footer .demo a {
  text-align: center;
  color: var(--black);
  text-decoration: none;
  font-weight: 100;
  border-bottom: 1px solid var(--black);
}
</style>
@endsection


<!-- Home page starts here -->
<div class="background">
    <div class="floating-container">
        <!-- Japan -->
        <div class="circle" style="top: 20%; left: 8%;" onclick="goToPage('japan')">
            <img src="{{ asset('img/japan.jpg') }}" alt="Japan">
        </div>
        <div class="info" style="top: 31%; left: 7%;animation-delay: 0.5s; animation-name: fadeIn;">
            <h2 style="color: #FF0000;">日本</h2>
        </div>

        <!-- Indonesia -->
        <div class="circle" style="top: 15%; left: 50%; animation-delay: 0.7s;" onclick="goToPage('indonesia')">
            <img src="{{ asset('img/indonesia.jpg') }}" alt="Indonesia">
        </div>
        <div class="info" style="top: 26%; left: 48%;animation-delay: 0.7s; animation-name: fadeIn;">
            <h2 style="color: #6B5B95;">インドネシア</h2>
        </div>

        <!-- Cambodia -->
        <div class="circle" style="top: 40%; left: 35%; animation-delay: 0.9s;" onclick="goToPage('cambodia')">
            <img src="{{ asset('img/cambodia.jpg') }}" alt="Cambodia">
        </div>
        <div class="info" style="top: 51%; left: 33%;animation-delay: 0.9s; animation-name: fadeIn;">
            <h2 style="color: #88B04B;">カンボジア</h2>
        </div>
        <!-- Foyer -->
        <div class="circle" style="top: 70%; left: 60%; animation-delay: 0.9s;" onclick="goToPage('foyer')">
            <img src="{{ asset('img/cambodia.jpg') }}" alt="Foyer">
        </div>
        <div class="info" style="top: 82%; left: 58%;animation-delay: 0.9s; animation-name: fadeIn;">
            <h2 style="color: #88B04B;">ホワイエFOYER</h2>
        </div>

        <!-- Phillipine -->
        <div class="circle" style="top: 10%; left: 80%; animation-delay: 1.1s;" onclick="goToPage('philippines')">
            <img src="{{ asset('img/philippines.jpg') }}" alt="Philippines">
        </div>
        <div class="info" style="top: 21%; left: 78%;animation-delay: 1.1s; animation-name: fadeIn;">
            <h2 style="color: #92A8D1;">フィリピン</h2>
        </div>
        
        <!-- SiriLanka -->
        <div class="circle" style="top: 10%; left: 25%; animation-delay: 1.1s;" onclick="goToPage('srilanka')">
            <img src="{{ asset('img/srilanka.jpg') }}" alt="Sri Lanka">
        </div>
        <div class="info" style="top: 21%; left: 23%;animation-delay: 1.1s; animation-name: fadeIn;">
            <h2 style="color: #92A8D1;">スリランカ</h2>
        </div>

        <!-- Nepal -->
        <div class="circle" style="top: 65%; left: 80%; animation-delay: 1.3s" onclick="goToPage('nepal')">
            <img src="{{ asset('img/nepal.jpg') }}" alt="Nepal">
        </div>
        <div class="info" style="top: 76%; left: 79%;animation-delay: 1.3s; animation-name: fadeIn;">
            <h2 style="color: #955251;">ネパール</h2>
        </div>

        <!-- India -->
        <div class="circle" style="top: 40%; left: 60%; animation-delay: 1.5s" onclick="goToPage('india')">
            <img src="{{ asset('img/india.jpg') }}" alt="India">
        </div>
        <div class="info" style="top: 51%; left: 59%;animation-delay: 1.5s; animation-name: fadeIn;">
            <h2 style="color: #FFA500;">インド</h2>
        </div>

        <!-- Myanmar -->
        <div class="circle" style="top: 70%; left: 45%;animation-delay: 1.7s" onclick="goToPage('myanmar')">
            <img src="{{ asset('img/myanmar.jpg') }}" alt="Myanmar">
        </div>
        <div class="info" style="top: 81%; left: 43%;animation-delay: 1.7s; animation-name: fadeIn; ">
            <h2 style="color: #FFD700">ミャンマー</h2>
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
