@extends('layouts.app')

@section('content')

<div class="row">
  <div class="large-8 small-12 columns centered text-center">

    <section id="focus-content">

      <h3 class="text-center">Logout</h3>
      <article class="text-center">
        <p>We will close your session, and backup your latest data.</p>
        <h4>Thanks for stopping by</h4>

        <p>
          {{ HTML::link('user/session/close', 'Close session', array('class' => 'button')) }}
        </p>
      </article>

    </section>

  </div>
</div>

@stop
