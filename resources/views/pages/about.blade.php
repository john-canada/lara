@extends('layouts/app')
@section('content')

<div class="row">

    <div class="col-md-6 offset-md-3">  
      <h4 style="margin-top:60px;margin-bottom:20px">{{ __('Contact us') }}</h4>

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

            <button type="submit" class="full-width btn btn-primary mb-3">Send mail</button>
        </form>
        @if(Session::has('flash_message'))
          {{Session::get('flash_message')}}
        @endif
  </div>
</div>
{!!$map['js']!!}
{!!$map['html']!!}


@endsection

