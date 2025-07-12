<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="overlay"></div>
        <form class="register-form" action="{{ route('register') }}" method="POST">
            @csrf
            <h2 class="form-title">Register</h2>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="input-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="submit-btn">Register</button>

            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
