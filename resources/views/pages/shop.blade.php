
@extends('layouts/app')
@section('content')
<h2 style="text-align:center;margin-top:50px;margin-bottom:40px ">{{__('Book Shopping')}}</h2>
  
@if(Session::has('success')) 
     <div class="alert alert-success">{{__('Successfully Purchase')}}</div>   
  @endif 

<div class="row">
    @foreach($products as $product)
       <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                    <img src="{{$product['image_path']}}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{$product['title']}}</h5>
                      <p class="card-text">{{$product['description']}}</p>
                      <h4 style="text-align:center"><small>$ </small><b>{{$product['price']}}</b></h4>
                      <a href="{{route('addToCart',['id'=>$product['id']])}}" class="btn btn-primary btn-block" style="margin:auto">Add to Cart</a>
                    </div>
                  </div>
       </div>    
        
    @endforeach          
            
</div>    

@endsection