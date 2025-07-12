
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" required>
        </div>
        <div class="mb-3">
            <label for="max_attendees" class="form-label">Max Attendees</label>
            <input type="number" class="form-control" id="max_attendees" name="max_attendees" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Event Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
</body>
</html>
