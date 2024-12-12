@extends('Dashboard.layouts.layouts')

@section('title')
الشركاء
@endsection

@section('content')
@section('css')
    
@endsection
@section('scripts')
    
@endsection
@include('messages.errors')
@include('messages.success')
<div class="page-heading">
    <h3>رؤية تفاصيل الشريك</h3>
</div> 

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{$partner->name}}</h2>
            <div style="display: flex; gap: 10px; margin-top: 5px; justify-content: flex-end">
                <a href="{{route('partners.edit',$partner->id)}}" class="btn  btn-primary" rel="noopener noreferrer">
                    التعديل
                </a>
            
            
                <form action="{{route('partners.destroy',$partner->id)}}" style="margin: 0;" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn  btn-danger">حذف</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p class="card-description">
                {{$partner->description ?? ""}}
            </p>
            
            @if ($partner->image)
            <div class="card-image">
                <img src="https://via.placeholder.com/300" alt="صورة توضيحية" />
            </div>
            @endif
            @if ($partner->website_url)
                
            <a href="{{$partner->website_url}}" target="_blank" class="btn btn-outline-primary" target="_blank">
                زيارة الموقع
            </a>
            @endif
        </div>
    </div>
</section>



@endsection
