@include('Web.include.header')


<title>Q&A
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
    <!-- View: resources/views/web/qa.blade.php -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="header-title">Q&A</h2>
                    <div class="post">
                        <!-- Start form search -->
                        <div class="form-qa">
                            <form action="{{ route('qa.search') }}" method="POST"
                                style='text-align:center !important;'>
                                @csrf
                                <button name="goSearch"><i class="fas fa-search"></i></button>
                                <input type="text" placeholder="بحث عن سؤال" name="searched" required>
                            </form>
                        </div>
                        <!-- End form search -->

                        <!-- Start result search -->
                        @if (session('searchResults'))
                            <h3 class='header-title'>نتائج البحث</h3>
                            @forelse(session('searchResults') as $qa)
                                <!-- Question -->
                                <div class="quasion" style="overflow:hidden !important">
                                    <div class="ask" style="overflow:scroll !important;direction: rtl !important">
                                        {!! str_replace('&nbsp;', ' ', $qa->question_ar) !!} <i class="fas fa-question-circle"></i>
                                    </div>
                                    <div class="answer" style="overflow:scroll !important;direction: rtl !important">
                                        {!! str_replace('&nbsp;', ' ', $qa->answer_ar) !!}
                                    </div>
                                </div>
                            @empty
                                <b style='padding:10px;'>
                                    <center>لا يوجد أي سؤال متعلق بالذي تبحث عنة</center>
                                </b>
                            @endforelse
                        @endif
                        <!-- End search result -->

                        <h3 class="header-title">جميع الاسئلة</h3>
                        @forelse($qas as $qa)
                            <!-- Question -->
                            <div class="quasion" style="overflow:hidden !important">
                                <div class="ask" style="overflow:scroll !important;direction: rtl !important">
                                    {!! str_replace('&nbsp;', ' ', $qa->question_ar) !!} <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="answer" style="overflow:scroll !important;direction: rtl !important">
                                    {!! str_replace('&nbsp;', ' ', $qa->answer_ar) !!}
                                </div>
                            </div>
                        @empty
                            <b>
                                <center>لا يوجد اسئلة</center>
                            </b>
                        @endforelse
                    </div>
                </div>

                <div class="col-md-4">
                    @include('web.include.social')
                    @include('web.include.lateast-Partners-Posts')
                    @include('web.include.lateastPosts')
                    @include('web.include.newsAl')
                    <div class="categories">
                        <h4>كلمات دلالية</h4>
                        <ul>
                            @forelse($categories as $category)
                                <a href="">
                                    <li>
                                        @if ($category->name == 'مقالات شركاء')
                                            @foreach ($partners as $partner)
                                                <span> {{ $partner->name }} </span>
                                            @endforeach
                                        @else
                                            <span> {{ $category->name }} </span>
                                        @endif
                                        <span><i class="fas fa-chevron-right"></i></span>
                                    </li>
                                </a>
                            @empty
                                <li>
                                    <b>
                                        <center>لا يوجد تصنيفات</center>
                                    </b>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    @include('web.include.contr')
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- start footer -->
    <!-- end footer -->
    @include('Web.include.underfooter')

    @include('Web.include.footer')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YN940EKWRS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-YN940EKWRS');
    </script>
