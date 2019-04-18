@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard {!! auth()->user()->isAdmin == 1 ? 'Admin':'User' !!}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                   @if(auth()->user()->isAdmin == 1)
                     <p><a href="{{url('/posts/create')}}">Create post</a></p>
                     <p><a href="{{url('/category')}}">Create Category</a></p>
                     <p><a href="{{url('/tag')}}">Create tag</a></p>
                   @endif  
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
