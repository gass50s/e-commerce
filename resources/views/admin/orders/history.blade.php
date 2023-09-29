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
                      <h4>  Order history
                        <a href="{{url('orders')}}" class="btn btn-primary float-right">New Order </a>
                      </h4>

                </div>
                <div class="card-body">
                <table class="table table-bordered">
                <thead>
                     <tr>                       
                         <th> Orders Date</th>
                        <th>Tranking Number</th>
                        <th>Total Price</th>
                        <th>Status </th>
                        <th>Action</th>

                     </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <td>{{ date('d-m-y',strtotime($item->created_at )) }}</td>
                        <td>{{ $item->trancking_no }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->status == '0'?'Pending' :  'Completed'}}</td>

                        <td>
                            <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
          
        </div>
    </div>
  </div>
@endsection