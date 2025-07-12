<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

     <div class="header-section">
        <div class="overlay"></div>
        <div class="nav-links">
            <a href="#about-us" class="nav-link">About Us</a>
            <a href="#contact-us" class="nav-link">Contact Us</a>
        </div>
        <div class="header-content">
            <h1 class="main-title">Let's Event Together!</h1>
            <h2 class="sub-title">Your events, simplified</h2>
            <p class="welcome-message">Welcome to our platform for managing events seamlessly.</p>
            <a href="{{ route('login') }}" class="get-started-btn">Get Started</a>
        </div>
    </div>
 <div id="upcoming-events" class="main-content">
    <h2 class="section-title">Upcoming Events</h2>
    <div class="events-container">
        <div class="event-item">
            <img src="images/5.jpg" alt="Lila Ajab" class="event-image">
            <div class="event-details">THEWEEKENSD</h3>
                <p class="event-location">STARBOY</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 19 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/6.jpg" alt="Yasin Salhi à Seliana" class="event-image">
            <div class="event-details">
                <h3 class="event-title">JENNIE</h3>
                <p class="event-location">Maison De Culture</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 19 Octobre 2024 à 18:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/11.jpg" alt="Scandinavian Soundscapes" class="event-image">
            <div class="event-details">
                <h3 class="event-title">LIZA</h3>
                <p class="event-location">Théâtre municipal de Tunis</p>
                <p class="event-price">25 TND</p>
                <p class="event-date"><strong>Date:</strong> 20 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/9.jpg" alt="Event 4" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 4</h3>
                <p class="event-location">Location 4</p>
                <p class="event-price">30 TND</p>
                <p class="event-date"><strong>Date:</strong> 21 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/10.jpg" alt="Event 5" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 5</h3>
                <p class="event-location">Location 5</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 22 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/12.jpg" alt="Event 6" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 6</h3>
                <p class="event-location">Location 6</p>
                <p class="event-price">10 TND</p>
                <p class="event-date"><strong>Date:</strong> 23 Octobre 2024 à 18:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/13.jpg" alt="Event 7" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 7</h3>
                <p class="event-location">Location 7</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 24 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/14.jpg" alt="Event 8" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 8</h3>
                <p class="event-location">Location 8</p>
                <p class="event-price">25 TND</p>
                <p class="event-date"><strong>Date:</strong> 25 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/15.jpg" alt="Event 9" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 9</h3>
                <p class="event-location">Location 9</p>
                <p class="event-price">30 TND</p>
                <p class="event-date"><strong>Date:</strong> 26 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/24.jpg" alt="Event 10" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 10</h3>
                <p class="event-location">Location 10</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 27 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/21.jpg" alt="Event 11" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 11</h3>
                <p class="event-location">Location 11</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 28 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/18.jpg" alt="Event 12" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 12</h3>
                <p class="event-location">Location 12</p>
                <p class="event-price">25 TND</p>
                <p class="event-date"><strong>Date:</strong> 29 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/19.jpg" alt="Event 13" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 13</h3>
                <p class="event-location">Location 13</p>
                <p class="event-price">10 TND</p>
                <p class="event-date"><strong>Date:</strong> 30 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/17.jpg" alt="Event 14" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 14</h3>
                <p class="event-location">Location 14</p>
                <p class="event-price">30 TND</p>
                <p class="event-date"><strong>Date:</strong> 31 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="images/23.jpg" alt="Event 15" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 15</h3>
                <p class="event-location">Location 15</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 1 Novembre 2024 à 19:30</p>
            </div>






    </div>
    </div>            <img src="images/27.jpg" alt="Concert Experience" class="additional-image">
 <a href="{{ route('login') }}" class="get-started-btn">See All Events</a>

 <div id="about-us" class="about-us-container">
    <h2 class="section-title">About Us</h2>
    <div class="about-content">
        <img src="images/25.jpg" alt="About Us" class="about-image">

        <div class="about-description-container">
            <p class="about-description">
                Welcome to Let's, your go-to destination for everything related to event management! Here, users can seamlessly join concerts, book tickets, and explore a wide range of events tailored to their interests. Our platform offers an intuitive interface that makes it easy to discover, plan, and enjoy the best experiences in live entertainment.
            </p>
            <p class="about-description">
                Whether you’re a music lover looking for the latest concerts or an event organizer seeking to streamline your ticket sales, we provide all the tools you need. Join us as we revolutionize the way you experience events—bringing excitement and convenience right to your fingertips!
            </p>
            <a href="{{ route('login') }}" class="get-started-btn">Join Us</a>

        </div>
    </div>




    <h2 class="section-title">Contact Us</h2>


    <div id="contact-us" class="contact-form">
        <form>  <div class="form-group">
                   <div id="confirmationMessage">
         Don't forget to leave your feedback! We read all reviews!.
        </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>

    </div>



 </div>
</div>
</div>
</div>


 <footer class="footer-section">
    <div class="footer-content">
        <p>&copy; 2024 Event Management System. All rights reserved.</p>
        <p>Contact us: <a href="mailto:info@eventmanagement.com">info@eventmanagement.com</a></p>
        <p>Follow us on:
            <a href="#">Facebook</a> |
            <a href="#">Twitter</a> |
            <a href="#">Instagram</a>
        </p>
    </div>
</footer>



    <script>
        const headerContent = document.querySelector('.header-content');

        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;

             const maxScroll = 10;

             if (scrollPosition > maxScroll) {
                headerContent.classList.add('hidden');
            } else {
                headerContent.classList.remove('hidden');
            }

        });




    const eventItems = document.querySelectorAll('.event-item');

    function revealEvents() {
        eventItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, index * 300);
        });
    }

    window.onload = function() {
        revealEvents();
    };

    </script>
</body>

</html>
