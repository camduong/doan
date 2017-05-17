@extends('layouts.admain')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            {!! Form::model($hotel, ['route' => ['hotel.update', $hotel->id], 'method' => 'PUT']) !!}
                {{ csrf_field() }}
            <div class="col-md-8">
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
                    {{ Form::label('location_id', 'Vị trí:', ['class' => 'form-spacing-top']) }}
                    {{ Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => '---Chọn địa điểm---'])}}
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Ngày tạo:</dt>
                        <dd>{{ date('j m,Y h:i a', strtotime($hotel->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Ngày cập nhật:</dt>
                        <dd>{{ date('j m,Y h:i a',strtotime($hotel->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('hotel.index', 'Thoát', null, ['class' => 'btn btn-danger btn-block']) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
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
    {!! Html::script('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}
@endsection