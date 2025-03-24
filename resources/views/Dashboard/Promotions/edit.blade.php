@extends('Dashboard.layouts.layouts')

@section('title')
    عرض ترويجي
@endsection
@section('content')
<div class="page-heading">
    <h3>تعديل عرض ترويجي</h3>
</div> 

@include('messages.errors')
@include('messages.success')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$promotion->name}}</h4>
        </div>
        <form action="{{route('promotions.update',$promotion->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$promotion->name}}" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="website_url">رابط الموقع</label>
                        <small class="text-muted"><i>example.com</i></small>
                        <input type="text" class="form-control" value="{{$promotion->website_url}}" name="website_url" id="website_url">
                    </div>

                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <input type="text" class="form-control" value="{{$promotion->description}}" name="description" id="description" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="image">صورة للعرض</label>
                        <input type="file" accept="image/*" id="image"  name="image" class="form-control" placeholder="">
                        
                    </div>

                    
                </div>
            </div>
        <div class="d-flex mt-2 justify-content-center">
            <button class="btn btn-outline-success">التعديل</button>
        </div>
    </form>
        </div>
    </div>
</section>
@endsection





