<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Oscar Larriega">
	<title>Challenge</title>
	<link href="css/main.min.css" rel="stylesheet">
</head>
<body class="cover {{ $background }}">
	<div class="container">
		<div class="row">
			<div class="hidden-xs" id="space-top"></div>
			<header class="col-sm-12 col-sm-offset-0 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
				<div class="row text-center">
					<a href="/">
						<img src="img/logo_challenge.png" alt="Logo Challenge">
					</a>
				</div>
				<h1 class="text-center">CHALLENGER PERÚ</h1>
				<nav>
					<ul class="nav nav-pills nav-justified">
						<li {{ $background === 'home' ? 'class="nav-active"' :''}}>
							<a href="/">INICIO</a>
						</li>
						<li {{ $background === 'us' ? 'class="nav-active"' :''}}>
							<a href="nosotros">NOSOTROS</a>
						</li>
						<li {{ $background === 'product' ? 'class="nav-active"' :''}}>
							<a href="productos">PRODUCTOS</a>
						</li>
						<li {{ $background === 'events' ? 'class="nav-active"' :''}}>
							<a href="eventos">EVENTOS</a>
						</li>
						<li {{ $background === 'contact' ? 'class="nav-active"' :''}}>
							<a href="contacto" class="mr0">CONTACTO</a>
						</li>
					</ul>
				</nav>
			</header>
		</div>
		<div class="row">
			<section>
				@if($background === 'product')
					<div class="col-md-5 col-lg-6 hidden-xs hidden-sm" id="main-product">
						<div id="content-product" class="row">
							<div id="content-img" class="mb20 text-center">
								<img src="#" alt="" class="img-responsive center-block">
							</div>
							<div class="col-sm-8 col-sm-offset-2 text-left">
								<button class="btn btn-link btn-cha">Cotizar</button>
								<p>
									<strong>Código: </strong><span id="content-cod"></span>
								</p>
								<p>
									<strong>Nombre: </strong><span id="content-name"></span>
								</p>
								<p>
									<strong>Packing: </strong><span id="content-pack"></span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-sm-offset-0 col-md-7 col-lg-6">
				@else
					<div class="col-sm-12 col-sm-offset-0 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
				@endif
				@show
				@yield('content')
				</div>
				<div class="clearfix"></div>
			</section>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$('#btn-show-more-home').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			$('#show-more-home').fadeIn('fast', function() {
				$this.remove();
			});
		});
		var $co = $('#content-products').on('click', '.content-product-img', function() {
			var $this = $(this),
				$form = $this.next();

			$this.closest('.row').find('.product-selected').removeClass('product-selected');
			$this.parent().addClass('product-selected');
			$('#content-img img').attr('src', 'img/productos/'+$this.data('img'));
			$('#content-cod').text($form.find('span').first().text().trim());
			$('#content-name').text($form.find('.nom').text().trim());
			$('#content-pack').text($form.find('span').last().text().trim());
		}).find('.col-sm-3:first .content-product-img').click();
	</script>
</body>
</html>