@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-6 small-12 columns centered text-center">

  @if($errors->has('errors'))
  <div class="alert-box success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <p>Master account has been deleted from our main records.</p>
    <p>Added to our backup records.</p>
    {{ $errors->first('errors', ':message') }}
  </div>
  @endif

  </div>
</div>

<div class="row">
  <div class="large-6 small-12 columns centered text-center">

    <section id="focus-content">

      <h3>Login</h3>
      
      {{ Form::open(array('url' => 'user/login')) }}

      @if($errors->has('errors'))
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ $errors->first('errors', ':message') }}
      </div>
      @endif

      {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}

      {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
      
      <p></p>

      {{ Form::submit('Start session', array('class' => 'btn btn-success')) }}

      {{ Form::close() }}
    </section>

  </div>
</div>

@stop
