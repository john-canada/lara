@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-primary">Go back</a>
   <h3>{{$post->title}}</h3>
   <img style="with:100%" src="/storage/images/{{$post->images}}">
   <small>Posted on : {{$post->created_at}}  by {{$post->user->name}}</small>
   <div>{!!$post->body!!}</div>
   <hr>
   @if(!auth::guest())
      @if(auth::user()->id==$post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
        {!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
          {{Form::hidden('_method','Delete')}}
          {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
      @endif   
  @endif
   @endsection