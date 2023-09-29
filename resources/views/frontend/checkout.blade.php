@extends('layouts.front')

@section('title')
Checkout 
@endsection
@section('content')
   <div class="container mt-3">
    <form action="{{url('place-order')}}" method="POST"   enctype="multipart/form-data">
    {{ csrf_field() }}         

      <div class="row">
         <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Détails de base</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">Prénom</label>
                            <input type="text" class="form-control Firstname" value="{{Auth::user()->name}}" name="fname" placeholder="Entre First Name">
                            <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nom de famille</label>
                            <input type="text" class="form-control Lastname"value="{{Auth::user()->lname}}"  name="lname" placeholder="Entre Last Name">
                            <span id="lname_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">E-mail</label>
                            <input type="text" class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Entre Email">
                            <span id="email_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">Numéro de téléphone</label>
                            <input type="text" class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Entre Phone Number">
                            <span id="phone_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">Adress 1</label>
                            <input type="text" class="form-control address1" value="{{Auth::user()->address1}}" name="address1" placeholder="Entre Adress 1">
                            <span id="address1_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">Adress 2</label>
                            <input type="text" class="form-control address2" value="{{Auth::user()->address2}}" name="address2" placeholder="Entre Adress 2">
                            <span id="address2_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">Ville</label>
                            <input type="text" class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Entre city">
                            <span id="city_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">État</label>
                            <input type="text" class="form-control state" value="{{Auth::user()->state}}" name="state" placeholder="Entre State">
                            <span id="state_error"class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">Pays</label>
                            <input type="text" class="form-control country" value="{{Auth::user()->country}}" name="country" placeholder="Entre Country">
                            <span id="country_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <label for="">Code postal</label>
                            <input type="text" class="form-control pincode" name="pincode" value="{{Auth::user()->pincode}}" placeholder="Entre Pin Code">
                            <span id="pincode_error" class="text-danger"></span>

                        </div>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-md-5">
         <div class="card">
                <div class="card-body">
                    <h6>Détails de la commande</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Qty</td>
                                <td>Prix</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartitems as $item)
                            <tr>
                                <td>{{$item->products->name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->products->selling_price}}</td>

                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-success  w-100 " type="submit"> Acheter</button>

                </div>
            </div>
         </div>
      </div>
    </form>
   </div>
@endsection
