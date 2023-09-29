@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection
@section('content')

    <div class="py-5">

        <div class="container">
        <h3>{{$category->name}}</h3>

            <div class="row">
                @foreach($product as $prod) 
                    <div  class="col-md-4 mb-3">
                        <a  href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                                <div class="card">
                                    <img  src="{{ asset('assets/uploads/product/'.$prod->image)}}" alt="">
                                </div>
                                <div class="card_body">
                                    <h5>{{$prod->name}}<h5>
                                        <small class="float-start">{{$prod->selling_price.' $'}}</small>
                                        <small class="float-end"><s>{{$prod->original_price.' $'}} </s></small>

                                </div>
                        </a>
                    </div>
                 @endforeach
            </div>
        </div>
    </div>


@stop

