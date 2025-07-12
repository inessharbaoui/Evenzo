<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form id="edit-event-form">
            <div class="mb-3">
                <label for="name">Event Name</label>
                <input type="text" id="name" class="form-control" value="Event 1" required>
            </div>

            <div class="mb-3">
                <label for="location">Location</label>
                <input type="text" id="location" class="form-control" value="Location 1" required>
            </div>

            <div class="mb-3">
                <label for="duration">Duration (hours)</label>
                <input type="number" id="duration" class="form-control" value="2" required>
            </div>

            <div class="mb-3">
                <label for="type">Event Type</label>
                <select id="type" class="form-control" required>
                    <option value="VIP" selected>VIP</option>
                    <option value="Regular">Regular</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="max_attendees">Max Attendees</label>
                <input type="number" id="max_attendees" class="form-control" value="100" required>
            </div>

            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" id="price" class="form-control" step="0.01" value="50.00" required>
            </div>

            <div class="mb-3">
                <label for="photo">Event Photo</label>
                <input type="file" id="photo" class="form-control">
                <img src="path/to/event-photo.jpg" alt="Event Photo" class="img-thumbnail mt-2" style="width: 200px;">
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>

    <script>
        document.getElementById('edit-event-form').addEventListener('submit', function(event) {
            event.preventDefault();
             alert('Event updated successfully!');
            window.location.href = 'index.html';
        });
    </script>
</body>
</html>
