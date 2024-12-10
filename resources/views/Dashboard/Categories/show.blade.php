@extends('Dashboard.layouts.layouts')

@section('title')
    ALCRYPTONZ Admin Dashboard
@endsection
@section('content')
{{-- Category Name:{{$category->name}}<br> --}}
{{-- Category Description:{{$category->desc}}<br> --}}
{{-- Product Price:{{$product->price}}<br>
Product Quantity:{{$product->quantity}}<br>
Product Image:<br>
<img src="{{url(asset("storage/$product->image"))}}" alt="" srcset="" > --}}
   
{{-- <form action="{{url("products/$product->id")}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form> --}}
{{-- <h1> --}}
    {{-- <a class="btn btn-success" href="{{url("products/edit/$product->id")}}" >Edit</a>   --}}

    <table class="table table-bordered border-success">
        <thead>
          <tr>
            <th> رقم التصنيف</th>
            <th> الاسم</th>
            {{-- <th>Description</th> --}}
                    
          </tr>
          </thead>
          <tbody>
            <tr class="table-active">
                
            </tr>
            <tr class="table-active" scope="row">
              
            </tr>
            <tr>
              <th scope="row">{{$category->id}}</th>
              <td >{{$category->name}}</td>
              {{-- <td>{{$category->description}}</td> --}}
            </tr>
          </tbody>
      </table>
      <br>
      <h1> 
      
    
        <a class="btn btn-primary" href="{{url("dashboard/categories/$category->id/edit")}}" >Edit</a>  
    
@endsection