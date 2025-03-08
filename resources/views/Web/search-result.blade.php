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
    <a href="#top-page" class="scroll-to-top">
        <i class="fas fa-chevron-circle-up"></i>
    </a>
    <!-- End Arrow to Top Page -->

    <!-- Start Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-8">
                    <h2 class="header-title">نتائج البحث</h2>
                    <div class="parent-news">
                        @if ($posts->isEmpty())
                            <b><center>لا يوجد منشورات متعلقة بهذا الذي تبحث عنه</center></b>
                        @else
                            @foreach ($posts as $post)
                                <!-- Post -->
                                <a href="{{ route('posts.show', $post->id) }}" class="post-link">
                                    <div class="small-post">
                                        <div class="img-div">
                                            <img src="{{ asset($post->image) }}" alt="صورة المنشور">
                                        </div>
                                        <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }}</h3>
                                        <div class="post-meta">
                                            <span>{{ $post->user->name ?? 'مستخدم مجهول' }} <i class="fas fa-user"></i></span>
                                            <span>{{ $post->created_at->format('Y-m-d') }} <i class="far fa-calendar-alt"></i></span>
                                            <span>{{ $post->category->name ?? 'بدون تصنيف' }} <i class="fas fa-tags"></i></span>
                                        </div>
                                        <p>
                                            @if (strlen($post->content_ar) > 150)
                                                {{ Str::limit(strip_tags($post->content_ar), 350) }}...
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

                <!-- Sidebar -->
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
                    <div class="categories">
                        <h4>كلمات دلالية</h4>
                        <ul>
                            @forelse($categories as $category)
                                <a href="">
                                    <li>
                                        <span>{{ $category->name }}</span>
                                        <span><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                </a>
                            @empty
                                <li>
                                    <b><center>لا يوجد تصنيفات</center></b>
                                </li>
                            @endforelse
                        </ul>
                    </div>
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