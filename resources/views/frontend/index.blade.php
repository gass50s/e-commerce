@extends('layouts.front')

@section('title')
welcom to E-chop
@endsection
@section('content')

    @include('layouts.inc.slider')
    <div class="py-5">

        <div class="container">
        <h3>Featured Products</h3>

            <div class="row">
                <div class="owl-carousel products-carousel owl-theme">
                    @foreach($featured_products as $prod) 
                    <div  class="items">
                       <div class="card">
                        <img  src="{{ asset('assets/uploads/product/'.$prod->image)}}" alt="">
                       </div>
                       <div class="card_body">
                          <h5>{{$prod->name}}<h5>
                            <small class="float-start">{{$prod->selling_price.' $'}}</small>
                            <small class="float-end"><s>{{$prod->original_price.' $'}} </s></small>

                       </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">

<div class="container">
<h3>Categories</h3>

    <div class="row">
        <div class="owl-carousel products-carousel owl-theme">
            @foreach($category as $cate) 
            <div  class="items">
            <a href="{{url('category/'.$cate->slug)}}">

               <div class="card">
                <img  src="{{ asset('assets/uploads/category/'.$cate->image)}}" alt="">
               </div>
               <div class="card_body">
                  <h5>{{$cate->name}}<h5>
                    <small class="float-start">{{$cate->description}}</small>

               </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
         @section('scripts')

            <script>
                $('.products-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
            </script>
        @stop
       
@stop

