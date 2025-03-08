<div class="last-posts">
    <h4>أحدث مقالات الشركاء</h4>
    <ul>
        @php
            // تصفية المقالات الخاصة بالشريك الذي معرفه 1 وأخذ أحدث 5 مقالات
            $filteredPosts = $posts->where('partner_id', 1)->take(5);
        @endphp

        @if ($filteredPosts->isEmpty())
            <b><center>لا يوجد منشورات</center></b>
        @else
            @foreach ($filteredPosts as $post)
                <li style="overflow:hidden">
                    <a>
                        <span>
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}" style="width:75px; height: 60px;">
                        </span>
                        <span style="direction:rtl !important; display: block; white-space: normal;">
                            {{ Str::limit($post->title_ar, 115) }}<br>
                            <span class="span-date">
                                <i class="far fa-calendar-alt" style="margin-left:5px !important"></i>
                                {{ $post->created_at->format('Y-m-d') }}
                            </span>
                        </span>
                        
                        </span>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
