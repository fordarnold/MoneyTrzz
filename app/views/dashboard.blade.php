@extends('layouts.dash')

@section('content')

<div class="row">
  <div class="large-8 small-12 columns centered text-center">

    <section id="focus-content">

      <h3>Summary Information</h3>

      <section class="tile">
        <h4>Account ID</h4>
        <p>123456-555-555</p>
      </section>

      <section class="tile">
        <h4>Banks</h4>
        <ul>
          <li>{{ HTML::link('banks/1', 'Bank A', array('class' => '')) }}</li>
        </ul>
        {{ HTML::link('banks/new', 'Add new Bank account', array('class' => '')) }}
      </section>

    </section>

  </div>
</div>

@stop
