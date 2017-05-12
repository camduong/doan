@extends('layouts.admain')

@section('title', ' All Hotel')

@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-9">
            <h1>Khách sạn</h1>
        </div>

        <div class="col-md-3">
            <button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Tạo mới khách sạn
			</button>
		</div>
			<!-- Modal -->

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 class="modal-header">Tạo mới khách sạn</h3>
                        <div class="modal-body">
                            {{ Form::open(['route' => 'hotel.store', 'data-parsley-validate'])}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ Form::label('name','Tên:') }}
                                {{ Form::text('name', null, array('class' => 'form-control', 'required' => ''))}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('address', 'Địa chỉ:') }}
                                {{ Form::text('address', null, array('class' => 'form-control', 'required' => ''))}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('phone', 'Điện thoại:') }}
                                {{ Form::text('phone', null, array('class' => 'form-control', 'data-inputmask' => "'mask' : '(99-9) 9999 9999'", 'required' => '','maxlength' => '20','type' => 'number')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('location_id', 'Địa điểm:', ['class' => 'form-spacing-top']) }}
                                {{ Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Chọn địa điểm'])}}
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
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Vị trí</th>
                    <th>Thao tác</th>
                </thead>

                <tbody>
                    @foreach($hotels as $hotel)
                        <tr>
                            <th>{{ $hotel->id }}</th>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->address }}</td>
                            <td>{{ $hotel->phone }}</td>
                            <td>{{ $hotel->locations->name }}</td>
                            <td>
                                {!! Form::open(['route' => ['hotel.destroy', $hotel->id], 'method' => 'DELETE']) !!}
                                    {!! Html::linkRoute('hotel.edit', 'Edit', array($hotel->id), array('class' => 'btn btn-primary btn-md')) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-md']) !!}
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