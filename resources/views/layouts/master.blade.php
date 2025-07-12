<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .header-section {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 100vh;
            background-image: url("/images/7.jpg");
            background-size: cover;
            background-position: center;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: opacity 0.5s;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            padding: 20px 50px;
            background-color: rgba(113, 109, 109, 0.2);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            z-index: 3;
            font-size: 1.2em;
            opacity: 1;
            transition: transform 0.5s ease, opacity 0.5s ease;
            transform: translateY(-100%);
        }

        .nav-links.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .logo {
            font-size: 2em;
            font-weight: bold;
            color: #fff;
            margin-right: 20px;
        }

        .divider {
            width: 2px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .nav-links-container {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 10px;
            position: relative;
            transition: background-color 0.3s, transform 0.3s;
        }

        .nav-link:hover {
            background-color: rgba(12, 12, 12, 0.3);
            transform: scale(1.05);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.2);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            transition: background-color 0.3s, transform 0.3s;
            border-radius: 5px;
        }

        .dropdown-content a:hover {
            background-color: rgba(12, 12, 12, 0.3);
            transform: scale(1.05);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .main-content {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            z-index: 3;
            transform: translateY(100%);
            transition: transform 0.5s ease;
            backdrop-filter: blur(10px);
        }

        .main-content.show {
            transform: translateY(0);
        }

        .event-image {
            width: 100%;
            height: 750px;
            object-fit: contain;
            border-radius: 10px;
            margin: 0 auto;
            opacity: 0;
            transition: opacity 0.5s;
            display: none;
        }

        .event-image.active {
            display: block;
            opacity: 1;
        }
    </style>
</head>
<body>

    <div class="header-section">
        <div class="overlay"></div>
        <div class="nav-links" id="navbar">
            <div class="logo">EVENTIFY</div>
            <div class="divider"></div>
            <div class="nav-links-container">
                <a href="#" class="nav-link" id="highlights-link">Highlights</a>
                <div class="dropdown">
                    <a href="#" class="nav-link">Events</a>
                    <div class="dropdown-content">
                        <a href="{{ url('/events') }}">Onsite Events</a>
                        <a href="{{ url('/virtual-events') }}">Virtual Events</a>
                    </div>
                </div>
                <a href="{{ url('/events_gallery') }}" class="nav-link">Gallery</a>
                <a href="{{ url('/merch') }}" class="nav-link">Merchandise</a>
                <a href="{{ url('/profile') }}"  class="nav-link">Profile</a>
            </div>
        </div>
    </div>

    <main>
        <div class="main-content">
            <img src="/images/54.jpg" alt="Highlight 1" class="event-image">
            <img src="/images/59.png" alt="Highlight 2" class="event-image">
            <img src="/images/56.jpg" alt="Highlight 3" class="event-image">
        </div>
    </main>

    <script>
        const highlightsLink = document.getElementById('highlights-link');
        const navbar = document.getElementById('navbar');
        const mainContent = document.querySelector('.main-content');
        const images = document.querySelectorAll('.event-image');
        let currentIndex = 0;
        let interval;

        window.addEventListener('load', () => {
            navbar.classList.add('visible');
        });

        highlightsLink.addEventListener('click', function(event) {
            event.preventDefault();
            navbar.classList.remove('visible');
            mainContent.classList.add('show');
            startSlideshow();
        });

        mainContent.addEventListener('click', function() {
            navbar.classList.add('visible');
            mainContent.classList.remove('show');
            clearInterval(interval);
            images.forEach(img => img.classList.remove('active'));
        });

        function startSlideshow() {
            images.forEach(img => img.classList.remove('active'));
            images[currentIndex].classList.add('active');

            interval = setInterval(() => {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            }, 2000);
        }
    </script>
</body>
</html>
