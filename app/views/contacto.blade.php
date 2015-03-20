@extends('layout.master')

@section('content')
	<article>
		{{ Form::open(array('url' => 'send', 'role' => 'form')) }}
			<div class="form-group">
				<input type="text" name="fullname" class="form-control" placeholder="Nombre completo">
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Correo electrónico">
			</div>
			<div class="form-group">
				<textarea name="message_send" class="form-control" rows="7" placeholder="Escriba su mensaje...">{{ $message }}</textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-link btn-cha">ENVIAR</button>
			</div>
			@if(Session::has('success'))
			<div class="alert alert-block alert-success">{{ Session::get('success') }}</div>
			@endif
		{{ Form::close() }}
	</article>
@stop