@extends('Dashboard.layouts.layouts')

@section('title')
الفريق
@endsection

@section('content')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('Dashboard/assets/extensions/simple-datatables/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('Dashboard/assets/compiled/css/table-datatable.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('Dashboard/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('Dashboard/assets/static/js/pages/simple-datatables.js')}}"></script>
@endsection


<div class="page-heading">
    <h3>الفريق</h3>
</div> 
@include('messages.errors')
@include('messages.success')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                كل الفريق
            </h5>
        </div>
        <div style="display: flex; gap: 10px; margin-top: 5px; margin-left: 50px;  justify-content: flex-end">
            <a href="{{route('teams.create')}}" class="btn  btn-success" rel="noopener noreferrer">
                إضافة عضو
            </a>
        </div>
        <div class="card-body">
<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>رقم العضو</th>
            <th>الأسم</th>
            <th>إسم القسم</th>
            <th>تم الاضافة في</th>
            <th colspan="2"></th>

        </tr>
    </thead>
    <tbody>
        @forelse ($teams as $team)
        <tr>
            <td>{{$team->id}}</td>
            <td>{{$team->name}}</td>
            <td>{{$team->department->name}}</td>
            <td>
                {{$team->created_at}}
            </td>
            <td>
                <a href="{{route('teams.edit',$team->id)}}" class="btn btn-sm btn-outline-primary" rel="noopener noreferrer">
                    التعديل
                </a>
            </td>
            <td>
                <form action="{{route('teams.destroy',$team->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">لا يوجد أعضاء</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>

</section>
@endsection