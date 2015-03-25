<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Oscar Larriega">
	<title>Challenge</title>
	<link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
</head>
<body class="cover {{ $background }}">
	<div class="container" id="wrap">
		<div class="row">
			<div class="hidden-xs" id="space-top"></div>
			<header class="col-sm-12 col-sm-offset-0 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
				<div class="row text-center">
					<a href="{{ route('home') }}">
						<img src="{{ asset('img/logo_challenge.png') }}" alt="Logo Challenge">
					</a>
				</div>
				<h1 class="text-center">CHALLENGER PERÚ</h1>
				<nav>
					<ul class="nav nav-pills nav-justified">
						<li {{ $background === 'home' ? 'class="nav-active"' :''}}>
							<a href="{{ route('home') }}">INICIO</a>
						</li>
						<li {{ $background === 'us' ? 'class="nav-active"' :''}}>
							<a href="{{ route('nosotros') }}">NOSOTROS</a>
						</li>
						<li {{ $background === 'product' ? 'class="nav-active"' :''}}>
							<a href="{{ route('productos', array('novedades', 1))}}">PRODUCTOS</a>
						</li>
						<li {{ $background === 'events' ? 'class="nav-active"' :''}}>
							<a href="{{ route('evento') }}">EVENTOS</a>
						</li>
						<li {{ $background === 'contact' ? 'class="nav-active"' :''}}>
							<a href="{{ route('contacto') }}" class="mr0">CONTACTO</a>
						</li>
					</ul>
				</nav>
			</header>
		</div>
		<div class="row">
			<section>
				@if($background === 'product')
					<div class="col-md-5 col-lg-6 hidden-xs hidden-sm" id="main-product">
						<div class="row">
							<div class="col-sm-4">
								<?php
								$path = explode('-', $_SERVER['REQUEST_URI']);
								$arr = array();
								?>
								<ul class="nav nav-stacked">
								@foreach($categorias->toArray() as $rec)
									<?php $arr[$rec['id']] = $rec['nombre'] ?>
									<li id="pl{{ $rec['id'] }}">
										<a href="{{ route('productos', array($rec['path'], $rec['id'])) }}" class="{{ $rec['id'] == $path[1] ? 'category-selected' : ''}}">
											{{ $rec['nombre'] }}
										</a>
									</li>
								@endforeach
								</ul>
							</div>
							<div class="col-sm-8">
								<div id="content-product" class="row">
									<div id="content-img" class="mb20 text-center">
										<img src="#" alt="" class="img-responsive center-block">
									</div>
									<div class="col-sm-8 col-sm-offset-2 text-left">
										<div class="text-center">
											<a class="btn btn-cha btn-lg mb20" href="contacto">Cotizar</a>
										</div>
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
						</div>
					</div>
					<div class="visible-xs visible-sm col-sm-6 col-sm-offset-3">
						{{ Form::select('categoria_id', $arr, $path[1], array('class' => 'form-control mb20', 'id' => 'cat_id')) }}
					</div>
					<div class="col-sm-12 col-md-7 col-lg-6">
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
	<footer>
		<div class="container">
			<div class="pull-left">
				<a href="https://www.facebook.com/challengerbusinessperu" target="_blank" class="fa-stack fb">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x"></i>
				</a>
				<a href="https://www.youtube.com/channel/UC4GiqmS4WLq6i6v3tFI0cjA" target="_blank" class="fa-stack yt">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-youtube fa-stack-1x"></i>
				</a>
				<p class="mb0"><i class="fa fa-copyright"></i> Copyright 2015</p>
			</div>
			<small class="pull-right">
				<em>Miembro de la asociación de Importadores, Fabricantes y<br>Comercializadores de Productos Pirotécnicos del Perú.</em>
			</small>
		</div>
	</footer>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script>
		$('#btn-show-more-home').on('click', function(e) {
			e.preventDefault();
			var $this = $(this);
			$('#show-more-home').fadeIn('fast', function() {
				$this.remove();
			});
		});

		var $products = $('#content-products');
		if ($products.length) {
			var id = 0;
			$products.on('mouseover', '.thumbnail', function() {
				var $this = $(this),
					prodID = $this.data('id');

				if (prodID != id) {
					var $form = $this.find('form');
					$this.closest('.row').children('.product-selected:not(.pselected)').removeClass('product-selected');
					$this.parent().addClass('product-selected');
					$('#content-img img').attr('src', '{{ asset('') }}img/productos/'+$this.children().data('img'));
					$('#content-cod').text($form.find('span').first().text().trim());
					$('#content-name').text($form.find('dd').text().trim());
					$('#content-pack').text($form.find('span').last().text().trim());
					id = prodID;
				}
			}).find('.col-sm-15:first .thumbnail').mouseover();

			$products.on('submit', 'form', function(e) {
				e.preventDefault();
				var $this = $(this),
					data = $this.serialize(),
					$inputs = $this.find(':input'),
					url = $this.attr('action');

				$inputs.prop('disabled', true);
				$inputs.last().text('Procesando...');
				$.ajax({
					url: url,
					data: data,
					type: 'POST',
					dataType: 'json'
				}).done(function(rec) {
					$inputs.prop('disabled', false);
					url = url.split('/');
					url.pop();
					if (rec.type === 'add') {
						url.push('remove-selected-product');
						$this.closest('.col-sm-15').addClass('product-selected pselected');
						$inputs.last().text('Cancelar');
					} else {
						url.push('selected-product');
						$this.closest('.col-sm-15').removeClass('pselected');
						$inputs.last().text('Agregar');
					}
					$this.attr('action', url.join('/'));
				});
			});
			$('#cat_id').on('change', function() {
				var value = $(this).val(),
					url = $('#pl'+value+' a').attr('href');
				location.href = url;
			});
		}
	</script>
</body>
</html>