@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3> Category Page</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" >
                 <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                 </thead>
                 <tbody>
                    @foreach($category as $item)
                       <tr>
                          <td>{{ $item->id}}</td>
                          <td>{{ $item->name}}</td>
                          <td>{{ $item->description}}</td>
                          <td>
                            <img src="{{ asset('/assets/uploads/category/'.$item->image)}}" class="cate-image">                
                           </td>
                          <td>
                          <a  href="{{url('edit/'.$item->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="{{url('delete-category/'.$item->id)}}"  class="btn btn-danger btn-sm">Delete</a>

                          </td>
   

                       </tr>
                    @endforeach
                 </tbody>
            </table>
        </div>
    </div>
@endsection 