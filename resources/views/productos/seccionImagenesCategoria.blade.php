<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seccion imagenes categorias</title>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('loginDentro') }}">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('crearProducto') }}">Crear producto</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('vistaReporteFacturas') }}">Reportes de facturas</a></li>
                </ul>
                <ul class="nav navbar-nav">
                  <li><a href="{{ route('seccionImagenesCategoria') }}">Seccion de imagenes categorias</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('seccionImagenInicial') }}">Seccion de imagen inicial</a></li>
                </ul>
              <ul class="nav navbar-nav">
                <li><a href="{{ route('logout') }}">Cerrar sesion</a></li>
              </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <br><br>
    <a href="{{ route('formCrearProductoSeccionCategoria') }}">
        <input type="button" value="Crear seccion categoria" class="btn btn-primary">
    </a>
    <br><br>

    <div class="row row-cols-2 g-3">
        @foreach ($seccionProductoCategories as $item)
            <div class="col">
                <div class="card" style="height: 300px">
                    <img style="width: 180px; height: 180px;" src="imagesSeccionProductoCategoria/{{$item->imagenName}}"
                        class="card-img-top"alt="" />
                    <div class="card-body">
                        <br>
                        <div style="display: flex; align-items: center; gap: 10px; ">
                            <p>
                            <form id="actualizarForm" action="{{ route('editarSeccionCategoria') }}" method="GET">
                                @csrf
                                <button type="submit" class="bntEliminarCategoria">
                                    <i style="color: green" class="fa-solid fa-rotate fa-xl"></i>
                                    <input type="hidden" value="{{$item->id}}" name="idEditar">
                                    <br><br>
                                    <p>Editar producto</p>
                                </button>
                            </form>
                            </p>


                            <p class="card-text">
                            <form id="eliminarForm" action="{{ route('eliminarSeccionCategoria') }}" method="POST">
                                @csrf
                                <button type="submit" class="bntEliminarCategoria"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar el producto ">
                                    <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                                    <input type="hidden" value="{{$item->id}}" name="idEliminar">
                                    <br><br>
                                    <p>Eliminar</p>
                                </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



</body>

</html>
