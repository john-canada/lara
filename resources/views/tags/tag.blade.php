@extends('layouts/app')

@section('stylesheet')
  {!!HTML::script('css/select2.min.css')!!}
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
        </select>
    </div>          
</div>
@endsection

@section('script')
  {!!HTML::script('js/select2.min.js')!!}
@endsection