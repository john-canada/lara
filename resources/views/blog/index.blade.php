@extends('layouts.app')

@section('content')
   <h4 style="margin-top:40px;margin-bottom:30px">{{__('Recent Posts')}} </h4>
   @if(count($posts) > 0)
      <div class="row">
          <div class="col-md-10">

                @foreach($posts as $post)
                <div class="list-group">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <img with="150px" height="200px" src="/storage/images/{{$post->images}}">
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Posted on: {{$post->created_at}} by {{$post->user->name}} Category :{{$post->category->name}}</small>
                          <p>{!!Str_limit($post->body, $limit = 400, $end = '...')!!}</p> 
                          
                            <div class="comments">
                                    <h6>{{__('Comments')}}( {{$post->comments->count()}} )</h6>
                               </div> 
                        </div> 
                          
                    </div>                    
                </div>    
                <hr>
            @endforeach
           <br>

          </div>
          <div class="col-md-2">
              <h4>{{__('Categories')}}</h4>
                <table class="table">
                        @foreach($category as $cat)
                        <tr> 
                            <td><a href="{{route('displaycat',$cat->id)}}"> {{$cat->name}} ({{$cat->posts->count()}})</td>
                        <tr>
                      @endforeach         
                  </table> 
          </div>    
      </div>    
    <div class="pull center">
      {{$posts->links()}}
    </div>  
        
    @else
      <p>No post found</p>
   @endif    
@endsection