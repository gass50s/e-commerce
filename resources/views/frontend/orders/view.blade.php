@extends('layouts.front')

@section('title')
My Orders
@endsection
@section('content')
  <div class="container py-5">
    <div class="row">
        <div class="col-md_12">
            <div class="card">
                <div class="card-header bg-dark ">
                      <h4> Vue de la commande
                      <a href="{{url('my-order')}}" class="btn btn-secondary text-white float-end">Retour</a>
                      </h4>
                      <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6 order-details">
                    <h4>Les détails d'expédition</h4>
                    <hr>

                        <label for="" >Prénom</label>
                        <div class="border">{{$orders->fname}}</div>
                        <label for="" >Nom de famille</label>
                        <div class="border">{{$orders->lname}}</div>
                        <label for="" >E-mail</label>
                        <div class="border">{{$orders->email}}</div>
                        <label for="" >Contact </label>
                        <div class="border">{{$orders->phone}}</div>
                        <label for="" >Adresse de livraison</label>
                        <div class="border">
                           Address1 :  {{$orders->address1}}<br>
                           Address1 :   {{$orders->address2}}<br>
                           Ville :  {{$orders->city}}<br>
                           État : {{$orders->state}}  <br>                        
                           Pays : {{$orders->country}}

                        </div>
                        <label for="" >Code postal</label>
                        <div class="border">{{$orders->pincode}}</div>
                    </div>
                    <div class="col-md-6">
                    <table class="table table-bordered">
                <thead>
                    <h4>Détails de la commande</h4>
                    <hr>

                     <tr>                       
                        <th> Nom</th>
                        <th>Quantité</th>
                        <th>Prix</th>
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
                </div>
            </div>
          
        </div>
    </div>
  </div>
@endsection
