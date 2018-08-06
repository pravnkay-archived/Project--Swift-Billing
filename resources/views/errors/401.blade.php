<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='icon' type='image/png' href='{{ asset('img/error_favicon.png') }}' />

    <title>Unauthorized Access</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/fw/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
	<link rel="stylesheet" href="{{ asset('/css/errorstyles.css') }}">
	
	<!-- Dev Sign -->
	<link rel="stylesheet" href="{{ asset('css/dev-sign/style.css') }}">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
		<h2 class="mt-5">Laravel User Management System</h2>
	  </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">{{ $exception->getMessage() }}</h1>
        <p class="lead">Accessing this page requires authorization.</p>
        {{-- <p class="lead">
          <a href="{{ URL::previous() }}" class="btn btn-md btn-secondary">Back</a>
        </p> --}}
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
			<p>Praveen Kalaiarasu © <a class="designer" href="http://pravnkay.com" target=_blank><span class="icon-designer"><span class="path2"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a></p>
        </div>
      </footer>
    </div>
  </body>
</html>
