<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--icono-->
    <link style="width: 16px; height: 16px;" rel="icon" href="images/icono.png" type="image/png">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
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
    <a href="{{ route('formCrearCategoria') }}">
        <input type="button" value="Crear categoría" class="btn btn-info">
    </a>
    <br><br><br>
    <a href="{{ route('formCrearColores') }}">
        <input type="button" value="Crear colores" class="btn btn-info">
    </a>
    <br><br><br>
    <a href="{{ route('formCrearTamaños') }}">
        <input type="button" value="Crear tamaños" class="btn btn-info">
    </a>
    <br><br><br>
    <a href="{{ route('formCrearProducto') }}">
        <input type="button" value="Crear producto" class="btn btn-info">
    </a>
    <br><br><br>

    <div class="mb-3">
        <form action="{{route("crearProducto")}}" method="GET">
            <label for="formGroupExampleInput" class="form-label">Buscar producto por nombre:</label>
            <input name="txtBuscar" type="text" class="form-control" id="formGroupExampleInput" placeholder="Buscar...">
            <input type="submit" value="Buscar" class="btn btn-info">
        </form>
    </div>

    <br><br>
    {{ session('eliminarProducto') }}
    {{ session('correctoActualizarProducto') }}


    <br><br>
    {{ $productos->appends(request()->input())->links('pagination::bootstrap-4') }}

    <br><br>
    <div class="row row-cols-2 g-3">
        @foreach ($productos as $item)
            <div class="col">
                <div class="card" style="margin-left: 20px">

                        <img style="width: 380px; height: 260px; object-fit: contain; background-color: #f0f0f0;" class="card-img-top" src="imagesProductos/{{ $item->imagen }}">

                    <div class="card-body">
                        <h4 class="card-title">{{ $item->nombre }}</h4>
                        <p class="card-text">
                            Color: {{ $item->color }}
                        </p>
                        <p class="card-text">
                            Tamaño: {{ $item->tamaño }}
                        </p>
                        <p class="card-text">
                            Cantidad: {{ $item->cantidad }}
                        </p>
                        <p class="card-text">
                            Precio: ₡{{ $item->precio }}
                        </p>
                        <br>
                        <div style="display: flex; align-items: center; gap: 10px; ">
                            <p>
                            <form id="actualizarForm" action="{{ route('actualizarProducto') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria">
                                    <i style="color: green" class="fa-solid fa-rotate fa-xl"></i>
                                    <br><br>
                                    <p style="color: black">Editar producto</p>
                                </button>
                            </form>
                            </p>
                            <p class="card-text">
                            <form id="formAñadirImagenes" action="{{ route('formAñadirImagenes') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria">
                                    <i style="color: black" class="fa-regular fa-images fa-xl"></i>
                                    <br><br>
                                    <p style="color: black">Añadir mas imagenes, colores, tamaños-cantidad</p>
                                </button>
                            </form>
                            </p>

                            <p class="card-text">
                            <form id="eliminarForm" action="{{ route('eliminarProducto') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar el producto {{ $item->nombre }}')">
                                    <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                                    <br><br>
                                    <p style="color: black">Eliminar</p>
                                </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br><br>
    {{ $productos->appends(request()->input())->links('pagination::bootstrap-4') }}


</body>

</html>
