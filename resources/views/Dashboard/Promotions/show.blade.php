@extends('Dashboard.layouts.layouts')

@section('title')
     العروض الترويجية
@endsection

@section('content')
@section('css')
    
@endsection
@section('scripts')
    
@endsection
@include('messages.errors')
@include('messages.success')
<div class="page-heading">
    <h3>رؤية العرض الترويجي</h3>
</div> 

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{$promotion->name}}</h2>
            <div style="display: flex; gap: 10px; margin-top: 5px; justify-content: flex-end">
                <a href="{{route('promotions.edit',$promotion->id)}}" class="btn  btn-primary" rel="noopener noreferrer">
                    التعديل
                </a>
            
            
                <form action="{{route('promotions.destroy',$promotion->id)}}" style="margin: 0;" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn  btn-danger">حذف</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p class="card-description">
                {{$promotion->description ?? ""}}
            </p>
            
            <div class="card-image mt-4" style="text-align: center;">
                @if ($promotion->image)
                <div class="col-md-7">
                  <img src="{{asset("storage/$promotion->image")}}" width="750px" alt="" srcset="">
                </div>
                @else
                    <p>لا توجد صورة مرفقة.</p>
                @endif
            </div>
            @if ($promotion->website_url)
                
            <a href="{{$promotion->website_url}}" class="btn btn-outline-primary" target="_blank">
                زيارة الموقع
            </a>
            @endif
        </div>
    </div>
</section>



@endsection





