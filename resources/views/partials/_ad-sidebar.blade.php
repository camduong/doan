<div>
	<div class="profile clearfix">
		<div class="profile_pic">
			<img src="{{ asset('img/admin.jpg') }}" alt="admin_picture" class="img-circle profile_img">
		</div>
		<div class="profile_info">
			<span>Xin chào, <h2 style="display: inline-block;">{{ Auth::user()->name }}</h2></span>
		</div>
	</div>

	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<ul class="nav side-menu">
				<li>
					<a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Trang chủ </a>
				</li>
				<li>
					<a href="{{ route('tour.index') }}"><i class="fa fa-road"></i> Chuyến đi </a>
				</li>
				<li>
					<a href="{{ route('vehicle.index') }}"><i class="fa fa-bus"></i>Phương tiện</span></a>
				</li>
				<li>
					<a href="{{ route('hotel.index') }}"><i class="fa fa-building"></i>Khách sạn</a>
				</li>
				<li>
					<a href="{{ route('location.index') }}"><i class="fa fa-location-arrow"></i>Địa điểm</a>
				</li>
				<li>
					<a href="{{ route('customer.index') }}"><i class="fa fa-users"></i>Đơn hàng</a>
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