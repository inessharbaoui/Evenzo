<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Gallery - Event Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: "Times New Roman", serif;
            color: #333;
        }

        .header-section {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 120px;
            background-image: url("/images/7.jpg");
            background-size: cover;
            background-position: center;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            transition: opacity 0.5s;
            padding: 0 20px;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .header-text {
            z-index: 3;
            font-size: 3em;
            font-weight: bold;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .gallery-section {
            position: relative;
            padding: 100px 20px;
            margin-top: 120px;
            background: #fff;
            z-index: 3;
            border-radius: 10px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .event-card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .event-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .event-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        .event-card:hover .event-image {
            transform: scale(1.1);
        }

        .event-info {
            margin-top: 15px;
            text-align: left;
        }

        .event-info h3 {
            font-size: 1.6em;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        .event-info p {
            font-size: 1.1em;
            margin: 5px 0;
            color: #555;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 800px;
            width: 100%;
        }

        .popup-content img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .close-btn {
            background: transparent;
            border: none;
            font-size: 30px;
            color: #333;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        @media (max-width: 768px) {
            .header-text {
                font-size: 2.5em;
            }
            .gallery-section {
                padding: 80px 10px;
            }
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


.comments-section {
    background-color: #fff;
    border-radius: 15px;
    padding: 30px;
    margin-top: 30px;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    margin-left: 0;
    margin-right: 0;
    box-sizing: border-box;
}

.comments-section h2 {
    font-size: 2em;
    margin-bottom: 15px;
    color: #333;
    font-weight: bold;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 1em;
    resize: vertical;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

textarea:focus {
    border-color: #4CAF50;
    outline: none;
}

button {
    padding: 12px 20px;
    background-color: #0e100e;
    border: none;
    color: white;
    font-size: 1em;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    align-self: flex-start;
    margin-left:1500px;
}

button:hover {
    background-color: #131714;
}

#commentsList {
    margin-top: 30px;
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.comment-item {
    background-color: #fff;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
}

.comment-item p {
    font-size: 1.1em;
    margin-bottom: 10px;
    color: #333;
}

.comment-item small {
    font-size: 0.9em;
    color: #777;
    display: block;
}

    </style>
</head>
<body>

    <div class="header-section">
        <div class="overlay"></div>
        <div class="header-text">Past Events Gallery</div>
        <button class="back-btn" onclick="goBack()">←</button>

    </div>

    <div class="gallery-section">
        @foreach($events as $event)
            <div class="event-card" onclick="openPopup({{ json_encode($event) }})">
                @foreach($event->photos as $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt="Event Image" class="event-image">
                @endforeach
                <div class="event-info">
                    <h3>{{ $event->name }}</h3>
                    <p>Artist: {{ $event->artist }}</p>
                    <p>Date: {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="comments-section">
        <h2>Leave a Comment</h2>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <textarea name="text" rows="4" placeholder="Leave your comment..." required></textarea>
            <button type="submit">Submit</button>
        </form>

        <div id="commentsList"></div>
    </div>

    <div id="popup" class="popup-overlay" onclick="closePopup(event)">
        <div class="popup-content" onclick="event.stopPropagation()">
            <button class="close-btn" onclick="closePopup()">×</button>
            <img id="popup-image" src="" alt="Event Image">
            <div>
                <h3 id="popup-name"></h3>
                <p id="popup-artist"></p>
                <p id="popup-date"></p>
            </div>
        </div>
    </div>

    <script>
        function openPopup(event) {
            document.getElementById('popup-image').src = '/storage/' + event.photos[0];
            document.getElementById('popup-name').textContent = event.name;
            document.getElementById('popup-artist').textContent = 'Artist: ' + event.artist;
            document.getElementById('popup-date').textContent = 'Date: ' + event.date;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup(e) {
            if (e.target === document.getElementById('popup') || e.target === document.querySelector('.close-btn')) {
                document.getElementById('popup').style.display = 'none';
            }
        }
        function goBack() {
            window.history.back();
        }

        const commentsList = document.getElementById('commentsList');
    const commentForm = document.getElementById('commentForm');
    const commentText = document.getElementById('commentText');

    async function fetchComments() {
    try {
        const response = await fetch('/comments');
        const comments = await response.json();

        if (Array.isArray(comments)) {
            commentsList.innerHTML = comments.map(comment => `
                <div class="comment-item">
                    <p>${comment.text}</p>
                    <small>${new Date(comment.created_at).toLocaleString()}</small>
                </div>
            `).join('');
        } else {
            commentsList.innerHTML = '<p>No comments available.</p>';
        }
    } catch (error) {
        console.error('Error fetching comments:', error);
        commentsList.innerHTML = '<p>Error loading comments.</p>';
    }
}

window.onload = fetchComments;

    </script>

</body>
</html>
