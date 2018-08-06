<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script type="text/javascript">
		window.baseURL = {!! json_encode(url('/')) !!}
	</script>

	<title>Swift Billing</title>
	<link rel='icon' type='image/png' href='{{ asset('img/favicon.png') }}' />

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{ asset('/fw/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/skeleton.css') }}">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="{{ asset('/fw/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/fw/font-awesome/4.7/css/font-awesome.min.css') }}">
	<!-- Custom Element's CSS -->
	<link rel="stylesheet" href="{{ asset('/css/customstyles.css') }}">
	<!-- Google fonts - Poppins -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="{{ asset('css/adminstyle/style.default.css') }}" id="theme-stylesheet">
	<!-- Pace - Top Loading Bar Theme stylesheet-->
	<link rel="stylesheet" href="{{ asset('fw/pace/themes/blue/pace-theme-minimal.css') }}" id="theme-stylesheet">
	<!-- BFH CSS -->
	<link rel="stylesheet" href="{{ asset('fw/bfh/bootstrap-formhelpers.css') }}">
	<!-- Pure Checkbox for Invoice CSS -->
	<link rel="stylesheet" href="{{ asset('css/pure-checkbox.css') }}">
	<!--	Remodal CSS-->
	<link rel="stylesheet" href="{{ asset('fw/remodal/remodal.css') }}">
	<link rel="stylesheet" href="{{ asset('fw/remodal/remodal-default-theme.css') }}">
	<!--	Autocomplete CSS	-->
	<link rel="stylesheet" href="{{ asset('fw/autocomplete/jquery.autocomplete.css') }}">
	<!-- Dev Sign -->
	<link rel="stylesheet" href="{{ asset('css/dev-sign/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/invoice-table.css') }}">

	<!-- Favicon-->
	<link rel="shortcut icon" href="img/favicon.ico">

	<script src="{{ asset('fw/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('fw/bfh/bootstrap-formhelpers.js') }}"></script>  	
	<script src="{{ asset('fw/pace/pace.min.js') }}"></script>
	<script src="{{ asset('fw/moment/moment.js') }}"></script>
	<script src="{{ asset('fw/sweetalert/sweetalert2.all.js') }}"></script>
	<!--	Autocomplete JS-->
	<script src="{{ asset('fw/autocomplete/jquery.autocomplete.js') }}"></script>	

	<!-- Tweaks for older IEs-->
	<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

	<body>
		<div class="page">
			<!-- Main Navbar-->
			<header class="header">
				<nav class="navbar">
					<div class="container-fluid">
						<div class="navbar-holder d-flex align-items-center justify-content-between">
							<!-- Navbar Header-->
							<div class="navbar-header">
								<!-- Navbar Brand -->
								<a href="{{ Route('Home') }}" class="navbar-brand">
									<div class="brand-text brand-big">
										<span>Swift</span>
										<strong>Billing</strong>
									</div>
									<div class="brand-text brand-small">
										<strong>SB</strong>
									</div>
								</a>
								<!-- Toggle Button-->
								<a id="toggle-btn" href="javascript:;" class="menu-btn active">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
							<!-- Navbar Menu -->
							<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
								<!-- Logout    -->
								<li class="nav-item">
									<a href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();" class="nav-link logout">Logout
										<i class="fa fa-sign-out"></i>
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>

								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			<div class="page-content d-flex align-items-stretch">
				<!-- Side Navbar -->
				<nav class="side-navbar">
					<!-- Sidebar Header-->
					<div class="sidebar-header d-flex align-items-center">
						<div class="avatar">
							<img src="{{ asset('img/backend/user-icon.png') }}" alt="..." class="img-fluid rounded-circle">
						</div>
						<div class="title">
							<h1 class="h4">{{ Auth::user()->name}} </h1>
							<p>{{ Auth::user()->email}}</p>
						</div>
					</div>
					<!-- Sidebar Navidation Menus-->
					<ul class="list-unstyled">
						<li class="{{ isActiveRoute('Dashboard') }}">
							<a class="nav-link" href="{{ route('Dashboard') }}">
								<i class="fas fa-home"></i>Dashboard</a>
						</li>
						@if(Auth::user()->hasAnyRole(['admin', 'user']))
						<li class="{{ isActiveRoute('Contacts.*') }}">
							<a class="nav-link" href="{{ route('Contacts.contacts.index') }}">
								<i class="far fa-address-book"></i>Contacts </a>
						</li>
						<li class="{{ isActiveRoute('Products.*') }}">
							<a class="nav-link" href="{{ route('Products.products.index') }}">
								<i class="fas fa-cookie-bite"></i>Products </a>
						</li>
						<li class="{{ isActiveRoute('Invoices.*') }}">
							<a class="nav-link" href="{{ route('Invoices.invoices.index') }}">
								<i class="fas fa-file-invoice-dollar"></i>Invoices </a>
						</li>
						
						<li class="{{ isActiveRoute('Settings.*') }}">
							<a href="#deedown" aria-expanded="false" data-toggle="collapse">
								<i class="fa fa-cog"></i>Settings</a>
							<ul id="deedown" class="collapse list-unstyled ">
								<li>
									<a href="{{ route('Settings.profile.index') }}">Profile Settings</a>
								</li>
								<li>
									<a href="{{ route('Settings.invoice.index') }}">Invoice Settings</a>
								</li>
								<li>
									<a href="javascript:;">Page</a>
								</li>
							</ul>
						</li>
						@endif
						@if(Auth::user()->hasRole('admin'))
						<li class="{{ isActiveRoute('Users.*') }}">
							<a href="{{ route('Users.users.index') }}"><i class="fa fa-user-secret"></i>User Management </a>
						</li>
						@endif
					</ul>

				</nav>
				<div class="content-inner">
					<!-- Page Header-->
					<header class="page-header">
						<div class="container-fluid">
							<h2 class="no-margin-bottom">{{ request()->route()->parameter('page-heading') }}</h2>
						</div>
					</header>

					@yield('content')

					<!-- Page Footer-->
					<footer class="main-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6">
									<p>Praveen Kalaiarasu © <a class="designer" href="http://pravnkay.com" target=_blank><span class="icon-designer"><span class="path2"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a></p>
									
								</div>
								<div class="col-sm-6 text-right align-items-center">
									
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>
		<!-- JavaScript files-->		
		<script src="{{ asset('fw/popper.js/umd/popper.min.js') }}"></script>
		<script src="{{ asset('fw/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('fw/numeric/jquery-numeric-1.3.1.js') }}"></script>
		<script src="{{ asset('fw/autosize/autosize.js') }}"></script>  
		<!--    Remodal JS-->
		<script src="{{ asset('fw/remodal/remodal.js') }}"></script>
		<script src="{{ asset('js/form-constraints.js') }}"></script>
		@include('sweetalert::alert')
		<!-- Main File-->
		<script src="{{ asset('js/adminscript/front.js') }}"></script>
		<script src="{{ asset('js/bfh-datepicker-assist.js') }}"></script>
		<script src="{{ asset('js/round-off.js') }}"></script>

	</body>

</html>