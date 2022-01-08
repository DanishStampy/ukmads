<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register page</title>

	{{-- Custom CSS File --}}
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-register.css">

	{{-- Font Awesome 5 --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

	 {{-- Icon --}}
	 <link rel="icon" href="{{ asset('img/ukmads-logo-background.png')}}" type="image/x-icon">

</head>
<body class="my-register-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-md-center h-100">
				<div class="card-wrapper">
					
					<div class="home-link"><a class="link" href="{{url('/')}}"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;Home</div>
					
					<div class="mt-4 px-2 cardx">
						<div class="card-body">
							<h2 class="card-title">Create a new account</h2>
							<h6 class="card-subtitle mb-4 mt-2 text-muted">Use your google email to create new organization account</h6>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('org.post') }}">
                @csrf
								<div class="form_group">
									<input id="name" type="text" class="form_input" name="name" placeholder=" "  autofocus value="{{ old('name') }}">
									<label for="name" class="form_label">Name</label>
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>

								<div class="form_group">
									<input id="email" type="email" class="form_input" name="email"  placeholder=" " value="">
									<label for="email" class="form_label">E-Mail Address</label>
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>

                <div class="form_group">
									<input id="address" type="text" class="form_input" name="address"  placeholder=" " value="">
									<label for="address" class="form_label">Address</label>
									<span class="text-danger">@error('address'){{ $message }}@enderror</span>
								</div>

                <div class="form_group">
									<input id="contact" type="text" class="form_input" name="contact"  placeholder=" " value="">
									<label for="contact" class="form_label">Contact No.</label>
									<span class="text-danger">@error('contact'){{ $message }}@enderror</span>
								</div>
                      

								<div class="form_group">
									<input id="password" type="password" class="form_input" name="password"  data-eye placeholder=" ">
									<label for="password" class="form_label">Password</label>
									<span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>
                
								<div class="form_group">
									<input id="password-confirm" type="password" class="form_input" name="password_confirmation" required data-eye placeholder=" ">
									<label for="password-confirm" class="form_label">Confirm Password</label>
									<span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-block">
										Sign Up
									</button>
								</div>
								<div class="my-3 text-center">
									Already have an account? <a class="link" href="{{route('login')}}">Login</a>
								</div>
							</form>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</section>

<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>