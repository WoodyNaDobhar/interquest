<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="_token" content="{{ csrf_token() }}">
	<title>InterQuest - Living the Dream</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
@if (Request::segment(1) == 'rules')
	<link rel="stylesheet" href="http://www.interquestonline.com/w/load.php?debug=false&lang=en&modules=mediawiki.legacy.commonPrint,shared|mediawiki.sectionAnchor|mediawiki.skinning.content.externallinks|mediawiki.skinning.interface|skins.monobook.styles&only=styles&skin=monobook"/>
	<script async="" src="http://www.interquestonline.com/w/load.php?debug=false&lang=en&modules=startup&only=scripts&skin=monobook"></script>
	<!--[if IE 6]>
		<link rel="stylesheet" href="http://www.interquestonline.com/w/skins/MonoBook/resources/IE60Fixes.css?303" media="screen"/>
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" href="http://www.interquestonline.com/w/skins/MonoBook/resources/IE70Fixes.css?303" media="screen"/>
	<![endif]-->
@endif
@if (Request::segment(1) != 'sparse')
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- jQueryUI 1.12.1 -->
	<link rel="stylesheet" href="/css/jquery-ui-1.12.1.custom/jquery-ui.min.css">
	
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
@endif
</head>

<body class="skin-purple sidebar-mini">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : {!! '\'' . env('FACEBOOK_CLIENT') . '\'' !!},
      xfbml      : true,
      version    : 'v3.1'
    });
  
    FB.AppEvents.logPageView();
  
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
@if (Request::segment(1) == 'sparse')
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12" id="spinMe">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
@else
	<div class="wrapper">
		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="/" class="logo">
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
					@if (!Auth::guest())
					<ul class="nav navbar-nav">
						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="{!! $userPersona && $userPersona->image ? $userPersona->image : '/img/profile.png' !!}"
									 class="user-image" alt="{!! $userPersona && $userPersona->long_name ? $userPersona->long_name : Auth::user()->name !!}"/>
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs">{!! $userPersona && $userPersona->name ? $userPersona->name : Auth::user()->name !!}</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="{!! $userPersona && $userPersona->image ? $userPersona->image : '/img/profile.png' !!}" class="img-circle" alt="{!! $userPersona && $userPersona->long_name ? $userPersona->long_name : Auth::user()->name !!}"/>
									<p>
										{!! $userPersona && $userPersona->name ? $userPersona->name : Auth::user()->name !!}
										<small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="{!! $userPersona && $userPersona->id ? '/personae/' . $userPersona->id : '#' !!}" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="{!! url('/logout') !!}" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
					@else
					<ul class="nav navbar-nav">
						<!-- Authentication Link -->
						<li><a href="signin" class="guestLogin"><img src="/img/loginFacebook.png" width="160px"></a></li>
					</ul>
					@endif
				</div>
			</nav>
		</header>

		<!-- Left side column. contains the logo and sidebar -->
		@include('layouts.sidebar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" id="spinMe">
			@yield('content')
		</div>

		<!-- Main Footer -->
		<footer class="main-footer" style="max-height: 100px;text-align: center">
			<strong>Copyright © {!! date("Y") !!} <a href="#">Woody NaDobhar</a>.</strong> All rights reserved.
		</footer>

	</div>

	<!-- jQuery 3.1.1 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	
	<!-- AdminLTE App -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<!-- Hex Grid -->
	<script src="/js/hexgridwidget.js"></script>

	<!-- Custom -->
	<script src="/js/custom_common.js"></script>

	<!-- Activity Spinner -->
	<script src="/js/spin.js"></script>

	<!-- Page-Specific -->
	@yield('scripts')
@endif
</body>
</html>