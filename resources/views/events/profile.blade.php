<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
        }

        .profile-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .profile-container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .cover-photo {
            width: 100%;
            height: 250px;
            background-image: url('https://via.placeholder.com/1500x500?text=Cover+Photo');
            background-position: center;
            background-size: cover;
            border-radius: 10px;
        }

        .profile-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -60px;
            gap: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            border: 4px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-header h1 {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 20px;
        }

        .profile-info div {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-info strong {
            font-weight: 600;
            color: #333;
        }

        .profile-info span {
            color: #777;
            font-weight: 400;
        }

        .btn-edit {
            display: inline-block;
            background-color: #0e0f0e;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-weight: 600;
            text-align: center;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background-color: #171917;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: inline-block;
        }

        .form-group input[type="file"], .form-group input[type="text"], .form-group input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .form-group img {
            margin-top: 10px;
            border-radius: 5px;
        }

        .save-btn {
            background-color: #1d211d;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 1.1rem;
            width: 100%;
            display: block;
            margin-top: 30px;
            text-align: center;
        }

        .save-btn:hover {
            background-color: #141814;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-header h2 {
            font-size: 1.5rem;
            margin: 0;
        }

        .modal-body {
            margin-top: 20px;
        }

        .progress-bar-container {
            width: 100%;
            height: 20px;
            background-color: #e0e0e0;
            border-radius: 10px;
            margin-top: 30px;
        }

        .progress-bar {
            height: 100%;
            width: 80%;
            background-color: #212921;
            border-radius: 10px;
            transition: width 0.5s ease-in-out;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 20px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-header img {
                margin-bottom: 10px;
            }

            .save-btn {
                width: 100%;
                padding: 15px;
            }

            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <a class="btn-edit" href="javascript:history.back()" class="return-button">Back</a>

<div class="profile-container">
    <div class="cover-photo" style="background-image: url('{{ asset('storage/' . $user->cover_photo) }}');"></div>

    <div class="profile-header">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
        <h1>{{ $user->name }}</h1>
    </div>

    <div class="profile-info">
        <div>
            <strong>Email:</strong>
            <span>{{ $user->email }}</span>
        </div>
        <div>
            <strong>Status:</strong>
            <span>{{ $user->verified ? 'Verified' : 'Not Verified' }}</span>
        </div>
        <div>
            <strong>Date of Creation:</strong>
            <span>{{ $user->created_at->format('F j, Y') }}</span>
        </div>
    </div>

    <button class="btn-edit" onclick="openModal()">Update Profile</button>

    <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" class="btn-edit">Logout</button>
    </form>
</div>

<div class="modal" id="updateModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Update Profile</h2>
            <button class="modal-close" onclick="closeModal()">×</button>
        </div>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture">
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" width="100" class="mt-2">
                    @endif
                </div>

                <div class="form-group">
                    <label for="cover_photo">Cover Photo</label>
                    <input type="file" name="cover_photo" id="cover_photo">
                    @if($user->cover_photo)
                        <img src="{{ asset('storage/' . $user->cover_photo) }}" alt="Cover Photo" width="100" class="mt-2">
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
            </div>

            <button type="submit" class="save-btn">Save Changes</button>
        </form>
    </div>
</div>


<script>
    function openModal() {
        document.getElementById("updateModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("updateModal").style.display = "none";
    }
</script>

</body>
</html>
