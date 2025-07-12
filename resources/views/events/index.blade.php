
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Events</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Duration</th>
                <th>Max Attendees</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->duration }}</td>
                    <td>{{ $event->max_attendees }}</td>
                    <td>{{ $event->price }}</td>
                    <td>
                     </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
