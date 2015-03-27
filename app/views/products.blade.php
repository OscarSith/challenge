@extends('layout.master')

@section('content')
	<article>
		<div class="row" id="content-products">
			@if($data->isEmpty())
				<div class="col-sm-12 text-center">No hay productos que mostrar por el momento</div>
			@else
				<?php $n = 1; ?>
				@foreach($data as $rec)
					<?php
					$cancel = false;
					$route = 'addToCart';
					?>
					@if(Session::has('product'))
						@foreach(Session::get('product') as $val)
							@if($val['id'] == $rec->id)
								<?php
								$cancel = true;
								$route = 'removeToCart';
								break;
								?>
							@endif
						@endforeach
					@endif
					<div class="col-sm-15 {{ $cancel ? 'product-selected pselected' : ''}}">
						<div class="thumbnail" data-id="prod{{ $rec->id }}">
							<img data-img="{{ $rec->path_thumb_img }}" src="{{ asset('img/productos/'.$rec->path_thumb_img) }}" alt="{{ $rec->path_thumb_img }}">
							<div class="caption">
								{{ Form::open(array('route' => $route, 'role' => 'form', 'method'=>"post")) }}
									{{ Form::hidden('id', $rec->id) }}
									{{ Form::hidden('name', $rec->nombre) }}
									{{ Form::hidden('codigo', $rec->codigo) }}
									<button class="btn btn-xs btn-link btn-cha mb5 btn-cotizar">
										{{ $cancel ? 'Cancelar' : 'Agregar' }}
									</button>
									<a href="{{ route('contacto') }}" class="btn btn-xs btn-link btn-cha mb5 pull-right visible-xs visible-sm btn-cotizar">Cotizar</a>
									<dl>
										<dt>Codigo: <span>{{ $rec->codigo }}</span></dt>
										<dt>Nombre:</dt>
										<dd>{{ $rec->nombre }}</dd>
										<dt>Packing: <span>{{ $rec->packing }}</span></dt>
									</dl>
								{{ Form::close()}}
							</div>
						</div>
					</div>
					@if($n == 5)
					<div class="clearfix"></div>
					@endif
					<?php $n++; ?>
				@endforeach
				<div class="col-sm-12 text-center">
					{{ $data->links() }}
				</div>
			@endif
		</div>
	</article>
@stop