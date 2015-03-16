@extends('layout.admin')

@section('content')
	{{Form::open(array('route' => 'addProduct', 'role' => 'form', 'id' => 'addProduct'))}}
		<div class="form-group">
			{{ Form::text('codigo', null, array('class' => 'form-control', 'placeholder' => 'Codigo')) }}
		</div>
		<div class="form-group">
			{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
		</div>
		<div class="form-group">
			{{ Form::text('cracking', null, array('class' => 'form-control', 'placeholder' => 'Cracking')) }}
		</div>
		<div class="form-group">
			{{ Form::text('packing', null, array('class' => 'form-control', 'placeholder' => 'Packing')) }}
		</div>
		<div class="form-group">
			{{ Form::text('precio', null, array('class' => 'form-control', 'placeholder' => 'Precio')) }}
		</div>
		<div class="form-group">
			{{ Form::text('path_img', null, array('class' => 'form-control', 'placeholder' => 'Path_img')) }}
		</div>
		<div class="form-group">
			{{ Form::text('path_thumb_img', null, array('class' => 'form-control', 'placeholder' => 'Path_thumb_img')) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
		</div>
	{{Form::close()}}
@stop