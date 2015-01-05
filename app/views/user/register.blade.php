@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-6 small-12 columns centered text-center">

    <section id="focus-content">

      <h3>Open your Master User account</h3>

      {{ Form::open(array('url' => 'user/register')) }}

      @if($errors->any())
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </div>
      @endif

      {{ Form::label('fname', 'First Name') }}
        {{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}

      {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}

      {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}

      {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}

      {{ Form::label('groups', 'Groups') }}
        {{ Form::password('groups', array('class' => 'form-control', 'placeholder' => 'Groups')) }}

      <p></p>

      {{ Form::submit('Open account', array('class' => 'button')) }}

      {{ Form::close() }}

      <h3>{{ HTML::link('user/login', 'or Login, if you already have an account', array('class' => 'button')) }}</h3>

    </section>
  </div>
</div>

@stop
