@extends('Dashboard.layouts.layouts')

@section('title')
المقالات
@endsection

@section('content')
@section('css')
@endsection
@section('scripts')
@endsection

@include('messages.errors')
@include('messages.success')

<div class="page-heading">
    <h3>رؤية المقال</h3>
</div> 
<section class="section">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $post->title_ar }}</h2>
            <div style="display: flex; gap: 10px; margin-top: 5px; justify-content: flex-end">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary" rel="noopener noreferrer">
                    التعديل
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" style="margin: 0;" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>

        <div class="card-body" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <!-- القسم الخاص بالمحتوى العربي -->
            <div class="content-block-ar" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                <p class="card-text"><strong>العنوان بالعربية:</strong></p>
                <p>{{ $post->title_ar }}</p>
                <p class="card-text"><strong>المحتوى بالعربية:</strong></p>
                <p>{{ $post->content_ar }}</p>
            </div>

            <!-- القسم الخاص بالمحتوى الإنجليزي -->
            <div class="content-block-en" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                <p class="card-text"><strong>Title in English:</strong></p>
                <p>{{ $post->title_en }}</p>
                <p class="card-text"><strong>Content in English:</strong></p>
                <p>{{ $post->content_en }}</p>
            </div>
        </div>

        <!-- الصورة -->
        <div class="card-image mt-4" style="text-align: center;">
            @if ($post->image)
            <div class="col-md-7">
              <img src="{{asset("storage/$post->image")}}" width="750px" alt="" srcset="">
            </div>
            @else
                <p>لا توجد صورة مرفقة.</p>
            @endif
        </div>
    </div>
</section>


@endsection
