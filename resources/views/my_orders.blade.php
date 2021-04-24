@extends('voyager::master')


@section('content')

<h1></h1>
<div class="container">
<div class="row">
@foreach ($data as $customer)
<div class="col-md-4">
<div class="card" style="border-radius:15px">
<div class="card-header text-center" style="padding: 3%;">
Customer Mobile: {{ $customer->user_phone }}
</div>
@foreach ($customer->product as $products)
<div style="border-radius: 5px;margin: 3%;border: 1px solid #eee;">
<img  class="img-circle" src="http://savingapp.co/AdminCp/storage/app/public/{{ $products->photo }}" alt="Avatar" style="height:100px;width:100px;float: left;padding: 2%;" >
<p>Product : {{ $products->title_translation }}</p>
<p>Price : {{ $products->discount_price }}</p>
<p>Quantity : {{$products->pivot->quantity}}</p>
</div>
@endforeach
  <div class="container">
    <h4><b>Total : {{ $customer->order_total }}</b></h4>
    <p>Date : {{$customer->created_at}}</p>
    <p>Accepted : {{ $customer->is_accepted }}</p>
    <div class="card-footer text-center">
          <div class="btn-wrapper  justify-content-between">
            <a href="javascript:void(0)" data-toggle="tooltip"    data-id="{{$customer->id}}"  class="btn btn-warning">Rejection</a>
            <a href="javascript:void(0)" data-toggle="tooltip"    data-id="{{$customer->id}}" class="btn btn-success">Approval</a>
          </div>
    </div>
</div>
</div>
</div>
@endforeach
@endsection
</div>
</div>



