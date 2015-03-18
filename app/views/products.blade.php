@extends('layout.master')

@section('content')
	<article>
		<div class="row" id="content-products">
			@if($data->isEmpty())
				<div class="col-sm-12 text-center">No hay productos que mostrar por el momento</div>
			@else
				@foreach($data as $rec)
				<div class="col-sm-3">
					<div class="content-product-img" data-img="{{ $rec->path_thumb_img }}" style="background-image: url('img/productos/{{ $rec->path_thumb_img }}')">
					</div>
					<form>
						<button class="btn btn-sm btn-link btn-cha">Agregar</button>
						<dl>
							<dt>Codigo: <span>{{ $rec->codigo }}</span></dt>
							<dt>Nombre:</dt>
							<dd class="nom">{{ $rec->nombre }}</dd>
							<dt>Packing: <span>{{ $rec->packing }}</span></dt>
						</dl>
					</form>
				</div>
				@endforeach
			@endif
		</div>
	</article>
@stop