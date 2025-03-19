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
                    <h2 class="header-title">{{__('translation.Q&A')}}</h2>
                    <div class="post">
                        <!-- Start form search -->
                        <div class="form-qa"  >
                            <form action="{{ route('qa.search') }}" method="POST"
                                style='text-align:center !important; '>
                                @csrf
                                <button style="direction: {{__('translation.notDir')}}" name="goSearch"><i class="fas fa-search"></i></button>
                                <input type="text"  placeholder="{{__('translation.Search for a Question')}}" name="searched" required>
                            </form>
                        </div>
                        <!-- End form search -->

                        <!-- Start result search -->
                        @if (isset($searchResults))
                        

                            <h3 class='header-title'>{{__('translation.Search Results')}}</h3>
                                <!-- Question -->
                        @forelse($searchResults as $searchResult)
                            @if (config('app.locale')=="ar")

                                <div class="quasion" style="overflow:hidden !important">
                                    <div class="ask" style="overflow:scroll !important;direction: {{__('translation.dir')}} !important">
                                        {!! str_replace('&nbsp;', ' ', $searchResult->question_ar) !!} <i class="fas fa-question-circle"></i>
                                    </div>
                                    <div class="answer" style="overflow:scroll !important;direction:{{__('translation.dir')}} !important">
                                        {!! str_replace('&nbsp;', ' ', $searchResult->answer_ar) !!}
                                    </div>
                                </div>
                            @else
                            <div class="quasion" style="overflow:hidden !important">
                                <div class="ask" style="overflow:scroll !important;direction: {{__('translation.dir')}} !important">
                                    {!! str_replace('&nbsp;', ' ', $searchResult->question_en) !!} <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="answer" style="overflow:scroll !important;direction:{{__('translation.dir')}} !important">
                                    {!! str_replace('&nbsp;', ' ', $searchResult->answer_en) !!}
                                </div>
                            </div>
                            @endif
                            @empty
                                <b style='padding:10px;'>
                                    <center>{{__('translation.No Questions as You Searched')}}</center>
                                </b>
                            @endforelse
                        @endif

                        <!-- End search result -->

                        <h3 class="header-title">{{__('translation.All Questions')}}</h3>
                        @forelse($qas as $qa)
                        @if (config('app.locale')=="ar")

                            <!-- Question -->
                            <div class="quasion" style="overflow:hidden !important">
                                <div class="ask" style="overflow:scroll !important;direction:{{__('translation.dir')}} !important">
                                    {!! str_replace('&nbsp;', ' ', $qa->question_ar) !!} <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="answer" style="overflow:scroll !important;direction:{{__('translation.dir')}} !important">
                                    {!! str_replace('&nbsp;', ' ', $qa->answer_ar) !!}
                                </div>
                            </div>                                
                            @else
                            <div class="quasion" style="overflow:hidden !important">
                                <div class="ask" style="overflow:scroll !important;direction:{{__('translation.dir')}} !important">
                                    {!! str_replace('&nbsp;', ' ', $qa->question_en) !!} <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="answer" style="overflow:scroll !important;direction:{{__('translation.dir')}} !important">
                                    {!! str_replace('&nbsp;', ' ', $qa->answer_en) !!}
                                </div>
                            </div>   
                            @endif
                        @empty
                            <b>
                                <center>{{__('translation.No Questions')}}</center>
                            </b>
                        @endforelse
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
