@extends('Dashboard.layouts.layouts')

@section('title')
    Categories - ALCRYPTONZ
@endsection
@section('content')
    <form method="POST" action="{{ url("dashboard/categories/$category->id") }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="page-heading">
            <h3>{{ $category->name }}</h3>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> تعديل التصنيف</h4>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">الاسم</label>
                                <input type="text" class="form-control" id="basicInput" name="name"
                                    placeholder="أدخل الأسم">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mt-2 justify-content-center">
                        <button class="btn btn-outline-primary">إضافة</button>
                    </div>
                </div>
            </div>
    </form>
    </section>
@endsection
