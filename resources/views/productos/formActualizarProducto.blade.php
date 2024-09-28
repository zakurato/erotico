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
                <img style="width: 380px; height: 380px; object-fit: contain; background-color: #f0f0f0;" class="card-img-top" src="imagesProductos/{{ $producto->imagen }}">
            </div>
            <div class="form-group">
                <label>Nombre del producto:</label>
                <input type="text" class="form-control" name="nombre"
                    oninput="this.value = this.value.toUpperCase()" value="{{ $producto->nombre }}">
            </div>



            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione una categoría</label>
                <select class="form-control" name="categoria" id="categoriaSelect" onchange="checkCategoria()">
                    <option selected>{{ $producto->categoria }}</option>
                    @foreach ($categoriasCombinadas as $item)
                        <option value="{{ $loop->index + 1 }};{{ $item->nombreCategoria ?? $item->nombreCategoriaSinColorNiTamaño }}">
                            {{ $item->nombreCategoria ?? $item->nombreCategoriaSinColorNiTamaño }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="oldCategoria" value="{{ $producto->categoria }}">
                
            </div>
            
            <div class="form-group" id="colorDiv">
                <label for="exampleFormControlSelect1">Seleccione el color</label>
                <select class="form-control" name="color">
                    <option>NINGUNO</option>
                    <option>{{ $producto->color }}</option>

                    @foreach ($colores as $item)
                        <option>{{ $item->nombreColor }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="tamañoDiv">
                <label for="exampleFormControlSelect1">Seleccione el tamaño</label>
                <select class="form-control" name="tamaño">
                    <option>NINGUNO</option>
                    <option>{{ $producto->tamaño }}</option>

                    @foreach ($tamaños as $item)
                        <option>
                            @if (is_numeric($item->tamaño))
                                {{ $item->tamaño }}cm
                            @else
                                {{ $item->tamaño }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Precio del producto:</label>
                <input type="hidden" class="form-control" name="oldPrecio" required value="{{ $producto->precio }}">
                <input type="text" class="form-control" name="precio" required value="{{ $producto->precio }}">
            </div>
            <div class="form-group">
                <label>Cantidad del producto que desea añadir a este color y tamaño: (Existencia actual: {{$producto->cantidad}})</label>
                <input type="text" class="form-control" name="cantidad" value="0" required>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Descripción del producto</label>
                <textarea class="form-control" name="descripcion" rows="10">{{ $producto->descripcion }}</textarea>
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

<input type="hidden" id="existe" value="{{$existe}}">

</body>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        let existe = document.getElementById('existe');
        const colorDiv = document.getElementById('colorDiv');
        const tamañoDiv = document.getElementById('tamañoDiv');
        const categoriaSelect = document.getElementById('categoriaSelect');
        const selectedIndex = categoriaSelect.selectedIndex;

        // Primera parte: Ejecuta este script al cargar la página
        if (existe.value == 1) {
            colorDiv.style.display = 'block';
            tamañoDiv.style.display = 'block';
        } else {
            colorDiv.style.display = 'none';
            tamañoDiv.style.display = 'none';
        }

        // Segunda parte: Cuando se selecciona un valor en el select
        const cantidadCategoriasSinColorNiTamaño = {{ $cantidadCategoriasSinColorNiTamaño }};
        document.getElementById('categoriaSelect').addEventListener('change', function () {
            let selectedIndex = this.selectedIndex;

            if (selectedIndex <= cantidadCategoriasSinColorNiTamaño) {
                colorDiv.style.display = 'none';
                tamañoDiv.style.display = 'none';
            } else {
                colorDiv.style.display = 'block';
                tamañoDiv.style.display = 'block';
            }
        });
    });
</script>

</html>
