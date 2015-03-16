<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Challenge | Admin</title>
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1 class="text-center">
						<a href="/">
							<img src="{{ asset('img/logo-cv.png') }}" alt="Logo Challenge" id="logo">
						</a>
					</h1>
					<hr>
					@show

					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<script>
		var form = document.getElementsByTagName('form')[0];
		form.addEventListener('submit', function(){
			var btn = document.getElementById('btn-sign-in');

			btn.innerHTML = '<i class="fa fa-refresh fa-spin"></i> {{ $txt_loading }}...';
			btn.disabled = true;
		});
	</script>
</body>
</html>