@extends('layouts.admain')

@section('title', ' Khách hàng')

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12">
			<h1>Khách hàng</h1>
		</div>
	</div><!--end of .row-->
	<div class="row">
		<div class="col-md-12">
			<table id="data_table" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên khách hàng</th>
						<th>Địa chỉ</th>
						<th>Ngày tạo</th>
                        <th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customers as $customer)
						<tr>
							<th>{{ $customer->id }}</th>
							<td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->created_at }}</td>
							<td style="text-align: center;">
                                <a href="{{ route('customer.show', $customer->id) }}" class="btn btn-info btn-md">
									Xem
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection