@extends('layout.admin_master')

@section('content')
	<h2 class="page-header">
		<div class="row">
			<div class="col-sm-6 col-md-5">Listado de productos</div>
			<div class="col-sm-3">
				{{ Form::select('categoria_id', $dataCategorias, $id, array('class' => 'form-control', 'id' => 'cbo-categoria')) }}
			</div>
		</div>
	</h2>
	@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		{{ Session::get('error') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@elseif(Session::has('success'))
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		{{ Session::get('success') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	{{ $productos->links() }}
	<div class="row">
		<?php $n = 1; ?>
		@foreach($productos as $rec)
			<div class="col-sm-3 col-md-15">
				<div class="thumbnail {{ $rec->estado == 'I' ? 'block-red' :'' }}">
					<img src="img/productos/{{ $rec->path_thumb_img }}" alt="{{ $rec->path_thumb_img }}">
					<div class="caption">
						@if($rec->estado == 'I')
							<div class="text-center">
								<span class="label label-warning">INACTIVO</span>
							</div>
						@endif
						<h3>{{ $rec->codigo }}</h3>
						<p>{{ $rec->nombre }}</p>
						<p><strong>Packing:</strong> {{ $rec->packing }}</p>
						<small>Creado el: {{ $rec->created_at }}</small>
						<div class="mt15 mb0">
							{{ Form::open(array('url' => 'change-status', 'method' => 'put', 'role' => 'form', 'class' => 'form-inline pull-left')) }}
								<input type="hidden" name="id" value="{{ $rec->id }}">
								<input type="hidden" name="status" value="{{ $rec->estado == 'A' ? 'I' : 'A' }}">
								<div class="form-group">
									<button class="btn btn-sm btn-{{$rec->estado == 'I' ? 'success' : 'warning'}}" role="button">
										{{ $rec->estado == 'I' ? 'Activar' : 'Inactivar'}}
									</button>
								</div>
							{{ Form::close() }}
							{{ Form::open(array('url' => 'remove-product', 'method' => 'delete', 'role' => 'form', 'class' => 'form-inline pull-right'))}}
								<input type="hidden" name="id" value="{{ $rec->id }}">
								<button class="btn btn-sm btn-danger" role="button">Eliminar</button>
							{{ Form::close() }}
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			@if($n == 5)
				<div class="clearfix"></div>
			@endif
			<?php $n++; ?>
		@endforeach
	</div>
	{{ $productos->links() }}
@stop