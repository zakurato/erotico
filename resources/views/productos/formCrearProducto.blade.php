<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear producto</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('loginDentro') }}">Inicio</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>
    <div class="container">
        <h2>Crear producto</h2>
        <br>
        {{ session('correcto') }}
        <br>
        <form action="{{ route('storeProducto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="form-group">
                <label for="exampleImage">Seleccionar imagen</label>
                <input type="file" class="form-control-file" name="imagen" required>
            </div>
            <div class="form-group">
                <label>Nombre del producto:</label>
                <input type="text" class="form-control" name="nombre"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione una categoría</label>
                <select class="form-control" name="categoria">
                    @foreach ($categorias as $item)
                        <option>{{ $item->nombreCategoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione el color</label>
                <select class="form-control" name="color">
                    <option>NINGUNO</option>
                    @foreach ($colores as $item)
                        <option>{{ $item->nombreColor }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione el tamaño</label>
                <select class="form-control" name="tamaño">
                    <option>NINGUNO</option>
                    @foreach ($tamaños as $item)
                        <option>{{ $item->tamaño }}mm</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Precio del producto:</label>
                <input type="text" class="form-control" name="precio" required>
            </div>
            <div class="form-group">
                <label>Cantidad del producto:</label>
                <input type="text" class="form-control" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Descripción del producto</label>
                <textarea class="form-control" name="descripcion" rows="3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-default">Crear producto</button>
            </div>
        </form>
    </div>





</body>

</html>
