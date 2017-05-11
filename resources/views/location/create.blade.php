@extends('layouts.admain')

@section('title', ' Create New Location')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="right_col" role="main">
    <h3>Create New Location</h3>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                {{ Form::open(['route' => 'location.store', 'data-parsley-validate'])}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => ''))}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('introduce', 'Location Introduce:') }}
                        {{ Form::textarea('introduce', null, array('class' => 'form-control', 'required' => ''))}}
                    </div>
                    
                    {{ Form::submit('Save', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;'))}}
                {{ Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection