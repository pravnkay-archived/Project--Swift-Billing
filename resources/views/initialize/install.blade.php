<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Install Swift Billing</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{ asset('/fw/bootstrap/css/bootstrap.min.css') }}">

	<!-- Dev Sign -->
	<link rel="stylesheet" href="{{ asset('css/dev-sign/style.css') }}">
	
	<script src="{{ asset('fw/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('fw/bootstrap/js/bootstrap.min.js') }}"></script>

	<style>

		/*
		* Globals
		*/

		/* Links */
		a,
		a:focus,
		a:hover {
		color: #fff;
		}

		/* Custom default button */
		.btn-secondary,
		.btn-secondary:hover,
		.btn-secondary:focus {
		color: #333;
		text-shadow: none; /* Prevent inheritance from `body` */
		background-color: #fff;
		border: .05rem solid #fff;
		}


		/*
		* Base structure
		*/

		html,
		body {
		min-height: 100vh;
		background-color: #333;
		}

		body {
			display: -ms-flexbox;
			display: -webkit-box;
			display: flex;
			-ms-flex-pack: center;
			-webkit-box-pack: center;
			justify-content: center;
			color: #fff;
			text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
			box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
		}

		.cover-container {
			max-width: 42em;
			min-height: 100vh !important;
		}


		/*
		* Footer
		*/
		.mastfoot {
			color: rgba(255, 255, 255, .5);
		}
			
	</style>
	
</head>
<body class="text-center">

	<div class="cover-container row p-3 mx-auto">
		<header class="mb-auto col-12">
			<div class="inner">
				<h3 class="text-left">Swift Billing</h3>
			</div>
		</header>

		<main role="main" class="col-12">
			<form action="/install/execute" method="POST" class="row">
			@csrf		

				<input type="text" name="dbName" placeholder="DB Name" class="form-control mt-3 col-auto">
				<input type="text" name="dbUser" placeholder="DB User" class="form-control mt-3 col-auto">
				<input type="text" name="dbPass" placeholder="DB Pass" class="form-control mt-3 col-auto">

				<button type="submit" class="btn btn-success ml-auto mt-3 col-auto">	Submit </button>

			</form>
		</main>

		<footer class="mastfoot col-12 mt-auto">
			<div class="row">
				<div class="col-12 text-center">
					<p>Praveen Kalaiarasu © <a class="designer" href="http://pravnkay.com" target=_blank><span class="icon-designer"><span class="path2"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a></p>
					
				</div>
			</div>
		</footer>
	</div>


	<!-- Bootstrap core JavaScript
		================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>