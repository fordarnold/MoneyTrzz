@extends('layouts.dash')

@section('content')

<div class="row">
  <div class="large-12 columns text-center">

    <h2>Welcome to Money Trzz</h2>

    <h4>Start by {{ HTML::link('accounts/bank/new', 'adding your bank account details') }}</h4>

    <div class="row">
    <div class="large-6 columns small-centered">

    {{ Form::open(array('url' => 'accounts/bank')) }}

    @if($errors->any())
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </div>
    @endif

    {{ Form::label('name', 'Bank Name') }}
      {{ Form::text('name', '', ['placeholder' => '(required)']) }}

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
        {{ Form::submit('Save', ['class' => 'button']) }}
      </div>
      <div class="large-6 medium-6 columns text-right">
        <h5>{{ HTML::link('user/login', 'I already have an account') }}</h5>
      </div>
    </div>

    {{ Form::close() }}

    </div>
    </div>

  </div>
</div>

@stop