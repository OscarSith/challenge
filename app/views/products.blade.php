@extends('layout.master')

@section('content')
	<article>
		<div class="row">
			@if($data->isEmpty())
				<div class="col-sm-12 text-center">No hay productos que mostrar por el momento</div>
			@else
				@foreach($data as $rec)
				<div class="col-sm-3">
					<img src="img/productos/{{ $rec->path_thumb_img }}" alt="" class="img-responsive">
					<form>
						<button class="btn btn-sm">Agregar</button>
						<dl>
							<dt>Codigo:</dt>
							<dd>{{ $rec->codigo }}</dd>
							<dt>Nombre:</dt>
							<dd>{{ $rec->nombre }}</dd>
							<dt>Packing:</dt>
							<dd>{{ $rec->packing }}</dd>
							<dt>Precio: {{ $rec->precio }}</dt>
						</dl>
					</form>
				</div>
				@endforeach
			@endif
		</div>
	</article>
@stop