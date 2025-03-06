@include("Web.include.header")

<title>ALCRYPTONZ</title>
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788" crossorigin="anonymous"></script>

<style>
    .converter-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.437);
    }
    .converter-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }
    .result {
        margin-top: 20px;
        font-size: 1.2em;
        text-align: center;
        color: #007bff;
    }
</style>
</head>

<body onload="myFunction();" id="top-page">
    @include('Web.starting')
    @include("Web.include.navbar")

    <!-- Crypto Market Ticker -->
    <div class="parrent-sliders" style="background-color:#171924 !important">
        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>
        <div id="coinmarketcap-widget-marquee" coins="1,1027,825,5444" currency="USD" theme="dark" transparent="true" show-symbol-logo="true"></div>
    </div>

    <!-- Hero Section -->
    <main>
        <div class="container">
            <div class="words">
                <h1>ALCRYPTONZ</h1>
                <h3>Hard Choices, Great Destiny</h3>
                <h5>فريق عربي يهدف إلى الربط بين عالم العملات الرقمية والحياة اليومية</h5>
                <a href="aboutus.php">{{__("translation.Who We Are")}}</a>
            </div>
        </div>
        <svg class='editorial-border' preserveAspectRatio='none' viewBox='0 24 150 28' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
            <defs>
                <path d='M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z' id='gentle-wave'></path>
            </defs>
            <g class='parallax1'>
                <use fill='#f461c1' x='50' xlink:href='#gentle-wave' y='3'></use>
            </g>
            <g class='parallax2'>
                <use fill='#4579e2' x='50' xlink:href='#gentle-wave' y='0'></use>
            </g>
            <g class='parallax3'>
                <use fill='#3461c1' x='50' xlink:href='#gentle-wave' y='9'></use>
            </g>
            <g class='parallax4'>
                <use fill='#ffffff' x='50' xlink:href='#gentle-wave' y='6'></use>
            </g>
        </svg>
    </main>

    <!-- Back to Top Button -->
    <a href="#top-page" style="position:fixed;right:15px;bottom:15px;font-size:32px;color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;">
        <i class="fas fa-chevron-circle-up" style="border:1px solid white;"></i>
    </a>

    <!-- Promotional Banner -->
    @if(isset($promotions[0]))
    <div class="ad-banner bg-light py-2 mt-4 d-flex justify-content-center align-items-center col-md-10 col-11 mx-auto shadow-sm" 
         style="border: 1px dashed gray; border-radius: 15px; overflow: hidden;">
        <div class="row w-100 align-items-center">
            <div class="col-md-5 d-flex justify-content-md-start justify-content-center">
                <img src="{{ asset($promotions[0]->image) }}" 
                     alt="{{ $promotions[0]->name }}" 
                     class="rounded-lg" 
                     style="max-width: 60%; height: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>
            <div class="col-md-7 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
                <h3 class="font-weight-bold text-primary">{{ $promotions[0]->name }}</h3>
                <p class="mt-3 text-center text-muted" style="font-size: 1.1rem; line-height: 1.6;">
                    {{ $promotions[0]->description }}
                </p>
                <a href="{{ $promotions[0]->website_url }}" 
                   class="btn btn-primary mt-2 px-4 py-2" 
                   style="font-size: 1rem; border-radius: 25px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    {{__('translation.Visit Here')}}
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Services Section -->
    <div class="services" id="se">
        <!-- Desktop Version -->
        <div class="container d-none d-lg-block">
            <div class="services-parent">
                <div class="one-serv">
                    <div><i class="fas fa-users"></i></div>
                    <h4>{{__("translation.Community_Management")}}</h4>
                    <p>{{__("translation.Experts in community management and currently working with several Crypto projects")}}.</p>
                </div>
                <div class="one-serv">
                    <div><i class="fas fa-bullhorn"></i></div>
                    <h4>{{__("translation.Marketing")}}</h4>
                    <p>{{__("translation.Global marketing services for Crypto Projects in the Arabian area.")}}</p>
                </div>
                <div class="one-serv">
                    <div><i class="fas fa-envelope"></i></div>
                    <h4>{{__("translation.Crypto News")}}</h4>
                    <p>{{__("translation.Up-to-date news for everything related to Cryptocurrencies.")}}</p>
                </div>
                <div class="one-serv">
                    <div><i class="fas fa-flag"></i></div>
                    <h4>{{__("translation.Crypto Knowledge")}}</h4>
                    <p>{{__("translation.Simplified articles explaining the rules of cryptocurrency for beginners.")}}</p>
                </div>
            </div>
        </div>

        <!-- Mobile Version -->
        <div class="container d-block d-lg-none">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="one-serv text-center">
                            <div class='py-2'><i class="fas fa-users"></i></div>
                            <h4>{{__("translation.Community Management")}}</h4>
                            <p>{{__("translation.Experts in community management and currently working with several Crypto projects.")}}</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="one-serv text-center">
                            <div class='py-2'><i class="fas fa-bullhorn"></i></div>
                            <h4>{{__("translation.Marketing")}}</h4>
                            <p>{{__("translation.Global marketing services for Crypto Projects in the Arabian area.")}}</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="one-serv text-center">
                            <div class='py-2'><i class="fas fa-envelope"></i></div>
                            <h4>{{__("translation.Crypto News")}}</h4>
                            <p>{{__("translation.Up-to-date news for everything related to Cryptocurrencies.")}}</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="one-serv text-center">
                            <div class='py-2'><i class="fas fa-flag"></i></div>
                            <h4>{{__("translation.Crypto Knowledge")}}</h4>
                            <p>{{__("translation.Simplified articles explaining the rules of cryptocurrency for beginners.")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background: linear-gradient(125deg, #00FF57 0%, #010033 40%, #460043 70%, #F0FFC5 100%), linear-gradient(55deg, #0014C9 0%, #410060 100%), linear-gradient(300deg, #FFC700 0%, #001AFF 100%), radial-gradient(135% 215% at 115% 40%, #393939 0%, #393939 40%, #849561 calc(40% + 1px), #849561 60%, #EED690 calc(60% + 1px), #EED690 80%, #ECEFD8 calc(80% + 1px), #ECEFD8 100%), linear-gradient(125deg, #282D4F 0%, #282D4F 40%, #23103A calc(40% + 1px), #23103A 70%, #A0204C calc(70% + 1px), #A0204C 88%, #FF6C00 calc(88% + 1px), #FF6C00 100%); background-blend-mode: overlay, screen, overlay, overlay, normal; padding: 20px 20px 50px 20px; position: relative;">
        <div class="custom-shape-divider-top-1629555121">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>

        <h2 class="inside-slider" style="padding-top:30px;font-weight:bold"><i class="far fa-handshake"></i> &nbsp; {{__("translation.Collabs")}} </h2>
        
        <ol class="carousel-indicators">
            @foreach ($partners as $index => $partner)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        
        <div class="carousel-inner" style="border-radius:10px">
            @foreach ($partners as $index => $partner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <a href="{{ $partner->website_url }}" style="text-align:center">
                        <div class="cover-ph" style="border-radius: 5px 50px 5px 50px">
                            <img style="border-radius:20px" src='{{ asset($partner->image) }}' alt='collabs partner at Alcryptonz'>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="carousel-control-prev-icon fas fa-chevron-left prev" aria-hidden="true" style="color:white !important;font-size:21px !important"></i>
            <span class="sr-only">{{__("translation.Previous")}}</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="carousel-control-next-icon fas fa-chevron-right next" aria-hidden="true" style="color:white !important;font-size:21px !important"></i>
            <span class="sr-only">{{__("translation.Next")}}</span>
        </a>
    </div>

    <!-- Collabs News -->
    @if (config('app.locale')=='ar')
    <div class="page-wrapper" style="padding:10px; text-align:center; overflow:hidden !important;">
        <div class="post-slider mb-4">
            <h3 class="slider-title"><i class="far fa-newspaper"></i> &nbsp;{{__('translation.Collabs News')}}</h3>
            
            <div class="swiper-container mx-auto p-2 shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($partners as $partner)
                    @foreach ($partner->posts as $post)
                        <div class="swiper-slide border border-2 rounded-4">
                            <div class="post p-3 shadow-sm rounded-3" style="direction:rtl; overflow:hidden;">
                                <div class="div-img text-center mb-2">
                                    <a href="post.php?idPost={{ $post->id }}" target="_blank">
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}" class="img-fluid rounded-3" style="width: 100%;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available" class="img-fluid rounded-3" style="width: 100%;">
                                        @endif
                                    </a>
                                </div>
                                <a href="post.php?idPost={{ $post->id }}" target="_blank" class="text-decoration-none">
                                    <h4 class="text-dark text-truncate">{{ $post->title_ar }}</h4>
                                </a>
                                <span class="text-muted d-block small"> 
                                    <i class="fas fa-user"></i> {{ $partner->name }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="fas fa-tags"></i> {{ $post->category->name }}
                                </span>
                                <p>
                                    @if (strlen($post->content_ar > 150))
                                        {{strip_tags(substr(str_replace("&nbsp;", " ", $post->content_ar), 0, 350) . "....")}}
                                    @else
                                    {{strip_tags(str_replace("&nbsp;", " ", $post->content_ar))}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
    @endif

    @if (config('app.locale')=='en')
    <div class="page-wrapper" style="padding:10px; text-align:center; overflow:hidden !important;">
        <div class="post-slider mb-4">
            <h3 class="slider-title"><i class="far fa-newspaper"></i> &nbsp;{{__('translation.Collabs News')}}</h3>
            
            <div class="swiper-container mx-auto p-2 shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($partners as $partner)
                    @foreach ($partner->posts as $post)
                        <div class="swiper-slide border border-2 rounded-4">
                            <div class="post p-3 shadow-sm rounded-3" style="direction:rtl; overflow:hidden;">
                                <div class="div-img text-center mb-2">
                                    <a href="post.php?idPost={{ $post->id }}" target="_blank">
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" class="img-fluid rounded-3" style="width: 100%;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available" class="img-fluid rounded-3" style="width: 100%;">
                                        @endif
                                    </a>
                                </div>
                                <a href="post.php?idPost={{ $post->id }}" target="_blank" class="text-decoration-none">
                                    <h4 class="text-dark text-truncate">{{ $post->title_en }}</h4>
                                </a>
                                <span class="text-muted d-block small"> 
                                    <i class="fas fa-user"></i> {{ $partner->name }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="fas fa-tags"></i> {{ $post->category->name }}
                                </span>
                                <p>
                                    @if (strlen($post->content_en > 150))
                                        {{strip_tags(substr(str_replace("&nbsp;", " ", $post->content_en), 0, 350) . "....")}}
                                    @else
                                    {{strip_tags(str_replace("&nbsp;", " ", $post->content_en))}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
    @endif

    <!-- Collabs News -->
    {{-- @if (config('app.locale')=='ar')
    <div class="page-wrapper" style="padding:10px; text-align:center; overflow:hidden !important;">
        <div class="post-slider mb-4">
            <h3 class="slider-title"><i class="far fa-newspaper"></i> &nbsp;{{__('translation.Collabs News')}}</h3>
            
            <div class="swiper-container mx-auto p-2 shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)
                        <div class="swiper-slide border border-2 rounded-4">
                            <div class="post p-3 shadow-sm rounded-3" style="direction:rtl; overflow:hidden;">
                                <div class="div-img text-center mb-2">
                                    <a href="post.php?idPost={{ $post->id }}" target="_blank">
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}" class="img-fluid rounded-3" style="width: 100%;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available" class="img-fluid rounded-3" style="width: 100%;">
                                        @endif
                                    </a>
                                </div>
                                <a href="post.php?idPost={{ $post->id }}" target="_blank" class="text-decoration-none">
                                    <h4 class="text-dark text-truncate">{{ $post->title_ar }}</h4>
                                </a>
                                <span class="text-muted d-block small"> 
                                    <i class="fas fa-user"></i> {{ $post->user->name }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="fas fa-tags"></i> {{ $post->category->name }}
                                </span>
                                <p>
                                    @if (strlen($post->content_ar > 150))
                                        {{strip_tags(substr(str_replace("&nbsp;", " ", $post->content_ar), 0, 350) . "....")}}
                                    @else
                                    {{strip_tags(str_replace("&nbsp;", " ", $post->content_ar))}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif

    @if (config('app.locale')=='en')
    <div class="page-wrapper" style="padding:10px; text-align:center; overflow:hidden !important;">
        <div class="post-slider mb-4">
            <h3 class="slider-title"><i class="far fa-newspaper"></i> &nbsp;{{__('translation.Collabs News')}}</h3>
            
            <div class="swiper-container mx-auto p-2 shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)
                        <div class="swiper-slide border border-2 rounded-4">
                            <div class="post p-3 shadow-sm rounded-3" style="direction:rtl; overflow:hidden;">
                                <div class="div-img text-center mb-2">
                                    <a href="post.php?idPost={{ $post->id }}" target="_blank">
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" class="img-fluid rounded-3" style="width: 100%;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available" class="img-fluid rounded-3" style="width: 100%;">
                                        @endif
                                    </a>
                                </div>
                                <a href="post.php?idPost={{ $post->id }}" target="_blank" class="text-decoration-none">
                                    <h4 class="text-dark text-truncate">{{ $post->title_en }}</h4>
                                </a>
                                <span class="text-muted d-block small"> 
                                    <i class="fas fa-user"></i> {{ $post->user->name }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="fas fa-tags"></i> {{ $post->category->name }}
                                </span>
                                <p>
                                    @if (strlen($post->content_en > 150))
                                        {{strip_tags(substr(str_replace("&nbsp;", " ", $post->content_en), 0, 350) . "....")}}
                                    @else
                                    {{strip_tags(str_replace("&nbsp;", " ", $post->content_en))}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif --}}

            <p class='mt-4' style="text-align:center;color:green">
                <i class="fas fa-hand-point-left"></i>{{__('translation. مرر يمينا او يسارا')}} <i class="fas fa-hand-point-right"></i><br> 
                {{__('translation.لمشاهدة منشورات اخري')}}
            </p>
        </div>
    </div>

    <!-- Show More Posts Button -->
    <div style="text-align:center;padding:20px 0" id="ar">
        <a class="show-butx" href="show-all-partners-posts.php">{{__("translation.Show More")}}</a>
    </div>

    <!-- Currency Converter -->
    <div class="converter-container">
        <h2>{{ __("translation.Currency Converter") }}</h2>
        <form id="converter-form">
            @csrf
            <div class="form-group">
                <label for="amount">{{ __("translation.The Value") }} :</label>
                <input type="text" class="form-control" name="amount" id="amount" placeholder="{{ __('translation.Enter the Value') }}">
            </div>
            <div class="form-group">
                <label for="fromCurrency">{{ __("translation.From :") }}</label>
                <select name="from" class="form-control" id="fromCurrency">
                    @foreach ($currencyOptions as $symbol => $name)
                        <option value="{{ $symbol }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="toCurrency">{{ __("translation.To :") }}</label>
                <select name="to" class="form-control" id="toCurrency">
                    @foreach ($currencyOptions as $symbol => $name)
                        <option value="{{ $symbol }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">{{ __("translation.Convert") }}</button>
        </form>
        <div class="result mt-3" id="result"></div>
    </div>

    <!-- Recent Blog Posts -->
    @if (config('app.locale')=='ar')
    <div class="page-wrapper" style="padding:10px;text-align:center;overflow:hidden !important">
        <div class="post-slider" style="margin-bottom:30px;">
            <h3 class="slider-title"><i class="fas fa-clock"></i> &nbsp;{{__("translation.Recent Blog Posts")}}</h3>
            <p style="text-align:center;color:gray;padding:10px">{{__("translation.Stay up to date with New posts related to Cryptocurrency.")}}</p>

            <div class="swiper-container mx-auto p-2 shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)
                        <div class="swiper-slide border border-2 rounded-4">
                            <div class="post p-3 rounded-3 shadow-sm" style="direction:rtl; overflow:hidden;">
                                <div class="div-img text-center mb-2">
                                    <a href="{{ url('post.php?idPost=' . $post->id) }}" target="_blank">
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}" class="img-fluid rounded-3" style="width: 100%;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available" class="img-fluid rounded-3" style="width: 100%; height: 180px;">
                                        @endif
                                    </a>
                                </div>
                                <a href="{{ url('post.php?idPost=' . $post->id) }}" target="_blank" class="text-decoration-none">
                                    <h4 class="text-dark text-truncate">{{ $post->title_ar }}</h4>
                                </a>
                                <span class="text-muted d-block small"> 
                                    <i class="fas fa-user"></i> {{ $post->user->name }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="fas fa-tags"></i> {{ $post->category->name }}
                                </span>
                                <p>
                                    @if (strlen($post->content_ar > 150))
                                        {{strip_tags(substr(str_replace("&nbsp;", " ", $post->content_ar), 0, 350) . "....")}}
                                    @else
                                    {{strip_tags(str_replace("&nbsp;", " ", $post->content_ar))}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
    @if (config('app.locale')=='en')
    <div class="page-wrapper" style="padding:10px;text-align:center;overflow:hidden !important">
        <div class="post-slider" style="margin-bottom:30px;">
            <h3 class="slider-title"><i class="fas fa-clock"></i> &nbsp;{{__("translation.Recent Blog Posts")}}</h3>
            <p style="text-align:center;color:gray;padding:10px">{{__("translation.Stay up to date with New posts related to Cryptocurrency.")}}</p>

            <div class="swiper-container mx-auto p-2 shadow-lg overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)
                        <div class="swiper-slide border border-2 rounded-4">
                            <div class="post p-3 rounded-3 shadow-sm" style="direction:rtl; overflow:hidden;">
                                <div class="div-img text-center mb-2">
                                    <a href="{{ url('post.php?idPost=' . $post->id) }}" target="_blank">
                                        @if ($post->image)
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" class="img-fluid rounded-3" style="width: 100%;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available" class="img-fluid rounded-3" style="width: 100%; height: 180px;">
                                        @endif
                                    </a>
                                </div>
                                <a href="{{ url('post.php?idPost=' . $post->id) }}" target="_blank" class="text-decoration-none">
                                    <h4 class="text-dark text-truncate">{{ $post->title_en }}</h4>
                                </a>
                                <span class="text-muted d-block small"> 
                                    <i class="fas fa-user"></i> {{ $post->user->name }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="text-muted d-block small">
                                    <i class="fas fa-tags"></i> {{ $post->category->name }}
                                </span>
                                <p>
                                    @if (strlen($post->content_en > 150))
                                        {{strip_tags(substr(str_replace("&nbsp;", " ", $post->content_en), 0, 350) . "....")}}
                                    @else
                                    {{strip_tags(str_replace("&nbsp;", " ", $post->content_en))}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
            <p style="text-align:center;color:green">
                <i class="fas fa-hand-point-left"></i> {{__("translation.Swipe Left or Right")}}<i class="fas fa-hand-point-right"></i><br> 
                {{__("translation.For more posts")}}
            </p>
        </div>
    </div>

    <!-- Show More Button -->
    <div style="text-align:center;padding:10px 0 20px">
        <a class="show-butx" href="show-all-posts.php">{{__("translation.Show More")}}</a>
    </div>

    <!-- Team Section - Desktop -->
    <div class="team d-none d-lg-block" id="te">
        <div class="container">
            <h3 style="text-align:center;padding:10px;margin-top:20px;"><i class="fas fa-clock"></i> &nbsp; {{__("translation.Meet The Team")}}</h3>
            <p style="text-align:center;padding:10px">{{__("translation.Cryptonz Team")}}</p>
            
            <div class="inside-team">
            @foreach ($teams as $member)
                <div>
                    <h5>{{$member->name}} || {{$member->department->name}}</h5>
                    <img src="{{ asset($member->image) }}" alt="Alcryptonz Team Member">
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <!-- Team Section - Mobile -->
    <div class="container d-block d-lg-none">
        <div class="swiper mySwiper">
            <h3 style="text-align:center;padding:10px;margin-top:20px;"><i class="fas fa-clock"></i> &nbsp; {{__("translation.Meet The Team")}}</h3>
            <p style="text-align:center;padding:10px">{{__("translation.Cryptonz Team")}}</p>

            <div class="swiper-wrapper">
                @foreach ($teams as $member)
                <div class="swiper-slide">
                    <div class="one-serv text-center">
                        <h4>{{ $member->name }}</h4>
                        <div class='py-2'>
                            <img src="{{ asset($member->image ?? 'path/to/placeholder.jpg') }}" 
                                class="img-fluid" 
                                alt="Team Member: {{ $member->name }}" 
                                style="max-width: 90%;">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Second Promotional Banner -->
    @if(isset($promotions[1]))
    <div class="ad-banner bg-light py-2 mt-4 mb-4 d-flex justify-content-center align-items-center col-md-10 col-11 mx-auto shadow-sm" 
        style="border: 1px dashed gray; border-radius: 15px; overflow: hidden;">
        <div class="row w-100 align-items-center">
            <div class="col-md-5 d-flex justify-content-md-start justify-content-center">
                <img src="{{ asset($promotions[1]->image) }}" 
                    alt="{{ $promotions[1]->name }}" 
                    class="rounded-lg" 
                    style="max-width: 60%; height: auto; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>
            <div class="col-md-7 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
                <h3 class="font-weight-bold text-primary">{{ $promotions[1]->name }}</h3>
                <p class="mt-3 text-center text-muted" style="font-size: 1.1rem; line-height: 1.6;">
                    {{ $promotions[1]->description }}
                </p>
                <a href="{{ $promotions[1]->website_url }}" 
                class="btn btn-primary mt-2 px-4 py-2" 
                style="font-size: 1rem; border-radius: 25px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                {{__('translation.Visit Here')}}
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Footer -->
    @include("Web.include.underfooter")
    @include("Web.include.footer")

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YN940EKWRS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YN940EKWRS');
    </script>

    <!-- Swiper Initialization -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <!-- Currency Converter Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#converter-form').on('submit', function (e) {
                e.preventDefault();

                var formData = {
                    _token: "{{ csrf_token() }}",
                    amount: $('#amount').val(),
                    from: $('#fromCurrency').val(),
                    to: $('#toCurrency').val()
                };

                $.ajax({
                    url: "{{ route('convert') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: function () {
                        $('#result').html('<p class="text-info">{{ __("translation.Loading...") }}</p>');
                    },
                    success: function (response) {
                        if (response.result && response.result.data && response.result.data.quote) {
                            var fromCurrency = response.result.data.symbol;
                            var toCurrency = $("#toCurrency").val();
                            var convertedAmount = response.result.data.quote[toCurrency]?.price || "N/A";

                            if (convertedAmount !== "N/A") {
                                $('#result').html('<p class="text-success" dir="ltr" > ' + 
                                    response.result.data.amount + ' ' + fromCurrency + ' = ' + convertedAmount.toFixed(2) + ' ' + toCurrency + 
                                '</p>');
                            } else {
                                $('#result').html('<p class="text-danger">{{ __("translation.Error") }}</p>');
                            }
                        } else {
                            $('#result').html('<p class="text-danger">{{ __("translation.Error") }}</p>');
                        }
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '<p class="text-danger">{{ __("translation.Error") }}</p>';
                        if (errors) {
                            errorMessage += '<ul class="text-danger">';
                            $.each(errors, function (key, value) {
                                errorMessage += '<li>' + value[0] + '</li>';
                            });
                            errorMessage += '</ul>';
                        }
                        $('#result').html(errorMessage);
                    }
                });
            });
        });
    </script>

    <!-- Swiper for Posts -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                768: { slidesPerView: 3 },
                480: { slidesPerView: 1 }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            }
        });
    </script>
</body>