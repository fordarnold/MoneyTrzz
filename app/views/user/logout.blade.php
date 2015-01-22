@extends('layouts.app-small')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h4 class="page-title">Logout</h4>

      <article>
        <p>Your current session will be closed, and your latest data backed-up.
          <br>Thank you for stopping by. Come back again soon :)</p>

          {{ HTML::link('user/session/close', 'Close my session', ['class' => 'button success small']) }}
      </article>

    </section>

  </div>
</div>

@stop
