<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar producto</title>
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
                <a class="navbar-brand" href="{{ route('loginDentro') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <h2>Actualizar producto</h2>
        <br>
        {{ session('correctoActualizarProducto') }}
        {{ session('eliminarProductoImagenes') }}

        
        <br>
        <form action="{{ route('storeActualizarProducto') }}" method="GET">
            <input type="text" name="id" value="{{ $producto->id }}" hidden>
            @csrf
            <br>
            <div class="form-group" style="text-align: center !important">
                <img style="width: 380px; height: 380px;" src="imagesProductos/{{ $producto->imagen }}" alt="">
            </div>
            <div class="form-group">
                <label>Nombre del producto:</label>
                <input type="text" class="form-control" name="nombre"
                    oninput="this.value = this.value.toUpperCase()" value="{{ $producto->nombre }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione una categoría</label>
                <select class="form-control" name="categoria">
                    <option disabled>{{ $producto->categoria }}</option>
                    @foreach ($categorias as $item)
                        <option>{{ $item->nombreCategoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Color</label>
                <input type="text" class="form-control" name="color" readonly value="{{ $producto->color }}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Tamaño</label>
                <input type="text" class="form-control" name="tamaño" readonly value="{{ $producto->tamaño }}">
            </div>
            <div class="form-group">
                <label>Precio del producto:</label>
                <input type="text" class="form-control" name="precio" required value="{{ $producto->precio }}">
            </div>
            <div class="form-group">
                <label>Cantidad del producto que desea añadir a este color y tamaño: (Existencia actual: {{$producto->cantidad}})</label>
                <input type="text" class="form-control" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Descripción del producto</label>
                <textarea class="form-control" name="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" name="temporada" <?php echo $producto->temporada == 1 ? 'checked' : ''; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Producto de temporada
                </label>
            </div>
            <div>
                <button type="submit" class="btn btn-default">Actualizar producto</button>
            </div>
        </form>
    </div>

    <br><br>



</body>

</html>
