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
            </div>

            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ date('j m,Y h:i a', strtotime($hotel->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{ date('j m,Y h:i a',strtotime($hotel->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('hotel.index', 'Cancel', null, ['class' => 'btn btn-danger btn-block']) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
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