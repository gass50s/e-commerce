@extends('layouts.front')

@section('title')
Cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">
            <a href="{{url('/')}}"> Home</a>/ 
            <a href="{{url('cart')}}"> Wishlist</a>

        </h4>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @if($wishlist ->count()>0)
                 @foreach($wishlist as $item)
                        <div class="row  product_data">

                                <div class="col-md-2" >
                                    <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="width:120px; height:100px;   margin-bottom: 25px;" alt="c'est un image">  
                                </div> 
                                <div class="col-md-3 my-auto">
                                    <h5> {{$item->products->name}}</h5>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <h6>{{$item->products->selling_price}}</h6>
                                </div>
                                    <div class=" col-md-2 my-auto">
                                            <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                            @if($item->products->qty >= $item->prod_qty)
                                                <label for="Quantity">Quantity</label>
                                                <div class="input-group text-center mb-3" style="width:130px">
                                                    <button class="input-group-text  decrement-btn">-</button>
                                                    <input type="text" name="Quantity " value="1" class="form-control qty-input "/>
                                                    <button class="input-group-text  increment-btn">+</button>
                                                </div>
                                                @else 
                                                <h6 style="color:red;"> Out of stock</h6>
                                            @endif
                                    </div>
                                <div class="col-md-2 my-auto">
                                <button type="button" class="btn btn-primary me-3 addtocartbtn my-auto ">Ajouter au Panier </button>
                                </div>

                                <div class="col-md-2 my-auto">
                                <button type="button" class="btn btn-danger me-3  remove">Supprimer </button>
                                </div>
                        </div>
                

                    @endforeach
              
            @else
            <h4>There are no products in your wishlist</h4>
            @endif
     
        </div>
       
    </div>
</div>
@endsection

