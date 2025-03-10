<div class="categories">
    <h4>كلمات دلالية</h4>
    <ul style="direction:rtl">
        @forelse($categories as $category)
            <li style="direction:rtl">
                <a style="direction:rtl" href="{{ route('categories.related', ['nameCategory' => $category->name]) }}">
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
                <b><center>لا يوجد تصنيفات</center></b>
            </li>
        @endforelse
    </ul>
</div>