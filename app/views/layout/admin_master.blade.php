<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="author" content="Oscar Larriega <larriega@gmail.com>">

    <title>{{ $title }}</title>
    <!-- Custom CSS -->
    <link href="css/admin.min.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin', 1) }}">Challenge Eventos</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                </li>
                <li class="dropdown">
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->full_name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="signout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="{{ route('admin', 1) }}"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#modal-product">
                            <i class="fa fa-fw fa-bar-chart-o"></i> Agregar Producto
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
				@show

				@yield('content')
			</div>
        </div>
    </div>
    <div class="modal fade" id="modal-product" role="dialog" aria-labelledby="modalProduct" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalProduct">Agregar Producto</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('route' => 'addProduct', 'role' => 'form', 'id' => 'addProduct', 'files' => true))}}
                        {{ Form::hidden('precio', 0.00) }}
                        <div class="form-group">
                            {{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{ Form::text('codigo', null, array('class' => 'form-control', 'placeholder' => 'Codigo')) }}
                                </div>
                                <div class="col-sm-6">
                                    {{ Form::text('packing', null, array('class' => 'form-control', 'placeholder' => 'Packing')) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    {{ Form::select('categoria_id', $dataCategorias, null, array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::file('path_thumb_img') }}
                        </div>
                    {{Form::close()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-save">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('#btn-save').on('click', function() {
            var $this = $(this),
                $form = $this.parent().prev().find('form');

            $form.submit();
            $this.prop('disabled', true).text('Subiendo imagen, espere por favor...');
        });
        $('#cbo-categoria').on('change', function(e) {
            var value = $(this).val(),
                url = location.href;

            url = url.split('-');
            url.pop();
            url.push(value);
            location.href = url.join('-');
        });
    </script>
</body>
</html>