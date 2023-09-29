@extends('layouts.admin')
@section('title')
Orders
@endsection
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                      <h4> User Details 
                      <a href="{{url('users')}}" class="btn btn-secondary float-right">Order History</a>
                      </h4>
                    <hr>
                </div>
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-4">
                            <label>Role</label>
                            <div class="p-2 border">{{$users->role_as == '0'?'Users' : 'Admin'}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>First Name</label>
                            <div class="p-2 border">{{$users->name}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Last Name</label>
                            <div class="p-2 border">{{$users->lname}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <div class="p-2 border">{{$users->email}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Phone</label>
                            <div class="p-2 border">{{$users->phone}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Address1</label>
                            <div class="p-2 border">{{$users->address1}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Address2</label>
                            <div class="p-2 border">{{$users->address2}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>City</label>
                            <div class="p-2 border">{{$users->city}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Country</label>
                            <div class="p-2 border">{{$users->country}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>State</label>
                            <div class="p-2 border">{{$users->state}}</div>
                        </div>
                        <div class="col-md-4">
                            <label>Pin Code</label>
                            <div class="p-2 border">{{$users->pincode}}</div>
                        </div>
                   </div>
                </div>
            </div>
          
        </div>
    </div>
  </div>
@endsection