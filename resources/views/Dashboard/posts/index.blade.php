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
    <h3>المفالات</h3>
</div>

@include('messages.errors')
@include('messages.success')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                كل المقالات
            </h5>
        </div>

        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>رقم المقال</th>
                        <th>العنوان</th>
                        <th>تم الاضافة في</th>
                        <th rowspan="2"></th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-sm btn-outline-success" rel="noopener noreferrer">
                                    عرض التفاصيل
                                </a>
                            </td>
                            <td>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-outline-primary" rel="noopener noreferrer">
                                    التعديل
                                </a>
                            </td>
                            <td>
                                <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">لا يوجد مقالات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
