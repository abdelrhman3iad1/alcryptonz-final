<!DOCTYPE html>
<html lang="{{__('translation.language')}}" dir="{{__('translation.dir')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('translation.Login Page')}}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/compiled/css/app.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/compiled/css/app-dark.rtl.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <script src="{{ asset('Dashboard/assets/static/js/initTheme.js') }}"></script>
<div>
    @include('messages.errors')
        @include('messages.success')

    <div class="main">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>{{__('translation.Login_user')}}</h2>

            <!-- Email Field -->
            <div class="input-box">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="email" placeholder="Email" >
            </div>


            <!-- Password Field -->
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" >
                <i class="fa-solid fa-lock"></i>
            </div>


            <!-- Submit Button -->
            <button type="submit">{{__('translation.Login_user')}}</button>

            <!-- Register Link -->
            <div class="already already-mt-2">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div> 
        </form>
    </div>
</div>

</body>
</html>
<script src="{{ asset('Dashboard/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('Dashboard/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/compiled/js/app.js') }}"></script>
