@extends('layout')
@section('title','All Customers')
@section('content')

<br>
 <div class="row" style="margin-left:110px;">
  <div class="card" style="width: 18rem;">
  <img src="{{ asset('images/customer.png') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Customer</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="/customers" class="btn btn-primary">View Customers</a>
  </div>
</div>


<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/product.png') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Products</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="/products" class="btn btn-primary">View Products</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/free.png') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Free Issues</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="/freeissues" class="btn btn-primary">View Free Issues</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/customer.png') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Orders</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="/orders" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

@endsection

