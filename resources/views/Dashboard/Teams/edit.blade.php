@extends('Dashboard.layouts.layouts')

@section('title')
    الفريق
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
            <h4 class="card-title">تعديل تفاصيل العضو</h4>
        </div>
        <form action="{{route('teams.update',$team->id)}}" method="post">
            @csrf
            @method('put')
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" value="{{$team->name}}" id="name" placeholder="">
                    </div>

                    <div class="form-group mt-4">
                        <label for="department_id">القسم التابع له</label>
                        <select name="department_id" id="department_id"  class="form-select">       
                            @forelse ($departments as $department)
                                    @if ($department->id == $team->department->id)
                                    <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                        @continue
                                    @endif
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
        <div class="d-flex mt-2 justify-content-center">
            <button class="btn btn-outline-success">التعديل</button>
        </div>
    </form>
        </div>
    </div>
</section>
@endsection