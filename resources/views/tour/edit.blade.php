@extends('layouts.admain')

@section('title', ' Edit Tour')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('assets/css/demo.css') !!}
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="wizard-container">
            <div class="card wizard-card" data-color="red" id="wizardProfile">
                {!! Form::model($tour, ['route' => ['tour.update', $tour->id], 'method' => 'PUT']) !!}
                    <div class="wizard-header">
                        <h3>Create New Tour</h3>
                    </div>

                    <div class="wizard-navigation">
                    <ul>
                        <li><a href="#step1" data-toggle="tab">Step 1</a></li>
                        <li><a href="#step2" data-toggle="tab">Step 2</a></li>
                        <li><a href="#step3" data-toggle="tab">Step 3</a></li>
                        <li><a href="#step4" data-toggle="tab">Step 4</a></li>
                    </ul>

                </div>

                <div class="tab-content">
                    <div class="tab-pane" id="step1">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                {{ Form::label('name', 'Name:') }}
                                {{ Form::text('name', null, ['class' => 'form-control ', 'required' => '']) }}
                                <br>
                                {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
                                {{ Form:: text('slug', null, ['class' => 'form-control', 'required' => '']) }}
                                <br>
                                {{ Form::label('price', 'Price:', ['class' => 'form-spacing-top']) }}
                                {{ Form:: text('price', null, ['class' => 'form-control', 'required' => '']) }}
                                <br>
                                {{ Form::label('number', 'Number:', ['class' => 'form-spacing-top']) }}
                                {{ Form:: number('number', 0, ['class' => 'form-control', 'required' => '']) }}
                                <br>
                                {{ Form::label('depart_date', 'Depart Day:', ['class' => 'form-spacing-top'])  }}
                                {{ Form:: text('depart_date', null, ['class' => 'form-control', 'required' => '', 'data-inputmask' => "'mask' : '99/99/9999'", 'placeholder' => 'dd/MM/yyyy']) }}
                                <br>
                                {{ Form::label('back_date', 'Back Day:', ['class' => 'form-spacing-top']) }}
                                {{ Form:: text('back_date', null, ['class' => 'form-control', 'required' => '', 'data-inputmask' => "'mask' : '99/99/9999'", 'placeholder' => 'dd/MM/yyyy']) }}
                                <br>
                                {{ Form::label ('featured_image', 'Upload Featured Image') }}
                                {{ Form::file('featured_image[]', ['multiple' => ''])}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="step2">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                {{ Form::label('hotel_id', 'Hotel:', ['class' => 'form-spacing-top']) }}
                                {{ Form::select('hotel_id', $hotels, null, ['class' => 'form-control', 'placeholder' => 'Select hotel'])}}
                                <br>
                                {{ Form::label('location_id', 'Location:', ['class' => 'form-spacing-top']) }}
                                {{ Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Select city'])}}
                                <br>
                                {{ Form::label('vehicle_id', 'Vehicle:', ['class' => 'form-spacing-top']) }}
                                {{ Form::select('vehicle_id', $vehicles, null, ['class' => 'form-control', 'placeholder' => 'Select vehicle'])}}
                            </div>            
                        </div>
                    </div>
                    <div class="tab-pane" id="step3">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                {{ Form::label('day', 'Day:', ['class' => 'form-spacing-top']) }}
                                {{ Form:: number('day', 0, ['class' => 'form-control', 'required' => '']) }}
                                <br>
                                {{ Form::label('header', 'Header Schedule:', ['class' => 'form-spacing-top']) }}
                                {{ Form::textarea('header', null, ['class' => 'form-control', 'required' => '', 'id' => 'header', 'rows' => 10, 'cols' => 80, 'style' => 'margin:0 1% !important']) }}
                            </div>            
                        </div>
                    </div>
                    <div class="tab-pane" id="step4">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                {{ Form::label('detail', 'Detail Schedule:', ['class' => 'form-spacing-top']) }}
                                {{ Form::textarea('detail', null, ['class' => 'form-control', 'required' => '', 'id' => 'detail', 'rows' => 10, 'cols' => 80, 'style' => 'margin:0 1% !important']) }}
                            </div>            
                        </div>
                    </div>
                </div>
                    <div class="wizard-footer height-wizard">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />              
                            {{ Form::submit('Finish', array('class' => 'btn btn-finish btn-fill btn-warning btn-wd btn-sm', 'style' => 'margin-top: 20px;'))}}
                        </div>

                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                        </div>
                        <div class="clearfix"></div>
                    </div>

                {{ Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {{-- {!! Html::script('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') !!} --}}
    {!! Html::script('assets/js/jquery.validate.min.js') !!}
    {!! Html::script('assets/js/jquery.bootstrap.wizard.js') !!}
    {!! Html::script('assets/js/gsdk-bootstrap-wizard.js') !!}
    {!! Html::script('js/ckeditor/ckeditor.js') !!}
    <script>
        CKEDITOR.replace( 'header' );
        CKEDITOR.replace( 'detail' );
    </script>
@endsection