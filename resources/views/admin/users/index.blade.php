@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3> Product Page</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" >
                 <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>

                        <th>Action</th>

                    </tr>
                 </thead>
                 <tbody>
                    @foreach($users as $item)
                       <tr>
                          <td>{{ $item->id}}</td>
                          <td>{{ $item->name}}</td>

                          <td>{{ $item->email}}</td>
                          <td>{{ $item->phone}}</td>
                         <td>
                            <a href="{{url('view-users/'.$item->id)}}"  class="btn btn-secondary ">view</a>

                          </td>
   

                       </tr>
                    @endforeach
                 </tbody>
            </table>
        </div>
    </div>
@endsection 