
    <div class="container">
        <h1>Events List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th>Type</th>
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
                        <td>{{ $event->type }}</td>
                        <td>{{ $event->max_attendees }}</td>
                        <td>{{ $event->price }}</td>
                        <td>
                             <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
