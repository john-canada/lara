@extends('layouts/app')
@section('content')

<div class="row">
    
  <div class="col-md-6 col-md-offset-3 mt-3">
         <h4> Total amout: ${{$totalprice}}</h4>
         @if($errors->any())
             <div id="charge-error" class="alert alert-danger {{!Session::has('error')? 'hidden':''}}">
                 {{Session::get('error')}}
             </div>
         @endif


         <form action="{{route('checkout')}}" method="post" id="payment-form">
            {{ csrf_field() }}
           <div class="form-row">
             <label for="card-element">
               Credit or debit card
             </label>
             <div id="card-element">
               <!-- A Stripe Element will be inserted here. -->
             </div>
         
             <!-- Used to display form errors. -->
             <div id="card-errors" role="alert"></div>
           </div>
         
           <button class="btn btn-primary">Submit Payment</button>
         </form>

   
  </div>    
</div>  
@endsection

@section('scripts-stripe')
 <script src="{{URL::to('js/checkout.js')}}"></script>
@endsection