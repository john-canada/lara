@extends('layouts.app')

@section('content')


  <a href="/posts" class="btn btn-primary">Go back</a><br><br>
  
   <img width="250" height="250" src="/storage/images/{{$post->images}}">
   <h3>{{$post->title}}</h3>
   <small>Posted on : {{$post->created_at}}  by {{$post->user->name}}</small>
   <div>{!!$post->body!!}</div>
   <hr>
   @if(!auth::guest())
      @if(auth::user()->id==$post->user_id)
        {!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
          {{Form::hidden('_method','Delete')}}
          {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
          <a href="/posts/{{$post->id}}/edit" class="btn btn-primary mt-0">Edit</a>
        {!!Form::close()!!}
      @endif   
  @endif
   @endsection