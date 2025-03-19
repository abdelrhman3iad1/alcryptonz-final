@include('Web.include.header')

<title>ALCRYPTONZ
</title>
<!-- Custom Styling -->
<link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
    crossorigin="anonymous"></script>
</head>

<body id="top-page">
    <!-- start navbar -->
    @include('Web.include.anotherNavBar')
    <!-- end navbar -->
    <!--start Arrow to top Page -->
    <a href="#top-page"
        style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;"><i
            class="fas fa-chevron-circle-up" style="border:1px solid white;"></i></a>
    <!--End Arrow to top Page -->
    <!-- start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="parent-news">

                        @if (config('app.locale') == 'ar')

                            @if (isset($categoryPosts))
                                <!--post-->
                                @foreach ($categoryPosts as $post)
                                    <a style="direction:rtl;overflow:hidden"
                                        href="{{ route('showPost', $post->id) }}" target="_blank">
                                        <div class="small-post">
                                            <div class="img-div"> <img src="{{ asset($post->image) }}" alt="image here">
                                            </div>
                                            <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }}</h3>
                                            <span> {{ $post->user->name }} &nbsp;<i class="fas fa-user"></i></span><br>
                                            <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i
                                                    class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;

                                            @if ($post->category->name == 'مقالات شركاء')
                                                <span> {{ $post->partner->name }} &nbsp; <i class="fas fa-tags"></i>
                                                </span>
                                            @else
                                                <span> {{ $post->category->name }} &nbsp; <i class="fas fa-tags"></i>
                                                </span>
                                            @endif

                                            <p style="color:black;">
                                                @if (strlen($post->content_ar) > 150)
                                                    {{ strip_tags(substr(str_replace('&nbsp;', ' ', $post->content_ar), 0, 350) . '....') }}
                                                @else
                                                    {{ strip_tags(str_replace('&nbsp;', ' ', $post->content_ar)) }}
                                                @endif
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <b>
                                    <center>{{ __('translation.no posts') }} </center>
                                </b>
                            @endif

                        @else
                            @if (isset($categoryPosts))
                                @foreach ($categoryPosts as $post)
                                    <a style="direction:ltr;overflow:hidden" href="{{ route('showPost', $post->id) }}" target="_blank">
                                        <div class="small-post">
                                            <div class="img-div"> <img src="{{ asset($post->image) }}" alt="image here">
                                            </div>
                                            <h3 style="color:black;word-wrap: break-word;">{{ $post->title_en }}</h3>
                                            <span> {{ $post->user->name }} &nbsp;<i class="fas fa-user"></i></span><br>
                                            <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i
                                                    class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;

                                            @if ($post->category->name == 'مقالات شركاء')
                                                <span> {{ $post->partner->name }} &nbsp; <i class="fas fa-tags"></i> </span>
                                            @else
                                                <span> {{ $post->category->name }} &nbsp; <i class="fas fa-tags"></i>
                                                </span>
                                            @endif

                                            <p style="color:black;">
                                                @if (strlen($post->content_en) > 150)
                                                    {{ strip_tags(substr(str_replace('&nbsp;', ' ', $post->content_en), 0, 350) . '....') }}
                                                @else
                                                    {{ strip_tags(str_replace('&nbsp;', ' ', $post->content_en)) }}
                                                @endif
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <b>
                                    <center>{{ __('translation.no posts') }} </center>
                                </b>
                            @endif
                        @endif

                    </div>
                </div>

                <div class="col-md-4">
                    <!-- start social  -->
                    @include('Web.include.social')
                    <!-- end social  -->
                    <!-- start latest Partners posts -->
                    @include('Web.include.lateast-Partners-Posts')
                    <!-- end latest Partners posts -->
                    <!-- start latest posts -->
                    @include('Web.include.lateastPosts')
                    <!-- end latest posts -->
                    <!-- start latest alcrypto posts -->
                    @include('Web.include.newsAl')
                    <!-- end latest alcrypto posts -->
                    <!-- start  categoreis -->
                    @include('Web.include.catPart')
                    <!-- end categoreis -->
                    <!-- start contr  -->
                    @include('Web.include.contr')
                    <!-- end contr  -->
                </div>
            </div>
        </div>
    </div>
    @include('Web.include.underfooter')
    @include('Web.include.footer')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YN940EKWRS"></script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
        crossorigin="anonymous"></script>

    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YN940EKWRS');
    </script>
</body>     