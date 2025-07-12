<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>{{ $event->name }}</h1>
    @if($event->photo)
        <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}" class="img-fluid">
    @endif
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Duration:</strong> {{ $event->duration }}</p>
    <p><strong>Max Attendees:</strong> {{ $event->max_attendees }}</p>
    <p><strong>Price:</strong> ${{ $event->price }}</p>

    <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Events</a>
</div>
</body>
</html>
