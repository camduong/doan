@extends('layouts.admain')

@section('title', ' All Hotel')

@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-9">
            <h1>All Hotel</h1>
        </div>

        <div class="col-md-3">
            <button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Create New Hotel
			</button>
		</div>
			<!-- Modal -->

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <h3 class="modal-header">Create New Hotel</h3>
                        <div class="modal-body">
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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th></th>
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