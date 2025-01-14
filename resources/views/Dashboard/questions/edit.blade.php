@extends('Dashboard.layouts.layouts')

@section('title')
    Questions - ALCRYPTONZ
@endsection
@section('content')
    <form method="POST" action="{{ url("dashboard/questions/$q->id") }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="page-heading">
            <h3>تعديل السؤال</h3>
        </div>
        @include('messages.errors')
        @include('messages.success')
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> {{ $q->question_ar }}</h4>
                </div>

                <div class="card-body">
                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <!-- القسم الخاص باللغة العربية -->
                        <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px; ">
                            <div class="form-group">
                                <label for="question_ar">السؤال بالعربية</label>
                                <textarea class="form-control" id="question_ar" name="question_ar" style="width: 100%; height: 150px;"
                                        placeholder="">{{$q->question_ar}}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="answer_ar">الإجابة بالعربية</label>
                                <textarea class="form-control" id="answer_ar" name="answer_ar" style="width: 100%; height: 150px;"
                                        placeholder="">{{ $q->answer_ar }}</textarea>
                            </div>
                        </div>
                
                        <!-- القسم الخاص باللغة الإنجليزية -->
                        <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px; ">
                            <div class="form-group">
                                <label for="question_en">السؤال بالإنجليزية</label>
                                <textarea class="form-control" id="question_en" name="question_en" style="width: 100%; height: 150px;"
                                        placeholder="">{{$q->question_en}}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="answer_en">الإجابة بالإنجليزية</label>
                                <textarea class="form-control" id="answer_en" name="answer_en" style="width: 100%; height: 150px;"
                                        placeholder="">{{ $q->answer_en }}</textarea>
                            </div>
                        </div>
                    </div>
                
                    <!-- زر التعديل -->
                    <div class="d-flex mt-4 justify-content-center">
                        <button class="btn btn-outline-primary">تعديل</button>
                    </div>
                </div>
                
    </form>
    </section>
@endsection
