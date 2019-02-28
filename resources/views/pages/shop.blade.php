
@extends('layouts/app')
@section('content')
<h4 style="text-align:center">Shop page</h4>

<div class="row">
    @foreach($products as $product)
       <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                    <img src="{{$product->image_path}}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->title}}</h5>
                      <p class="card-text">{{$product->description}}</p>
                      <h4 style="text-align:center"><b>{{$product->price}}</b></h4>
                      <a href="{{route('addToCart',['id'=>$product->id])}}" class="btn btn-primary pull-right" style="margin:auto">Add to Cart</a>
                    </div>
                  </div>
       </div>    
        
    @endforeach          
            
</div>    


@endsection