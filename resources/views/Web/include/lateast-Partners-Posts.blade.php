<div class="last-posts">
    <h4>{{__("translation.partner posts")}}</h4>
    <ul>
        {{-- @php
            $filteredPosts = $posts->where('partner_id', 1)->take(5);
        @endphp --}}

        @if ($partnerPosts->isEmpty())
        <b><center>{{ __('translation.No Exisiting Posts') }}</center></b>
        @else
            @foreach ($partnerPosts as $post)
            @if (config('app.locale') == 'ar')

                <li style="overflow:hidden">
                    <a href="{{ route('showPost', $post->id) }}"
                        target='_blank'>
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
                @else
                <li style="overflow:hidden">
                    <a href="{{ route('showPost', $post->id) }}"
                        target='_blank'>
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
                        
                        </span>
                    </a>
                </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>
