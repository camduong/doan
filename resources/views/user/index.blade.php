@extends('layouts.admain')

@section('title', 'User')

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12">
			<h1>User</h1>
		</div>
	</div><!--end of .row-->
	<div class="row">
		<div class="col-md-12">
			<table id="data_table" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên user</th>
						<th>Email</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th>Quyền hạn</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<th>{{ $user->id }}</th>
							<td>{{ $user->f_name.' '.$user->l_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->address }}</td>
							<td>{{ $user->phone }}</td>
							<td>{{ $user->role }}</td>
							<td style="text-align: center;">
								<a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-md">
									Xem
								</a>
								<a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-md">
									Sửa
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