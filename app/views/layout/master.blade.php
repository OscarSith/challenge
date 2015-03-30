<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="Se especializada en la realización de espectáculos de fuegos artificiales y efectos especiales diurnos y nocturnos a nivel nacional, contamos con más de veinte años de experiencia profesional">
	<meta name="author" content="Oscar Larriega">
	<title>Challenge Eventos</title>
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
				<h1 class="text-center">CHALLENGER EVENTOS</h1>
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
											<a class="btn btn-cha btn-lg mb20" href="{{ route('contacto') }}">COTIZAR</a>
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
						{{ Form::select('categoria_id', $arr, $path[1], array('class' => 'form-control mb20', 'id' => 'cat_id', 'style' => 'background-color:#fff !important;color:#333')) }}
					</div>
					<div class="col-sm-12 col-md-7 col-lg-6">
				@elseif($background === 'events')
					<div class="col-md-5 col-lg-6">
						<div id="main-events">
							<h5 class="text-center">ARMADOS</h5>
							<div id="carousel-eventos" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators hidden-xs">
									<li data-target="#carousel-eventos" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-eventos" data-slide-to="1"></li>
									<li data-target="#carousel-eventos" data-slide-to="2"></li>
									<li data-target="#carousel-eventos" data-slide-to="3"></li>
									<li data-target="#carousel-eventos" data-slide-to="4"></li>
									<li data-target="#carousel-eventos" data-slide-to="5"></li>
									<li data-target="#carousel-eventos" data-slide-to="6"></li>
									<li data-target="#carousel-eventos" data-slide-to="7"></li>
									<li data-target="#carousel-eventos" data-slide-to="8"></li>
									<li data-target="#carousel-eventos" data-slide-to="9"></li>
									<li data-target="#carousel-eventos" data-slide-to="10"></li>
									<li data-target="#carousel-eventos" data-slide-to="11"></li>
									<li data-target="#carousel-eventos" data-slide-to="12"></li>
									<li data-target="#carousel-eventos" data-slide-to="13"></li>
									<li data-target="#carousel-eventos" data-slide-to="14"></li>
									<li data-target="#carousel-eventos" data-slide-to="15"></li>
								</ol>
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="img/fotos_eventos/Foto_1.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_2.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_3.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_4.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_5.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_6.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_7.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_8.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_9.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_10.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_11.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_12.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_13.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_14.jpg" alt="">
									</div>
									<div class="item">
										<img src="img/fotos_eventos/Foto_15.jpg" alt="">
									</div>
								</div>
								<a class="left carousel-control" href="#carousel-eventos" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-eventos" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
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
				<a href="https://www.facebook.com/challengerbusinessperu" target="_blank" class="fa-stack fb pull-left">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x"></i>
				</a>
				<a href="https://www.youtube.com/channel/UC4GiqmS4WLq6i6v3tFI0cjA" target="_blank" class="fa-stack yt pull-left">
					<i class="fa fa-square fa-stack-2x"></i>
					<i class="fa fa-youtube fa-stack-1x"></i>
				</a>
				<p class="mb0 pull-left"><i class="fa fa-copyright"></i> Copyright {{ (new DateTime())->format('Y')}}</p>
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

		var $products = $('#content-products'), 
			$events = $('#main-events');
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
		if ($events.length) {
			$('#carousel-eventos').on('slid.bs.carousel', function (e) {
				var data = $(this).data('bs.carousel'),
					slide = parseInt(data.$indicators.find('.active').data('slide-to')),
					title = '';

				switch(slide) {
					case 0:
					case 1:
					case 2:
					case 3:
						title = 'ARMADOS';
					break;
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
					case 9:
					case 10:
						title = 'FUEGOS ARTIFICIALES';
					break;
					case 11:
					case 12:
					case 13:
					case 14:
						title = 'SEGURIDAD';
					break;
				}
				$('#main-events>h5').text(title);
			});
		};
	</script>
</body>
</html>