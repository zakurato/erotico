<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seccion imagenes categorias</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}">
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="{{ route('loginDentro') }}">Inicio</a></li>
            <li><a href="{{ route('crearProducto') }}">Crear producto</a></li>
            <li><a href="{{ route('vistaReporteFacturas') }}">Reportes de facturas</a></li>
            <li><a href="{{ route('seccionImagenesCategoria') }}">Seccion de imagenes categorias</a></li>
            <li><a href="{{ route('logout') }}">Cerrar sesion</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>

    <br><br>
    <a href="{{ route('formCrearProductoSeccionCategoria') }}">
        <input type="button" value="Crear seccion categoria" class="btn btn-primary">
    </a>
    <br><br>

    <div class="row row-cols-2 g-3">
        @foreach ($seccionProductoCategories as $item)
            <div class="col">
                <div class="card">
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
