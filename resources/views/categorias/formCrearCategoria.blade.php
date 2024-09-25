<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear categoría</title>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
        <h2>Crear categoría</h2>
        <br><br>
        {{ session('errorCategoria') }}
        {{ session('correctoCategoria') }}
        {{ session('eliminarCategoria') }}
        {{ session('actualizarCorrectoCategoria') }}
        {{ session('actualizarExisteCategoria') }}
        <br><br>
        <form action="{{ 'storeCategoria' }}">
            @csrf
            <div class="form-group">
                <label>Nombre de la categoría:</label>
                <input type="text" class="form-control" name="nombreCategoria" autocomplete="off"
                    oninput="this.value = this.value.toUpperCase();" required>
            </div>
            <button type="submit" class="btn btn-default">Crear categoría</button>
        </form>
    </div>


    <br><br>
    <h2>Tabla de categorías</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre de la categoría</th>
                <th >Acción editar</th>
                <th >Acción eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $item)
                <tr>
                    <td>{{ $item->nombreCategoria }}</td>
                    <td>
                        <form id="actualizarForm" action="{{ route('actualizarCategoria') }}" method="GET">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria">
                                <i style="color: green" class="fa-solid fa-rotate fa-xl"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form id="eliminarForm-{{ $item->id }}" action="{{ route('eliminarCategoria') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="button" class="bntEliminarCategoria" onclick="confirmarEliminacion('{{ $item->nombreCategoria }}', '{{ $item->id }}')">
                                <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

@if(session('correctoCategoria'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Acción exitosa!',
            text: '{{ session('correctoCategoria') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if(session('errorCategoria'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '{{ session('errorCategoria') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if(session('actualizarCorrectoCategoria'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Acción exitosa!',
            text: '{{ session('actualizarCorrectoCategoria') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if(session('actualizarExisteCategoria'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '{{ session('actualizarExisteCategoria') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif


<script>
    function confirmarEliminacion(nombreCategoria, id) {
        Swal.fire({
            title: '¿Estás seguro de que deseas eliminar?',
            text: "No podrás revertir esto. Se eliminará la categoría: " + nombreCategoria,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si se confirma, envía el formulario
                document.getElementById('eliminarForm-' + id).submit();
            }
        });
    }
</script>

</html>
