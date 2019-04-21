@extends('layouts.app')

@section('content')

@if(Session::has('success')? Session::get('success'):'')
    {{Session::get('success')}}
@endif

  <a href="/displaycat/{{$category->id}}" class="btn btn-primary mt-3">Go back</a><br><br>
  
   <img width="250" height="250" src="/storage/images/{{$post->images}}">
   <h3>{{$post->title}}</h3>
   <small>Posted on : {{$post->created_at}}  by {{$post->user->name}}</small>
   <div>{!!$post->body!!}</div>
  
   <h6><b>{{__('Category :')}} </b> {{ $category->name }} <label><b>{{__('Tags :')}}</b></label> 
      @foreach($post->tags as $tag ) 
        <label class="label label-default">{{$tag->name}}</label>
      @endforeach
    </h6>
<hr>
    <h4>{{__('Comments')}}</h4>
   @foreach ($post->comments as $comment)
      <p>{{__('Name : ')}} {{$comment->name}}</p> 
      <p>{{__('Email : ')}} {{$comment->email}}</p>
      <p>{{__('Comment : ')}} {{$comment->comment}}</p>
      <hr>
   @endforeach

 {!! Form::open(['route' => ['postcomment',$post->id],'method'=>'POST']) !!}

 <div class="row">
   <div class="col-md-6">
    <div class="form-group">
        {{-- {{Form::Label('name','Nane')}} --}}
        {{Form::text('name','',['class'=>'form-control' ,'placeholder'=>'Your name'])}}
    </div>    

    <div class="form-group">
      {{-- {{Form::Label('email','Email address')}} --}}
      {{Form::email('email','',['class'=>'form-control' ,'placeholder'=>'Email address'])}}
  </div>
 </div>
</div>
    <div class="form-group">
            {{-- {{Form::Label('comment','Comment')}}s --}}
            {{Form::textarea('comment','',['id'=>'Oarticle-ckeditor','class'=>'form-control' ,'placeholder'=>'Your comments'])}}
    </div> 
 
   {{Form::submit('POST COMMENT',['class'=>'btn btn-primary'])}}

   {!! Form::close() !!}    
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