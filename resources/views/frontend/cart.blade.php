@extends('layouts.front')

@section('title')
Cart
@endsection
@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">
            <a href="{{url('/')}}"> Accueille</a>/ 
            <a href="{{url('cart')}}"> Panier</a>

        </h4>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
        @if($cartitem->count()>0 )
                <div class="card-body">
                    @php
                    $total = 0;
                    @endphp
                        @foreach($cartitem as $item)
                        <div class="row  product_data">

                                <div class="col-md-2" >
                                    <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="width:120px; height:100px;   margin-bottom: 25px;" alt="c'est un image">  
                                </div> 
                                <div class="col-md-4 my-auto">
                                    <h5> {{$item->products->name}}</h5>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <h6>{{$item->products->selling_price}}</h6>
                                </div>
                                    <div class=" col-md-3 my-auto">
                                            <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                            @if($item->products->qty >= $item->prod_qty)
                                                <label for="Quantity">Quantité</label>
                                                <div class="input-group text-center mb-3" style="width:130px">
                                                    <button class="input-group-text changequantity decrement-btn">-</button>
                                                    <input type="text" name="Quantity " value="{{$item->prod_qty}}" class="form-control qty-input "/>
                                                    <button class="input-group-text changequantity increment-btn">+</button>
                                                </div>
                                                @php $total += $item->products->selling_price*$item->prod_qty ; @endphp
                                                @else 
                                                <h6 style="color:red;"> Rupture de stock</h6>
                                            @endif
                                    </div>

                                <div class="col-md-2 my-auto">
                                <button type="button" class="btn btn-danger me-3  my-auto delete-prod-item">Supprimer <i class="fas fa-trash"></i> </button>
                                </div>
                        </div>
                

                        @endforeach
                </div>
                <div class="card-footer">
                    <h6 >Total Price : {{$total}}</h6>
                    <a href="checkout" class="btn btn-outline-success  float-end">Passer à la caisse</a>
                </div>
        @else 
          <div class="card-body text-center">
            <h2> Votre panier est vide</h2>
            <a href="{{url('category')}}" class="btn btn-primary float-end">Continuer vos achats</a>
          </div>
        @endif
    </div>
</div>
@endsection

