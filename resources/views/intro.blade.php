<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { width: 100%; height: 100%; font-family: Arial, sans-serif; overflow: hidden; }

        .intro-container {
            width: 100%;
            height: 100vh;
            position: relative;
        }

        .section {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding: 50px;
            color: white;
            opacity: 0;
            visibility: hidden;
            z-index: 1;
            animation-duration: 1.5s;
            animation-fill-mode: forwards;
        }

        .section.active {
            opacity: 1;
            visibility: visible;
            z-index: 2;
            animation-name: fadeIn;
        }

        .section.fade-out {
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                visibility: hidden;
            }
            to {
                opacity: 1;
                visibility: visible;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                visibility: visible;
            }
            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.9;
            z-index: -1;
        }

        .text-box {
            width: 40%;
            position: absolute;
            bottom: 80px;
            left: 50px;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }

        .description {
            font-size: 18px;
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 1s ease-in-out 0.3s, transform 1s ease-in-out 0.3s;
        }

        .section.active .title {
            opacity: 1;
            transform: translateY(0);
        }

        .section.active .description {
            opacity: 1;
            transform: translateX(0);
        }

        .buttons {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 3;
        }

        .btn {
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 10px;
            border-radius: 5px;
        }

        .btn:hover {
            background: rgba(0, 0, 0, 0.9);
        }
    </style>
</head>
<body>

<div class="intro-container">
    <!-- Section 1 -->
    <div class="section active">
        <div class="bg-overlay" style="background-image: url('{{ asset('img/intro1.jpeg') }}');"></div>
        <div class="text-box">
            <h1 class="title">Welcome to Our Platform</h1>
            <p class="description">This is a non-profit organization supporting Southeast Asia.</p>
        </div>
    </div>

    <!-- Section 2 -->
    <div class="section">
        <div class="bg-overlay" style="background-image: url('{{ asset('img/intro2.jpg') }}');"></div>
        <div class="text-box">
            <h1 class="title">Our Mission</h1>
            <p class="description">We strive to make a difference by providing resources and support.</p>
        </div>
    </div>

    <!-- Section 3 -->
    <div class="section">
        <div class="bg-overlay" style="background-image: url('{{ asset('img/intro3.jpg') }}');"></div>
        <div class="text-box">
            <h1 class="title">Get Involved</h1>
            <p class="description">Join us in our mission to create a better future.</p>
        </div>
    </div>

    <div class="buttons">
        <button class="btn" id="skipBtn">Skip</button>
        <button class="btn" id="nextBtn">Next</button>
    </div>
</div>

<script>
   $(document).ready(function() {
    let currentIndex = 0;
    const sections = $(".section");
    const totalSections = sections.length;

    function changeSection(index) {
        const currentSection = $(sections[currentIndex]);
        const nextSection = $(sections[index]);

        // Fade out the current section
        currentSection.removeClass("active").addClass("fade-out");

        // Wait for the fade-out animation to complete
        currentSection.on("animationend", function() {
            currentSection.removeClass("fade-out");

            // Fade in the next section
            nextSection.addClass("active");

            // Update the current index
            currentIndex = index;

            // Check if it's the last section
            if (currentIndex === totalSections - 1) {
                // Change the Skip button to Enter
                $("#skipBtn").text("Enter");
                $("#nextBtn").hide(); // Hide the Next button
            }
        });
    }

    // Handle Next button click
    $("#nextBtn").click(function() {
        if (currentIndex < totalSections - 1) {
            changeSection(currentIndex + 1);
        }
    });

    // Handle Skip/Enter button click
    $("#skipBtn").click(function() {
        window.location.href = "{{ url('home') }}"; // Redirect to home page
    });
});
</script>

</body>
</html>