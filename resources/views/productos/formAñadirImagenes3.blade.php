<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form Añadir Imagenes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">

</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('loginDentro') }}">Inicio</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>

    @if ($producto->imagen != "" && $producto->color == $color)
        <div style="text-align: center">
            <img style="width: 380px; height: 380px;" src="imagesProductos/{{ $producto->imagen }}" alt="">
        </div>
    @else
        <div style="text-align: center">
            <img style="width: 380px; height: 380px;" src="imagesProductos/{{ $fotoColor->imagen }}" alt="">
        </div>
    @endif


    <h1>Añadir tamaño-cantidades o imagenes con el color {{ $color }} seleccionado</h1>
    <br><br><br>
    {{ session('productoCreadoCorrectamenteFotosImagenes') }}
    {{ session('productoCreadoCorrectamenteFotosTamaño') }}
    {{ session('eliminarProducto') }}
    <br><br><br>
    <form action="{{ route('colorSeleccionado') }}" method="GET" id="myForm">
        @csrf
        <!-- Agrega esta directiva si estás utilizando Laravel -->
        <input type="hidden" name="id" value="{{ $producto->id }}">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione el color</label>
            <select class="form-control" name="color" required id="campoTexto" onchange="submitForm()">
                <option selected disabled></option>
                <option value="NINGUNO">NINGUNO</option>
                @foreach ($colores as $item)
                    <option>{{ $item->nombreColor }}</option>
                @endforeach
            </select>
        </div>
    </form>


    <div class="container">
        <div style="background-color: darkseagreen; border: solid 1px;">
            <label>
                <input type="checkbox" id="myCheckbox" onclick="toggleInputVisibility()"> Añadir imagenes
            </label>
            <br><br>
            <div id="myInput" style="display: none;">
                <form action="{{ route('storeProductoFotosImagenes') }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $producto->id }}">
                    <input type="hidden" name="color" value="{{ $color }}">

                    <div class="form-group">
                        <label>Seleccionar imágenes</label>
                        <input type="file" name="image[]" class="form-control" multiple required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">Añadir</button>
                </form>
            </div>
        </div>
        <br><br>
        <div style="background-color: darkseagreen; border: solid 1px;">

            <label>
                <input type="checkbox" id="myCheckbox2" onclick="toggleInputVisibility2()"> Añadir tamaños - cantidad
            </label>
            <br><br>
            <div id="myInput2" style="display: none;">
                <form action="{{ route('storeProductoFotosTamañoCantidad') }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $producto->id }}">
                    <input type="hidden" name="color" value="{{ $color }}">

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Seleccione el tamaño</label>
                        <select class="form-control" name="tamaño" required>
                            <option>NINGUNO</option>
                            @foreach ($tamaños as $item)
                                <option>{{ $item->tamaño }}cm</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cantidad del producto:</label>
                        <input type="text" class="form-control" name="cantidad" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">Añadir</button>
                </form>
            </div>
        </div>
    </div>
    <h1>Tabla productos color {{ $color }}</h1>
    <br><br><br>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Color</th>
                <th>Tamaño</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if ($producto->color == $color)
                <tr>
                    <th style="width: 150px; height: 150px;"><img style="width: 100px; height: 100px;"
                            src="imagesProductos/{{ $producto->imagen }}" alt=""></td>
                    <th style="width: 150px; height: 150px;">{{ $producto->color }}</td>
                    <th style="width: 150px; height: 150px;">{{ $producto->tamaño }}</td>
                    <th style="width: 150px; height: 150px;">{{ $producto->cantidad }}</td>
                </tr>
            @endif
            @foreach ($fotos as $item)
                @if ($item->color == $color && $item->idFK == $producto->id)
                    <tr>

                        @if ($item->imagen == 'formTamañosCantidades')
                            <th style="width: 150px; height: 150px;">Solo se inserto tamaño y cantidad</td>
                            <th style="width: 150px; height: 150px;">{{ $item->color }}</td>
                            <th style="width: 150px; height: 150px;">{{ $item->tamaño }}</td>
                            <th style="width: 150px; height: 150px;">{{ $item->cantidad }}</td>
                            <th>
                                <form action="{{ route('eliminarProductoTablaFotos') }}" method="GET">
                                    @csrf
                                    <input type="text" name="id" value="{{ $item->id }}" hidden>
                                    <button type="submit" class="bntEliminarCategoria"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar el producto')">
                                        <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                                        <br><br>
                                    </button>
                                </form>
                            </th>
                        @else
                            @if ($item->tamaño == 'formImagenes')
                                <th style="width: 150px; height: 150px;"><img style="width: 100px; height: 100px;"
                                        src="imagesProductos/{{ $item->imagen }}" alt=""></td>
                                <th style="width: 150px; height: 150px;">{{ $item->color }}</td>
                                <th style="width: 150px; height: 150px;">Solo se interto imagen</td>
                                <th style="width: 150px; height: 150px;">Solo se interto imagen</td>
                                <th>
                                    <form action="{{ route('eliminarProductoTablaFotos') }}" method="GET">
                                        @csrf
                                        <input type="text" name="id" value="{{ $item->id }}" hidden>
                                        <button type="submit" class="bntEliminarCategoria"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar el producto')">
                                            <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                                            <br><br>
                                        </button>
                                    </form>
                                </th>
                            @else
                                <th style="width: 150px; height: 150px;"><img style="width: 100px; height: 100px;"
                                        src="imagesProductos/{{ $item->imagen }}" alt=""></td>
                                <th style="width: 150px; height: 150px;">{{ $item->color }}</td>
                                <th style="width: 150px; height: 150px;">{{ $item->tamaño }}</td>
                                <th style="width: 150px; height: 150px;">{{ $item->cantidad }}</td>
                            @endif
                        @endif
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>


</body>



<script>
    function submitForm() {
        //cambiar formulario para los colores
        document.getElementById("myForm").submit();
    }
</script>


<script>
    //activar el checkbox de las imagenes
    function toggleInputVisibility() {
        var checkbox = document.getElementById("myCheckbox");
        var input = document.getElementById("myInput");

        if (checkbox.checked) {
            input.style.display = "block"; // Mostrar el campo de entrada
        } else {
            input.style.display = "none"; // Ocultar el campo de entrada
        }
    }
</script>

<script>
    function submitForm() {
        //cambiar formulario para los colores
        document.getElementById("myForm").submit();
    }
</script>


<script>
    //activar el checkbox de las tamaños - cantidades
    function toggleInputVisibility2() {
        var checkbox = document.getElementById("myCheckbox2");
        var input = document.getElementById("myInput2");

        if (checkbox.checked) {
            input.style.display = "block"; // Mostrar el campo de entrada
        } else {
            input.style.display = "none"; // Ocultar el campo de entrada
        }
    }
</script>

</html>
