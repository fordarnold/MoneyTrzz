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
        {{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}

      {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}

      {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'your-email@website.com')) }}

      {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password (secure)')) }}

      {{ Form::label('confirm_password', 'Confirm Password') }}
        {{ Form::password('confirm_password', array('class' => 'form-control', 'placeholder' => 'Password again')) }}

      <div class="row">
        <div class="large-6 medium-6 columns">
          {{ Form::submit('Open master account', array('class' => 'button')) }}
        </div>
        <div class="large-6 medium-6 columns text-right">
          <h5>{{ HTML::link('user/login', 'Already have an account? Login &rsaquo;') }}</h5>
        </div>
      </div>

      {{ Form::close() }}

    </section>
  </div>
</div>

@stop
