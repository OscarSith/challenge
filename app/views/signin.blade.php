@extends('layout.admin')

@section('content')
{{ Form::open(array('route' => 'signin', 'role' => 'form', 'id' => 'signin')) }}
	<div class="form-group has-feedback">
		{{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Correo', 'autofocus', 'required')) }}
		<span class="fa fa-envelope form-control-feedback feedback-fix"></span>
	</div>
	<div class="form-group has-feedback">
		{{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña', 'required')) }}
		<span class="fa fa-lock form-control-feedback feedback-fix"></span>
	</div>
	<div>
		<div class="pull-left checkbox">
			<label>
				{{ Form::checkbox('remember') }} Recordarme 
			</label>
		</div>
		<!-- <div class="pull-right" id="forgot-pass">
			<a href="password">¿Olvidaste tu contraseña?</a>
		</div> -->
		<div class="clearfix"></div>
	</div>
	<div class="form-group">
		<button class="btn btn-warning" id="btn-sign-in">
			<i class="fa fa-sign-in"></i>
			Entrar
		</button>
	</div>
	@if (Session::has('login_error'))
		<div class="alert alert-danger" role="alert">Correo o clave incorrecta</div>
	@elseif (Session::has('suspended'))
		<div class="alert alert-warning" role="alert">Su cuenta ha sido suspendida por falta de pago</div>
	@elseif (Session::has('removed'))
		<div class="alert alert-danger" role="alert">Su cuenta ha sido eliminada, contacte con administración</div>
	@elseif (Session::has('pending'))
		<div class="alert alert-warning" role="alert">Su cuenta está pendiente, se activará al inicio de su contrato</div>
	@endif
	@if (Session::has('password_changed'))
		<div class="alert alert-info" role="alert">{{ Session::get('password_changed') }}</div>
	@endif
{{ Form::close() }}
@stop