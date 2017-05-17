@extends('layouts.admain')

@section('title', ' Show Detail Tour')

@section('content')
	<div class="right_col" role="main">
		<div class="row">
			<div class="col-md-8">
				<div class="x_content">
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#tour" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chuyến đi</a>
							</li>
							<li role="presentation" class=""><a href="#detailtour" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Chi tiết chuyến đi</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tour" aria-labelledby="home-tab">
								<h3>{{ $tour->name }}</h3>
								<p class="lead">Khách sạn: {{ $tour->hotels->name }}</p>
								<p class="lead">Địa điểm: {{ $tour->locations->name }}</p>
								<p class="lead">Phương tiện: {{ $tour->vehicles->name }}</p>
								<p class="lead">Giá: {{ number_format($tour->price) }}VNĐ</p>
								<p class="lead">Số ngày: {{ $tour->day }} ngày</p>
								<p class="lead">Ngày đi: {{ date('l d/m/Y',strtotime($tour->depart_date)) }}</p>
								<p class="lead">Ngày về: {{ date('l d/m/Y',strtotime($tour->back_date)) }}</p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="detailtour" aria-labelledby="profile-tab">
								<p class="lead">Lịch trình: </p>
								<p class="lead">{!! $tour->schedule !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<div class="col-sm-12">
							<span class="lead">URL: </span>
							<span><a href="{{ route('tour.single', $tour->slug) }}">{{ substr($tour->slug, 0, 20) }}</a></span>
						</div>
						<div class="clearfix"></div>
						<hr>
						<div class="col-sm-6">
							<a href="{{ route('tour.edit', $tour->id) }}" class="btn btn-primary btn-block">
								Sửa
							</a>
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['tour.destroy', $tour->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<a href="{{ route('tour.index') }}" class="btn btn-info btn-block btn-h1-spacing">
								<h4><i class="fa fa-angle-double-left"></i> Xem tất cả</h4>
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection