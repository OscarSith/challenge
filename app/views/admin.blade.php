@extends('layout.admin_master')

@section('content')
	<h2 class="page-header">Listado de productos</h2>
	{{ $productos->links() }}
	<div class="row">
		@foreach($productos as $rec)
			<div class="col-sm-4 col-md-3">
				<div class="thumbnail">
					<img src="img/productos/{{ $rec->path_thumb_img }}" alt="{{ $rec->path_thumb_img }}" style="height:170px">
					<div class="caption">
						<h3>{{ $rec->codigo }}</h3>
						<p style="height:80px">{{ $rec->nombre }}</p>
						<p><strong>Packing:</strong> {{ $rec->packing }}</p>
						<small>Creado el: {{ $rec->created_at }}</small>
						{{-- <p>
							<a href="#" class="btn btn-primary" role="button">Button</a>
							<a href="#" class="btn btn-default" role="button">Button</a>
						</p> --}}
					</div>
				</div>
			</div>
		@endforeach
	</div>
	{{ $productos->links() }}
@stop