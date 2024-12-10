@extends('Dashboard.layouts.layouts')

@section('title')
    ALCRYPTONZ Admin Dashboard
@endsection

@section('content')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('Dashboard/assets/extensions/simple-datatables/style.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('Dashboard/assets/compiled/css/table-datatable.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('Dashboard/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('Dashboard/assets/static/js/pages/simple-datatables.js') }}"></script>
@endsection
<div class="page-heading">
    <h3>التصنيفات</h3>
</div>


<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                كل التصنيفات
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>رقم التصنيف</th>
                        <th>الأسم</th>
                        <th>تم الاضافة في</th>
                        <th rowspan="2">العمليات</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url("dashboard/categories/$category->id/edit") }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{url("dashboard/categories/$category->id")}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">لا يوجد تصنيفات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
