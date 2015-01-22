@extends('layouts.app-small')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h4 class="page-title">Open a Master User account</h4>

      {{ Form::open(array('url' => 'user/register')) }}

      @if($errors->any())
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </div>
      @endif

      {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', '', ['placeholder' => '(required)']) }}

      {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', '', ['placeholder' => '(required)']) }}

      {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', ['placeholder' => 'username@mail.com (required)']) }}

      {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['placeholder' => 'minimum 5 characters']) }}

      {{ Form::label('password_confirmation', 'Confirm Password') }}
        {{ Form::password('password_confirmation', ['placeholder' => 'your password again']) }}

      <div class="row">
        <div class="large-6 medium-6 columns">
          {{ Form::submit('Open master account', ['class' => 'button']) }}
        </div>
        <div class="large-6 medium-6 columns text-right">
          <h5>{{ HTML::link('user/login', 'I already have an account') }}</h5>
        </div>
      </div>

      {{ Form::close() }}

    </section>
  </div>
</div>

@stop
