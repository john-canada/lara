@extends('layouts/app')
@section('content')
   <div class="row ">
    <div class="col-md-8" style="margin-top:100px">
      <h4>{{__('Categories')}}</h4>
        
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    </tr>
                @endforeach                      
                </tbody>
                </table>

    </div>      
     <div class="col-md-4"  style="margin-top:100px">
         <h4>{{__('Add new Category')}}</h4>   
        {!!Form::open(['action'=>'CategoryController@store','method'=>'POST'])!!}
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Category name'])}}
        {{Form::submit('Create Category',['class'=>'btn btn-primary btn-block mt-2'])}}
        {!!Form::close()!!}
     </div>
    </div>    
@endsection