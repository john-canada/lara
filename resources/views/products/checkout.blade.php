@extends('layouts/app')
@section('content')

   <div class="row">
      <div class="col-md-6"> 
            <h4>Checkout page</h4>
            <hr>
            <h4>Amount : {{$totalprice}}</h4>
            <script src="https://js.stripe.com/v3/"></script>

            <form action="{{route('postcheckout')}}" method="post" id="payment-form">
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
              <button class="btn btn-primary mt-2">Submit Payment</button>
            </form> 
    </div>
    </div>
 
@endsection

@section('scripts-stripe')
 <script src="{{URL::to('js/checkout.js')}}"></script>
@endsection