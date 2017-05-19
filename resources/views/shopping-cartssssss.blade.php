<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	{!! Html::style('css/bootstrap.css') !!}
	{!! Html::style('css/font-awesome.min.css') !!}
	{!! Html::style('css/thuvien.min.css') !!}

</head>
<body>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			Launch demo modal
		</button>

		<!-- Modal -->


		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Giỏ hàng</h4>
					</div>

					@if(Session::has('cart'))
						<div class="modal-body">
							@foreach($tours as $tour)
								<li class="list-group-item">
									<span class="badge">{{ $tour['qty'] }}</span>
									<strong>{{ $tour['item']['name'] }}</strong>
									<span class="label label-success">{{ number_format($tour['price']) }} VNĐ</span>
									<div class="btn-group">
										<button class="btn btn-primary btn-xs-dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="{{ route('addByOne', ['id' => $tour['item']['id']]) }}">Add by 1</a></li>
											<li><a href="{{ route('reduceByOne', ['id' => $tour['item']['id']]) }}">Reduce by 1</a></li>
											<li><a href="{{ route('removeItem', ['id' => $tour['item']['id']]) }}">Reduce All</a></li>
										</ul>
									</div>
								</li>
							@endforeach
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" >
								<strong>Total: {{ number_format($totalPrice) }} VNĐ</strong>
							</div>
						</div>

					@else
						<div class="row" style="text-align: center;">
							<h2>No Items in Cart!</h2>
						</div>
					@endif
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tắt</button>
						<a href="{{ route('checkout') }}" type="button" class="btn btn-success">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>


			{!! Html::script('js/jquery-3.2.1.min.js') !!}
			{!! Html::script('js/bootstrap3.min.js') !!}

</body>
</html>



