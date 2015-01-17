@extends('layouts.dash')

@section('content')

<div class="row">
  <div class="large-12 columns">

    <section id="page-content">

      <h4 class="page-title">Summary Information</h4>

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
