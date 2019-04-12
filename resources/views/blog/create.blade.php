@extends('layouts.app')

@section('stylesheet')
  {!!Html::script('css/select2.min.css')!!}
@endsection

@section('content')

   <h1 style="margin-top:60px;margin-bottom:30px">Create Posts</h1>
   {!! Form::open(['action' => 'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

 <div class="row">
   <div class="col-md-4">    
    <div class="form-group">
        {{Form::Label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control' ,'placeholder'=>'Title'])}}
    </div>    
   </div>
 </div>

    <div class="form-group">
            {{Form::Label('body','Body')}}
            {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control' ,'placeholder'=>'Body'])}}
    </div> 
 
    <div class="form-group">
        {{form::file('image')}}
    </div>    

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
            {{Form::Label('category','Category')}}
             <select name="category_id" class="form-control">
                 @foreach($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
             </select>
             <p>
             {{Form::Label('tags','Tags')}}
             <select class="form-control select2-multiple" name="tags[]" multiple="multiple">
                  @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                  @endforeach
            </select>
                </p>    
            </div>
         </div>      
        </div> 

     {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
     {!! Form::close() !!}

@endsection

@section('script')
  {!!Html::script('js/select2.min.js')!!}
@endsection

<script type="text/javascript">
        $(document).ready(function() {
        $('.select2-multiple').select2();
     });
</script>
