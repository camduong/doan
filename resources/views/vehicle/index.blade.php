@extends('layouts.admain')

@section('title', ' All Vehicle')

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-9">
			<h1>Phương tiện</h1>
		</div>

		<div class="col-md-3">
			<button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Tạo phương tiện
			</button>
		</div>
		<!-- Modal -->

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<h3 class="modal-header">Tạo phương tiện</h3>
					<div class="modal-body">
						{{ Form::open(['route' => 'vehicle.store', 'data-parsley-validate'])}}
							{{ csrf_field() }}
							<div class="form-group">
								{{ Form::label('name','Tên:') }}
								{{ Form::text('name', null, array('class' => 'form-control', 'required' => ''))}}
							</div>
							<div class="form-group">
								{{ Form::label('introduce', 'Thông tin:') }}
								{{ Form::textarea('introduce', null, array('class' => 'form-control', 'required' => ''))}}
							</div>
							{{ Form::submit('Lưu', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'))}}
						{{ Form::close()}}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<hr>
		</div>
	</div><!--end of .row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Tên</th>
					<th>Thông tin</th>
					<th>Thao tác</th>
				</thead>

				<tbody>
					@foreach($vehicles as $vehicle)
						<tr>
							<th>{{ $vehicle->id }}</th>
							<td>{{ $vehicle->name }}</td>
							<td>{{ $vehicle->introduce }}</td>
							<td style="text-align: center;">
								 {!! Form::open(['route' => ['vehicle.destroy', $vehicle->id], 'method' => 'DELETE']) !!}
									{!! Html::linkRoute('vehicle.edit', 'Sửa', array($vehicle->id), array('class' => 'btn btn-primary btn-md')) !!}
									{{-- {!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-md']) !!} --}}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection