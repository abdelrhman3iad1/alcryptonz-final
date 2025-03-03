<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALCRYPTONZ - نتائج البحث</title>

    <!-- Include Header -->
    @include("Web.include.header")

    <!-- Custom Styling -->
    <link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">

    <!-- Google Ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
    crossorigin="anonymous"></script>
</head>
<body id="top-page">
    <!-- Start Navbar -->
    @include("Web.include.anotherNavBar")
    <!-- End Navbar -->

    <!-- Start Arrow to Top Page -->
    <a href="#top-page" style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;">
        <i class="fas fa-chevron-circle-up" style="border:1px solid white;"></i>
    </a>
    <!-- End Arrow to Top Page -->

    <!-- Start Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="header-title">نتائج البحث</h2>
                    <div class="parent-news">
                        @if ($posts->isEmpty())
                            <b><center>لا يوجد منشورات متعلقة بهذا الذي تبحث عنه</center></b>
                        @else
                            @foreach ($posts as $post)
                                <!-- Post -->
                                <a style="direction:rtl;overflow:hidden" href="" target="_blank">
                                    <div class="small-post">
                                        <div class="img-div">
                                            <img src="{{ asset( $post->image) }}" alt="صورة المنشور">
                                        </div>
                                        <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }}</h3>
                                        <span>{{ $post->user->name }} &nbsp;<i class="fas fa-user"></i></span><br>
                                        <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                                        <span>{{ $post->category->name }} &nbsp; <i class="fas fa-tags"></i></span>
                                        <p style="color:black;">
                                            @if (strlen($post->content_ar) > 150)
                                                {{ strip_tags(substr($post->content_ar, 0, 350)) }}....
                                            @else
                                                {{ strip_tags($post->content_ar) }}
                                            @endif
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Start Social -->
                    @include("Web.include.social")
                    <!-- End Social -->

                    <!-- Start Latest Partners Posts -->
                    @include("Web.include.lateast-Partners-Posts")
                    <!-- End Latest Partners Posts -->

                    <!-- Start Latest Posts -->
                    @include("Web.include.lateastPosts")
                    <!-- End Latest Posts -->

                    <!-- Start Latest Alcrypto Posts -->
                    @include("Web.include.newsAl")
                    <!-- End Latest Alcrypto Posts -->

                    <!-- Start Categories -->
                    @include("Web.include.catPart")
                    <!-- End Categories -->

                    <!-- Start Contributors -->
                    @include("Web.include.contr")
                    <!-- End Contributors -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    @include("Web.include.underfooter")
    <!-- End Footer -->

    @include("Web.include.footer")
</body>
</html>