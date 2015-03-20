@extends('layout.master')

@section('content')
	<article>
		<div class="row" id="content-products">
			@if($data->isEmpty())
				<div class="col-sm-12 text-center">No hay productos que mostrar por el momento</div>
			@else
				@foreach($data as $rec)
					<?php $disabled = ''; ?>
					@if(Session::has('product'))
						@foreach(Session::get('product') as $val)
							@if($val['id'] == $rec->id)
								<?php
								$disabled = 'disabled';
								break;
								?>
							@endif
						@endforeach
					@endif
					<div class="col-sm-3">
						<div class="content-product-img" data-img="{{ $rec->path_thumb_img }}" style="background-image: url('img/productos/{{ $rec->path_thumb_img }}')">
						</div>
						{{ Form::open(array('route' => 'addToCart', 'role' => 'form', 'method'=>"post")) }}
							{{ Form::hidden('id', $rec->id) }}
							{{ Form::hidden('name', $rec->nombre) }}
							<button class="btn btn-xs btn-link btn-cha mb5" {{ $disabled }}>
								{{ $disabled === 'disabled' ? 'Agregado' : 'Agregar' }}
							</button>
							<dl>
								<dt>Codigo: <span>{{ $rec->codigo }}</span></dt>
								<dt>Nombre:</dt>
								<dd class="nom">{{ $rec->nombre }}</dd>
								<dt>Packing: <span>{{ $rec->packing }}</span></dt>
							</dl>
						{{ Form::close()}}
					</div>
				@endforeach
				<div class="col-sm-12 text-center">
					{{ $data->links() }}
				</div>
			@endif
		</div>
	</article>
@stop