@extends('layouts.app')

@section('content')

   <h1 style="margin-top:60px;margin-bottom:30px">Create Posts</h1>
   {!! Form::open(['action' => 'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::Label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control' ,'placeholder'=>'Title'])}}
    </div>    

    <div class="form-group">
            {{Form::Label('body','Body')}}
            {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control' ,'placeholder'=>'Body'])}}
    </div> 
 
    <div class="form-group">
        {{form::file('image')}}
    </div>    

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

   {!! Form::close() !!}

@endsection