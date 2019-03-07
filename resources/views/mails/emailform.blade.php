@extends('layouts/app')
@section('content')
<div class="row">
      <div class="col-md-6 offset-md-3">  
        <h4>{{ __('Contact us') }}</h4>

        <form method="POST" action="{{route('send')}}">
            {{csrf_field()}} 
          <div class="form-group">
            <label for="name">Email address</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email address">
              @if($errors->has('email'))
                <small style="color:red">{{$errors->first('email')}}</small>
              @endif
          </div>

            <div class="form-group">
              <label for="Email1">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" aria-describedby="emailHelp" placeholder="Enter Subject">
              @if($errors->has('subject'))
              <small style="color:red">{{$errors->first('subject')}}</small>
            @endif
            </div>

            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" id="message" placeholder="message"></textarea>
                @if($errors->has('message'))
                    <small style="color:red">{{$errors->first('message')}}</small>
                @endif
            </div>
            <button type="submit" class="full-width btn btn-primary mb-3">Submit</button>
          </form>
          @if(Session::has('message'))
            {{Session::get('message')}}
          @endif
    </div>
</div>
@endsection

