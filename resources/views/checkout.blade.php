@extends('layouts.appsss')

@section('title')
  Laravel Shopping Cart
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <h1>Checkout</h1>
      <h4>Your Total: ${{ number_format($total) }} VNĐ</h4>
      <form action="{{ route('checkout') }}" method="post" id="checkout-form">
      <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
        {{ Session::get('error') }}
      </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" class="form-control" required name="name">
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" class="form-control" required name="address">
            </div>
          </div>
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success">Buy now</button>
      </form>
    </div>
  </div>
@endsection