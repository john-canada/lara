@extends('layouts/app')
@section('content')
   <div class="row ">
    <div class="col-md-8" style="margin-top:100px">
      <h4>{{__('Tags')}}</h4>
        
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Tag ID</th>
                    <th scope="col">Tag name</th>
                    </tr>
                </thead>
                <tbody>
               <?php $x=0?>
                @foreach($tags as $tag)
                    <tr>
                    <td>{{$x=$x+1}}</td>
                    <td>{{$tag->name}}</td>
                    </tr>
                @endforeach                      
                </tbody>
                </table>

    </div>      
     <div class="col-md-4"  style="margin-top:100px">
         <h4>{{__('Add new Tags')}}</h4>   
        {!!Form::open(['action'=>'TagController@store','method'=>'POST'])!!}
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Tag name'])}}
        {{Form::submit('Create Tag',['class'=>'btn btn-primary btn-block mt-2'])}}
        {!!Form::close()!!}
     </div>
    </div>    
@endsection