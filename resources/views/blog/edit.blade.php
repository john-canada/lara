@extends('layouts.app')
@section('stylesheet')
  {!!Html::script('css/select2.min.css')!!}
@endsection

@section('content')

   <h1>Edit Posts</h1>
   {!! Form::model($post, ['action' => ['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::Label('title','Title')}}
        {{Form::text('title',$post->title,['class'=>'form-control' ,'placeholder'=>'Title'])}}
    </div>    

    <div class="form-group">
            {{Form::Label('body','Body')}}
            {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control' ,'placeholder'=>'Body'])}}
    </div> 

    <div class="form-group">
            {{form::file('image')}}
     </div>    

   <div class="row">  
    <div class="col-md-6">      
     <div class="form-group">
        {{Form::Label('category','Category')}}
        {{Form::select('category_id', $categories , null , ['class'=>'form-control select2-multiple'])}}
    </div>  
  </div>
  <div class="col-md-6">
    <div class="form-group">
        {{Form::Label('tags','Tags')}}
        {{Form::select('tags[]', $tags , null , ['class'=>'form-control select2-multiple'])}}
   </div>  
</div>  
</div>   
     {{Form::hidden('_method','PUT')}}
     {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

   {!! Form::close() !!}

@endsection

@section('script')
  {!!Html::script('js/select2.min.js')!!}
@endsection

<script type="text/javascript">
        $(document).ready(function() {
        $(".select2-multiple").select2();
        $(".select2-multiple").select2().val().trigger('change');
     });