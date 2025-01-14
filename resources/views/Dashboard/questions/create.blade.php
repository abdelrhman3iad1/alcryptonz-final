@extends('Dashboard.layouts.layouts')

@section('title')
    Questions - ALCRYPTONZ
@endsection
@section('content')
    <form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="page-heading">
            <h3>الأسئلة</h3>
        </div>
        @include('messages.errors')
        @include('messages.success')
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> أضف سؤال جديد</h4>
                </div>

                <div class="card-body">
                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
                        <!-- القسم الخاص باللغة العربية -->
                        <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px; ">
                            <h5 class="text-center mb-3">القسم العربي</h5>
                            <div class="form-group">
                                <label for="question_ar">السؤال بالعربية</label>
                                <textarea class="form-control" id="question_ar" name="question_ar" style="width: 100%; height: 150px;" placeholder=""></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="answer_ar">الإجابة بالعربية</label>
                                <textarea class="form-control" id="answer_ar" name="answer_ar" style="width: 100%; height: 150px;" placeholder=""></textarea>
                            </div>
                        </div>
                
                        <!-- القسم الخاص باللغة الإنجليزية -->
                        <div class="col-md-6" style="flex: 1; border: 1px solid hsla(0, 0%, 87%, 0.09); padding: 15px; border-radius: 8px;">
                            <h5 class="text-center mb-3">English Section</h5>
                            <div class="form-group">
                                <label for="question_en">Question in English</label>
                                <textarea class="form-control" id="question_en" name="question_en" style="width: 100%; height: 150px;" placeholder=""></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="answer_en">Answer in English</label>
                                <textarea class="form-control" id="answer_en" name="answer_en" style="width: 100%; height: 150px;" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                
                    <!-- زر الإضافة -->
                    <div class="d-flex mt-4 justify-content-center">
                        <button class="btn btn-outline-primary">إضافة</button>
                    </div>
                </div>
                
    </form>
    </section>
@endsection
