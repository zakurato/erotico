<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear producto</title>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--icono-->
    <link style="width: 16px; height: 16px;" rel="icon" href="images/icono.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <h2>Crear producto</h2>
        <br>
        {{ session('correcto') }}
        <br>
        <form action="{{ route('storeProducto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <div class="form-group">
                <label for="exampleImage">Seleccionar imagen</label>
                <input type="file" class="form-control-file" name="imagen" id="imagen-input" required>
            </div>
            <div>
                <label>Imagen seleccionada:</label>
                <img style="width: 250px; height: 250px;" id="imagen-preview" src="#" alt=".">
            </div>
            <script>
                document.getElementById('imagen-input').addEventListener('change', function(e) {
                    var preview = document.getElementById('imagen-preview');
                    var file = e.target.files[0];

                    if (file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                        }

                        reader.readAsDataURL(file);
                    } else {
                        preview.src = "#";
                    }
                });
            </script>
            <div class="form-group">
                <label>Nombre del producto:</label>
                <input type="text" class="form-control" name="nombre"
                    oninput="this.value = this.value.toUpperCase()">
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione una categoría</label>
                <select class="form-control" name="categoria" id="categoriaSelect" onchange="checkCategoria()">
                    @foreach ($categoriasCombinadas as $item)
                        <option value="{{ $loop->index + 1 }};{{ $item->nombreCategoria ?? $item->nombreCategoriaSinColorNiTamaño }}">
                            {{ $item->nombreCategoria ?? $item->nombreCategoriaSinColorNiTamaño }}
                        </option>
                    @endforeach
                </select>
                
            </div>

            <div class="form-group" id="colorDiv">
                <label for="exampleFormControlSelect1">Seleccione el color</label>
                <select class="form-control" name="color">
                    <option>NINGUNO</option>
                    @foreach ($colores as $item)
                        <option>{{ $item->nombreColor }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="tamañoDiv">
                <label for="exampleFormControlSelect1">Seleccione el tamaño</label>
                <select class="form-control" name="tamaño">
                    <option>NINGUNO</option>
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
                <input type="text" class="form-control" name="precio" required>
            </div>
            <div class="form-group">
                <label>Cantidad del producto:</label>
                <input type="text" class="form-control" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Descripción del producto</label>
                <textarea class="form-control" name="descripcion" rows="10"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-default">Crear producto</button>
            </div>
        </form>
    </div>





</body>

<!-- creado correctamente -->
@if (session('correcto'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Acción exitosa!',
            text: '{{ session('correcto') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif





<script>
    const cantidadCategoriasSinColorNiTamaño = {{ $cantidadCategoriasSinColorNiTamaño }};

    function checkCategoria() {
        const categoriaSelect = document.getElementById('categoriaSelect');
        const selectedIndex = categoriaSelect.selectedIndex;


        console.log(selectedIndex);


        const colorDiv = document.getElementById('colorDiv');
        const tamañoDiv = document.getElementById('tamañoDiv');

        // Mostrar u ocultar los divs según la selección
        if (selectedIndex < cantidadCategoriasSinColorNiTamaño) {
            colorDiv.style.display = 'none';
            tamañoDiv.style.display = 'none';
        } else {
            colorDiv.style.display = 'block';
            tamañoDiv.style.display = 'block';
        }
    }

    // Ejecutar la función al cargar la página por si ya hay una opción seleccionada
    document.addEventListener('DOMContentLoaded', checkCategoria);
</script>



</html>
