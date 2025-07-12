<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .events-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .event-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }

        .event-item:hover {
            transform: scale(1.02);
        }

        .event-image {
            width: 100%;
            height: auto;
        }

        .event-details {
            padding: 15px;
        }

        .event-title {
            font-size: 1.2em;
            margin: 0 0 10px;
        }

        .event-location,
        .event-price,
        .event-date {
            margin: 5px 0;
        }

        .return-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }

        .return-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div id="upcoming-events" class="main-content">

    <a href="javascript:history.back()" class="return-button">Back</a>

    <div class="events-container">
        <div class="event-item">
            <img src="{{ asset('images/5.jpg') }}" alt="Lila Ajab" class="event-image">
            <div class="event-details">
                <h3 class="event-title">LIZA</h3>
                <p class="event-location">Théâtre municipal de Tunis</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 19 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/6.jpg') }}" alt="Yasin Salhi à Seliana" class="event-image">
            <div class="event-details">
                <h3 class="event-title">THEWEEKEND</h3>
                <p class="event-location">Maison De Culture</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 19 Octobre 2024 à 18:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/11.jpg') }}" alt="Scandinavian Soundscapes" class="event-image">
            <div class="event-details">
                <h3 class="event-title">CENTRAL CEE</h3>
                <p class="event-location">Théâtre municipal de Tunis</p>
                <p class="event-price">25 TND</p>
                <p class="event-date"><strong>Date:</strong> 20 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/9.jpg') }}" alt="Event 4" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 4</h3>
                <p class="event-location">Location 4</p>
                <p class="event-price">30 TND</p>
                <p class="event-date"><strong>Date:</strong> 21 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/10.jpg') }}" alt="Event 5" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 5</h3>
                <p class="event-location">Location 5</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 22 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/12.jpg') }}" alt="Event 6" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 6</h3>
                <p class="event-location">Location 6</p>
                <p class="event-price">10 TND</p>
                <p class="event-date"><strong>Date:</strong> 23 Octobre 2024 à 18:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/13.jpg') }}" alt="Event 7" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 7</h3>
                <p class="event-location">Location 7</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 24 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/14.jpg') }}" alt="Event 8" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 8</h3>
                <p class="event-location">Location 8</p>
                <p class="event-price">25 TND</p>
                <p class="event-date"><strong>Date:</strong> 25 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/15.jpg') }}" alt="Event 9" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 9</h3>
                <p class="event-location">Location 9</p>
                <p class="event-price">30 TND</p>
                <p class="event-date"><strong>Date:</strong> 26 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/24.jpg') }}" alt="Event 10" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 10</h3>
                <p class="event-location">Location 10</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 27 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/21.jpg') }}" alt="Event 11" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 11</h3>
                <p class="event-location">Location 11</p>
                <p class="event-price">20 TND</p>
                <p class="event-date"><strong>Date:</strong> 28 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/18.jpg') }}" alt="Event 12" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 12</h3>
                <p class="event-location">Location 12</p>
                <p class="event-price">25 TND</p>
                <p class="event-date"><strong>Date:</strong> 29 Octobre 2024 à 20:00</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/19.jpg') }}" alt="Event 13" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 13</h3>
                <p class="event-location">Location 13</p>
                <p class="event-price">30 TND</p>
                <p class="event-date"><strong>Date:</strong> 30 Octobre 2024 à 19:30</p>
            </div>
        </div>

        <div class="event-item">
            <img src="{{ asset('images/20.jpg') }}" alt="Event 14" class="event-image">
            <div class="event-details">
                <h3 class="event-title">Event 14</h3>
                <p class="event-location">Location 14</p>
                <p class="event-price">15 TND</p>
                <p class="event-date"><strong>Date:</strong> 31 Octobre 2024 à 20:00</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>
