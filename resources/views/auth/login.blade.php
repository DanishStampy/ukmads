<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-md-center h-100">
				<div class="card-wrapper">
					
				<div class="home-link"><a class="link" href="{{route('welcome')}}"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;Home</div>
			
					<div class="cardx fat mt-5">
						<div class="card-body">
							@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
                @csrf
								<!-- <div class="form-group">
									<label for="login">E-Mail Address or Username</label>
									<input id="login" type="text" class="form-control" name="login" value="" required autofocus placeholder="Enter email or username" class="form-control @if($errors->has('email') || $errors->has('username')) has-error @endif">
                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div> -->
								<br>
								<div class="form_group">
									<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="{{ old('login') }}">
									<label for="login" class="form_label">E-Mail Address or Username</label>
									<span class="text-danger">@error('login'){{ $message }}@enderror</span>
								</div>

								<div class="form_group">
									<input id="password" type="password" class="form_input" name="password" placeholder=" "  autofocus value="{{ old('password') }}">
									<label for="password" class="form_label">Password</label>
									<span class="text-danger">@error('pasword'){{ $message }}@enderror</span>
									<br>
									<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
								</div>


								<!-- <div class="form-group">
									<label for="password">Password
										<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Enter password">
                  <span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div> -->

								

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{route('register')}}">Create One</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>


	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>