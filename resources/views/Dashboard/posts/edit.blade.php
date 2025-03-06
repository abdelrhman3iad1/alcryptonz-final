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
            <h4 class="card-title">{{$post->title_ar}}</h4>
        </div>
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')



<div class="card-body">
            <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
                <!-- القسم الخاص باللغة العربية -->
                <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                    <div class="form-group">
                        <label for="title_ar">العنوان بالعربية</label>
                        <textarea class="form-control" id="title_ar" name="title_ar" style="width: 100%; height: 150px;"
                                placeholder="">{{ $post->title_ar }}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="content_ar">المحتوى بالعربية</label>
                        <textarea class="form-control" id="content_ar" name="content_ar" style="width: 100%; height: 150px;"
                                placeholder="">{{ $post->content_ar }}</textarea>
                    </div>
                </div>

                <!-- القسم الخاص باللغة الإنجليزية -->
                <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                    <div class="form-group">
                        <label for="title_en">Title in English</label>
                        <textarea class="form-control" id="title_en" name="title_en" style="width: 100%; height: 150px;"
                                placeholder="">{{ $post->title_en }}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="content_en">Content in English</label>
                        <textarea class="form-control" id="content_en" name="content_en" style="width: 100%; height: 150px;"
                                placeholder="">{{ $post->content_en }}</textarea>
                    </div>
                </div>
            </div>

            <!-- القسم الخاص بالصورة -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id">اختر التصنيف</label>
                        <select name="category_id" id="category_id" class="form-control" >
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">صورة للمقال</label>
                        <input type="file" accept="image/*" id="image" name="image" class="form-control" >
                        
                        @if ($post->image)
                <div class="col-md-7">
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}" style="max-width: 100%; height: auto;">
                </div>
            @else
                <p>لا توجد صورة مرفقة.</p>
            @endif
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="partner_id">اختر الشريك</label>
                        <select name="partner_id" id="partner_id" class="form-control" >
                            <option value="">لا يوجد شريك</option>
                            @foreach ($partners as $partner)
                                <option value="{{ $partner->id }}" {{ $post->partner_id == $partner->id ? 'selected' : '' }}>
                                    {{ $partner->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            {{-- <label for="image">صورة للمقال</label>
            <input type="file" accept="image/*" id="image" name="image" class="form-control" style="max-width: 50%; margin: 0 auto;">
            
            @if ($post->getFirstMediaUrl('posts'))
                <div class="mt-3">
                    <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="صورة المقال" style="max-width: 200px; max-height: 200px; border-radius: 8px;">
                </div>
            @else
                <p class="mt-3">لا توجد صورة مرفقة.</p>
            @endif --}}
            <!-- زر التعديل -->
            <div class="d-flex mt-4 justify-content-center">
                <button class="btn btn-outline-success">تعديل</button>
            </div>
        </div>
    </div>
</section>

@endsection
