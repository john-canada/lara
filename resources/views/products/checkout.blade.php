@extends('layouts/app')
@section('content')

<div class="row">
    
  <div class="col-md-4 offset-md-4 mt-3">
        <h2 style="margin-top:40px;margin-bottom:40px;">Check out page</h2>
        
         @if($errors->any())
             <div id="charge-error" class="alert alert-danger {{!Session::has('error')? 'hidden':''}}">
                 {{Session::get('error')}}
             </div>
         @endif


         <form action="{{route('checkout')}}" method="post" id="payment-form">
            {{ csrf_field() }}
            <div class="form-row">
               <input type="text" class="form-control mb-3" name="name" placeholder="Name">
            </div>
            <div class="form-row">
              <input type="text" class="form-control mb-3" name="phone" placeholder="Phone">
           </div>
            <div class="form-row">   
               <textarea type="text" class="form-control mb-3" name="address" placeholder="address">Address here</textarea>
            <div>   
           <div class="form-row">
             <label for="card-element">
               {{-- Credit or debit card --}}
             </label>
             <div id="card-element">
               <!-- A Stripe Element will be inserted here. -->
             </div>
         
             <!-- Used to display form errors. -->
             <div id="card-errors" role="alert"></div>
           </div>
           <h4 style="margin-top:20px; margin-bottom:20px"> Total amout: ${{$totalprice}}</h4> 
           <button class="btn btn-primary">Submit Payment</button>
         </form>

   
  </div>    
</div>  
@endsection

@section('scripts-stripe')
 <script src="{{URL::to('js/checkout.js')}}"></script>
@endsection