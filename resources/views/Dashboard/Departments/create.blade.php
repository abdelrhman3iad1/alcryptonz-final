@extends('Dashboard.layouts.layouts')

@section('title')
    أضف قسم
@endsection
@section('content')
<div class="page-heading">
    <h3>الأقسام</h3>
</div> 

@include('messages.errors')
@include('messages.success')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">أضف قسم</h4>
        </div>
        <form action="{{route('departments.store')}}" method="post">
            @csrf
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </div>

                </div>  
                </div>
            </div>
        <div class="d-flex mt-2 mb-4 justify-content-center">
            <button class="btn btn-outline-primary">أضافة</button>
        </div>
    </form>
        </div>
    </div>
</section>
@endsection