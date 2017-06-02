@extends('layouts.admain')

@section('title', ' All Location')

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-9">
			<h1>Địa điểm</h1>
		</div>

		<div class="col-md-3">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Tạo mới địa điểm
			</button>
		</div>
			<!-- Modal -->

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
          <div class="modal-content">
	    			<h3 class="modal-header">Tạo mới địa điểm</h3>
	    			<div class="modal-body">
	            {{ Form::open(['route' => 'location.store', 'data-parsley-validate'])}}
	              {{ csrf_field() }}
	                <div class="form-group">
	                  {{ Form::label('name','Tên:') }}
	                  {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'onkeyup' => 'ChangeToSlug()'))}}
	                </div>
									<div class="form-group">
										{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
										{{ Form:: text('slug', null, ['class' => 'form-control', 'required' => '', "readonly"=>"true"]) }}
									</div>
									<div class="form-group">
										{{ Form::label('region_id', 'Khu vực:', ['class' => 'form-spacing-top']) }}
										{{ Form::select('region_id', $regions, null, ['class' => 'form-control', 'placeholder' => 'Chọn khu vực'])}}
									</div>	
	                <div class="form-group">
	                  {{ Form::label('introduce', 'Giới thiệu địa điểm:') }}
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
			<table id="data_table" class="table display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên</th>
						<th>Khu vực</th>
						<th>Giới thiệu</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($locations as $location)
						<tr>
							<th>{{ $location->id }}</th>
							<td>{{ $location->name }}</td>
							<td>{{ $location->regions->name }}</td>
							<td>{{ $location->introduce }}</td>
							<td style="text-align: center;">
								{!! Form::open(['route' => ['location.destroy', $location->id], 'method' => 'DELETE']) !!}
										{!! Html::linkRoute('location.edit', 'Sửa', array($location->id), array('class' => 'btn btn-primary btn-md')) !!}
										{!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-md']) !!}
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