@extends('layouts.admin')
@section('content')
    <div class="card">
       <div class="card-header">
     
               <h3>Edit product Page</h3>
        </div>

        <div class="card-body">
            <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')

                <div class="row">


                
                    <div class="col-md-12 mb-3"> 
                        <select class="form-select" name="cate_id">
                        <option value="">{{$product->category->name}}</option>
                        
                   
                        </select>
                    </div>
                    <div class="col-md-6 mb-3"> 
                       <label for="">Name</label>
                       <input type="text" class="form-control"  value="{{$product->name}}" name="name">
                    </div>

                    <div class="col-md-6 mb-3" > 
                       <label for="">Slug</label>
                       <input type="text" class="form-control"value="{{$product->slug}}" name="slug">
                    </div> 
                   
                    
                    <div class="col-md-6 mb-3"> 
                       <label for="">Small Description</label>
                       <textarea rows="3" class="form-control" name="small_description">{{$product->Small_description}}</textarea>
                    </div>  

                    <div class="col-md-12 mb-3"> 
                       <label for="">Description</label>
                       <textarea rows="3" class="form-control" name="description">{{$product->description}}</textarea>
                    </div>

                    <div class="col-md-6 mb-3"> 
                       <label for="">Original Price</label>
                       <input type="number" class="form-control"value="{{$product->original_price}}" name="original_price">
                    </div>  
                     
                    <div class="col-md-6 mb-3"> 
                       <label for="">Selling Price</label>
                       <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price">
                    </div>  

                    <div class="col-md-6 mb-3"> 
                       <label for="">Tax</label>
                       <input type="number" class="form-control"  value="{{$product->tax}}" name="tax">
                    </div>           
                    
                    <div class="col-md-6 mb-3"> 
                       <label for="">Quantity</label>
                       <input type="number" class="form-control" value="{{$product->qty}}"  name="qty">
                    </div>  
                    
              

                    <div class="col-md-6 mb-3"> 
                       <label for="">Status</label>
                       <input type="checkbox" name="status" {{$product->status == '1' ? "checked" : ''}}>
                    </div>  
                    
                    <div class="col-md-6 mb-3"> 
                       <label for="">Trending</label>
                       <input type="checkbox" name="trending" {{$product->trending == '1' ? "checked" : ''}} name="status">
                    </div>  
                    
                    <div class="col-md-12 mb-3"> 
                       <label for="">Meta Title</label>
                       <input type="text" class="form-control"  value="{{$product->meta_title}}" name="meta_title">
                    </div> 
                    
                    <div class="col-md-12 mb-3"> 
                       <label for="">Meta Keywords</label>
                       <textarea rows="3" class="form-control"   name="meta_keywords">{{$product->meta_keywords}}</textarea>
                    </div>  
                    
                    <div class="col-md-12 mb-3"> 
                       <label for="">Meta Description</label>
                       <textarea rows="3" class="form-control"   name="meta_description">{{$product->meta_description}}</textarea>
                    </div>  
                    
                    @if($product->image){
                     <img src="{{ asset('/assets/uploads/product/'.$product->image)}}" >                     
                     }
                     @endif
                    <div class="col-md-6 mb-3"> 
                       <input type="file" class="form-control" name="image">
                    </div>

                    
                    <div class="col-md-6 mb-3"> 
                       <button type="submit" class="btn btn-primary" name="image">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
   
@endsection 