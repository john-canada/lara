@extends('layouts.app')

@section('content')
   <h1>Cart</h1>
   @if(Session::has('cart'))
   <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul class="list-group">
                @foreach($products as $product)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     <span>{{$product['qty']}}</span>
                     <span>{{$product['item']['title']}}</span>
                     <span class="badge badge-primary badge-pill">{{$product['price']}}</span>
                     
                     <ul class="navbar-nav">
                           <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               action
                             </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                 <a class="nav-link" href="{{route('additem',['id'=>$product['item']['id']])}}">{{ __(' Add 1 more Item ')}}</a>                         
                                 <a class="nav-link" href="{{route('reducebyone',['id'=>$product['item']['id']])}}">{{ __(' Reduce by 1 item ')}}</a>
                                 <a class="nav-link" href="{{route('removeItems',['id'=>$product['item']['id']])}}">{{__(' Remove all items ')}}</a> 
                             </div>
                           </li>
                         </ul> 
                         
                    </li> 
                    
                @endforeach   
            </ul> 
        </div>   
   </div>  
   <div class="row">
        <div class="col-md-6">
            Total Amount: $<strong>{{$totalprice}}</strong>
        </div>    
   </div>  
   <div class="row">
        <div class="col-md-6">
            {{-- <a href="{{route('checkout')}}" class="btn btn-success">Check Out</a> --}}
            <a href="{{route('checkout')}}" class="btn btn-success">Check Out</a>
        </div>    
   </div>   
 
 @else  
  <div class="row">
        <div class="col-md-6">
            <h2>No items in Cart</h2>
        </div>    
   </div>
  @endif
@endsection
