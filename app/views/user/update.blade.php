@extends('layouts.app-small')

@section('content')

<div class="row">
  <div class="large-12 columns">

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

      <p></p>
      <div class="form-group">
        {{ Form::submit('Update account details', array('class' => 'btn btn-success')) }}
      </div>

      {{ Form::close() }}

    </article>

  </section>
</div>
</div>

@stop
