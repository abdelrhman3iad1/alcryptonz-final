<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add this in your layout's <head> section -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
         .btn-style {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        /* Space between icon and text */
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    /* Like button styling */
    .like-btn {
        background-color: #4CAF50;
        /* Green */
        color: white;
    }

    .like-btn:hover {
        background-color: #45a049;
        /* Darker green */
        transform: scale(1.05);
        /* Slightly enlarge on hover */
    }

    /* Dislike button styling */
    .dislike-btn {
        background-color: #f44336;
        /* Red */
        color: white;
    }

    .dislike-btn:hover {
        background-color: #d32f2f;
        /* Darker red */
        transform: scale(1.05);
        /* Slightly enlarge on hover */
    }

    /* Icon styling */
    .icon {
        font-size: 18px;
    }

    /* Message styling */
    .message {
        margin-top: 10px;
        font-size: 14px;
        color: #555;
    }

    /* Container for Like and Dislike buttons */
    .likes-dislikes {
        display: flex;
        gap: 10px;
        /* المسافة بين الـ buttons */
        margin-top: 10px;
    }

    /* Base button styling */
    .btn-style {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        /* المسافة بين الأيقونة والنص */
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    /* Like button styling */
    .like-btn {
        background-color: #4CAF50;
        /* لون أخضر */
        color: white;
    }

    .like-btn:hover {
        background-color: #45a049;
        /* لون أخضر غامق */
        transform: scale(1.05);
        /* تكبير بسيط عند الـ hover */
    }

    /* Dislike button styling */
    .dislike-btn {
        background-color: #f44336;
        /* لون أحمر */
        color: white;
    }

    .dislike-btn:hover {
        background-color: #d32f2f;
        /* لون أحمر غامق */
        transform: scale(1.05);
        /* تكبير بسيط عند الـ hover */
    }

    /* أيقونات Font Awesome */
    .fas {
        font-size: 16px;
    }

    /* الرسالة */
    .message {
        margin-top: 10px;
        font-size: 14px;
        color: #555;
    }

    </style>
    <meta name="email" content="contactus@alcryptonz.com">
    <link rel="canonical" href="https://www.alcryptonz.com/">
    <link rel="shortcut icon" type="image/jpeg" href='{{ asset("images/new-big-logo.jpeg") }}' />
    <link rel="stylesheet" href='{{ asset("Web/css/all.css") }}' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Web/css/style.css') }}">
    <title>{{ $post->title_ar ?? '' }}</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2473974671507788"
        crossorigin="anonymous"></script>
</head>

<body id="top-page">
    @include("Web.include.anotherNavBar")

    <a href="#top-page"
        style="position:fixed;right:15px;bottom:15px;font-size:32px; color:black;z-index:68544;background-color:white;padding:0 5px;border-radius:5px;"><i
            class="fas fa-chevron-circle-up" style="border:1px solid white;"></i></a>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post" style="direction:rtl">
                        <div class="post-image">
                            <img class="postimg" src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}">
                        </div>
                        <div class="post-title posttir" style='overflow:hidden !important'>
                            <h2 style='width:100%;  word-wrap: break-word;'> {{ $post->title_ar }}</h2>
                        </div>
                        <div class="share-post" style='direction:ltr !important'>
                            <ul>
                                <li><a href="#" class="facebook-btn" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#" class="whats-btn" target="_blank"><i class="fab fa-whatsapp-square"></i></a></li>
                                <li> <a href="#" class="twiter-btn" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a class="email"
                                        href="mailto:?subject={{ $post->title_ar }}&amp;body={{ strip_tags(substr($post->content_ar, 0, 150) . '....') }}"
                                        onclick="window.open(this.href, 'windowName', 'width=500, height=400, left=24, top=24, scrollbars, resizable'); return false;"
                                        rel="nofollow"><i class="fas fa-envelope-square"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-details" style="overflow:hidden !important;">
                            <p class="post-info">
                                <span> {{ $post->user->name }}&nbsp;<i class="fas fa-user"></i></span><br>
                                <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i class="far fa-calendar-alt"></i></span>

                                @if ($post->category->name == 'مقالات شركاء')
                                    <span> {{ $post->partner->name }} &nbsp; <i class="fas fa-tags"></i> </span>
                                @else
                                    <span> {{ $post->category->name }} &nbsp; <i class="fas fa-tags"></i> </span>
                                @endif
                            </p>
                            <div class="post-content">
                                {!! $post->content_ar !!}
                            </div>
                            
                            <div class="likes-dislikes">
                                <button class="like-btn btn-style" data-post-id="{{ $post->id }}">
                                    <i class="fas fa-thumbs-up"></i> <!-- أيقونة Like -->
                                    <span class="like-count"
                                        data-post-id="{{ $post->id }}">{{ $post->likes()->count() }}</span>
                                </button>

                                <button class="dislike-btn btn-style" data-post-id="{{ $post->id }}">
                                    <i class="fas fa-thumbs-down"></i> <!-- أيقونة Dislike -->
                                    <span class="dislike-count"
                                        data-post-id="{{ $post->id }}">{{ $post->dislikes()->count() }}</span>
                                </button>
                            </div>
                            <div class="message" data-post-id="{{ $post->id }}"></div>
                        </div>
                    </div>

                    <div class="related-posts">
                        <h4>مقالات قد تعجبك</h4>
                        <ul>
                            @if($relatedPosts->count() > 0)
                                @foreach($relatedPosts as $relatedPost)
                                    <li>
                                        <a style="direction:rtl;text-align:right" href="{{ route('showPost', ['id' => $relatedPost->id, 'category' => $relatedPost->category->id]) }}" target="_blank">
                                            <span>
                                                <img src="{{ asset($relatedPost->image) }}" alt="{{ $relatedPost->title_ar }}" style="width:75px; height: 60px;">
                                            </span>
                                            <span style="max-height:80px;overflow:hidden">{{ $relatedPost->title_ar }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <b><center>لا يوجد منشورات متعلقة بهذا المنشور</center></b>
                            @endif
                        </ul>
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

    @include('Web.include.underfooter')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>
    <script src='ckeditor/ckeditor.js'></script>
    <script src='ckfinder/ckfinder.js'></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src='js/main.js'></script>
    <script src='js/forshare.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get the CSRF token from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Handle Like Button Click
    document.querySelectorAll('.like-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            
            // Create a form data object to send the CSRF token properly
            const formData = new FormData();
            formData.append('_token', csrfToken);
            
            fetch(`/posts/${postId}/like`, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'unauthenticated') {
                    // Handle unauthenticated user
                    const messageElement = document.querySelector(`.message[data-post-id="${postId}"]`);
                    messageElement.textContent = data.message;
                    messageElement.style.color = 'red';
                    
                    // Optionally redirect to login
                    
                } else {
                    // Update counts
                    document.querySelector(`.like-count[data-post-id="${postId}"]`).textContent = data.likes;
                    document.querySelector(`.dislike-count[data-post-id="${postId}"]`).textContent = data.dislikes;
                    
                    // Update message
                    const messageElement = document.querySelector(`.message[data-post-id="${postId}"]`);
                    messageElement.textContent = data.message;
                    messageElement.style.color = 'green';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Handle Dislike Button Click
    document.querySelectorAll('.dislike-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            
            // Create a form data object to send the CSRF token properly
            const formData = new FormData();
            formData.append('_token', csrfToken);
            
            fetch(`/posts/${postId}/dislike`, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'unauthenticated') {
                    // Handle unauthenticated user
                    const messageElement = document.querySelector(`.message[data-post-id="${postId}"]`);
                    messageElement.textContent = data.message;
                    messageElement.style.color = 'red';
                    
                    // Optionally redirect to login
                    
                } else {
                    // Update counts
                    document.querySelector(`.like-count[data-post-id="${postId}"]`).textContent = data.likes;
                    document.querySelector(`.dislike-count[data-post-id="${postId}"]`).textContent = data.dislikes;
                    
                    // Update message
                    const messageElement = document.querySelector(`.message[data-post-id="${postId}"]`);
                    messageElement.textContent = data.message;
                    messageElement.style.color = 'green';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
    </script>
</body>
</html>