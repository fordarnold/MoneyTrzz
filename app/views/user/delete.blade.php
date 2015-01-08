@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h4 class="page-title">Delete accounts</h4>

      <article>
        <h2 class="msg-warning">Are you sure you want to delete the Master User account?</h2>
        <p>
          You will no longer be able to access your Master account or any of its data.
        <br>
          We will try to backup your data before deleting the account in case you would like to register again with the same email.
        </p>

          {{ Form::open(array('url' => 'user/delete')) }}

          @if($errors->has('errors'))
          <div class="alert-box error">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ $errors->first('errors', ':message') }}
          </div>
          @endif

          {{ Form::label('password', 'Enter your password to confirm') }}
          {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}

          {{ Form::submit('Yes, I\'m sure I want to delete', array('class' => 'button alert')) }}

          {{ Form::close() }}

      </article>

    </section>

  </div>
</div>

@stop
