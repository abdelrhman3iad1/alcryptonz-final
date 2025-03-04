

@include('Web.include.header')
 <title>ALCRYPTONZ
</title>
    <!-- Custom Styling -->
    <link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">
</head>

<body id="top-page">
    <!-- start navbar -->
    @include('Web.include.navbar')
    <!--start Arrow to top Page -->
<a href="#top-page" style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;" ><i class="fas fa-chevron-circle-up" style="border:1px solid white;"></i></a>
<!--End Arrow to top Page -->
        <!-- start content -->
        <div class="parent-header-about">
        <div class="container">
        <div class="header-about">
            <img src="{{asset("images/new-big-logo.jpeg")}}" alt="Alcryptonz-logo" >

<h1>{{__('translation.who')}}</h1>
<div style="direction:rtl">{{__('translation.About1')}}<br>
{{__('translation.About2')}}</div>
        </div>
        </div>
    </div>
    <div class="parent-ourvision"style="position:relative">
        <!--start SVG-->
        <div class="custom-shape-divider-top-1629452879">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M1200 0L0 0 598.97 114.72 1200 0z" class="shape-fill"></path>
    </svg>
</div>
<!--end SVG-->
        <div class="container">
        <div class="ourvision">
<div>
<img src="{{asset("images/main.jpg")}}" alt="image here">
</div>
<div>
<h1>{{__('translation.Our Vision')}} </h1>
<ul>
<li>{{__('translation.vision1')}}</li>
<li>{{__('translation.vision2')}}</li>
</ul>

{{__('translation.vision3')}}
</div>
        </div>
    </div>
    </div>
    <!-- end content -->
        <!-- start footer -->
        @include('Web.include.underfooter')
    <!-- end footer -->
    @include('Web.include.footer')

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YN940EKWRS"></script>
<script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
     crossorigin="anonymous"
      window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YN940EKWRS');
     ></script>

</script>
