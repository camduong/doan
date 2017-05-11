@extends('layouts.admain')

@section('title', ' Show Detail Tour')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-8">
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tour" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tour</a>
                            </li>
                            <li role="presentation" class=""><a href="#detailtour" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Detail Tour</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tour" aria-labelledby="home-tab">
                                <h3>{{ $tour->name }}</h3>
                                <p class="lead">Hotel:{{ $tour->hotels->name }}</p>
                                <p class="lead">Location:{{ $tour->locations->name }}</p>
                                <p class="lead">Vehicle:{{ $tour->vehicles->name }}</p>
                                <p class="lead">Price: {{ number_format($tour->price) }}VNĐ</p>
                                <p class="lead">Day: {{ $tour->day }}</p>
                                <p class="lead">Depart Date: {{ date('l d/m/Y',strtotime($tour->depart_date)) }}</p>
                                <p class="lead">Back Date: {{ date('l d/m/Y',strtotime($tour->back_date)) }}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="detailtour" aria-labelledby="profile-tab">
                                <p class="lead">Schedule:</p>
                                <p class="lead">Header Schedule:{!! $tour->header_schedule !!}</p>
                                <p class="lead">Detail Schedule:{!! $tour->detail_schedule !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="lead">URL:</p>
                            <p><a href="{{ route('tour.single', $tour->slug) }}">{{ substr($tour->slug, 0, 20) }}</a></p>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('tour.edit', $tour->id) }}" class="btn btn-app btn-block">
                                <i class="fa fa-edit"></i>Edit
                            </a>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['tour.destroy', $tour->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-app btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('tour.index') }}" class="btn btn-app btn-block btn-h1-spacing">
                                <i class="fa fa-angle-double-left"> See All Tour</i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection