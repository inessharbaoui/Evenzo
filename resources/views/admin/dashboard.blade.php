<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <script src="js/dashboard.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>


        .analysis-popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .analysis-popup-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .chart-container {
            width: 300px;
            margin: 20px auto;
        }
        canvas {
            max-width: 100%;
            height: auto !important;
        }

        .comment-history {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.comment-history h4 {
    font-size: 20px;
    margin-bottom: 16px;
}

.comment-history table {
    width: 100%;
    border-collapse: collapse;
}

.comment-history table th,
.comment-history table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.comment-history table th {
    background-color: #f4f4f4;
    color: #333;
}

.comment-history table td {
    color: #555;
}

    </style>
</head>
<body>
    <div class="header-section">
        <div class="overlay"></div>
    </div>
    <div class="dashboard">
        <aside class="sidebar">
            <h2>Event Management</h2>
            <div class="profile-section" style="text-align: center; margin-bottom: 30px;">
                <img src="images/7.jpg" alt="Admin Picture" class="profile-img" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd;">
                <p class="profile-name" style="margin-top: 15px; font-weight: bold; color: #333; font-size: 18px;">Admin Iness</p>
            </div>














            <ul>
                <li class="active" onclick="showDashboard()">Dashboard</li>
                <li onclick="showEvents()">Events</li>
                <li onclick="showMerchandise()">Merchandise</li>
                <li onclick="showGallery()">Gallery</li>
                <li onclick="showUsers()">Users</li>
            </ul>

            <div class="logout-section" style="margin-top: auto; margin-bottom: 20px; padding: 10px;">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn" style="margin-top: 10px; padding: 12px 25px; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
        </aside>


        <main id="dashboardContent" class="main-content" style="display: block;">
            <header class="header">
                <h1>Event Dashboard</h1>


            </header>
            <div class="metrics-container" style="display: flex; gap: 20px; flex-wrap: wrap;">
                <div class="metric-card" style="flex: 1; min-width: 250px; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <h3>Event Overview</h3>
                    <p class="amount">{{ $events->count() }} Events</p>
                 </div>

                <div class="metric-card" style="flex: 1; min-width: 250px; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <h3>User Overview</h3>
                    <p class="amount">{{ $users->count() }} Users</p>
                 </div>

                <div class="metric-card" style="flex: 1; min-width: 250px; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <h3>Merchandise Available</h3>
                    <p class="amount">{{ $merchandise->count() }} Items</p>
                 </div>
            </div>

            </section>
            <section class="analytics-section"></section>
            <section class="analytics-section">
                <div class="chart-card">
                    <div style="text-align: center;">
                        <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('dashboard-comments') }}'">Go to Comments Dashboard</button>
                      </div>

                </section>

                <section class="comment-history">
                    <h4>Recent Comments</h4>
                    <table>
                        <thead>
                            <tr>

                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody id="comments-body">
                        </tbody>
                    </table>
                </section>
                <section class="analytics-section"></section>

                <div class="metric-card" style="flex: 1; min-width: 250px; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                    <h3>Gallery</h3>
                    <p class="amount">{{ $concerts->count() }} Items</p>
                 </div>
        </main>








        <main id="eventsContent" class="main-content" style="display: none;">
            <header class="header">
                <h1>Events</h1>
                <button id="addEventBtn" onclick="toggleForm()">Add Event</button>
            </header>
            <div id="eventTable" class="event-table">
                @if ($events->isEmpty())
                    <p>No events found.</p>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Type</th>
                                <th>Artist</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="eventTableBody">
                            @foreach ($events as $event)
                                <tr class="{{ session('new_event_id') == $event->id ? 'highlight' : '' }}">
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->type }}</td>
                                    <td>{{ $event->artist }}</td>

                                    <td>


                                        <button onclick="showEventDetails({{ json_encode($event) }})" class="btn btn-danger btn-sm">View Details</button>


                                        <button  class="btn btn-danger btn-sm" onclick="showUpdateForm({{ json_encode($event) }})">Edit</button>

                                        <form action="{{ route('admin.events.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </main>




        <div id="updateEventModal" class="modal" style="display: none;">
            <div class="modal-content">
                <h2>Update Event</h2>
                <form id="updateEventForm" action="/events/{{ $event->_id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="updateEventId" name="id">

                    <label for="update_name">Event Name:</label>
                    <input type="text" id="update_name" name="name">

                    <label for="update_artist">Artist:</label>
                    <input type="text" id="update_artist" name="artist">

                    <label for="update_location">Location:</label>
                    <input type="text" id="update_location" name="location">

                    <label for="update_duration">Duration (hours):</label>
                    <input type="number" id="update_duration" name="duration">

                    <label for="update_type">Type:</label>
                    <select id="update_type" name="type">
                        <option value="VIP">VIP</option>
                        <option value="Regular">Regular</option>
                        <option value="Premium">Premium</option>

                    </select>

                    <label for="update_max_attendees">Max Attendees:</label>
                    <input type="number" id="update_max_attendees" name="max_attendees">

                    <label for="update_price">Price:</label>
                    <input type="number" id="update_price" name="price" step="0.01">

                    <label for="update_photo_path">Event Photo:</label>
                    <input type="file" id="update_photo_path" name="photo_path">

                    <div class="modal-actions">
                        <button type="submit">Update</button>
                        <button type="button" onclick="toggleUpdateForm()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>





        <div id="addEventModal" class="modal" style="display: none;">
            <div class="modal-content">
                <h2>Add New Event</h2>
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return handleFormSubmit(event)">
                    @csrf
                    <label for="name">Event Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="artist">Artist:</label>
                    <input type="text" id="artist" name="artist" required>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>

                    <label for="duration">Duration (hours):</label>
                    <input type="number" id="duration" name="duration" required>

                    <label for="type">Type:</label>
                    <select id="type" name="type">
                        <option value="VIP">VIP</option>
                        <option value="Regular">Regular</option>
                        <option value="Premium">Premium</option>
                    </select>

                    <label for="max_attendees">Max Attendees:</label>
                    <input type="number" id="max_attendees" name="max_attendees" required>

                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" required>

                    <label for="photo_path">Event Photo:</label>
                    <input type="file" id="photo_path" name="photo_path">

                    <div class="modal-actions">
                        <button type="submit">Save</button>
                        <button type="button" onclick="toggleForm()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>




        <div id="eventDetailsModal" class="modal" style="display: none;    position: fixed; /* Keeps the element fixed in the viewport */
 top: 50px;
    left: 599px;
    width: 100%;
    height: 100%;">
            <div class="modal-content">
                <h2>Event Details</h2>
                <div id="eventDetailsContent">
                </div>
                <div class="modal-actions">
                    <button type="button" onclick="toggleDetailsModal()">Close</button>

                </div>


            </div>


        </div>


        </div>












        <main id="merchandiseContent" class="main-content" style="display: none;">
            <header class="header">
                <h1>Merchandise</h1>
            </header>
            <div class="merchandise-section">
            <button  id="addEventBtn" onclick="toggleModal()"  style="margin-left: 1100px;">Add Merchandise</button>
                <h4>Available Merchandise</h4>
                <div class="merchandise-list" id="merchandiseList">
                    @foreach ($merchandise as $item)
                    <div class="merchandise-card" id="merchCard_{{ $item->id }}">
                        <img src="{{ asset('storage/' . $item->photo_path) }}" alt="{{ $item->name }}" class="merchandise-image"
                             onclick="openModal({
                                photoPath: '{{ asset('storage/' . $item->photo_path) }}',
                                name: '{{ $item->name }}',
                                description: '{{ $item->description }}',
                                price: '{{ $item->price }}',
                                stock: '{{ $item->stock }}',
                                id: '{{ $item->id }}'
                             })">

                        <h5 class="merchandise-name">{{ $item->name }}</h5>
                        <p class="merchandise-price">${{ $item->price }}</p>
                        <p class="merchandise-stock">Stock: {{ $item->stock }}</p>

                        <form action="{{ route('merchandise.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>

                        <button type="button" class="update-button" onclick="openUpdateModal({
                            id: '{{ $item->_id }}',
                            name: '{{ $item->name }}',
                            description: '{{ $item->description }}',
                            price: '{{ $item->price }}',
                            stock: '{{ $item->stock }}',
                            photoPath: '{{ asset('storage/' . $item->photo_path) }}'
                        })">Update</button>
                    </div>


                    @endforeach
                </div>

                <div id="merchandiseModal" class="modal" style="display: none;">
                    <div class="modal-content">
                        <span class="close-button" onclick="closeModal()">&times;</span>
                        <img id="modalImage" src="" alt="Merchandise Image" class="modal-image">
                        <h2 id="modalName"></h2>
                        <p id="modalDescription"></p>
                        <p id="modalPrice"></p>
                        <p id="modalStock"></p>
                    </div>
                </div>

            </div>




 </main>
<div id="addMerchModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Add Merchandise</h2>
        <form action="{{ route('merchandise.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="merchName">Merchandise Name:</label>
            <input type="text" id="merchName" name="merchName" required>
            <br><br>
            <label for="merchDescription">Description:</label>
            <input id="merchDescription" name="merchDescription" required></input>
            <br><br>
            <label for="merchPrice">Price:</label>
            <input type="number" id="merchPrice" name="merchPrice" required step="0.01">
            <br><br>
            <label for="merchStock">Stock:</label>
            <input type="number" id="merchStock" name="merchStock" required>
            <br><br>
            <label for="merchImage">Image:</label>
            <input type="file" id="merchImage" name="merchImage" accept="image/*" required>
            <br><br>

            <div class="modal-actions">
                <button type="submit">Submit</button>
                <button type="button" onclick="toggleModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<div id="updateMerchandiseModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Update Merchandise</h2>
        <form id="updateMerchandiseForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" id="updateMerchId" name="id">

            <label for="update_name">Name:</label>
            <input type="text" id="update_name" name="name" required>

            <label for="update_description">Description:</label>
            <textarea id="update_description" name="description" required></textarea>

            <label for="update_price">Price:</label>
            <input type="number" id="update_price" name="price" step="0.01" required>

            <label for="update_stock">Stock:</label>
            <input type="number" id="update_stock" name="stock" required>

            <label for="update_photo">Photo:</label>
            <input type="file" id="update_photo" name="photo_path">

            <div id="currentPhotoContainer" style="display: none;">
                <p>Current Photo:</p>
                <img id="currentPhoto" src="" alt="Current Photo" style="max-width: 200px; margin-bottom: 10px;">
            </div>

            <div class="modal-actions">
                <button type="submit">Update</button>
                <button type="button" onclick="closeUpdateModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>



        </main>


























        <main id="galleryContent" class="main-content" style="display: none;">

                 <header class="header">
                    <h1>Concerts</h1>
                </header>
                <div class="concerts-section">
                    <button  id="addEventBtn" onclick="toggleConcertModal()" style="margin-left: 1100px;">Add Concert</button>
                    <h4>Upcoming Concerts</h4>
                    <div class="concerts-list" id="concertsList">
                        @foreach ($concerts as $concert)
                        <div class="concert-card" id="concertCard_{{ $concert->id }}">
                            @foreach ($concert->photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Concert Image" class="concert-image"
                                 onclick="openConcertModal({
                                     photoPath: '{{ asset('storage/' . $photo) }}',
                                     name: '{{ $concert->name }}',
                                     artist: '{{ $concert->artist }}',
                                     date: '{{ $concert->date }}',
                                     id: '{{ $concert->id }}'
                                 })">
                            @endforeach

                            <h5 class="concert-name">{{ $concert->name }}</h5>
                            <p class="concert-artist">Artist: {{ $concert->artist }}</p>
                            <p class="concert-date">Date: {{ $concert->date }}</p>

                            <form action="{{ route('concerts.destroy', $concert->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this concert?')">Delete</button>
                            </form>

                            <button type="button" class="update-button"
                            onclick="openUpdateConcertModal({
                                id: '{{ $concert->id }}',
                                name: '{{ $concert->name }}',
                                artist: '{{ $concert->artist }}',
                                date: '{{ $concert->date }}',
                                photos: {{ json_encode($concert->photos) }}
                            })">
                            Update
                        </button>

                        </div>
                        @endforeach
                    </div>

                    <div id="concertModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <span class="close-button" onclick="closeConcertModal()">&times;</span>
                            <img id="modalImage" src="" alt="Concert Image" class="modal-image">
                            <h2 id="modalName"></h2>
                            <p id="modalArtist"></p>
                            <p id="modalDate"></p>
                        </div>
                    </div>

                </div>
            </main>

            <div id="addConcertModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <h2>Add Concert</h2>
                    <form  action="{{ route('concerts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="concertName">Concert Name:</label>
                        <input type="text" id="concertName" name="concertName" required>
                        <br><br>
                        <label for="concertArtist">Artist:</label>
                        <input type="text" id="concertArtist" name="concertArtist" required>
                        <br><br>
                        <label for="concertDate">Date:</label>
                        <input type="datetime-local" id="concertDate" name="concertDate" required>
                        <br><br>
                        <label for="concertImages">Images:</label>
                        <input type="file" id="concertImages" name="concertImages[]" accept="image/*" multiple required>
                        <br><br>

                        <div class="modal-actions">
                            <button type="submit">Submit</button>
                            <button type="button" onclick="toggleConcertModal()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

<div id="updateConcertModal" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Update Concert</h2>
        <form id="updateConcertForm" action="{{ route('concerts.update', $concert->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $concert->id }}">
            <label for="update_concert_name">Name:</label>
            <input type="text" id="update_concert_name" name="name" value="{{ $concert->name }}" required>

            <label for="update_concert_artist">Artist:</label>
            <input type="text" id="update_concert_artist" name="artist" value="{{ $concert->artist }}" required>

            <label for="update_concert_date">Date:</label>
            <input type="datetime-local" id="update_concert_date" name="date" value="{{ $concert->date }}" required>

            <label for="update_concert_images">Images:</label>
            <input type="file" id="update_concert_images" name="photos[]" accept="image/*" multiple>



            <div class="modal-actions">
                <button type="submit">Update</button>
                <button type="button" onclick="closeUpdateConcertModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>


        </main>


































        <main id="Users" class="main-content" style="display: none;">
            <header class="header">
                <h1>Users</h1>
            </header>
            @if ($users->isEmpty())
                <p>No users found.</p>
            @else
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->verified)
                                        <span class="text-success">Verified</span>
                                    @else
                                        <form action="{{ route('admin.users.verify', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Verify</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>





    </div>

</body>
</html>
