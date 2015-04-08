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
	@if($background === 'home')
	<video id="video" autoplay="autoplay" preload="auto" loop="loop">
		<source src="{{ asset('') }}/Secuencia_01.mp4" type="video/mp4"></source>
		<!--<source src="/videoplaneta.ogv" type="video/ogv"></source>-->
	</video>
	@endif
	<div class="fluid-container">
		<div class="container" id="wrap">
			<div class="row">
				<div class="hidden-xs" id="space-top"></div>
				<header class="col-sm-12 col-sm-offset-0 col-md-7 col-md-offset-5 col-lg-6 col-lg-offset-6">
					<div class="row text-center">
						<a href="{{ route('home') }}" class="wow pulse">
							<img src="{{ asset('img/logo_challenge.png') }}" alt="Logo Challenge" id="logo">
						</a>
					</div>
					<h1 class="text-center wow slideInRight">CHALLENGER EVENTOS</h1>
					<nav class="wow fadeInDown">
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
								<div class="col-sm-4 wow slideInLeft animated">
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
								<div class="col-sm-8" data-wow-duration="3s">
									<div id="content-product" class="row">
										<div id="content-img" class="mb20 text-center">
											<img src="#" alt="" class="img-responsive center-block wow bounceIn">
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
						<div class="col-sm-8 col-md-2 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
							<ul class="nav nav-stacked wow slideInLeft animated" role="tablist" id="tablista">
								<li role="presentation" class="active">
									<a href="#celebrations">Celebraciones</a>
								</li>
								<li role="presentation">
									<a href="#fuegos-artificiales">Fuegos Artificiales</a>
								</li>
								<li role="presentation">
									<a href="#armados">Armados</a>
								</li>
								<li role="presentation">
									<a href="#seguridad">Seguridad</a>
								</li>
								<li role="presentation">
									<a href="#videos">Video</a>
								</li>
							</ul>
							<div id="main-events" class="hidden">
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
	</div>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/wow.min.js') }}"></script>
	<script>
		// $('#logo').on('mouseover mouseleave', function(e){
		// 	var $this = $(this);
		// 	if (e.type === 'mouseover') {
		// 		$this.attr('src', '{{ asset('img') }}/logo_challenge_alt.png');
		// 	} else {
		// 		$this.attr('src', '{{ asset('img') }}/logo_challenge.png');
		// 	}
		// });
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
					var img = '<img src="{{ asset('img') }}/productos/'+$this.children().data('img')+'" alt="" class="img-responsive center-block wow bounceIn animated" data-wow-duration=".5s">';
					$('#content-img').html(img);
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
			$('#tablista a').click(function (e) {
				e.preventDefault()
				$(this).tab('show')
			});
			var $modal = $('#modalVideos');
			$modal.on('show.bs.modal', function(e) {
				var $target = $(e.relatedTarget),
					title = $target.data('title'),
					src = $target.data('src'),
					modal = $(this);
				modal.find('.modal-title').text(title);
				modal.find('#content-video').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+src+'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>');
			});
			$modal.on('hidden.bs.modal', function(e) {
				$(this).find('#content-video').empty();
			});
		};

		@if($background === 'home')
		function bgadj(){
			var videoActualWidth = video.getBoundingClientRect().width;
			var videoActualHeight = video.getBoundingClientRect().height;

			var ratio =  videoActualWidth / videoActualHeight;
			var $video = $(video);

			if ((window.innerWidth / window.innerHeight) < ratio) {

				$video.css({'width': 'auto', 'height': '100%'});

				// si el vídeo es mas ancho que la ventana lo centro. Esta parte es opcional
				if (videoActualWidth > window.innerWidth){

					var ajuste = (window.innerWidth - videoActualWidth)/2;

					$video.css('left', ajuste+"px");
				}
			} else {
				$video.css({'width': '100%', 'height': 'auto', 'left': '0'});
			}
		}
		bgadj();

		// vuelvo a llamar a la función  bgadj() al redimensionar la ventana
		window.onresize = function() {
			bgadj();
		}
		@endif
		new WOW().init();
	</script>
</body>
</html>