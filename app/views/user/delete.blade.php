@extends('layouts.app-small')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h3 class="msg-warning">Are you sure you want to delete your Master User account?</h3>

      <article>
        
        <p>
          You will no longer be able to access your Master account or any of its data.<br>
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
        {{ Form::password('password', ['placeholder' => 'your password']) }}

        <div class="row">
          <div class="large-6 medium-6 columns">
            {{ Form::submit('Yes, I\'m sure I want to delete', ['class' => 'button alert']) }}
          </div>
          <div class="large-6 medium-6 columns text-right">
            <h5>{{ HTML::link('home', 'No, do not delete', ['class' => 'button secondary small']) }}</h5>
          </div>
        </div>

        {{ Form::close() }}

      </article>

    </section>

  </div>
</div>

@stop
