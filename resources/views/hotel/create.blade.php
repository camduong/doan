@extends('layouts.admain')

@section('title', ' Create New Hotel')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="right_col" role="main">
    <h3>Create New Hotel</h3>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                {{ Form::open(['route' => 'hotel.store', 'data-parsley-validate'])}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => ''))}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('address', 'Hotel Address:') }}
                        {{ Form::text('address', null, array('class' => 'form-control', 'required' => ''))}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('phone', 'Phone:') }}
                        {{ Form::text('phone', null, array('class' => 'form-control', 'data-inputmask' => "'mask' : '(99-9) 9999 9999'", 'required' => '','maxlength' => '20','type' => 'number')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('location_id', 'Location:', ['class' => 'form-spacing-top']) }}
                        {{ Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Select city'])}}
                    </div>
                    {{ Form::submit('Save', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'))}}
                {{ Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}
@endsection