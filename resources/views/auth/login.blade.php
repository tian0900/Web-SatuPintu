<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/bootstrap/csss/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('fontss/font-awesome-4.7.0/csss/font-awesome.min.css') }}">
<!--===============================================================================================-->
	{{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('fontss/iconic/csss/material-design-iconic-font.min.css') }}"> --}}
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/animate/animate.css') }}">
<!--===============================================================================================-->	
	{{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/css-hamburgers/hamburgers.min.css') }}"> --}}
<!--===============================================================================================-->
	{{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendorr/animsition/csss/animsition.min.css') }}"> --}}
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('csss/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('Auth/style.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
					@csrf
					<header class="login-header">
						<span class="login100-form-title p-b-26">
							<img src="logo/Logo.png" alt="" class="login-img mt-3">
							SATU PINTU
						</span>
						<p class="login-info">
							Please enter your user information.
						</p>
					</header>
					<div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
						<h6>Username</h6>
						<input class="input100" type="text" name="name" id="name">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<h6>Password</h6>
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100" ></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ URL::asset('vendorr/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('vendorr/animsition/jss/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('vendorr/bootstrap/jss/popper.js') }}"></script>
	<script src="{{ URL::asset('vendorr/bootstrap/jss/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('vendorr/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('vendorr/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ URL::asset('vendorr/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('vendorr/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('jss/main.js') }}"></script>

</body>
</html>
