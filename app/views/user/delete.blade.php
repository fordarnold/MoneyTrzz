@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-8 small-12 columns centered text-center">

    <section id="focus-content">

      <h3>Delete master user?</h3>
      <article>
        <h2 class="msg-warning">Are you sure you want to delete your account?</h2>
        <p>
          You will no longer be able to access your Master account or any of its data.
        <br>
          We will try to backup your data before deleting the account in case you would like to register again with the same email.
        </p>
        <div class="row">
          <div id="large-6 small-12 columns centered">
            <div class="text-center">

              {{ Form::open(array('url' => 'user/delete')) }}

              @if($errors->has('errors'))
              <div class="alert-box error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ $errors->first('errors', ':message') }}
              </div>
              @endif

              {{ Form::label('password', 'Enter your Password to confirm') }}
              {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}

              {{ Form::submit('I\'m sure I want to delete', array('class' => 'button alert')) }}

              {{ Form::close() }}

            </div>
          </div>
        </div>

      </article>

    </section>

  </div>
</div>

@stop
