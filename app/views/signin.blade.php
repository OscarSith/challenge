<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Administrador de la página web de Challenge">
    <meta name="author" content="Oscar Larriega <larriega@gmail.com>">
    <title>Admin - Challenge</title>
    <link href="css/admin.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingresar al Sistema</h3>
                    </div>
                    <div class="panel-body">
						{{ Form::open(array('route' => 'signin', 'role' => 'form', 'id' => 'signin')) }}
							<div class="form-group has-feedback">
								{{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Correo', 'autofocus', 'required')) }}
								<span class="form-control-feedback">
									<i class="fa fa-envelope fa-lg"></i>
								</span>
							</div>
							<div class="form-group has-feedback">
								{{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña', 'required')) }}
								<span class="form-control-feedback">
									<i class="fa fa-lock fa-lg"></i>
								</span>
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
							@endif
						{{ Form::close() }}
					</div>
				</div>
            </div>
        </div>
    </div>
    <script>
		var form = document.getElementsByTagName('form')[0];
		form.addEventListener('submit', function(){
			var btn = document.getElementById('btn-sign-in');

			btn.innerHTML = '<i class="fa fa-refresh fa-spin"></i> Ingresando...';
			btn.disabled = true;
		});
	</script>
</body>
</html>