@extends('Dashboard.layouts.layouts')

@section('title')
الأسئلة
@endsection

@section('content')
@section('css')
    
@endsection
@section('scripts')
    
@endsection
@include('messages.errors')
@include('messages.success')
<div class="page-heading">
    <h3>رؤية السؤال</h3>
</div> 

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">السؤال: {{$question->question}}</h2>
            <div style="display: flex; gap: 10px; margin-top: 5px; justify-content: flex-end">
                <a href="{{route('questions.edit', $question->id)}}" class="btn btn-primary" rel="noopener noreferrer">
                    التعديل
                </a>
                <form action="{{route('questions.destroy', $question->id)}}" style="margin: 0;" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>الإجابة:</strong> {{$question->answer ?? "لم يتم تحديد إجابة"}}</p>
        </div>
    </div>
</section>
@endsection
