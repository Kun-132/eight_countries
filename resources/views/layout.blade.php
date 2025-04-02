<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CWB')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to your CSS file -->
    <style>
        body {
            overflow: hidden;
            font-family: 'Arial', sans-serif;
            background: black;
            margin: 0;
            padding: 0;
        }

        .header {
            position: absolute;
            top: 20px;
            left: 15px;
        }

        .header img {
            height: 100px;
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

    <!-- Footer (Optional) -->
    <footer>
        <p style='color: white'>&copy; 2025 Copyright Reserved by CWB</p>
    </footer>
</body>
</html>
