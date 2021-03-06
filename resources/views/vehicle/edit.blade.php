@extends('layouts.admain')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="right_col" role="main">
		<div class="row">
			{!! Form::model($vehicle, ['route' => ['vehicle.update', $vehicle->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				{{ Form::label('name','Tên:') }}
				{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))}}

				{{ Form::label('introduce', 'Thông tin:') }}
				{{ Form::textarea('introduce', null, array('class' => 'form-control', 'required' => ''))}}
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Ngày tạo:</dt>
						<dd>{{ date('l d/m/Y h:i a', strtotime($vehicle->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Ngày cập nhật:</dt>
						<dd>{{ date('l d/m/Y h:i a',strtotime($vehicle->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('vehicle.index', 'Thoát', null, ['class' => 'btn btn-danger btn-block']) !!}
						</div>
					</div>

				</div>
			</div>
			{!! Form::close() !!}
		</div> <!--end of .row(form)-->
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection