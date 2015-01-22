@extends('layouts.app-small')

@section('content')

<div class="row">
  <div class="large-12 columns">

  <br>

    <ul class="inline-list">
      <li>{{ HTML::link('home', 'home') }}</li>
      <li>{{ HTML::link('user/me', 'profile') }}</li>
      <li>{{ HTML::link('user/delete', 'delete') }}</li>
    </ul>

    <section id="page-content">

      <h4 class="page-title">Update your account</h4>

      <article>

        {{ Form::open(array('url' => 'user/update')) }}

        @if($errors->any())
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </div>
        @endif

        {{ Form::label('first_name', 'First Name') }}
          {{ Form::text('first_name', 'My name') }}

        {{ Form::label('last_name', 'Last Name') }}
          {{ Form::text('last_name', 'My other name') }}

        {{ Form::label('email', 'Email Address') }}
          {{ Form::text('email', 'username@mail.com') }}

        {{ Form::label('password', 'Password') }}
          {{ Form::password('password', ['placeholder' => 'minimum 5 characters']) }}

        {{ Form::label('password_confirmation', 'Confirm Password') }}
          {{ Form::password('password_confirmation', ['placeholder' => 'your password again']) }}

        {{ Form::submit('Save changes', ['class' => 'button']) }}

        {{ Form::close() }}

      </article>

    </section>

  </div>
</div>

@stop
