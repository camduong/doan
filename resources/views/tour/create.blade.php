@extends('layouts.admain')

@section('title',' Create New Tour')

@section('stylesheets')
	{!! Html::style('css/datepicker.min.css') !!}
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('assets/css/gsdk-bootstrap-wizard.css') !!}
	{!! Html::style('assets/css/demo.css') !!}
	{!! Html::style('css/thuvienadmin.css') !!}
@endsection

@section('content')
<div class="right_col right-hei" role="main">
	<!--   Big container   -->
	<div class="wizard-container">

		<div class="card wizard-card" data-color="red" id="wizardProfile">
			{!! Form::open(['route' => 'tour.store', 'files' => true]) !!}
				<div class="wizard-header">
					<h3>Tạo chuyến đi mới</h3>
				</div>

				<div class="wizard-navigation">
					<ul>
						<li><a href="#step1" data-toggle="tab">Bước 1</a></li>
						<li><a href="#step2" data-toggle="tab">Bước 2</a></li>
						<li><a href="#step3" data-toggle="tab">Bước 3</a></li>
						<li><a href="#step4" data-toggle="tab">Bước 4</a></li>
					</ul>

				</div>
				<div class="tab-content">
					<div class="tab-pane" id="step1">
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								{{ Form::label('name', 'Tên chuyến đi:') }}
								{{ Form::text('name', null, ['class' => 'form-control ', 'required' => '']) }}
								<br>
								{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
								{{ Form:: text('slug', null, ['class' => 'form-control', 'required' => '']) }}
								<br>
								{{ Form::label('price', 'Giá:', ['class' => 'form-spacing-top']) }}
								{{ Form:: text('price', null, ['class' => 'form-control', 'required' => '', 'min' => '0']) }}
								<br>
								{{ Form::label('number', 'Số vé:', ['class' => 'form-spacing-top']) }}
								{{ Form:: number('number', 0, ['class' => 'form-control', 'required' => '', 'min' => '0']) }}
								<br>
								{{ Form::label('depart_date', 'Hành trình:', ['class' => 'form-spacing-top'])  }}
								<div class="datepicker input-daterange input-group">
									{{ Form:: text('depart_date', \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') , ['class' => 'col-md-4 form-control', 'required' => '', 'placeholder' => 'Ngày đi']) }}
										<span class="input-to input-group-addon">đến</span>
									{{ Form:: text('back_date', \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'), ['class' => 'col-md-4 form-control', 'required' => '', 'placeholder' => 'Ngày về']) }}
								</div>
								<br>
								{{ Form::label ('featured_image', 'Tải ảnh lên (có thể chọn nhiều ảnh):') }}
								{{ Form::file('featured_image[]', ['multiple' => ''])}}
							</div>
						</div>
					</div>
					<div class="tab-pane" id="step2">
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								{{ Form::label('hotel_id', 'Khách sạn:', ['class' => 'form-spacing-top']) }}
								{{ Form::select('hotel_id', $hotels, null, ['class' => 'form-control', 'placeholder' => 'Select hotel'])}}
								<br>
								{{ Form::label('location_id', 'Địa điểm:', ['class' => 'form-spacing-top']) }}
								{{ Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Select city'])}}
								<br>
								{{ Form::label('vehicle_id', 'Phương tiện:', ['class' => 'form-spacing-top']) }}
								{{ Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control', 'placeholder' => 'Select vehicle'])}}
							</div>
						</div>
					</div>
					<div class="tab-pane" id="step3">
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								{{ Form::label('day', 'Số ngày của chuyến đi:', ['class' => 'form-spacing-top']) }}
								{{ Form::number('day', 0, ['class' => 'form-control', 'required' => '', 'min' => '0']) }}
								<br>
								{{ Form::label('header', 'Tiêu đề chuyến đi:', ['class' => 'form-spacing-top']) }}
								{{ Form::textarea('header', null, ['class' => 'form-control ckeditor', 'required', 'name' => 'editor', 'id' => 'header', 'rows' => 10, 'cols' => 80, 'style' => 'margin:0 1% !important']) }}
							</div>
						</div>
					</div>
					<div class="tab-pane" id="step4">
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								{{ Form::label('detail', 'Chi tiết chuyến đi:', ['class' => 'form-spacing-top']) }}
								{{ Form::textarea('detail', null, ['class' => 'form-control ckeditor', 'required', 'name' => 'editor', 'id' => 'detail', 'rows' => 10, 'cols' => 80, 'style' => 'margin:0 1% !important']) }}
							</div>
						</div>
					</div>
				</div>
				<div class="wizard-footer height-wizard">
					<div class="pull-right">
						<input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Sau' />
						{{ Form::submit('Hoàn tất', array('class' => 'btn btn-finish btn-fill btn-warning btn-wd btn-sm'))}}
					</div>

					<div class="pull-left">
						<input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Trước' />
					</div>
					<div class="clearfix"></div>
				</div>

			{{ Form::close()}}
		</div>
	</div> <!-- wizard container -->
</div>


@endsection

@section('scripts')
	{{-- {!! Html::script('js/parsley.min.js') !!} --}}
	{!! Html::script('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}
	{!! Html::script('assets/js/jquery.validate.min.js') !!}
	{!! Html::script('assets/js/jquery.bootstrap.wizard.js') !!}
	{!! Html::script('assets/js/gsdk-bootstrap-wizard.js') !!}
	<!-- bootstrap-daterangepicker -->
	{!! Html::script('ckeditor/ckeditor.js') !!}
	{!! Html::script('js/moment.js') !!}
	{!! Html::script('js/datepicker.min.js') !!}
	<script>
		$('.datepicker.input-daterange').datepicker({
			format: "dd/mm/yyyy",
			startDate: "-infinity",
			endDate:"+7m,+4d",
			maxViewMode: 1,
			todayBtn: "linked",
			todayHighlight: true
		});
	</script>
@endsection