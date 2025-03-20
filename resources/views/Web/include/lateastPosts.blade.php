<div class="last-posts">
    <h4>{{__('translation.Recent Learning Articles')}} </h4>
    <ul>
        {{-- @php
            // تصفية المقالات الخاصة بالشريك الذي معرفه 1 وأخذ أحدث 5 مقالات
            $filteredPosts = $posts->where('category_id', 2)->take(5);
        @endphp --}}

        @if ($learningPosts->isEmpty())
            <b><center>{{__('translation.No Posts')}}</center></b>
        @else
            @foreach ($learningPosts as $post)
            @if (config('app.locale')=="ar")

                <li style="overflow:hidden">
                    <a href="{{ route('showPost', $post->id) }}"
                        target='_blank'>
                        <span>
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_ar }}" style="width:75px; height: 60px;">
                        </span>
                        <span style="direction:{{__('translation.dir')}} !important; display: block; white-space: normal;">
                            {{ Str::limit($post->title_ar, 115) }}<br>
                            <span class="span-date">
                                <i class="far fa-calendar-alt" style="margin-left:5px !important"></i>
                                {{ $post->created_at->format('Y-m-d') }}
                            </span>
                        </span>
                        
                        </span>
                    </a>
                </li>
                    
                @else
                <li style="overflow:hidden">
                    <a href="{{ route('showPost', $post->id) }}"
                        target='_blank'>
                        <span>
                            <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" style="width:75px; height: 60px;">
                        </span>
                        <span style="direction:{{__('translation.dir')}} !important; display: block; white-space: normal;">
                            {{ Str::limit($post->title_en, 115) }}<br>
                            <span class="span-date">
                                <i class="far fa-calendar-alt" style="margin-left:5px !important"></i>
                                {{ $post->created_at->format('Y-m-d') }}
                            </span>
                        </span>
                        
                        </span>
                    </a>
                </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>
