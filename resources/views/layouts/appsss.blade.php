<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
{{-- 	<link rel="stylesheet" type="text/css" href="{{ asset('css/thuvien.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">

	<link rel="stylesheet" href="{{ asset('css/app.css') }}') }}"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav-reset.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/thuvien.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap3.min.css') }}">

	<!-- Scripts -->
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
		]) !!};
	</script>

</head>
<body>
<div id="app" >
	<header class="app-user">
		<div class="cd-logo"><a href="/"><img src="../img/logo.png" alt="Logo"></a></div>

		<nav class="cd-main-nav-wrapper">

			<ul class="cd-main-nav">
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/tour">Chuyến đi</a></li>
				<li><a href="#0">Chi tiết chuyến đi</a></li>
				<!-- other list items here -->
				<li>
					<a href="#0" class="cd-subnav-trigger"><span>Menu</span></a>

					<ul>
						<li class="go-back"><a href="#0">Menu</a></li>
						@if (Auth::guest())
							<li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}">Đăng nhập</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ route('user.logout.submit') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ route('user.logout.submit') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
						@endif
						<li><a href="#0" class="placeholder">Placeholder</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<a href="#0" class="cd-nav-trigger"><span></span></a>

	</header>
	<main class="cd-main-content">
		@yield('content')
	</main>
</div>

	<!-- Scripts -->
	<script type="text/javascript" src="{{ asset('js/jquery-2.2.4.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/nav-main.js') }}"></script>


{{--<script type="text/javascript" src="{{ asset('js/moment-with-locales.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/prettify-1.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/combodate.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/app.js') }}') }}"></script> --}}
	<script type="text/javascript" >
		$(document).ready(function(){
		    $('#datetimepicker1').datetimepicker();

			$(".reg").validate({
				rules:{
					f_name:{
						required: true,
						minlength: 5,
					},
					l_name:{
						required: true,
						minlength: 5,
					},
					email: {
						required: true,
						email: true
					},
					date:{
						required:true,
						date:true,   
					},

					sex:{
						required:true,
					},

					address:{
						required: true,
					},

					p_code:{
						required: true,
						number: true,
					},

					phone:{
						required: true,
						minlength: 10,
						number:true,
					},

					password: {
						required: true,
						minlength: 8,

					},
					password_confirm: {
						required: true,
						minlength: 8,
						equalTo: '#password',
					}
				},
				messages:{
					f_name:{
						required: "vui lòng nhập tên",
						minlength: "dài ra"
					},
					l_name:{
						required: "vui lòng nhập tên",
						minlength: "dài ra"
					},
					email: {
						required: "vui lòng nhập email",
						email: "không fải định dạng mail"
					},
					date:{
						required:"bạn chưa chọn ngày sinh",
					},

					sex:{
						required:"bạn chưa chọn giới tính",
					},

					address:{
						required: "bạn chưa nhập địa chỉ",
					},

					p_code:{
						required: "bạn chưa nhập CMND",	
						number: "bạn nhập không đúng định dạng",
					},

					phone:{
						required: "bạn chưa nhập điện thoại",
						minlength: "tối thiểu 10 số",
						number: "bạn nhập không đúng định dạng",
					},
					password: {
						required: "vui lòng nhập password",
						minlength: "dài ra xem nào"
					},
					password_confirm: {
						required: "vui lòng nhập repassword",
						minlength: "dài ra xem nào",
						equalTo: "không khớp pass",						
					}
				}
			});     

			strengthResult = $('#pass-strength-result');

			strengthResult.show();

			$('#password').keyup(function(e) {
				e.preventDefault();
				user = $('#email').val(); pass1 = $('#password').val(); pass2 = $('#password-confirm').val();

				if (pass1 != '') {
					AddStyle (passwordStrength(pass1,user,pass2));
				} else{
					strengthResult.removeClass().text('Strength indicator');
				}

			});

			$('#password-confirm').keyup(function(e) {
				e.preventDefault();

				user = $('#email').val(); pass1 = $('#password').val(); pass2 = $('#password-confirm').val();

				if (pass2 != '') {
					AddStyle (passwordStrength(pass1,user,pass2));
				} else{
					strengthResult.removeClass().text('Strength indicator');
				}

			});

			$('#reg_btn').click(function(e) {
				e.preventDefault();

				user = $('#email').val();pass1 = $('#password').val();pass2 = $('#password-confirm').val();

				if(user != '' && pass1 != '' && pass2 != '' && strengthResult.attr('class') != 'short'){
					alert('Register is successful');
					$('#email').val(''); $('#password').val(''); $('#password_confirm').val('');
					strengthResult.removeClass().text('Strength indicator');
				}
			});

			function AddStyle(result) {
				if (result == 1) {
					strengthResult.removeClass().addClass('short').text('Very Weak')
				};
				if (result == 2){
					strengthResult.removeClass().addClass('bad').text('Weak')
				};
				if (result == 3){
					strengthResult.removeClass().addClass('good').text('Medium')
				};
				if (result == 4){
					strengthResult.removeClass().addClass('strong').text('Strong')
				};
				if (result == 5){
					strengthResult.removeClass().addClass('short').text('Mismatch')
				};
			}

			// Password strength meter
			function passwordStrength(password1, username, password2) {
				var shortPass = 1, badPass = 2, goodPass = 3, strongPass = 4, mismatch = 5, symbolSize = 0, natLog, score;

				// password 1 != password 2
				if ( (password1 != password2) && password2.length > 0)
					return mismatch

				//password < 4
				if ( password1.length < 4 )
					return shortPass

				//password1 == username
				if ( password1.toLowerCase() == username.toLowerCase() )
					return badPass;

				if ( password1.match(/[0-9]/) )
					symbolSize +=10;
				if ( password1.match(/[a-z]/) )
					symbolSize +=26;
				if ( password1.match(/[A-Z]/) )
					symbolSize +=26;
				if ( password1.match(/.,[,!,@,#,$,%,^,&,*,?,_,~,-,(,),]/) )
					symbolSize +=26;
				if ( password1.match(/[^a-zA-Z0-9]/) )
					symbolSize +=31;

				natLog = Math.log( Math.pow(symbolSize, password1.length) );
				score = natLog / Math.LN2;

				if (score < 40 )
					return badPass

				if (score < 56 )
					return goodPass

				return strongPass;
			}
		});
	</script>
</body>
</html>
