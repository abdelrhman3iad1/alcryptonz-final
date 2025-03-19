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
<nav class="navbar nav-me bg-dark navbar-light navbar-expand-sm two-nav">
    <div class="container-fluid">
        <a href="{{route('home')}}" class="navbar-brand" style="font-weight:bold;font-size:19px;color:white">
            <img src="{{asset('images/Alcryptonz_White_transparent.png')}}" alt="Alcryptonz-logo" style="width:250px;height:44px;">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu" style="border:0; background-color:black;padding:10px 0 0">
            <i class="fas fa-bars navbar-toggler-icon" style="color:white !important;font-size:27px !important;"></i>
        </button>
   
    <div class="collapse navbar-collapse" id="menu" style="z-index: 566311111111111 !important;">
     
        <ul class="navbar-nav ml-auto" style="z-index: 566311111111111;">
            <li class="nav-item">
                <li class="nav-item">
                    <a href="{{route('qa.index')}}" class="nav-link spec2">{{__('translation.FAQ')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('privacy')}}" class="nav-link spec2">{{__('translation.Privacy Policy')}}</a>

                </li>
                <li class="nav-item">

                <a href="{{route('home')}}" class="nav-link spec2">{{__('translation.HOME')}}</a>
            </li>
            <li class="nav-item">
                <a href="{{route('aboutUs')}}" class="nav-link spec2">{{__('translation.ABOUT_US')}}</a>
            </li>
            {{-- <li class="nav-item">
                <a href="#ar" class="nav-link spec2">ARTICLES</a>
            </li> --}}
       
            {{-- <li class="nav-item">
                <a href="alcrypto-news.php" class="nav-link spec2">ALCRYPTO NEWS</a>
            </li> --}}
      
        </ul>
        <!-- Language Toggle -->
  
        </div>
    </div>
    </nav>