@extends('layouts.admain')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="right_col" role="main">
		<div class="row">
			{!! Form::model($location, ['route' => ['location.update', $location->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				{{ Form::label('name','Tên:') }}
				{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))}}
				{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
				{{ Form:: text('slug', null, ['class' => 'form-control', 'required' => '']) }}
				{{ Form::label('region_id', 'Khu vực:', ['class' => 'form-spacing-top']) }}
				{{ Form::select('region_id', $regions, null, ['class' => 'form-control', 'placeholder' => 'Chọn khu vực'])}}
				{{ Form::label('introduce', 'Giới thiệu địa điểm:') }}
				{{ Form::textarea('introduce', null, array('class' => 'form-control', 'required' => ''))}}
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Ngày tạo:</dt>
						<dd>{{ date('l d/m/Y h:i a', strtotime($location->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Ngày cập nhật:</dt>
						<dd>{{ date('l d/m/Y h:i a',strtotime($location->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('location.index', 'Thoát', null, ['class' => 'btn btn-danger btn-block']) !!}
						</div>
					</div>

				</div>
			</div>
			{!! Form::close() !!}
		</div> <!--end of .row(form)-->
	</div>
@endsection

@section('scripts')
	<script>
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