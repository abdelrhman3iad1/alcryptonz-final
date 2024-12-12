@extends('Dashboard.layouts.layouts')

@section('title')
    أضف عضو
@endsection
@section('content')
<div class="page-heading">
    <h3>الفريق</h3>
</div> 

@include('messages.errors')
@include('messages.success')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">أضف عضو</h4>
        </div>
        <form action="{{route('teams.store')}}" method="post">
            @csrf
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </div>

                    <div class="form-group mt-4">
                        <label for="department_id">القسم التابع له</label>
                        <select name="department_id" id="department_id"  class="form-select">
                            @forelse ($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @empty
                                لا يوجد أقسام
                            @endforelse
                        </select>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" accept="image" id="image" name="image" class="form-control" placeholder="">
                        
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