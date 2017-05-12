@extends('layouts.admain')

@section('title', ' View Vehicle')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $vehicle->name }}</h1>
                <p class="lead">Thông tin: {{ $vehicle->introduce }}</p>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('vehicle.edit', 'Edit', array($vehicle->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['vehicle.destroy', $vehicle->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('vehicle.index', '<< See All Vehicle', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection