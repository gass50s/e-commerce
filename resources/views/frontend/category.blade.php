@extends('layouts.front')

@section('title')
Category
@endsection
@section('content')
    <div class="py-5">

        <div class="container">
           <h3>Categories</h3>

            <div class="row">
                <div class="col-md-12">
                <div class="row">

                    @foreach($category as $cate) 
                    <div  class="col-md-4 mb-3">
                        <a href="{{url('category/'.$cate->slug)}}">

                            <div class="card">
                                <img  src="{{ asset('assets/uploads/category/'.$cate->image)}}" alt="">
                            </div>
                            <div class="card_body">
                                <h5>{{'Name: '.$cate->name}}<h5>
                                    <small class="float-start">{{'Discription: '.$cate->description}} </small>

                            </div>
                        </a>
                    </div>
                   
                    @endforeach
                </div>
                </div>

            </div>
        </div>
    </div>
@endsection