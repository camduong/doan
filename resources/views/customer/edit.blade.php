@extends('layouts.admain')

@section('title', ' View Customer')

@section('content')
    <div class="right_col" role="main">
		<div class="row">
			{!! Form::model($customer, ['route' => ['customer.update', $customer->id], 'method' => 'PUT']) !!}
			<h1>Chi tiết đơn hàng</h1>
      <div class="col-md-8">
          <div class="panel panel-default">
              <div class="panel-body">
                  <ul class="list-group">
                  @foreach($customer->cart->items as $item)
                  <li class="list-group-item"><span class="badge">Giá: {{ number_format($item['price']) }} VNĐ</span>
                  {{ $item['item']['name'] }} | {{ $item['qty'] }} Vé
                  </li>
                  @endforeach
                  </ul>
              </div>
              <div class="panel-footer text-right">
                  <strong>Tổng giá: {{ number_format($customer->cart->totalPrice) }} VNĐ</strong>
              </div>
          </div>
      </div>

			<div class="col-md-4">
				<div class="well">
          <div class="row">
						<div class="col-sm-12">
							<span class="lead">Tình trạng: </span>
              <select name="status" class="form-control">
                <option value=" Chưa Xử Lý">Chưa xử lý</option>
                <option value="Xử Lý">Xử lý</option>
                <option value="Hủy">Hủy</option>
              </select>
						</div>
					</div>
					<hr/>
					<dl class="dl-horizontal">
						<dt>Ngày tạo:</dt>
						<dd>{{ date('l d/m/Y h:i a', strtotime($customer->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Ngày cập nhật:</dt>
						<dd>{{ date('l d/m/Y h:i a',strtotime($customer->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('customer.index', 'Thoát', null, ['class' => 'btn btn-danger btn-block']) !!}
						</div>
					</div>

				</div>
			</div>
			{!! Form::close() !!}
		</div> <!--end of .row(form)-->
	</div>
@endsection