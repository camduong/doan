@extends('layouts.admain')

@section('title', ' View Hotel')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $hotel->name }}</h1>
                <p class="lead">Địa chỉ: {{ $hotel->address }}</p>
                <p class="lead">Số điện thoại: {{ $hotel->phone }}</p>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('hotel.edit', 'Edit', array($hotel->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['hotel.destroy', $hotel->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('hotel.index', '<< See All Hotel', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection