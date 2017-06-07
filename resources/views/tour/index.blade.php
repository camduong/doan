@extends('layouts.admain')

@section('title', ' All Posts')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('assets/css/gsdk-bootstrap-wizard.css') !!}
	{!! Html::style('assets/css/demo.css') !!}
	{!! Html::style('css/datepicker.min.css') !!}
	{!! Html::style('css/thuvienadmin.css') !!}

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-9">
			<h1>Chuyến đi</h1>
		</div>

		<div class="col-md-3">
			<button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Tạo chuyến đi mới
			</button>
		</div>

		<div class="col-md-12">
			<hr>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
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
								</ul>

							</div>
							<div class="tab-content">
								<div class="tab-pane" id="step1">
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											{{ Form::label('name', 'Tên chuyến đi:') }}
											{{ Form::textarea('name', null, ['class' => 'form-control ', 'onkeyup' => 'ChangeToSlug()', 'required' => '', 'rows' => '4']) }}
											<br>
											{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
											{{ Form:: text('slug', null, ['class' => 'form-control', 'required' => '', "readonly"=>"true"]) }}
											<br>
											<div class="row">
												<div class="col-md-6">
													{{ Form::label('price', 'Giá:', ['class' => 'form-spacing-top']) }}
													{{ Form:: text('price', null, ['class' => 'form-control', 'required' => '', 'min' => '0']) }}
												</div>
												<div class="col-md-6">
													{{ Form::label('number', 'Số vé:', ['class' => 'form-spacing-top']) }}
													{{ Form:: number('number', 0, ['class' => 'form-control', 'required' => '', 'min' => '0']) }}
												</div>
											</div>
											<br>
											{{ Form::label('depart_date', 'Hành trình:', ['class' => 'form-spacing-top'])  }}
											<div class="datepicker input-daterange input-group">
												{{ Form:: text('depart_date', \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y') , ['class' => 'col-md-4 form-control', 'placeholder' => 'Ngày đi']) }}
													<span class="input-to input-group-addon">đến</span>
												{{ Form:: text('return_date', \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y'), ['class' => 'col-md-4 form-control', 'placeholder' => 'Ngày về']) }}
											</div>
											<br>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="step2">
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											{{ Form::label('hotel_id', 'Khách sạn:', ['class' => 'form-spacing-top']) }}
											{{ Form::select('hotel_id', $hotels, null, ['class' => 'form-control', 'placeholder' => 'Chọn khách sạn'])}}
											<br>
											{{ Form::label('depart_location_id', 'Địa điểm đi:', ['class' => 'form-spacing-top']) }}
											{{ Form::select('depart_location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Chọn thành phố'])}}
											<br>
											{{ Form::label('dest_location_id', 'Địa điểm đến:', ['class' => 'form-spacing-top']) }}
											{{ Form::select('dest_location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Chọn thành phố'])}}
											<br>
											{{ Form::label('type', 'Loại hình:', ['class' => 'form-spacing-top']) }}
											{{ Form::select('type', ['0' => 'Trong nước', '1' => 'Nước ngoài'], null, ['class' => 'form-control', 'placeholder' => 'Chọn loại hình']) }}
											<br>
											{{ Form::label('vehicle_id', 'Phương tiện:', ['class' => 'form-spacing-top']) }}
											{{ Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control', 'placeholder' => 'Chọn phương tiện'])}}
										</div>
									</div>
								</div>
								<div class="tab-pane" id="step3">
									<div class="row">
										<div class="col-sm-12">
											{{ Form::label('schedule', 'Chi tiết chuyến đi:', ['class' => 'form-spacing-top']) }}
											{{ Form::textarea('schedule', null, ['class' => 'form-control ckeditor', 'required', 'id' => 'detail', 'rows' => 10, 'cols' => 60, 'style' => 'margin:0 1% !important']) }}
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
			</div>
		</div> <!-- modal -->
	</div><!--end of .row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên</th>
						<th>Giá</th>
						<th>Số ngày</th>
						<th>Ngày tạo</th>
						<th>Thao tác</th>
					</tr>
				</thead>

				<tbody>
					@foreach($tours as $tour)
						<tr>
							<th>{{ $tour->id }}</th>
							<td>{{ $tour->name }}</td>
							<td>{{ number_format($tour->price) . ' VNĐ' }}</td>
							<td>{{ $tour->day }} ngày</td>
							<td>{{ date('d/m/Y', strtotime($tour->created_at)) }}</td>
							<td style="text-align: center;">
								<a href="{{ route('tour.show', $tour->id) }}" class="btn btn-info btn-md">
									Xem
								</a>
								<a href="{{ route('tour.edit', $tour->id) }}" class="btn btn-primary btn-md">
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
</div>

@stop
@section('scripts')
	{{-- {!! Html::script('js/parsley.min.js') !!} --}}
	{!! Html::script('assets/js/jquery.validate.min.js') !!}
	{!! Html::script('assets/js/jquery.bootstrap.wizard.js') !!}
	{!! Html::script('assets/js/gsdk-bootstrap-wizard.js') !!}
	<!-- bootstrap-daterangepicker -->
	{!! Html::script('ckeditor/ckeditor.js') !!}
	{!! Html::script('js/moment.js') !!}
	{!! Html::script('js/datepicker.min.js') !!}
	<script>
		$('.datepicker.input-daterange').datepicker({
			format: "dd-mm-yyyy",
			startDate: "-infinity",
			endDate:"+7m,+4d",
			maxViewMode: 1,
			todayBtn: "linked",
			todayHighlight: true
		});

		function ChangeToSlug()
		{
		    var title, slug;
		    //Lấy text từ thẻ input title
		    title = document.getElementById("name").value;
		    //Đổi chữ hoa thành chữ thường
		    slug = title.toLowerCase();
		    //Đổi ký tự có dấu thành không dấu
		    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		    slug = slug.replace(/đ/gi, 'd');
		    //Xóa các ký tự đặt biệt
		    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		    //Đổi khoảng trắng thành ký tự gạch ngang
		    slug = slug.replace(/ /gi, "-");
		    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
		    slug = slug.replace(/\-\-\-\-\-/gi, '-');
		    slug = slug.replace(/\-\-\-\-/gi, '-');
		    slug = slug.replace(/\-\-\-/gi, '-');
		    slug = slug.replace(/\-\-/gi, '-');
		    //Xóa các ký tự gạch ngang ở đầu và cuối
		    slug = '@'+slug+'@';
		    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		    //In slug ra textbox có id “slug”
		    document.getElementById('slug').value = slug;
		}
	</script>
@endsection