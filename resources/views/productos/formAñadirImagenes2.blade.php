<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form Añadir Imagenes</title>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">

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
                <a class="navbar-brand" href="{{ route('crearProducto') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div style="text-align: center">
        <img style="width: 380px; height: 380px;" src="imagesProductos/{{ $producto->imagen }}" alt="">
    </div>

    <h1>Añadir producto con el color {{ $color }} seleccionado</h1>
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
    <br><br>
    <div class="container" style="background-color: darkseagreen; border: solid 1px;">
        <form action="{{ route('storeProductoFotos') }}" method="POST" accept-charset="UTF-8"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $producto->id }}">
            <input type="hidden" name="color" value="{{ $color }}">

            <div class="form-group">
                <label>Seleccionar imágenes</label>
                <input type="file" name="image[]" class="form-control" multiple required id="campoTexto">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione el tamaño</label>
                <select class="form-control" name="tamaño">
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
                <input type="number" class="form-control" name="cantidad" required>
            </div>
            <br><br>
            <button type="submit" class="btn btn-default">Añadir</button>
        </form>
    </div>


</body>



<script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }
</script>

</html>
