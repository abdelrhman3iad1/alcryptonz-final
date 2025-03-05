<div class="last-posts">
    <h4> احدث مقالات الشركاء</h4>
    <ul>
        <?php
            // Assuming $posts is already defined and contains the posts
            // Filter posts to only include those with category_id = 1
            $filteredPosts = $posts->where('category_id', 1);
        ?>

        @if ($filteredPosts->isEmpty())
            <b><center>لا يوجد منشورات متعلقة بهذا الذي تبحث عنه</center></b>
        @else
            @foreach ($filteredPosts as $post)
                <!-- Post -->
                <li style="overflow:hidden">
                    <a style="direction:rtl;overflow:hidden" href="" target="_blank">
                        <div class="small-post">
                            <div class="img-div">
                                <span></span>
                                <img src="{{ asset($post->image) }}" style="width:300px; height: 200px;" alt="صورة المنشور">
                                <span style='direction:rtl !important;'></span>
                            </div>
                            <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }}</h3>
                            <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>