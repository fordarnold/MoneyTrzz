@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h4 class="page-title">Logout</h4>

      <article>
        <p>We will close your current session, and backup your latest data.
          <br>Thank you for stopping by. Come back again soon :)</p>

          {{ HTML::link('user/session/close', 'Close my session', array('class' => 'button success')) }}
      </article>

    </section>

  </div>
</div>

@stop
