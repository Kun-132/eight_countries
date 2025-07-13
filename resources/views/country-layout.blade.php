<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* [Keep all your existing desktop styles exactly as they are] */
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

        /* Mobile-only changes (won't affect desktop at all) */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin-top: 30px;
            }

            .side-nav {
                position: absolute;
                top: 400px !important; /* Below cover image */
                left: 0;
                width: 100%;
                padding: 10px 15px;
                background-color: black;
                z-index: 1000;
                box-shadow: 0 2px 10px rgba(0,0,0,0.5);
                border-radius: 0;
                overflow-x: auto;
                white-space: nowrap;
            }

            .side-nav ul {
                display: inline-flex;
                gap: 10px;
                padding-bottom: 5px; /* For scroll area */
            }

            .side-nav ul li {
                margin: 0;
                flex-shrink: 0; /* Prevent items from shrinking */
            }

            .side-nav ul li a {
                padding: 8px 15px;
                font-size: 14px;
                white-space: nowrap;
            }

            .content {
                width: 100%;
                margin-left: 0;
                margin-top: 100px; /* Space for fixed nav */
                padding-top: 20px;
            }

            /* Adjust cover image for mobile */
            .cover-image img {
                height: 60px;
                top: 10px;
                left: 10px;
            }

            .cover-text {
                left: 15px;
                top: 55%;
                max-width: 90%;
            }

            .cover-text h1 {
                font-size: 24px;
            }

            .cover-text p {
                font-size: 14px;
            }

            .back-button {
                top: 20%;
                left: 5%;
                width: 35px;
                height: 35px;
                font-size: 18px;
            }

            .content-section img {
                width: 100%;
            }

            .content-section iframe {
                width: 100%;
                height: 220px;
            }

            .additional-images {
                flex-direction: column;
            }

            .additional-images img {
                width: 100% !important;
                max-width: 100% !important;
            }
        }

        /* For smaller mobile devices */
        @media (max-width: 480px) {
            .cover-image {
                height: 250px;
            }
            
            .side-nav {
                top: 250px;
            }
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach((section, index) => {
                section.style.display = index === 0 ? 'block' : 'none';
            });

            // Mobile-specific adjustments
            if (window.innerWidth <= 768) {
                adjustMobileLayout();
            }
        });

        function adjustMobileLayout() {
            const coverImage = document.querySelector('.cover-image');
            const sideNav = document.querySelector('.side-nav');
            const content = document.querySelector('.content');
            
            if (coverImage && sideNav && content) {
                // Set side nav position based on cover image height
                sideNav.style.top = coverImage.offsetHeight + 'px';
                
                // Adjust content margin to account for fixed nav
                content.style.marginTop = (sideNav.offsetHeight + 10) + 'px';
            }
        }

        function setActiveAndShowContent(event, id) {
            event.preventDefault();

            // Update active link
            document.querySelectorAll('.side-link').forEach(link => {
                link.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            // Show content
            showContent(id);

            // Scroll to section (with offset for fixed nav on mobile)
            const targetSection = document.getElementById(id);
            if (targetSection) {
                const offset = window.innerWidth <= 768 ? 
                    document.querySelector('.side-nav').offsetHeight + 20 : 0;
                
                window.scrollTo({
                    top: targetSection.offsetTop - offset,
                    behavior: 'smooth'
                });
            }
        }

        function fadeOut(element, callback) {
            element.style.opacity = 1;
            const fadeEffect = setInterval(function() {
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
            const fadeEffect = setInterval(function() {
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

        // Handle window resize (only for mobile adjustments)
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                adjustMobileLayout();
            } else {
                // Reset any mobile-specific styles if resizing back to desktop
                const sideNav = document.querySelector('.side-nav');
                const content = document.querySelector('.content');
                if (sideNav && content) {
                    sideNav.style.top = '';
                    content.style.marginTop = '';
                }
            }
        });
    </script>
</body>
</html>