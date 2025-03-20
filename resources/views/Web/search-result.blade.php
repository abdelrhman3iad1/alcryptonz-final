<?php
/*
include 'include/connection.php';
date_default_timezone_set('Africa/Cairo');
session_start();
include 'include/header.php'; */
?>
@include('Web.include.header')


<title>ALCRYPTONZ</title>
<!-- Custom Styling -->
{{-- <link rel="stylesheet" href="css/style.css"> --}}
<link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
    crossorigin="anonymous"></script>
</head>

<body id="top-page">
    <!-- start navbar -->
    <?php /* include "include/anotherNavBar.php"; */ ?>
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

                    <h2 class="header-title">نتائج البحث</h2>
                    <div class="parent-news">

                        <?php
                        /*
                        if(isset($_POST["GO"])){
                            if(hash_equals($_SESSION["keys"],$_POST["csrf"])){
                                $seczx=filter_var($_POST["search"],FILTER_SANITIZE_STRING);
                                $seczx=htmlspecialchars($seczx); 
               if(strlen($seczx)>190)
               {
                   echo "<b><center>الذي بحثت عنة كبير جدا</center></b>";
               }else{
                                           $searchWords="%".$seczx."%";
                                       $qps="select * from post where postTitle like '$searchWords' or postContent like '$searchWords' order by postId desc";
                                       @$execuations=mysqli_query($con,$qps);
                                       if(mysqli_num_rows($execuations)==0){
                                           echo "<b><center>لا يوجد منشورات متعلقة بهذا الذي تبحث عنة</center></b>";
                                               }else{
                                       while($row=mysqli_fetch_assoc($execuations)){  */
                        ?>
                        <!--POST-->

                        @forelse ($posts as $post)
                            <!--POST-->
                            @if (config('app.locale') == 'ar')
                                <!--POST-->
                                <a style="direction:rtl;overflow:hidden" href="{{ route('showPost', $post->id) }}"
                                    target='_blank'>
                                    <div class="small-post">
                                        <div class="img-div"> <img src="{{ asset($post->image) }}"
                                                alt="{{ $post->title_ar }}"></div>
                                        <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }} </h3>
                                        <span> <? /*php echo $row['postAuthor']; */?>{{ $post->user->name }}
                                            &nbsp;<i class="fas fa-user"></i></span><br>
                                        <span><?php /*echo $row['PostDate'];*/ ?>{{ $post->created_at }} &nbsp; <i
                                                class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                                        <span> <?php /*echo $row['postCategory'];*/ ?> {{ $post->category->name }} &nbsp; <i
                                                class="fas fa-tags"></i>
                                        </span>
                                        <p style="color:black;"> @php
                                            if (strlen($post->content_ar) > 150) {
                                                echo strip_tags(
                                                    substr(str_replace('&nbsp;', ' ', $post->content_ar), 0, 350) .
                                                        '....',
                                                );
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
                                        <div class="img-div"> <img src="{{ asset($post->image) }}"
                                                alt="{{ $post->title_en }}">
                                        </div>
                                        <h3 style="color:black;word-wrap: break-word;">{{ $post->title_en }} </h3>
                                        <span> <? /*php echo $row['postAuthor']; */?>{{ $post->user->name }}
                                            &nbsp;<i class="fas fa-user"></i></span><br>
                                        <span><?php /*echo $row['PostDate'];*/ ?>{{ $post->created_at }} &nbsp; <i
                                                class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                                        <span> <?php /*echo $row['postCategory'];*/ ?> {{ $post->category->name }} &nbsp; <i
                                                class="fas fa-tags"></i>
                                        </span>
                                        <p style="color:black;"> @php
                                            if (strlen($post->content_en) > 150) {
                                                echo strip_tags(
                                                    substr(str_replace('&nbsp;', ' ', $post->content_en), 0, 350) .
                                                        '....',
                                                );
                                            } else {
                                                echo strip_tags(str_replace('&nbsp;', ' ', $post->content_en));
                                            }
                                        @endphp </p>
                                    </div>
                                </a>
                            @endif
                        @empty
                            <b>
                                <center>{{ __('translation.No Exisiting Posts') }}</center>
                            </b>
                        @endforelse


                    </div>
                </div>

                <div class="col-md-4">
                    <!-- start social  -->
                    <?php /* include_once 'include/social.php'; */  ?>
                    @include('Web.include.social')
                    <!-- end social  -->
                    <!-- start latest Partners posts -->
                    <?php /* include_once 'include/lateast-Partners-Posts.php'; */  ?>
                    @include('Web.include.lateast-Partners-Posts')
                    <!-- end latest Partners posts -->
                    <!-- start latest posts -->
                    @include('Web.include.lateastPosts')

                    <?php /* include_once 'include/lateastPosts.php'; */ ?>
                    <!-- end latest posts -->
                    <!-- start latest alcrypto posts -->
                    @include('Web.include.newsAl')

                    <?php /* include_once 'include/newsAl.php'; */  ?>
                    <!-- end latest alcrypto posts -->
                    <!-- start  categoreis -->
                    @include('Web.include.catPart')

                    <?php /* include_once 'include/catPart.php'; */  ?>
                    <!-- end categoreis -->
                    <!-- start contr  -->
                    @include('Web.include.contr')

                    <?php /* include_once 'include/contr.php'; */ ?>
                    <!-- end contr  -->
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- start footer -->
    <?php /*include_once 'include/underfooter.php'; ?> ?> ?>
    <!-- end footer -->
    <?php include_once 'include/footer.php'; */?>

    @include('Web.include.underfooter')
    @include('Web.include.footer')
