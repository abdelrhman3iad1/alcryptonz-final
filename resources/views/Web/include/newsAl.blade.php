<div class="last-posts">
    <h4> احدث اخبار الكريبتو</h4>
    <ul>
        <?php
        
        //     $querys="select * from post where knowMe !=1  order by postId desc";
        //     $execc=mysqli_query($con,$querys);
        //     if(mysqli_num_rows($execc)==0){
        //         echo "<b><center>لا يوجد منشورات </center></b>";
        //             }
        //     $nom=0;
        //    while($row=mysqli_fetch_assoc($execc)){
        //        $nom++;
        ?>

        <?php
        // Assuming $posts is already defined and contains the posts
        // Filter posts to only include those with category_id = 1
        $filteredPosts = $posts->where('category_id', 3);
        ?>

        @if ($filteredPosts->isEmpty())
            <b>
                <center>لا يوجد منشورات متعلقة بهذا الذي تبحث عنه</center>
            </b>
        @else
            @foreach ($filteredPosts as $post)
                <!-- Post -->
                <a style="direction:rtl;overflow:hidden" href="" target="_blank">
                    <div class="small-post">
                        <div class="img-div">
                            <span></span><img src="{{ asset($post->image) }}" style="width:300px; height: 200px;"
                                alt="صورة المنشور"></span>
                            <span style='direction:rtl !important;'>
                        </div>
                        <h3 style="color:black;word-wrap: break-word;">{{ $post->title_ar }}</h3>
                        {{-- <span>{{ $post->user->name }} &nbsp;<i class="fas fa-user"></i></span><br> --}}
                        <span>{{ $post->created_at->format('Y-m-d') }}&nbsp; <i
                                class="far fa-calendar-alt"></i></span>&nbsp;&nbsp;
                        {{-- <span>{{ $post->category->name }} &nbsp; <i class="fas fa-tags"></i></span> --}}
                        {{-- <p style="color:black;"> --}}
                        {{-- @if (strlen($post->content_ar) > 150) --}}
                        {{-- {{ strip_tags(substr($post->content_ar, 0, 350)) }}.... --}}
                        {{-- @else --}}
                        {{-- {{ strip_tags($post->content_ar) }} --}}
                        {{-- @endif --}}
                        {{-- </p> --}}
                    </div>
                </a>
            @endforeach
        @endif
        {{-- <span><img src="uploads/postImages/<?php ?>"alt="image here"style="width:75px; height: 60px;"></span>
                                   --}}


        <?php
        //    if(strlen($row["postTitle"])>116){
        //     echo substr($row["postTitle"],0,115). "<br><span class='span-date'><i class='far fa-calendar-alt'style='margin-left:5px !important'></i>". $row["PostDate"]."</span>";
        // }else{
        //     echo $row["postTitle"] . "<br><span class='span-date'><i class='far fa-calendar-alt'style='margin-left:5px !important'></i>". $row["PostDate"]."</span>";
        // }
        ?></span>


        </a>
        </li>
        <?php
        //     if($nom==5){
        //         break;
        //                                 }
        // }
        ?>
    </ul>
</div>
