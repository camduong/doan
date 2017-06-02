@extends('layouts.admain')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="right_col" role="main">
		<div class="row">
			{!! Form::model($region, ['route' => ['region.update', $region->id], 'method' => 'PUT']) !!}
			<div class="col-md-8">
				<div class="form-group">
					{{ Form::label('name','Tên:') }}
					{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'onkeyup' => 'ChangeToSlug()'))}}
				</div>
				<div class="form-group">
					{{ Form::label('slug','Slug:') }}
					{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', "readonly"=>"true"))}}
				</div>
				<div class="form-group">
					{{ Form::label('introduce','Giới thiệu khu vực:') }}
					{{ Form::textarea('introduce', null, array('class' => 'form-control', 'required' => '', 'rows' => '3'))}}
				</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Ngày tạo:</dt>
						<dd>{{ date('l d/m/Y h:i a', strtotime($region->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Ngày cập nhật:</dt>
						<dd>{{ date('l d/m/Y h:i a',strtotime($region->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('region.index', 'Thoát', null, ['class' => 'btn btn-danger btn-block']) !!}
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