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
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">العنوان</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="عنوان المقال">
                            </div>

                            <div class="form-group">
                                <label for="website_url">المحتوى</label>
                                {{-- <small class="text-muted"><i>example.com</i></small> --}}
                                <textarea type="text" class="form-control" name="content" id="content" style="width: 100%; height: 150px;"></textarea>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="category_id">اختر التصنيف</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    {{-- <option value="" disabled selected>اختر التصنيف</option> --}}
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="image">صورة للمقال</label>
                            <input type="file" accept="image" id="image" name="image" class="form-control"
                                placeholder="">

                        </div>


                    </div>
                </div>
                <div class="d-flex mt-2 justify-content-center">
                    <button class="btn btn-outline-primary">إضافة</button>
                </div>
            </form>
        </div>
        </div>
    </section>
@endsection
