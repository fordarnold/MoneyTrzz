@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-6 small-12 columns centered">
    <h3>Open master user account</h3>
    <article>

      {{ Form::open(array('url' => 'user/register')) }}

      @if($errors->any())
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </div>
      @endif

      <div class="form-group">
        {{ Form::label('fname', 'First Name') }}
        {{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}
      </div>
      <div class="form-group">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
      </div>
      <div class="form-group">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
      </div>
      <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
      </div>
      <div class="form-group">
        {{ Form::label('groups', 'Groups') }}
        {{ Form::password('groups', array('class' => 'form-control', 'placeholder' => 'Groups')) }}
      </div>
      <div class="form-group">
        {{ Form::submit('Register', array('class' => 'btn btn-success')) }}i
        {{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
      </div>

      {{ Form::close() }}

    </article>
    </div>
  </div>
</div>

@stop
