@extends('layouts.app')

@section('content')
   <h4 style="margin-top:40px;margin-bottom:30px">{{__('Recent Posts')}} </h4>
   @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="list-group">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <img with="150px" height="150px" src="/storage/images/{{$post->images}}">
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Posted on: {{$post->created_at}} by {{$post->user->name}}</small>
                        <p>{!!$post->body!!}</p>
                    </div> 
                </div>                    
            </div>    
            <hr>
        @endforeach
       <br>
      {{$posts->links()}}
    @else
      <p>No post found</p>
   @endif    
@endsection