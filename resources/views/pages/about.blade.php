@extends('layouts/master')
@section('content')


<div class="row">
    <div class="col-md-6 offset-md-3">  
      <h4>{{ __('Contact us') }}</h4>

      <form method="POST" action="{{url('sendmail')}}">
          {{csrf_field()}} 
        <div class="form-group">
          <label for="name">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter name">
            @if($errors->has('title'))
              <small style="color:red">{{$errors->first('name')}}</small>
            @endif
        </div>

          <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp" placeholder="Enter email">
            @if($errors->has('email'))
            <small style="color:red">{{$errors->first('mail')}}</small>
          @endif
          </div>

          {{-- <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" placeholder="message"></textarea>
              @if($errors->has('message'))
                  <small style="color:red">{{$errors->first('message')}}</small>
              @endif
          </div> --}}
          <button type="submit" class="full-width btn btn-primary mb-3">Send mail</button>
        </form>
        @if(Session::has('flash_message'))
          {{Session::get('flash_message')}}
        @endif
  </div>
</div>


{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15784.303429747462!2d124.65799829862294!3d8.492005549627097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc3cf2eac450049e8!2sSavemore+Supermarket!5e0!3m2!1sen!2sph!4v1551496562712" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --}}

@endsection