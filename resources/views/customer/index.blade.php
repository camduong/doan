@extends('layouts.admain')

@section('title', ' All Vehicle')

@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-9">
            <h1>All Vehicle</h1>
        </div>

        <div class="col-md-3">
            <a href="{{ route('vehicle.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Create New Vehicle</a>
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
                    <th>Introduce</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <th>{{ $vehicle->id }}</th>
                            <td>{{ $vehicle->name }}</td>
                            <td>{{ $vehicle->introduce }}</td>
                            <td>
                                <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-app">
                                <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                {!! $vehicles->links() !!} 
            </div>
        </div>
    </div>
</div>
@endsection