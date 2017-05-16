@extends('layouts.admain')

@section('title', ' View Location')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $location->name }}</h1>
                <p class="lead">Giới thiệu: {{ $location->introduce }}</p>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('location.edit', 'Edit', array($location->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['location.destroy', $location->id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('location.index', '<< See All Location', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection