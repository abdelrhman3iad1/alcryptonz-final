<div class="last-posts">
    <h4>أحدث اخبار الكريبتو</h4>
    <ul>
        {{-- @php
            // تصفية المقالات الخاصة بالشريك الذي معرفه 1 وأخذ أحدث 5 مقالات
            $filteredPosts = $posts->where('category_id', 3)->take(5);
        @endphp --}}

        @if ($cryptoNewsPosts->isEmpty())
            <b><center>{{ __('translation.no posts') }}</center></b>
        @else
            @if (config('app.locale') == 'ar')
                @foreach ($cryptoNewsPosts as $post)
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
                        </a>
                    </li>
                @endforeach
            @else
                @foreach ($cryptoNewsPosts as $post)
                    <li style="overflow:hidden">
                        <a>
                            <span>
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" style="width:75px; height: 60px;">
                            </span>
                            <span style="direction:ltr !important; display: block; white-space: normal;">
                                {{ Str::limit($post->title_en, 115) }}<br>
                                <span class="span-date">
                                    <i class="far fa-calendar-alt" style="margin-left:5px !important"></i>
                                    {{ $post->created_at->format('Y-m-d') }}
                                </span>
                            </span>
                        </a>
                    </li>
                @endforeach
            @endif
        @endif
    </ul>
</div>