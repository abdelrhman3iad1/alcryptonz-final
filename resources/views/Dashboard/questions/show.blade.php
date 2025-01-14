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
            <h2 class="card-title">{{$question->question_ar}}</h2>
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
        <div class="card-body" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <!-- الإجابات باللغة العربية -->
            <div class="answer-block" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                <p class="card-text"><strong>السؤال بالعربية:</strong></p>
                <p>{{$question->question_ar}}</p>
                <p class="card-text"><strong>الإجابة بالعربية:</strong></p>
                <p>{{$question->answer_ar}}</p>
            </div>

            <!-- السؤال والإجابة باللغة الإنجليزية -->
            <div class="question-answer-block" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                <p class="card-text"><strong>Question In English:</strong></p>
                <p>{{$question->question_en}}</p>
                <p class="card-text"><strong>Answer In English:</strong></p>
                <p>{{$question->answer_en}}</p>
            </div>
        </div>
    </div>
</section>

@endsection
