<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Include GSAP for smooth animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <style>
        /* Splash Screen */
        #splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff; /* Background color */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            overflow: hidden;
        }

        /* Container for Logo and Title */
        #splash-content {
            display: flex;
            align-items: center;
            gap: 20px; /* Space between logo and title */
        }

        /* Logo */
        #splash-logo {
            width: 500px; /* Increased logo size */
            height: auto;
            opacity: 0; /* Initially hidden */
            filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.2)); /* Add shadow to logo */
        }

        /* Website Name */
        #splash-title {
            font-size: 28px;
            color: #000; /* Adjust color */
            opacity: 0; /* Initially hidden */
            font-family: 'Arial', sans-serif; /* Change font if needed */
            font-weight: bold;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow to text */
        }

        /* Hide website content initially */
        #content {
            display: none;
            opacity: 0; /* Initially hidden */
            transition: opacity 1s ease-in-out; /* Smooth transition */
        }
    </style>
</head>
<body>

    <!-- Full Page Splash Screen -->
    <div id="splash-screen">
        <div id="splash-content">
            <img id="splash-logo" src="images/Alcryptonz_White_transparent.png" alt="Website Logo">
            {{-- <h1 id="splash-title">Alcryptonz</h1> <!-- Update with your website name --> --}}
        </div>
    </div>

    <!-- Website Content -->
    <div id="content">
        @yield('content')
    </div>

    <script>
        // GSAP Animation for Logo
        gsap.fromTo("#splash-logo", 
            { x: "-100%", opacity: 0, scale: 0.8 },  // Start from the left with smaller size
            { x: "0%", opacity: 1, scale: 1, duration: 1.5, ease: "power3.out" } // Move to center and scale up
        );

        // GSAP Animation for Title
        gsap.fromTo("#splash-title", 
            { x: "100%", opacity: 0, scale: 0.8 },  // Start from the right with smaller size
            { x: "0%", opacity: 1, scale: 1, duration: 1.5, ease: "power3.out", delay: 0.3 } // Move to center and scale up
        );

        // Hide Splash Screen after 3 seconds
        setTimeout(function() {
            gsap.to("#splash-screen", { 
                opacity: 0, 
                duration: 1.5, 
                ease: "power3.inOut", 
                onComplete: function() {
                    document.getElementById("splash-screen").style.display = "none";
                    gsap.to("#content", { opacity: 1, duration: 1, ease: "power3.out" });
                    document.getElementById("content").style.display = "block";
                }
            });
        }, 2000); // 3-second delay
    </script>

</body>
</html>