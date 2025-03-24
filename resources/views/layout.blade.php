<!-- resources/views/layout.blade.php -->
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

        }
    </style>
</head>
<body>
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