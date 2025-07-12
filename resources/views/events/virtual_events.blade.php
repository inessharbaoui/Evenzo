<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Event Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: black;
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .header-section {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
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

        .events-section {
            position: relative;
            padding: 30px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            z-index: 3;
            margin: 0;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            height: calc(100vh - 100px);
            overflow-y: auto;
            padding-top: 20px;
        }

        .events-section h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ffffff;
            position: sticky;
            top: 0;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px 0;
            z-index: 2;
        }

.event-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
    transition: transform 0.3s;
}

.badge {
    position: absolute;
    top: 10px;
    right: 10px;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 1em;
    font-weight: bold;
    font-family: 'Times New Roman';

}


.vip {
    background-color:   #3498db;
}

.regular {
    background-color:#e74c3c ;
}

        .event-image {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 20px;
            background-color: #ccc;
        }

        .event-info {
            text-align: left;
            color: #ffffff;
            flex-grow: 1;
        }

        .event-info h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .event-info p {
            font-size: 1em;
            margin: 5px 0;
            color: #dddddd;
        }

        .see-more-btn {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .see-more-btn:hover {
            background-color: white;
            color: black;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 4;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: black;
            border-radius: 10px;
            padding: 20px;
            max-width: 1000px;
            width: 90%;
            position: relative;
            color: white;
            display: flex;
            gap: 20px;
        }

        .popup-content img {
            width: 350px;
            height: auto;
            border-radius: 10px;
        }

        .popup-content h3 {
            font-size: 2.5em;
            margin-top: 0;
        }

        .popup-content p {
            font-size: 1.2em;
            margin: 5px 0;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            color: white;
        }

        .ticket-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .buy-ticket-btn {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .buy-ticket-btn:hover {
            background-color: white;
            color: black;
        }
        .back-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: transparent;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            color: white;
        }

    </style>
</head>
<body>
    <div class="header-section">
        <div class="overlay"></div>
        <h1 style="color: white; font-size: 2em;">Event Management</h1>
    </div>

    <div class="events-section">
        <h2>Upcoming Events</h2>
        <button class="back-btn" onclick="goBack()">←</button>
        @foreach($events as $event)
    @if(strtolower($event->type) === 'regular' || strtolower($event->type) === 'premium')
    <div class="event-card">
        <span class="badge {{ strtolower($event->type) === 'premium' ? 'regular' : 'vip' }}">
            {{ ucfirst(trim($event->type)) }}
        </span>

        <img src="{{ asset('storage/' . $event->photo_path) }}" alt="{{ $event->name }}" class="event-image">
        <div class="event-info">
            <h3>{{ $event->name }}</h3>
            <p>Location: {{ $event->location }}</p>
            <p>Duration: {{ $event->duration }} minutes</p>
            <p>Artist: {{ $event->artist }}</p>
            <p>Price: ${{ number_format($event->price, 2) }}</p>
            <p>Max Attendees: {{ $event->max_attendees }}</p>
        </div>
        <button class="see-more-btn" onclick="openPopup({{ json_encode($event) }})">See More</button>
    </div>
    @endif
@endforeach

    </div>



    <div id="popup" class="popup-overlay">
        <div class="popup-content">
            <button class="close-btn" onclick="closePopup()">×</button>
            <img id="popup-image" src="" alt="Event Image">
            <div>
                <h3 id="popup-name"></h3>
                <p id="popup-location"></p>
                <p id="popup-duration"></p>
                <p id="popup-artist"></p>
                <p id="popup-price"></p>
                <p id="popup-max-attendees"></p>
                <div class="ticket-container">
                    <button class="buy-ticket-btn">Buy Ticket</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openPopup(event) {
            document.getElementById('popup-image').src = '/storage/' + event.photo_path;
            document.getElementById('popup-name').textContent = event.name;
            document.getElementById('popup-location').textContent = 'Location: ' + event.location;
            document.getElementById('popup-duration').textContent = 'Duration: ' + event.duration + ' minutes';
            document.getElementById('popup-artist').textContent = 'Artist: ' + event.artist;
            document.getElementById('popup-price').textContent = 'Price: $' + event.price;
            document.getElementById('popup-max-attendees').textContent = 'Max Attendees: ' + event.max_attendees;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
