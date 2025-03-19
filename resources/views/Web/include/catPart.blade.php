<div class="categories">
    <h4>{{__('translation.Keywords')}}</h4>
    <ul style="direction:rtl">
        @forelse($categories as $category)
            <li style="direction:rtl">
                <a style="direction:{{__('translation.dir')}}" href="{{ route('categories.related', $category->id) }}">
                    @if ($category->name == 'مقالات شركاء')
                        <span> {{ $partner->name ?? $category->name }} </span>
                    @else
                        <span> {{ $category->name }} </span>
                    @endif
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </li>
        @empty
            <li>
                <b><center>{{__('translation.No Exisiting Categories')}}</center></b>
            </li>
        @endforelse
    </ul>
</div>