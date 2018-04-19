<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>InterQuest - Living the Dream</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/skins/_all-skins.min.css">

	<!-- iCheck -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

	<!-- select2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

	<!-- Customization -->
	<link rel="stylesheet" href="/css/custom.css">
	
	<!-- Datatables and Localized Customization -->
	@yield('css')
</head>

<body class="skin-purple sidebar-mini">
@if (!Auth::guest())
	<div class="wrapper">
		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="#" class="logo">
				<img src="/img/InterQuestLogo.png" height="50">
				<b>InterQuest</b>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="{!! $persona->image ? $persona->image : '/img/profile.png' !!}"
									 class="user-image" alt="{!! $persona->long_name ? $persona->long_name : Auth::user()->name !!}"/>
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs">{!! $persona->long_name ? $persona->long_name : Auth::user()->name !!}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="{!! $persona->image ? $persona->image : '/img/profile.png' !!}" class="img-circle" alt="{!! $persona->long_name ? $persona->long_name : Auth::user()->name !!}"/>
									<p>
										{!! $persona->long_name ? $persona->long_name : Auth::user()->name !!}
										<small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="{!! $persona->id ? '/personas/' . $persona->id : '#' !!}" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="{!! url('/logout') !!}" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column. contains the logo and sidebar -->
		@include('layouts.sidebar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			@yield('content')
		</div>

		<!-- Main Footer -->
		<footer class="main-footer" style="max-height: 100px;text-align: center">
			<strong>Copyright © {!! date("Y") !!} <a href="#">Woody NaDobhar</a>.</strong> All rights reserved.
		</footer>

	</div>
@else
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#app-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Branding Image -->
				<a class="navbar-brand" href="{!! url('/') !!}">
					InterQuest
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					<li><a href="{!! url('/home') !!}">Home</a></li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					<li><a href="redirect"><img src="/img/loginFacebook.png" width="160px"></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	@endif

	<!-- jQuery 3.1.1 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<!-- Hex Grid -->
	<script src="/js/hexgridwidget.js"></script>

	<!-- Custom -->
	<script src="/js/custom_common.js"></script>

	<!-- Page-Specific -->
	@yield('scripts')
</body>
</html>