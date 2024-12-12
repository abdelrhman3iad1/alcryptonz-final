@extends('Dashboard.layouts.layouts')

@section('title')
المقالات
@endsection

@section('content')
@section('css')
@endsection
@section('scripts')
@endsection

@include('messages.errors')
@include('messages.success')

<div class="page-heading">
    <h3>رؤية المقال</h3>
</div> 

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $post->title }}</h2>
            
            <div style="display: flex; gap: 10px; margin-top: 5px; justify-content: flex-end">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary" rel="noopener noreferrer">
                    التعديل
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" style="margin: 0;" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
        
        <div class="card-body">
            <p class="card-description">
                {{ $post->content }}
            </p>
    
            
        </div>
                 
        @if ($post->getFirstMediaUrl())
        <img src="{{ $post->getFirstMediaUrl() }}" alt="Post Image" style="width: 25%; height: auto; display: block; margin: 0 auto;">
        @else
        <p>لا توجد صورة مرفقة.</p>
    @endif
 
    </div>
</section>

@endsection
