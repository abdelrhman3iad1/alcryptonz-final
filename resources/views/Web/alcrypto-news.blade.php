<?php
//   include "include/connection.php";
//   date_default_timezone_set("Africa/Cairo");
//   session_start();
//   include "include/header.php";
   ?>
@include("Web.include.header")


 <title>ALCRYPTONZ</title>
    <!-- Custom Styling -->
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
<link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">

</head>

<body id="top-page">
    <!-- start navbar -->
    <?php /* include "include/anotherNavBar.php"; */ ?>
    @include('Web.include.anotherNavBar')

    <!-- end navbar -->
    <!--start Arrow to top Page -->
<a href="#top-page" style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;" ><i class="fas fa-chevron-circle-up" style="border:1px solid white;"></i></a>
<!--End Arrow to top Page -->
        <!-- start content -->
        <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <h2>{{__('translation.Crypto News')}}</h2>
                <div class="parent-news">
              
                <?php
                /*
                        if(isset($_GET["potype"]) && !empty($_GET["potype"])){
                            $cryptoN=filter_var($_GET["potype"],FILTER_SANITIZE_STRING);  
                            $rtyu="أخبار الكريبتو";
                            $rtyux="اخبار الكربتو";
                            $rtyuxx="أخبار الكربتو";
                        $qpsa="select * from post where postCategory='$cryptoN' or postCategory= '$rtyu'
                         or postCategory= '$rtyux'  or postCategory= '$rtyuxx' order by postId desc";
                        @$execuationsa=mysqli_query($con,$qpsa) or die(mysqli_error($con));
                        if(mysqli_num_rows($execuationsa)==0){
                            echo "<b><center>لا يوجد منشورات  موجودة  في اخبار الكريبتو</center></b>";
                                }else{
                        while($row=mysqli_fetch_assoc($execuationsa)){  */?>
                        @if ($posts->isEmpty())
                        <b><center>{{__('translation.No Exisiting Posts')}}</center></b>
                        @else
                        @foreach ($posts as $post )
                                                @if (config('app.locale')=="ar")
                                                
                                                <!--POST-->
                                                <a style="direction:rtl;overflow:hidden" href="{{ route('showPost', $post->id) }}"
                                                    target='_blank'>
                                                    <div class="small-post">
                                                        <div class="img-div"> <img src="{{asset($post->image)}}"
                                                                alt="{{ $post->title_ar }}"></div>
                                                        <h3 style="color:black;word-wrap: break-word;">{{$post->title_ar}} </h3>
                                                        <span> <? /*php echo $row['postAuthor']; */?>{{$post->user->name}} &nbsp;<i class="fas fa-user"></i></span><br>
                                                        <span><?php /*echo $row['PostDate'];*/ ?>{{$post->created_at}} &nbsp; <i class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                                                        <span> <?php /*echo $row['postCategory'];*/ ?> {{$post->category->name}} &nbsp; <i class="fas fa-tags"></i> </span>
                                                        <p style="color:black;"> @php
                                                        if (strlen($post->content_ar) > 150) {
                                                            echo strip_tags(substr(str_replace('&nbsp;', ' ', $post->content_ar), 0, 350) . '....');
                                                        } else {
                                                            echo strip_tags(str_replace('&nbsp;', ' ', $post->content_ar));
                                                        }
                                                        @endphp </p>
                                                    </div>
                                                </a>
                                                @else
                                                <a style="direction:ltr;overflow:hidden" href="{{ route('showPost', $post->id) }}"
                                                    target='_blank'>
                                                    <div class="small-post">
                                                        <div class="img-div"> <img src="{{asset($post->image)}}"
                                                                alt="{{ $post->title_en }}"></div>
                                                        <h3 style="color:black;word-wrap: break-word;">{{$post->title_en}} </h3>
                                                        <span> <? /*php echo $row['postAuthor']; */?>{{$post->user->name}} &nbsp;<i class="fas fa-user"></i></span><br>
                                                        <span><?php /*echo $row['PostDate'];*/ ?>{{$post->created_at}} &nbsp; <i class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                                                        <span> <?php /*echo $row['postCategory'];*/ ?> {{$post->category->name}} &nbsp; <i class="fas fa-tags"></i> </span>
                                                        <p style="color:black;"> @php
                                                        if (strlen($post->content_en) > 150) {
                                                            echo strip_tags(substr(str_replace('&nbsp;', ' ', $post->content_en), 0, 350) . '....');
                                                        } else {
                                                            echo strip_tags(str_replace('&nbsp;', ' ', $post->content_en));
                                                        }
                                                        @endphp </p>
                                                    </div>
                                                </a>
                                                @endif
                                             
                        @endforeach
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
        @include("Web.include.underfooter")
        @include("Web.include.footer")
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YN940EKWRS"></script>
<script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
     crossorigin="anonymous"></script>
     
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YN940EKWRS');
</script>