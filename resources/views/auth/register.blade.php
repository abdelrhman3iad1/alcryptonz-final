<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    
    <div class="main">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Sign up</h2>

            <!-- Name Field -->
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter your name" required>
                <i class="fa-solid fa-user"></i>
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Email Field -->
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
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

            <!-- Confirm Password Field -->
            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <!-- Login Link -->
            <div class="already">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>

            <!-- Submit Button -->
            <button type="submit">Sign up</button>
        </form>
    </div>
</body>
</html>