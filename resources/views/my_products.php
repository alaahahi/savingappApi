@extends('voyager::master')


@section('content')
@foreach ($data as $customer)
<h1></h1>
<div class="container">
<div class="row">
</div>

<div class="card" style="width:30%;border-radius:15px">
  <img src="<?php echo url('/') ?>/{{ $customer->photo }}" alt="Avatar" style="width:100%" >
  <img src="<?php echo url('/') ?>/{{ $customer->logo }}" alt="Avatar" style="width:15%;position: relative;
    bottom: 60px;
    left: 10px;" >
  <div class="container">
    <h4><b>{{ $customer->title }}</b></h4>
    <p>{{ $customer->desc }}</p>
    <p>Open Time: {{ $customer->open_minute  / 60 }}</p>
    <p>Close Time: {{ (int)($customer->close_minute / 60)}}</p>
  </div>
</div>
    
</div>
@endforeach
@endsection