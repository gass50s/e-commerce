@extends('layouts.admin')
@section('title')
Order Details
@endsection
@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4> Order view
                         <a href="{{url('orders')}}" class="btn btn-secondary float-right ">Back</a>
                    </h4>
                    <hr>
                </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 order-details">
                                        <h4>Shipping details</h4>
                                        <hr>

                                        <label for="" >First Name</label>
                                        <div class="border">{{$orders->fname}}</div>
                                        <label for="" >Last Name</label>
                                        <div class="border">{{$orders->lname}}</div>
                                        <label for="" >Email</label>
                                        <div class="border">{{$orders->email}}</div>
                                        <label for="" >Contact </label>
                                        <div class="border">{{$orders->phone}}</div>
                                        <label for="" >Shipping Address</label>
                                        <div class="border">
                                            Address1 :  {{$orders->address1}}<br>
                                            Address1 :   {{$orders->address2}}<br>
                                            City :  {{$orders->city}}<br>
                                            State : {{$orders->state}}  <br>                        
                                            Country : {{$orders->country}}

                                        </div>
                                        <label for="" >Zip code</label>
                                    <div class="border">{{$orders->pincode}}</div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                                <thead>
                                                    <h4>Order details</h4>
                                                    <hr>

                                                    <tr>                       
                                                        <th> Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Image </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders->orderitems as $item)
                                                    <tr>
                                                        <td>{{ $item->products->name}}</td>
                                                        <td>{{ $item->qty}}</td>
                                                        <td>{{ $item->price}}</td>

                                                        <td>
                                                            <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="70px" alt="product image"/>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                    </table>
                                    <h4 class="px-2"> Grand Total: <span class="float-end">{{$orders->total_price}}</span></h4>
                                        <div class="mt-3">
                                            <label>Order Status</label>
                                            <form action="{{url('update-order/'.$orders->id)}}"method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select class="form-select" name="order_status">
                                                    <option >Status : </option>
                                                    <option  value="0" {{ $orders->status == '0'?'selected':''}} > Pending</option>
                                                    <option value="1"{{ $orders->status == '1'?'selected':''}} >Completed</option>
                                                </select>
                                                <button type="submit" class="btn btn-secondery float-right mt-3">Update</button>
                                            </form>
                                        </div>
               
                                </div>
                            </div>
          
            </div>
        </div>
    </div>
</div>

@endsection