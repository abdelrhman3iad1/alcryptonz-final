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
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">السؤال</label>
                                <textarea class="form-control" id="basicInput" name="question" style="width: 100%; height: 150px;" placeholder="أدخل السؤال"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">الإجابة</label>
                                <textarea type="text" class="form-control" id="basicInput" name="answer" style="width: 100%; height: 150px;"
                                    placeholder="أدخل الإجابة"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-2 justify-content-center">
                        <button class="btn btn-outline-primary">إضافة</button>
                    </div>
                </div>
            </div>
    </form>
    </section>
@endsection
