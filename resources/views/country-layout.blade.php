<!-- resources/views/myanmar-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: black;
        }

        .cover-image img {
            height: 100px;
            position: absolute;
            top: 20px;
            left: 15px;
        }

        .cover-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
        }

        .cover-image {
            position: relative;
            width: 100%;
            height: 300px;
            background-color: #333;
        }

        .cover-text {
            position: absolute;
            top: 55%;
            left: 60px;
            color: white;
            z-index: 2;
            max-width: 50%;
            text-align: left;
        }

        .cover-text h1 {
            font-size: 36px;
            margin: 0 0 10px;
        }

        .cover-text p {
            font-size: 18px;
            line-height: 1.4;
            margin: 0;
        }

        .back-button {
            position: absolute;
            top: 40%;
            left: 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 2px solid white;
            border-radius: 50%;
            text-decoration: none;
            color: white;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.8);
            color: rgba(255, 255, 255, 0.8);
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1300px;
            margin-top: 20px;
        }

        .side-nav {
            width: 25%;
            position: sticky;
            top: 40%;
            align-self: flex-start;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
        }

        .side-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .side-nav ul li {
            margin: 10px 0;
        }

        .side-nav ul li a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
            opacity: 0.7;
        }

        .side-nav ul li a:hover {
            background-color: #333;
            opacity: 1;
        }

        .side-nav ul li a.active {
            background-color: rgb(99, 94, 94);
            color: white;
            font-weight: bold;
            opacity: 1;
        }

        .content {
            width: 75%;
            margin-left: 5%;
        }
        

        .content-section {
            margin-bottom: 110px;
        }

        .content-section img {
            width: 850px;
            height: auto;
        }

        .content-section iframe {
            width: 900px;
            height: 400px;
            border: none;
            border-radius: 10px;
        }

        .content-section h2 {
            margin: 20px 0 20px;
            font-size: 24px;
            color: #FFFFFF;
        }

        .content-section p {
            font-size: 16px;
            color: #FFFFFF;
            line-height: 1.6;
        }

        .additional-images {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .additional-images img {
            width: 50%;
            max-width: 420px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="cover-image">
        <img src="{{ asset('img/logo.png') }}" alt="CWB Logo">
        <a href="{{ url('/') }}" class="back-button"><i class="fas fa-arrow-left"></i></a>
        <div class="cover-text">
            <h1>@yield('cover-title')</h1>
            <p>@yield('cover-paragraph')</p>
        </div>
    </div>

    <div class="container">
        <div class="side-nav">
            <ul>
                @foreach($contents as $content)
                    <li>
                        <a href="#{{ $content->section_id }}"
                           class="side-link {{ $loop->first ? 'active' : '' }}"
                           onclick="setActiveAndShowContent(event, '{{ $content->section_id }}')">
                            {{ $content->side_nav_link_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach((section, index) => {
                section.style.display = index === 0 ? 'block' : 'none';
            });
        });

        function setActiveAndShowContent(event, id) {
            event.preventDefault();

            // Remove 'active' from all links
            document.querySelectorAll('.side-link').forEach(link => {
                link.classList.remove('active');
            });

            // Add 'active' to clicked link
            event.currentTarget.classList.add('active');

            // Show the corresponding content section
            showContent(id);

            // Scroll to the section
            const targetSection = document.getElementById(id);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function fadeOut(element, callback) {
            element.style.opacity = 1;
            const fadeEffect = setInterval(function () {
                if (element.style.opacity > 0) {
                    element.style.opacity -= 0.1;
                } else {
                    clearInterval(fadeEffect);
                    element.style.display = "none";
                    if (callback) callback();
                }
            }, 30);
        }

        function fadeIn(element) {
            element.style.display = "block";
            element.style.opacity = 0;
            const fadeEffect = setInterval(function () {
                if (element.style.opacity < 1) {
                    element.style.opacity = parseFloat(element.style.opacity) + 0.1;
                } else {
                    clearInterval(fadeEffect);
                }
            }, 30);
        }

        function showContent(id) {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                if (section.id !== id && section.style.display !== 'none') {
                    fadeOut(section);
                }
            });

            const target = document.getElementById(id);
            if (target && target.style.display === 'none') {
                setTimeout(() => fadeIn(target), 300);
            }
        }
    </script>
</body>
</html>
