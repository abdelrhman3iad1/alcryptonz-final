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
                    <h4 class="card-title"> {{ $q->question }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">السؤال</label>
                                <textarea type="text" class="form-control" id="basicInput" name="question" style="width: 100%; height: 150px;"
                                    value="{{ $q->question }}" placeholder="أدخل السؤال">{{$q->question}}</textarea>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">الاجابة</label>
                                    <textarea type="text" class="form-control" id="basicInput" name="answer" style="width: 100%; height: 150px;"
                                        placeholder="أدخل الاجابة">{{ $q->answer }}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-2 justify-content-center">
                            <button class="btn btn-outline-primary">تعديل</button>
                        </div>
                    </div>
                </div>
    </form>
    </section>
@endsection
