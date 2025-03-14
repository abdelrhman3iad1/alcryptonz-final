@include('Web.include.header')

<title>ALCRYPTONZ
</title>
<!-- Custom Styling -->
<link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
    crossorigin="anonymous"></script>
</head>

<body id="top-page">
    <!--start Arrow to top Page -->
    <a href="#top-page"
        style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;"><i
            class="fas fa-chevron-circle-up" style="border:1px solid white;"></i></a>
    <!--End Arrow to top Page -->
    <!-- start navbar -->
    @include('Web.include.anotherNavBar')
    <!-- end navbar -->
    <!-- start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="header-title">Show All Collabs Posts </h2>
                    <div class="parent-news">

                            @if(isset($partnerPosts))
                        <!--post-->
                        @foreach ($partnerPosts as $post)
                            <a style="direction:rtl;overflow:hidden"
                            href="{{ route('showPost', $post->id) }}" target="_blank">
                            <div class="small-post">
                                    <div class="img-div"> <img src="{{ asset($post->image) }}" alt="image here"></div>
                                    <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }}</h3>
                                    <span> {{ $post->user->name }} &nbsp;<i class="fas fa-user"></i></span><br>
                                    <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i
                                            class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                                    <span> {{ $post->partner->name }} &nbsp; <i class="fas fa-tags"></i> </span>
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
                        <b><center>لا يوجد منشورات   </center></b>
                        @endif
                            
                    </div>
                </div>
               
                <div class="col-md-4">
                    <!-- start social  -->
                    <?php /* include_once 'include/social.php'; */  ?>
                    @include("Web.include.social")
                    <!-- end social  -->
                    <!-- start latest Partners posts -->
                    <?php /* include_once 'include/lateast-Partners-Posts.php'; */  ?>
                    @include("Web.include.lateast-Partners-Posts")
                    <!-- end latest Partners posts -->
                    <!-- start latest posts -->
                    @include("Web.include.lateastPosts")

                    <?php /* include_once 'include/lateastPosts.php'; */ ?>
                    <!-- end latest posts -->
                    <!-- start latest alcrypto posts -->
                    @include("Web.include.newsAl")

                    <?php /* include_once 'include/newsAl.php'; */  ?>
                    <!-- end latest alcrypto posts -->
                    <!-- start  categoreis -->
                    @include("Web.include.catPart")

                    <?php /* include_once 'include/catPart.php'; */  ?>
                    <!-- end categoreis -->
                    <!-- start contr  -->
                    @include("Web.include.contr")

                    <?php /* include_once 'include/contr.php'; */ ?>
                    <!-- end contr  -->
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- start footer -->
    @include('Web.include.underfooter')
    @include('Web.include.footer')
