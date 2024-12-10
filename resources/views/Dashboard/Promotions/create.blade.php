@extends('Dashboard.layouts.layouts')

@section('title')
    Promotions - ALCRYPTONZ
@endsection
@section('content')
<div class="page-heading">
    <h3>العروض الترويجية</h3>
</div> 

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">أضف عرض ترويجي</h4>
        </div>

        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">الاسم</label>
                        <input type="text" class="form-control" id="basicInput" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="helpInputTop">رابط الموقع</label>
                        <small class="text-muted"><i>example.com</i></small>
                        <input type="email" class="form-control" id="helpInputTop">
                    </div>

                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">الوصف</label>
                        <input type="text" class="form-control" id="basicInput" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="helperText">صورة للعرض</label>
                        <input type="file" accept="image" id="helperText" class="form-control" placeholder="">
                        
                    </div>

                    
                </div>
            </div>
        {{-- <button type="submit">Submit</button> --}}
        <div class="d-flex mt-2 justify-content-center">
            <button class="btn btn-outline-primary">أضافة</button>
        </div>
        </div>
    </div>
</section>
@endsection





