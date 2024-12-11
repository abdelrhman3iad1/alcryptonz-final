@extends('Dashboard.layouts.layouts')

@section('title')
مقال
@endsection

@section('content')
<div class="page-heading">
    <h3>تعديل مقال</h3>
</div>

@include('messages.errors')
@include('messages.success')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$post->title}}</h4>
        </div>
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">العنوان</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="عنوان المقال">
                        </div>
                        <div class="form-group mb-3">
                            <label for="category_id">اختر التصنيف</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="content">المحتوى</label>
                            <textarea class="form-control" name="content" id="content" placeholder="">{{ old('content', $post->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">صورة للمقال</label>
                            <input type="file" accept="image/*" id="image" name="image" class="form-control">
                            
                            @if ($post->getFirstMediaUrl('posts'))
                                <div class="mt-2">
                                    <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="صورة المقال" style="max-width: 200px; max-height: 200px;">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-flex mt-2 justify-content-center">
                    <button class="btn btn-outline-success">تعديل</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
