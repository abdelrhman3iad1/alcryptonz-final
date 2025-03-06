@extends('Dashboard.layouts.layouts')

@section('title')
    أضف مقال
@endsection
@section('content')
    <div class="page-heading">
        <h3>المقالات</h3>
    </div>

    @include('messages.errors')
    @include('messages.success')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">أضف مقال</h4>
            </div>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <!-- القسم الخاص باللغة العربية -->
                        <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px; ">
                            <h5 class="text-center mb-3">القسم العربي</h5>
                            <div class="form-group">
                                <label for="title_ar">العنوان بالعربية</label>
                                <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="">
                            </div>
                            <div class="form-group mt-3">
                                <label for="content_ar">المحتوى بالعربية</label>
                                <textarea class="form-control" dir="auto" name="content_ar" id="content_ar" style="width: 100%; height: 150px;" placeholder=""></textarea>
                            </div>
                        </div>
    
                        <!-- القسم الخاص باللغة الإنجليزية -->
                        <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px; ">
                            <h5 class="text-center mb-3">English Section</h5>
                            <div class="form-group">
                                <label for="title_en">Post Title in English</label>
                                <input type="text" class="form-control" name="title_en" id="title_en" placeholder="">
                            </div>
                            <div class="form-group mt-3">
                                <label for="content_en">Post Content in English</label>
                                <textarea class="form-control" name="content_en" id="content_en" style="width: 100%; height: 150px;" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
    
                    <!-- القسم الخاص بالتصنيف والصورة -->
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
                                <input type="file" accept="image/*" id="image" name="image" class="form-control" placeholder="">
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
                                        <option value="{{ $partner->id }}" {{ old('partner_id') == $partner->id ? 'selected' : '' }}>
                                            {{ $partner->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex mt-2 justify-content-center">
                    <button class="btn btn-outline-primary">إضافة</button>
                </div>
            </form>
        </div>
    </section>
    
@endsection
