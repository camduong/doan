@extends('layouts.admain')

@section('title', ' View Customer')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <h1>Chi tiết đơn hàng</h1>
            <div class="col-md-8">
               <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                        @foreach($customers->cart->items as $item)
                        <li class="list-group-item"><span class="badge">Giá: {{ number_format($item['price']) }} VNĐ</span>
                        {{ $item['item']['name'] }} | {{ $item['qty'] }} Vé
                        </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer text-right">
                        <strong>Tổng giá: {{ number_format($customers->cart->totalPrice) }} VNĐ</strong>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('customer.index') }}" class="btn btn-info btn-block btn-h1-spacing">
								<h4><i class="fa fa-angle-double-left"></i> Xem tất cả</h4>
							</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection