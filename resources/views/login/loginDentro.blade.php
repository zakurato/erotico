<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Magic Sex Shop</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?2.0') }}">
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('logout') }}">Cerrar sesion</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>
    <br><br>
    <a href="{{ route('formCrearCategoria') }}">
        <input type="button" value="Crear categoría">
    </a>
    <br><br><br>
        <a href="{{ route('formCrearColores') }}">
        <input type="button" value="Crear colores">
    </a>
    <br><br><br>
    <a href="{{ route('formCrearProducto') }}">
        <input type="button" value="Crear producto">
    </a>

    <br><br>
    {{ session('eliminarProducto') }}
    {{ session('correctoActualizarProducto') }}

    <br><br>
    <div class="row row-cols-2 g-3">
        @foreach ($productos as $item)
            <div class="col">
                <div class="card">
                    <img style="width: 180px; height: 180px;" src="imagesProductos/{{ $item->imagen }}"
                        class="card-img-top"alt="" />
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->nombre }}</h4>
                        <p class="card-text">
                            Cantidad: {{ $item->cantidad }}
                        </p>
                        <div style="display: flex; align-items: center;   gap: 10px; ">
                            <p>
                            <form id="actualizarForm" action="{{ route('actualizarProducto') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green"
                                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                        <path
                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                    </svg>
                                </button>
                            </form>
                            </p>
                            <p class="card-text">
                            <form id="eliminarForm" action="{{ route('eliminarProducto') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este producto {{ $item->nombre }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 512 512">
                                        <path d="M296,64H216a7.91,7.91,0,0,0-8,8V96h96V72A7.91,7.91,0,0,0,296,64Z"
                                            style="fill:red" />
                                        <path d="M292,64H220a4,4,0,0,0-4,4V96h80V68A4,4,0,0,0,292,64Z"
                                            style="fill:red" />
                                        <path
                                            d="M447.55,96H336V48a16,16,0,0,0-16-16H192a16,16,0,0,0-16,16V96H64.45L64,136H97l20.09,314A32,32,0,0,0,149,480H363a32,32,0,0,0,31.93-29.95L415,136h33ZM176,416l-9-256h33l9,256Zm96,0H240V160h32ZM296,96H216V68a4,4,0,0,1,4-4h72a4,4,0,0,1,4,4Zm40,320H303l9-256h33Z"
                                            style="fill:red" />
                                    </svg>
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
