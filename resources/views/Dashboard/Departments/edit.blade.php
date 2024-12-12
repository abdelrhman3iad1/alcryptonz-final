@extends('Dashboard.layouts.layouts')

@section('title')
    الأقسام
@endsection
@section('content')
<div class="page-heading">
    <h3>تعديل قسم</h3>
</div> 

@include('messages.errors')
@include('messages.success')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$department->name}}</h4>
        </div>
        <form action="{{route('departments.update',$department->id)}}" method="post">
            @csrf
            @method('put')
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$department->name}}" placeholder="">
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