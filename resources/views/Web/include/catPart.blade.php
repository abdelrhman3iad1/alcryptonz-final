<div class="categories">
    <h4>كلمات دلالية</h4>
    <ul style="direction:rtl">
        @forelse($categories as $category)
            <a style="direction:rtl" href="{{ route('categories.related', ['nameCategory' => $category->name]) }}">
                <li style="direction:rtl">
                    <span>{{ $category->name }}</span>
                    <span><i class="fas fa-chevron-right"></i></span>
                </li>
            </a>
        @empty
            <li>
                <b><center>لا يوجد تصنيفات</center></b>
            </li>
        @endforelse
    </ul>
</div>