<?php
/*  include "include/connection.php";
  date_default_timezone_set("Africa/Cairo");
  session_start(); */?>

    
    @include("Web.include.header")
    


 <title>ALCRYPTONZ</title>
    <!-- Custom Styling -->
    <link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
    crossorigin="anonymous"></script>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
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

    <!-- start navbar -->
    {{-- @include("include/navbar"); --}}
    @include("Web.include.navbar")
    <?php  /*include_once "include/navbar.php";*/?>
    <!-- end navbar -->
    <!--start partners news -->
<div class="parrent-sliders"style="background-color:#171924 !important">
    
    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>
    <div id="coinmarketcap-widget-marquee" coins="1,1027,825,5444" currency="USD" theme="dark" transparent="true" show-symbol-logo="true"></div>

</div>
</div>

<!--End partners news -->
<!--start main-->

<main >
    <div class="container">

    <div class="words">
    <h1>ALCRYPTONZ</h1>
    <h3>Hard Choices, Great Destiny</h3>
    <h5>فريق عربي يهدف إلى الربط بين عالم العملات الرقمية والحياة اليومية</h5>
    <a href="aboutus.php">{{__("translation.Who We Are")}}</a> 
    <div class="d-flex flex-column align-items-center">
    </div>
</div>



    </div>
    <svg class='editorial-border' preserveAspectRatio='none' viewBox='0 24 150 28 ' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
<defs>
<path d='M-160 44c30 0      58-18 88-18s     58 18 88 18      58-18 88-18      58 18 88 18     v44h-352z' id='gentle-wave'></path>
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

<!--start Arrow to top Page -->
<a href="#top-page" style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;" ><i class="fas fa-chevron-circle-up" style="border:1px solid white;"></i></a>
<!--End Arrow to top Page -->
<!--End main-->
<!--start sevices -->
<!-- Banner Ad Placeholder -->
<div class="ad-banner bg-light py-2 mt-4 d-flex justify-content-center align-items-center col-md-10 col-11 mx-auto" 
     style="border: 1px dashed gray;">
    <div class="row w-100">
        <!-- Content Section -->
        <!-- Image Section -->
        @if(isset($promotions[0]))

        <div class="col-md-5">
            <img src="{{ asset($promotions[0]->image) }}" alt="{{ $promotions[0]->name }}" class="w-100">
        </div>
        <div class="col-md-7 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
            <h3>{{ $promotions[0]->name }}</h3>
            <p class="mt-3 text-center"> {{ $promotions[0]->description }}</p>
            <a href="{{ $promotions[0]->website_url }}" class="btn btn-primary mt-2">Visit Here</a>
        </div>
        @else

        <div class="col-md-5">
            <img src="images/chanel-1.jpg" alt="chanel-brand" class="w-100">
        </div>
        <div class="col-md-7 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
            <h3>Banner Title</h3>
            <p class="mt-3 text-center">Banner Ad Placeholder (Your Ad Content Here)</p>
            <a href="" class="btn btn-primary mt-2">Link1</a>
        </div>
        @endif
        
    </div>
</div>


<div class="services" id="se">
    <!-- Static grid for larger viewports -->
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

    <!-- Carousel for mobile viewports -->
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
    <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
  </div>
</div>

</div>

<!--End sevices -->
<!--start partners-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"style="    background: linear-gradient( 125deg, #00FF57 0%, #010033 40%, #460043 70%, #F0FFC5 100%), linear-gradient( 55deg, #0014C9 0%, #410060 100%), linear-gradient( 300deg, #FFC700 0%, #001AFF 100%), radial-gradient(135% 215% at 115% 40%, #393939 0%, #393939 40%, #849561 calc(40% + 1px), #849561 60%, #EED690 calc(60% + 1px), #EED690 80%, #ECEFD8 calc(80% + 1px), #ECEFD8 100%), linear-gradient( 125deg, #282D4F 0%, #282D4F 40%, #23103A calc(40% + 1px), #23103A 70%, #A0204C calc(70% + 1px), #A0204C 88%, #FF6C00 calc(88% + 1px), #FF6C00 100%);
    background-image: linear-gradient( 125deg, rgb(0, 255, 87) 0%, rgb(1, 0, 51) 40%, rgb(70, 0, 67) 70%, rgb(240, 255, 197) 100%), linear-gradient( 55deg, rgb(0, 20, 201) 0%, rgb(65, 0, 96) 100%), linear-gradient( 300deg, rgb(255, 199, 0) 0%, rgb(0, 26, 255) 100%), radial-gradient(135% 215% at 115% 40%, rgb(57, 57, 57) 0%, rgb(57, 57, 57) 40%, rgb(132, 149, 97) calc(40% + 1px), rgb(132, 149, 97) 60%, rgb(238, 214, 144) calc(60% + 1px), rgb(238, 214, 144) 80%, rgb(236, 239, 216) calc(80% + 1px), rgb(236, 239, 216) 100%), linear-gradient( 125deg, rgb(40, 45, 79) 0%, rgb(40, 45, 79) 40%, rgb(35, 16, 58) calc(40% + 1px), rgb(35, 16, 58) 70%, rgb(160, 32, 76) calc(70% + 1px), rgb(160, 32, 76) 88%, rgb(255, 108, 0) calc(88% + 1px), rgb(255, 108, 0) 100%);
    background-position-x: initial, initial, initial, initial, initial;
    background-position-y: initial, initial, initial, initial, initial;
    background-size: initial, initial, initial, initial, initial;
    /*background-repeat-x: initial, initial, initial, initial, initial;
    background-repeat-y: initial, initial, initial, initial, initial;*/
    background-attachment: initial, initial, initial, initial, initial;
    background-origin: initial, initial, initial, initial, initial;
    background-clip: initial, initial, initial, initial, initial;
    background-color: initial;
    background-blend-mode: overlay, screen, overlay, overlay, normal;padding:20px 20px 50px 20px;position:relative;">
<!--SVG-->
<div class="custom-shape-divider-top-1629555121">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
<!--SVG-->
<h2 class ="inside-slider"style="padding-top:30px;font-weight:bold"><i class="far fa-handshake"></i> &nbsp;  {{__("translation.Collabs")}} </h2>
  <ol class="carousel-indicators">
  <?php /*
$queaa="select * from partner";
$execezza=mysqli_query($con,$queaa);
$ty=-1;
while($row=mysqli_fetch_assoc($execezza)){ 
    $ty++; 
*/?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php /* echo $ty; */?>" class="sd"></li>
<?php /* }*/ ?>
  </ol>
  <div class="carousel-inner"style="border-radius:10px">
  <?php /*
$queaaa="select * from partner";
$execezzaz=mysqli_query($con,$queaaa);
while($row=mysqli_fetch_assoc($execezzaz)){ 
*/?>
    <div class="carousel-item">
      <a href=" <?php /* echo $row["partnerLink"]; */?>
" style="text-align:center"><div class="cover-ph"style="border-radius: 5px 50px 5px 50px  "> <img style="border-radius:20px " src='uploads/partnerImages/<?php /* echo $row["partnerImage"];*/ ?>'alt='collabs partner at Alcryptonz' ></div></a>
    </div>
<?php /* }  */ ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

    <i class="carousel-control-prev-icon fas fa-chevron-left prev"aria-hidden="true"style="color:white !important;font-size:21px !important"></i>
    <span class="sr-only">{{__("translation.Previous")}}</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <i class="carousel-control-next-icon fas fa-chevron-right next"aria-hidden="true"style="color:white !important;font-size:21px !important"></i>
    <span class="sr-only">{{__("translation.Next")}}</span>
  </a>
</div>
<!--End partners-->

<!--start partners news -->
<div class="page-wrapper"style="padding:10px;text-align:center;overflow:hidden !important">
<div class="post-slider" style="margin-bottom:30px;">
<h3 class="slider-title"><i class="far fa-newspaper"></i> &nbsp;{{__("translation.Collabs News")}} </h3>
 
    <div class="post-wrapper">
      

                   <!--post-->
                   @foreach ($posts as $post)
                   <div class="post"style="direction:rtl;overflow:hidden">
                       <div class="div-img"><a href="post.php?idPost={{ $post->id }}"target='_blank'>
                               @if ($post->image)
                                   <img src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}">
                               @else
                                   <img src="{{ asset('images/placeholder.jpg') }}" alt="No Image Available">
                               @endif
                           </a></div>
                       <a href="post.php?idPost={{ $post->id }}"target='_blank'>
                        @if (config('app.locale') == 'ar')
                        <h4 style="color:black;word-wrap: break-word;">{{ $post->title_ar }} </h4>
                        
                        @else
                           <h4 style="color:black;word-wrap: break-word;">{{ $post->title_en }} </h4>
                        @endif
                       </a>
                       <span> {{ $post->user->name }} &nbsp;<i class="fas fa-user"></i></span><br>
                       <span>{{ $post->created_at->format('Y-m-d') }} &nbsp; <i
                               class="far fa-calendar-alt"></i></span>
                       <span> {{ $post->category->name }} &nbsp; <i class="fas fa-tags"></i> </span>
                       <p style="color:black;"> </p>

           </div>
           @endforeach


             </div>
      <p style="text-align:center;color:green"><i class="fas fa-hand-point-left"></i> مرر يمينا او يسارا <i class="fas fa-hand-point-right"></i><br> لمشاهدة منشورات اخري </p>
</div>
</div>
<!--End partners news -->
<!--start show all partners posts  -->
<div style="text-align:center;padding:20px 0"id="ar">
<a class="show-butx" href="show-all-partners-posts.php">{{__("translation.Show More")}}</a>
</div>
<!--End show all partners posts  -->


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

<!--start recent posts    -->
<div class="page-wrapper"style="padding:10px;text-align:center;overflow:hidden !important">
<div class="post-slider" style="margin-bottom:30px;">
<h3 class="slider-title"><i class="fas fa-clock"></i> &nbsp;{{__("translation.Recent Blog Posts")}}</h3>
<p  style="text-align:center;color:gray;padding:10px">{{__("translation.Stay up to date with New posts related to Cryptocurrency.")}}</p>
    <!--<i class="fas fa-chevron-left prev"></i>
    <i class="fas fa-chevron-right next"></i>-->
    <div class="post-wrapper">
      
        <?php /*
 
 
$que="select * from post where knowMe <1  order by postId desc";
$execez=mysqli_query($con,$que);
$v=0;
while($row=mysqli_fetch_assoc($execez)){ 
    $v++;
*/
?>


     <!--post-->
       
     <div class="post"style="direction:rtl;overflow:hidden">
     <div class="div-img"><a href="post.php?idPost=<?php /* echo $row["postId"]; */?>"target='_blank' > <img src="uploads/postImages/<?php /*echo $row["postImage"]; */?>" alt="Alcryptonz Post image"></a></div>
     <a href="post.php?idPost=<?php /*echo $row["postId"];*/ ?>"target='_blank' ><h4 style="color:black;word-wrap: break-word;"><?php /*echo $row["postTitle"];*/ ?> </h4></a>
      <span> <?php /*echo $row["postAuthor"]; */?> &nbsp;<i class="fas fa-user"></i></span><br>
      <span><?php /*echo $row["PostDate"]; */?> &nbsp; <i class="far fa-calendar-alt"></i></span>
      <span> <?php /*echo $row["postCategory"]; */?>   &nbsp; <i class="fas fa-tags"></i> </span>
      <p style="color:black;"> 
           <?php /*
                                if(strlen($row["postContent"])>150){
                                    echo strip_tags(substr(str_replace("&nbsp;"," ",$row["postContent"]),0,350)."....");
                                }else{
                                    echo strip_tags(str_replace("&nbsp;"," ",$row["postContent"]));
                                    
                                }
                                */ ?> 
                                 </p>
  </div>
  <?php /*
                                        if($v==30){
                                            break;
                                                                    }
                } 
                */?>

    </div>
     <p style="text-align:center;color:green"><i class="fas fa-hand-point-left"></i> {{__("translation.Swipe Left or Right")}}<i class="fas fa-hand-point-right"></i><br> {{__("translation.For more posts")}}</p>
</div>
</div>
<!--End recent posts -->
<div style="text-align:center;padding:10px 0 20px">

<a class="show-butx" href="show-all-posts.php">{{__("translation.Show More")}}</a>
</div>

<!--start team   -->
<div class="team d-none d-lg-block" id="te">
    <div class="container">
    <h3 style="text-align:center;padding:10px;margin-top:20px;"><i class="fas fa-clock"></i> &nbsp;  {{__("translation.Meet The Team")}}</h3>
<p style="text-align:center;padding:10px">{{__("translation.Cryptonz Team")}}</p>
        <div class="inside-team">
            <!--one-->
            <?php /*
$quea="select * from team";
$execezz=mysqli_query($con,$quea);
while($row=mysqli_fetch_assoc($execezz)){ */
?>
            <div>
                <h5><?php /* echo $row["memberName"]; */?> </h5>
                <img src='uploads/teamImages/<?php /*echo $row["memberImage"]; */?>'alt='Alcryptonz Team Member'>
            </div>
            
      
    
    </div>
        </div>
    </div>
</div>

<div class="team-slider d-block d-lg-none"> <!-- Mobile-only slider -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php  /*
            $quea="select * from team";
            $execezz=mysqli_query($con,$quea);
            while($row=mysqli_fetch_assoc($execezz))*/{ 
            ?>
            <div class="swiper-slide">
                <div class="text-center">
                    
                    <img src="uploads/teamImages/<?php /*echo $row["memberImage"]; */ ?>" 
                         class="rounded-circle img-fluid" 
                         alt="Alcryptonz Team Member: <?php /*echo $row['memberName'];*/ ?>" 
                         style="max-width: 150px;">
                    <h5 class="mt-3"><?php /* echo $row["memberName"]; */ ?></h5>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- Swiper controls -->
        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
    </div>
</div>

    <!-- Banner Ad Placeholder -->

    <div class="ad-banner bg-light py-2 mt-4 mb-4 d-flex justify-content-center align-items-center col-md-10 col-11 mx-auto" 
     style="border: 1px dashed gray;">
    <div class="row w-100">
        <!-- Content Section -->
        <!-- Image Section -->
        @if(isset($promotions[1]))
        <div class="col-md-5">
            <img src="{{ asset($promotions[1]->image) }}" alt="{{ $promotions[1]->name }}" class="w-100">
        </div>
        <div class="col-md-7 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
            <h3>{{ $promotions[1]->name }}</h3>
            <p class="mt-3 text-center"> {{ $promotions[1]->description }}</p>
            <a href="{{ $promotions[1]->website_url }}" class="btn btn-primary mt-2">Visit Here</a>
        </div>

        @else
            <div class="col-md-5">
            <img src="images/chanel-1.jpg" alt="chanel-brand" class="w-100">
        </div>
        <div class="col-md-7 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
            <h3>Banner Title</h3>
            <p class="mt-3 text-center">Banner Ad Placeholder (Your Ad Content Here)</p>
            <a href="" class="btn btn-primary mt-2">Link1</a>
        </div>
    </div>
    @endif
</div>




<!--End team   -->

<!--start search bar-->
<!-- <div class="search" id="ser">
    <div class="container">
        <div class="parent-search">
            <div>
                <?php /*
                                  if(empty($_SESSION["key"])){
                                    $_SESSION["key"]=bin2hex(random_bytes(32));
                                  }
                                  $csrf=hash_hmac("sha256","this is some string : search-result.php",$_SESSION["key"]);
                                  $_SESSION["keys"]=$csrf;
                */?>
                <h1>Search This Blog For Great Content</h1>
                <form action ="search-result.php" method="POST">
                <input type="text" placeholder="Search This Blog" name="search"required>
                <input type="hidden"  name="csrf"value="<?php /*echo $csrf; */?>">
                <button  name="GO">Search This Blog</button>
                </form>
                <span>
                <a href="https://www.facebook.com/Alcryptonz" target="_blank"> <i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/Alcyptonz?s=09" target="_blank"> <i class="fab fa-twitter-square"></i></a>
                <a href="https://t.me/Al_Cryptonz" target="_blank"><i class="fab fa-telegram"></i></a>
            </span>
            </div>
             <div>
                <img src="https://1.bp.blogspot.com/-dyvLswGnHGU/YGAi-pKfBII/AAAAAAAAKXM/uwDsptHfftUgu7CA4G9MjMXYqxEvQv7qgCNcBGAsYHQ/s16000/man-with-laptop.png" alt="image here">
            </div>
        </div>
    </div>
</div> -->
<!--End search bar-->

<!--start map-->
<!-- <div class="map">
<iframe allowfullscreen='' height='450' loading='lazy' src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14610049.559018178!2d21.856659345987513!3d26.61943941976208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2sEgypt!5e0!3m2!1sen!2skw!4v1627703361108!5m2!1sen!2skw' style='border:0;' width='100%'></iframe>
</div> -->
<!--end map-->
   
    <!-- start footer -->
    @include("Web.include.underfooter")
    <?php /* include_once "include/underfooter.php";*/ ?>
    <!-- end footer -->
    @include("Web.include.footer")

    <?php /* include_once "include/footer.php";*/ ?>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YN940EKWRS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YN940EKWRS');
</script>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#converter-form').on('submit', function (e) {
        e.preventDefault(); // منع إعادة تحميل الصفحة

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
                    var toCurrency = $("#toCurrency").val(); // جلب العملة المختارة من المستخدم

                    // استخراج السعر بناءً على العملة المختارة
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
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> --}}

 