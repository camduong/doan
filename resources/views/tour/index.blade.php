@extends('layouts.admain')

@section('title', ' All Posts')

@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-9">
            <h1>All Tour</h1>
        </div>

        <div class="col-md-3">
            <a href="{{ route('tour.create') }}" class="btn-create-tour btn btn-lg btn-primary btn-h1-spacing" >Tạo chuyến đi mới</a>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
    </div><!--end of .row-->

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Day</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tours as $tour)
                        <tr>
                            <th>{{ $tour->id }}</th>
                            <td>{{ $tour->name }}</td>
                            <td>{{ number_format($tour->price) . ' VNĐ' }}</td>
                            <td>{{ $tour->day }}</td>
                            <td>{{ date('j m,Y', strtotime($tour->created_at)) }}</td>
                            <td>
                                <a href="{{ route('tour.show', $tour->id) }}" class="btn btn-app">
                                <i class="fa fa-eye"></i>View
                                </a>
                                <a href="{{ route('tour.edit', $tour->id) }}" class="btn btn-app">
                                <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop