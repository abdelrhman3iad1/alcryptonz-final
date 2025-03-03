<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login</h2>

            <!-- Email Field -->
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Password Field -->
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Submit Button -->
            <button type="submit">Login</button>

            <!-- Register Link -->
            <div class="already">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>