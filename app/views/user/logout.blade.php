@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-8 small-12 columns centered">
    <div class="panel panel-info">
      <h3 class="text-center">Logout</h3>
      <article class="text-center">
        <p>We will close your session, and backup your latest data.</p>
        <h4>Thanks for stopping by</h4>
        <div class="row">
          <div id="large-6 small-12 columns centered">

            <p>
              {{ HTML::link('user/session/close', 'Close session', array('class' => 'btn btn-danger')) }}
            </p>

          </div>
        </div>
      </article>

    </div>
  </div>
</div>

@stop
