@extends('layouts.app')

@section('content')
   <h4 style="margin-top:40px;margin-bottom:30px">{{__('Export to excel')}} </h4>
    <a href="{{route('user/export')}}" class="btn btn-info mb-2">Export to excel</a>  
   <div class="row">
          <div class="col-md-10">

                   <table class="table">
                       <thead>
                           <tr>
                               <td>name</td>
                               <td>email</td>
                           </tr>   
                       </thead>
                       <tbody>           
                        @forelse($users as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                            </tr>  
                        @empty
                        <h4>No records found</h4>
                        @endforelse
                       </tbody>        
                   </table>    
              
           <br>

          </div>
      </div>    
        
      
@endsection