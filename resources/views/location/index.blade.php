@extends('layouts.admain')

@section('title', ' All Location')

@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-9">
			<h1>All Location</h1>
		</div>

		<div class="col-md-3">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-lg btn-primary btn-h1-spacing" data-toggle="modal" data-target="#myModal">
			  Create New Location
			</button>
		</div>
			<!-- Modal -->

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
          <div class="modal-content">
	    			<h3 class="modal-header">Create New Location</h3>
	    			<div class="modal-body">
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
	    </div>
		<div class="col-md-12">
			<hr>
		</div>
	</div><!--end of .row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Introduce</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($locations as $location)
						<tr>
							<th>{{ $location->id }}</th>
							<td>{{ $location->name }}</td>
							<td>{{ $location->introduce }}</td>
							<td>
								{!! Form::open(['route' => ['location.destroy', $location->id], 'method' => 'DELETE']) !!}
										{!! Html::linkRoute('location.edit', 'Edit', array($location->id), array('class' => 'btn btn-primary btn-md')) !!}
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