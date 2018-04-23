<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from vergo-kertas.herokuapp.com/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jul 2016 21:11:31 GMT -->
<head>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Ak Parti Yönetim Sistemi &ndash; Kilit Sistemi</title>
	
	<link rel="icon" href="{{ asset('backend/assets/img/favicon.ico') }}">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- BEGIN CSS FRAMEWORK -->
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
	<!-- END CSS FRAMEWORK -->
	
	<!-- BEGIN CSS PLUGIN -->
	<link rel="stylesheet" href="{{ asset('backend/assets/plugins/pace/pace-theme-minimal.css') }}">
	<!-- END CSS PLUGIN -->
	
	<!-- BEGIN CSS TEMPLATE -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}">
	<!-- END CSS TEMPLATE -->
</head>

<body class="login">
	<div class="outer">
		<div class="middle">
			<div class="inner">
				<div class="row">
							<!-- BEGIN LOCKSCREEN BOX -->
                            <div class="col-lg-12">
                            <h3 class="text-center login-title">Sistem Kilitli </h3>
                            <div class="account-wall">
                                <!-- BEGIN PROFILE IMAGE -->
                                <img class="profile-img" src="{{ asset('backend/image/man.png') }}" alt="">
                                <!-- END PROFILE IMAGE -->
                                <p class="profile-name">{{Auth::user()->name}}</p>
                                <span class="profile-email">{{Auth::user()->email}}</span>
                                <!-- BEGIN LOGIN FORM -->
                                <form  name="login" action="{{route('kilitlisistem')}}" method="post" class="form-login">
                                   {{csrf_field() }}
                                    <!--<input type="text" name="parola" id="parola" class="form-control" placeholder="Parola">
                                   -->
								    <button class="btn btn-lg btn-primary btn-block" type="submit">Kilit Aç</button>
                                    <label class="checkbox pull-left">
                                       <!-- <input type="checkbox" value="remember-me">Beni Hatırla -->
                                    </label>
                                    <a href="#" class="pull-right need-help"></a><span class="clearfix"></span>
                                </form>
                                <!-- END LOGIN FORM -->
                            </div>
                            <a href="login.html" class="text-center new-account"></a>
                        </div>
                        <!-- END LOCKSCREEN BOX -->
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

<!-- Mirrored from vergo-kertas.herokuapp.com/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jul 2016 21:11:31 GMT -->
</html>