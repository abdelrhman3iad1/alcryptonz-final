<!DOCTYPE html>
<html lang="{{__('translation.language')}}" dir="{{__('translation.dir')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__("translation.Register page")}}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/compiled/css/app.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/compiled/css/app-dark.rtl.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <script src="{{ asset('Dashboard/assets/static/js/initTheme.js') }}"></script>
    <div>
        @include('messages.errors')
            @include('messages.success')
    
    <div class="main">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>{{__("translation.Sign up")}}</h2>

            <!-- Name Field -->
            <div class="input-box">
                <input type="text" name="name" placeholder="{{__('translation.Enter your name')}}" >
                <i class="fa-solid fa-user"></i>
            </div>
            

            <!-- Email Field -->
            <div class="input-box">
                <input type="email" name="email" placeholder="{{__('translation.Email')}}" >
                <i class="fa-solid fa-envelope"></i>
            </div>
            

            <!-- Password Field -->
            <div class="input-box">
                <input type="password" name="password" placeholder="{{__('translation.Password')}}" >
                <i class="fa-solid fa-lock"></i>
            </div>
            

            <!-- Confirm Password Field -->
            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="{{__('translation.Confirm Password')}}" >
                <i class="fa-solid fa-lock"></i>
            </div>

            

            <!-- Submit Button -->
            <button type="submit">{{__("translation.Sign up")}}</button>

            <!-- Login Link -->
            <div class="mt-3">
                <p>{{__("translation.Already have an account?")}}<a href="{{ route('login') }}">{{__("translation.Login")}}</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>