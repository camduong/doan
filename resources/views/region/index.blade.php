@extends('layouts.admain')

@section('title', ' All Region')

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-9">
			<h1>Khu vực</h1>
		</div>

		<div class="col-md-3">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Tạo mới khu vực
			</button>
		</div>
			<!-- Modal -->

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
          <div class="modal-content">
	    			<h3 class="modal-header">Tạo mới khu vực</h3>
	    			<div class="modal-body">
	            {{ Form::open(['route' => 'region.store', 'data-parsley-validate'])}}
	              {{ csrf_field() }}
	                <div class="form-group">
	                  {{ Form::label('name','Tên:') }}
	                  {{ Form::text('name', null, array('class' => 'form-control', 'required' => ''))}}
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
						<th>Giới thiệu</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($regions as $region)
						<tr>
							<td>{{ $region->id }}</td>
							<td>{{ $region->name }}</td>
							<td>{{ $region->introduce }}</td>
							<td style="text-align: center;">
								{!! Form::open(['route' => ['region.destroy', $region->id], 'method' => 'DELETE']) !!}
										{!! Html::linkRoute('region.edit', 'Sửa', array($region->id), array('class' => 'btn btn-primary btn-md')) !!}
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