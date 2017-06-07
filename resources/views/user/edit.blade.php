@extends('layouts.admain')

@section('title', ' View user')

@section('content')
    <div class="right_col" role="main">
		<div class="row">
			{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}
			<h1>Chi tiết User</h1>
            <div class="col-md-8">
                <h3>{{ $user->f_name.' '.$user->l_name }}</h3>
                <p class="lead">Email: {{ $user->email }}</p>
                <p class="lead">Địa chỉ: {{ $user->address }}</p>
                <p class="lead">Số điện thoại: {{ $user->phone }}</p>
                <p class="lead">Chứng minh thư: {{ $user->p_code }}</p>
                <p class="lead">Giới tính: {{ $user->gender }}</p>
                <p class="lead">Ngày sinh: {{ date('d/m/Y', strtotime($user->birthday)) }}</p>
            </div>

			<div class="col-md-4">
				<div class="well">
          	<div class="row">
				<div class="col-sm-12">
					<span class="lead">Quyền hạn: </span>
					{{ Form::select('role', ['user' => 'Khách hàng', 'Admin' => 'Quản trị viên'], $user->role, ['class' => 'form-control']) }}
				</div>
			</div>
					<hr/>
					<dl class="dl-horizontal">
						<dt>Ngày tạo:</dt>
						<dd>{{ date('l d/m/Y h:i a', strtotime($user->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Ngày cập nhật:</dt>
						<dd>{{ date('l d/m/Y h:i a',strtotime($user->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('user.index', 'Thoát', null, ['class' => 'btn btn-danger btn-block']) !!}
						</div>
					</div>

				</div>
			</div>
			{!! Form::close() !!}
		</div> <!--end of .row(form)-->
	</div>
@endsection