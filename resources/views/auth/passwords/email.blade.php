<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from vergo-kertas.herokuapp.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jul 2016 21:11:31 GMT -->
<head>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Pusula Cafe &ndash; Admin Giriş Sistemi</title>
	<link rel="icon" href="{{ asset('backend/assets/img/favicon.ico') }}">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- BEGIN CSS FRAMEWORK -->
	<link rel="stylesheet" href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{asset('backend/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- END CSS FRAMEWORK -->
	<!-- BEGIN CSS PLUGIN -->
	<link rel="stylesheet" href="{{asset('backend/assets/plugins/pace/pace-theme-minimal.css') }}">
	<!-- END CSS PLUGIN -->
	<!-- BEGIN CSS TEMPLATE -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/main.css') }}">
	<!-- END CSS TEMPLATE -->
</head>

<body class="login">
	<div class="outer">
		<div class="middle">
			<div class="inner">
				<div class="row">
					<!-- BEGIN LOGIN BOX -->
					<div class="col-lg-12">
						<h3 class="text-center login-title">Parola Sıfırlama</h3>
						<div class="account-wall">
							<!-- BEGIN PROFILE IMAGE -->
							<!-- END PROFILE IMAGE -->
							<!-- BEGIN LOGIN FORM -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
							<form method="POST" action="{{ route('password.email') }}" class="form-login">
                                            @csrf
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required  placeholder="E-Posta" >
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                               
								<button class="btn btn-lg btn-primary btn-block" type="submit">Parola Sıfırla</button>
								
							</form>
							<!-- END LOGIN FORM -->
						</div>
						<!--<a href="register.html" class="text-center new-account">Create an account</a> -->
					</div>
					<!-- END LOGIN BOX -->
				</div>
			</div>
		</div>
	</div>

	<!-- BEGIN JS FRAMEWORK -->
	<script src="{{ asset('backend/assets/plugins/jquery-2.1.0.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- END JS FRAMEWORK -->
	
	<!-- BEGIN JS PLUGIN -->
	<script src="{{ asset('backend/assets/plugins/pace/pace.min.js') }}"></script>
	<!-- END JS PLUGIN -->
</body>

<!-- Mirrored from vergo-kertas.herokuapp.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jul 2016 21:11:32 GMT -->
</html>