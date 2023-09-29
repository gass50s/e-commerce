@extends('layouts.admin')
@section('content')
    <div class="card">
       <div class="card-header">
      
               <h3> Edit/Update Category Page</h3>
        </div>

        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3"> 
                       <label for="">Name</label>
                       <input type="text" class="form-control" name="name"value="{{$category->name}}">
                    </div>

                    <div class="col-md-6 mb-3" > 
                       <label for="">Slug</label>
                       <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                    </div> 
                   
                    
                    <div class="col-md-6 mb-3"> 
                       <label for="">Status</label>
                       <input type="checkbox" {{$category-> status == '1' ? "checked" : ''}} name="status">
                    </div>  

                    <div class="col-md-6 mb-3"> 
                       <label for="">Popular</label>
                       <input type="checkbox" name="popular" {{$category-> popular == '1' ? "checked" : ''}}>
                    </div>  
                     
                    <div class="col-md-12 mb-3"> 
                       <label for="">Description</label>
                       <textarea rows="3" class="form-control" name="description" >{{$category->description}}</textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3"> 
                       <label for="">Meta Title</label>
                       <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                    </div>  
                    
                   
                    
                    <div class="col-md-12 mb-3"> 
                       <label for="">Meta Keywords</label>
                       <textarea rows="3" class="form-control" name="meta_keywords">{{$category->meta_keywords}}</textarea>
                    </div>  
                    
                    <div class="col-md-12 mb-3"> 
                       <label for="">Meta Description</label>
                       <textarea rows="3" class="form-control" name="meta_descrip" >{{$category->meta_descrip}}</textarea>
                    </div>  
                    @if($category->image){
                     <img src="{{ asset('/assets/uploads/category/'.$category->image)}}" >                     
                     }
                    @endif
                    <div class="col-md-6 mb-3"> 
                       <input type="file" class="form-control" name="image">
                    </div>

                    
                    <div class="col-md-6 mb-3"> 
                       <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
   
@endsection 