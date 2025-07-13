<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CWB')</title>
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Global CSS file -->

    <!-- Page-specific styles -->
    @yield('styles') <!-- This allows child views to inject their own CSS -->

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: black;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

        .header {
            position: absolute;
            top: 20px;
            left: 15px;
            z-index: 100; /* Ensure logo stays above other elements */
        }

        .header img {
            height: 80px; /* Reduced for mobile */
            width: auto; /* Maintain aspect ratio */
        }

        .content {
            position: relative;
            width: 100%;
            min-height: 100vh;
            overflow: hidden; /* Prevent content from overflowing */
        }

        footer {
            position: relative;
            text-align: center;
            padding: 20px 0;
            background: black;
            z-index: 10;
        }

        footer p {
            color: white;
            margin: 0;
            font-size: 14px;
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .header {
                top: 10px;
                left: 10px;
            }
            
            .header img {
                height: 60px; /* Smaller logo on mobile */
            }
        }

        /* Very small screens */
        @media (max-width: 480px) {
            .header img {
                height: 50px;
            }
        }
    </style>
</head>
<body>

    <!-- Logo Section -->
    <div class="header">
        <img src="{{ asset('img/logo.png') }}" alt="CWB Logo">
    </div>

    <!-- Content Section -->
    <div class="content">
        @yield('content') <!-- Content will be injected here -->
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Copyright Reserved by CWB</p>
    </footer>
</body>
</html>