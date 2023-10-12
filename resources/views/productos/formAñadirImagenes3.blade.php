<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form Añadir Imagenes2</title>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">

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
                <a class="navbar-brand" href="{{ route('crearProducto') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

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
                                <option>
                                    @if (is_numeric($item->tamaño))
                                        {{ $item->tamaño }}cm
                                    @else
                                        {{$item->tamaño}}
                                    @endif
                                </option>
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
                <th>Producto de temporada</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            {{-- Filas con imágenes --}}
            @foreach ($fotos as $item)
                @if ($item->color == $color && $item->idFK == $producto->id && $item->imagen != 'formTamañosCantidades')
                    <tr>
                        <td style="width: 150px; height: 150px;"><img style="width: 100px; height: 100px;" src="imagesProductos/{{ $item->imagen }}" alt=""></td>
                        <td style="width: 150px; height: 150px;">{{ $item->color }}</td>
                        <td style="width: 150px; height: 150px;">{{ $item->tamaño }}</td>
                        <td style="width: 150px; height: 150px;">{{ $item->cantidad }}</td>
                        <td style="width: 150px; height: 150px;">
                                <div class="form-check">
                                    <input id="temporadaCheckbox{{$item->id}}" type="checkbox" name="temporada" <?php echo $item->temporada == 1 ? 'checked' : ''; ?>>
                                </div>
                        </td>
                        <td>
                            <form action="{{ route('eliminarProductoTablaFotos') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria" onclick="return confirm('¿Estás seguro de que deseas eliminar el producto')">
                                    <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach


            <script>
                // Obtén todos los checkboxes por su nombre
                var checkboxes = document.querySelectorAll('input[name="temporada"]');
            
                // Agrega un evento de escucha a cada checkbox
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            var id =  this.id.replace("temporadaCheckbox","");
                            console.log(id);

                            // Realizar la petición AJAX
                        $.ajax({
                            type: "GET",
                            url: "http://shopiscr.com/cambiarTemporadaFotos",  // Reemplaza con la URL de tu script de procesamiento
                            data: { id: id },
                            success: function(response) {
                                // Aquí puedes manejar la respuesta del servidor si es necesario
                                location.reload();
                            }
                        });
                        } 
                    });
                });
            </script>


    
            {{-- Filas con texto "Solo se inserto tamaño y cantidad" --}}
            @foreach ($fotos as $item)
                @if ($item->color == $color && $item->idFK == $producto->id && $item->imagen == 'formTamañosCantidades')
                    <tr>
                        <td style="width: 150px; height: 150px;">{{ $item->imagen }}</td>
                        <td style="width: 150px; height: 150px;">{{ $item->color }}</td>
                        <td style="width: 150px; height: 150px;">{{ $item->tamaño }}</td>
                        <td style="width: 150px; height: 150px;">{{ $item->cantidad }}</td>
                        <td>
                            <form action="{{ route('eliminarProductoTablaFotos') }}" method="GET">
                                @csrf
                                <input type="text" name="id" value="{{ $item->id }}" hidden>
                                <button type="submit" class="bntEliminarCategoria" onclick="return confirm('¿Estás seguro de que deseas eliminar el producto')">
                                    <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                                </button>
                            </form>
                        </td>
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
