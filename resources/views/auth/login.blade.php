<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


</head>
<body>
    <div class="login-container">
        <div class="overlay"></div>
        <a href="javascript:history.back()" class="nav-link">Guest Mode</a>
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h2 class="form-title">Login</h2>

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
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="submit-btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
