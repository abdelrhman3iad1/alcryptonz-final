<style>
    /* RTL support styles */
[dir="rtl"] .navbar-nav.ml-auto {
    margin-left: 0 !important;
    margin-right: auto !important;
}

[dir="rtl"] .navbar-nav.mr-auto {
    margin-right: 0 !important;
    margin-left: auto !important;
}

[dir="rtl"] .navbar-brand {
    margin-right: 0;
    margin-left: 1rem;
}

[dir="rtl"] .navbar-toggler {
    margin-left: 0;
    margin-right: auto;
}

/* Make search form adjust for RTL */
[dir="rtl"] .search-bar input {
    text-align: right;
}

/* Fix padding for RTL */
[dir="rtl"] .px-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
}

[dir="rtl"] .px-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
}
</style>
<nav class="navbar nav-me bg-dark navbar-light navbar-expand-sm one-nav">
    <div class="container-fluid">
        <a href="{{route('home')}}" class="navbar-brand" style="font-weight:bold;font-size:19px;color:white">
            <img src="{{asset('images/Alcryptonz_White_transparent.png')}}" alt="Alcryptonz-logo" style="width:250px;height:44px;">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu" style="border:0; background-color:black;padding:10px 0 0">
            <i class="fas fa-bars navbar-toggler-icon" style="color:white !important;font-size:27px !important;"></i>
        </button>

        <div class="collapse navbar-collapse" id="menu" style="z-index: 566311111111111 !important;">
            <div class="search-bar">
                <div class="container d-flex justify-content-center">
                    <form action="{{ route('post.search') }}" method="POST">
                        @csrf
                        <input type="text" name="searched" class="navbar-search py-1 px-3" placeholder="{{__("translation.Search This Blog")}}">
                        <button class="ser-btn px-2 py-1" type="submit" >{{__("translation.Search")}}</button>
                    </form>
                </div>
            </div>
            <ul class="navbar-nav ml-auto" style="z-index: 566311111111111;">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link spec2">{{__('translation.HOME')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('aboutUs')}}" class="nav-link spec2">{{__('translation.ABOUT_US')}}</a>
                </li>
                <li class="nav-item">
                    <a href="#ar" class="nav-link spec2">{{__('translation.ARTICLES')}}</a>
                </li>
                <li class="nav-item">
                    <a href="#te" class="nav-link spec2">{{__('translation.TEAM')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('crypto-news')}}" class="nav-link spec2">{{__('translation.ALCRYPTO_NEWS')}}</a>
                </li>
                <li class="nav-item">
                    <a href="#fo" class="nav-link spec2">{{__('translation.CONTACT_US')}}</a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#fo" class="nav-link spec2">{{config('app.locale')}}</a>
                </li>
                <li class="nav-item">
                    <a href="#fo" class="nav-link spec2">{{__("translation.language")}}</a>
                </li> --}}
                @if (config('app.locale')=='ar')
                <li class="nav-item">
                    <a href="{{url('/en')}}" class="nav-link spec2">ENGLISH</a>
                </li>
                @elseif(config('app.locale')=='en')
                <li class="nav-item">
                    <a href="{{url('/ar')}}" class="nav-link spec2">ARABIC</a>
                </li>
                @endif

                @guest
                <li class="nav-item">
                    <a href="{{route('get.login')}}" class="nav-link spec2">{{__('translation.Login')}}</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link spec1" style="border-radius:10px;">{{__('translation.Logout')}}</button>
                    </form>
                    {{-- <a href="" class="nav-link spec2">{{__('translation.Logout')}}</a> --}}
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
