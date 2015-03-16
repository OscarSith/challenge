<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Oscar Larriega">
	<title>Challenge</title>
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>
<body class="cover {{ $background }}">
	<div class="container">
		<div class="row">
			<div class="hidden-xs" id="space-top"></div>
			<header class="col-sm-12 col-sm-offset-0 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
				<h1 class="text-center">CHALLENGER PERÚ</h1>
				<nav>
					<ul class="nav nav-pills nav-justified">
						<li class="nav-active"><a href="/">INICIO</a></li>
						<li><a href="nosotros">NOSOTROS</a></li>
						<li><a href="productos">PRODUCTOS</a></li>
						<li><a href="eventos">EVENTOS</a></li>
						<li><a href="contacto" class="mr0">CONTACTO</a></li>
					</ul>
				</nav>
			</header>
		</div>
		<div class="row">
			<section>
				<div class="col-sm-12 col-sm-offset-0 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
				@show

				@yield('content')
				</div>
				<div class="clearfix"></div>
			</section>
		</div>
	</div>
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>