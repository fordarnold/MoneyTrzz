@extends('layouts.app')

@section('content')

@if($errors->has('errors'))
<div class="alert-box success">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <p>Master account has been deleted from our main records.</p>
  <p>Added to our backup records.</p>
  {{ $errors->first('errors', ':message') }}
</div>
@endif

<div class="col-md-4 col-md-offset-4">
  <div class="panel panel-info">
    <div class="panel-heading">Please Login</div>
    <div class="panel-body">
      {{ Form::open(array('url' => 'user/login')) }}
      @if($errors->has('errors'))
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ $errors->first('errors', ':message') }}
      </div>
      @endif
      <div class="form-group">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
      </div>
      <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
      </div>
      <div class="form-group">
        {{ Form::submit('Login', array('class' => 'btn btn-success')) }}
        {{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>

@stop
