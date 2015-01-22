@extends('layouts.app-small')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h4 class="page-title">Sign In</h4>

      {{ Form::open(array('url' => 'user/login')) }}

      @if($errors->has('errors'))
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ $errors->first('errors', ':message') }}
      </div>
      @endif

      {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', ['placeholder' => 'username@mail.com (required)']) }}

      {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['placeholder' => '(required)']) }}

      <div class="row">
        <div class="large-6 medium-6 columns">
          {{ Form::submit('Start my session', array('class' => 'button success')) }}
        </div>
        <div class="large-6 medium-6 columns text-right">
          <h5>{{ HTML::link('user/register', 'I have no account') }} :(</h5>
        </div>
      </div>

      {{ Form::close() }}

    </section>

  </div>
</div>

@stop
