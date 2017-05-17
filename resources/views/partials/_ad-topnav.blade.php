<div class="top_nav">
	<div class="nav_menu">
	<nav>
		<ul class="nav navbar-nav navbar-right">
		<li class="">
			<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			<img src="{{ asset('img/admin.jpg') }}" alt="">
				{{ Auth::user()->name }}
			<span class=" fa fa-angle-down"></span>
			</a>
			<ul class="dropdown-menu dropdown-usermenu pull-right">
				<li><a href="javascript:;"> Profile</a></li>
				<li>
					<a href="{{ route('admin.logout.submit') }}"
						onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
						<i class="fa fa-sign-out pull-right"></i>Logout
					</a>

					<form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
		</ul>
	</nav>
	</div>
</div>