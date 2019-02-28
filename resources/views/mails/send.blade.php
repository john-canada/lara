@extends('layouts/app')
@section('content')
<div class="row">
      <div class="col-md-6 offset-md-3">  
        <h4>{{ __('Contact us') }}</h4>

        <form method="POST" action="{{route('send')}}">
            {{csrf_field()}} 
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
              @if($errors->has('name'))
                <small style="color:red">{{$errors->first('name')}}</small>
              @endif
          </div>

            <div class="form-group">
              <label for="Email1">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              @if($errors->has('email'))
              <small style="color:red">{{$errors->first('email')}}</small>
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
          @if(Session::has('flash_message'))
            {{Session::get('flash_message')}}
          @endif
    </div>
</div>
@endsection

