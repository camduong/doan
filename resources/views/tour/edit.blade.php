@extends('layouts.admain')

@section('title', ' Edit Tour')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('assets/css/gsdk-bootstrap-wizard.css') !!}
	{!! Html::style('assets/css/demo.css') !!}
	{!! Html::style('css/datepicker.min.css') !!}
	{!! Html::style('css/thuvienadmin.css') !!}
@endsection

@section('content')
	<div class="right_col" role="main">
		<div class="wizard-container">
			<div class="card wizard-card" data-color="red" id="wizardProfile">
				{!! Form::model($tour, ['route' => ['tour.update', $tour->id], 'method' => 'PUT']) !!}
					<div class="wizard-header">
						<h3>Chỉnh sửa chuyến đi</h3>
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
									{{ Form::text('name', null, ['class' => 'form-control ', 'onkeyup' => 'ChangeToSlug()', 'required' => '']) }}
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
											{{ Form:: number('number', null, ['class' => 'form-control', 'required' => '', 'min' => '0']) }}
										</div>
									</div>
									<br>
									{{ Form::label('depart_date', 'Hành trình:', ['class' => 'form-spacing-top'])  }}
									<div class="datepicker input-daterange input-group">
										{{ Form:: text('depart_date', date('d/m/Y', strtotime($tour->depart_date)),['class' => 'col-md-4 form-control', 'required' => '', 'placeholder' => 'Ngày đi']) }}
											<span class="input-to input-group-addon">đến</span>
										{{ Form:: text('back_date', date('d/m/Y',strtotime($tour->back_date)), ['class' => 'col-md-4 form-control', 'required' => '', 'placeholder' => 'Ngày về']) }}
									</div>
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
									<span class="lead form-spacing-top">Loại hình: </span>
									<select name="types" class="form-control" placeholder="Chọn loại hình">
										<option value="0">Trong nước</option>
										<option value="1">Nước ngoài</option>
									</select>
									<br>
									{{ Form::label('vehicle_id', 'Phương tiện:', ['class' => 'form-spacing-top']) }}
									{{ Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control', 'placeholder' => 'Chọn phương tiện'])}}
								</div>
							</div>
						</div>
						<div class="tab-pane" id="step3">
							<div class="row">
								<div class="col-sm-12">
									{{ Form::label('detail', 'Chi tiết chuyến đi:', ['class' => 'form-spacing-top']) }}
									{{ Form::textarea('detail', $tour->schedule, null, ['class' => 'form-control ckeditor', 'required', 'id' => 'detail', 'rows' => 10, 'cols' => 60, 'style' => 'margin:0 1% !important']) }}
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
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('assets/js/jquery.validate.min.js') !!}
	{!! Html::script('assets/js/jquery.bootstrap.wizard.js') !!}
	{!! Html::script('assets/js/gsdk-bootstrap-wizard.js') !!}
	{!! Html::script('ckeditor/ckeditor.js') !!}
	{!! Html::script('js/datepicker.min.js') !!}
	<script>
	$(document).ready(function(){
		$('.datepicker.input-daterange').datepicker({
			format: "dd-mm-yyyy",
			startDate: "-infinity",
			endDate:"+7m",
			maxViewMode: 1,
			todayBtn: "linked",
			todayHighlight: true
		});
		CKEDITOR.replace( 'detail' );

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
	});
	</script>
@endsection