<div>
	<div class="profile clearfix">
		<div class="profile_pic">
			<img src="{{ asset('img/admin.jpg') }}" alt="admin_picture" class="img-circle profile_img">
		</div>
		<div class="profile_info">
			<span>Welcome, <h2 style="display: inline-block;">{{ Auth::user()->name }}</h2></span>
		</div>
	</div>

	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<ul class="nav side-menu">
				<li>
					<a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home </a>
				</li>
				<li>
					<a><i class="fa fa-road"></i> Tour <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="{{ route('tour.index') }}"><i class="fa fa-book" style="width:20%!important"></i>Show All Tour</a></li>
						<li><a href="{{ route('tour.create') }}"><i class="fa fa-edit" style="width:20%!important"></i>Add New Tour</a></li>
					</ul>
				</li>
				<li>
					<a><i class="fa fa-bus"></i>Vehicle<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="{{ route('vehicle.index') }}"><i class="fa fa-book" style="width:20%!important"></i>Show All Vehicle</a></li>
					</ul>
				</li>
				<li>
					<a><i class="fa fa-building"></i>Hotel<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="{{ route('hotel.index') }}"><i class="fa fa-book" style="width:20%!important"></i>Show All Hotel</a></li>
					</ul>
				</li>
				<li>
					<a><i class="fa fa-location-arrow"></i>Location<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="{{ route('location.index') }}"><i class="fa fa-book" style="width:20%!important"></i>Show All Location</a></li>
					</ul>
				</li>
				<li>
					<a><i class="fa fa-users"></i>Customer<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="#"><i class="fa fa-book" style="width:20%!important"></i>Show All Customer</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Website" href="/">
				<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('admin.logout.submit') }}">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
</div>