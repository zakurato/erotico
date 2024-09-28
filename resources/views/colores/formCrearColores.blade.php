<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear color</title>
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
        <h2>Crear color</h2>
        <br><br>
        {{ session('errorColores') }}
        {{ session('correctoColores') }}
        {{ session('eliminarColores') }}
        {{ session('actualizarCorrectoColores') }}
        {{ session('actualizarExisteColores') }}
        <br><br>
        <form action="{{ 'storeColores' }}">
            @csrf
            <div class="form-group">
                <label>Nombre del color:</label>
                <input type="text" class="form-control" name="nombreColor" autocomplete="off"
                    oninput="this.value = this.value.toUpperCase();" required>
            </div>
            <button type="submit" class="btn btn-default">Crear color</button>
        </form>
    </div>


    <br><br>
    <h2>Tabla colores</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre del color</th>
                <th >Acción editar</th>
                <th >Acción eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colores as $item)
                <tr>
                    <td>{{ $item->nombreColor }}</td>
                    <td>
                        <form id="actualizarForm" action="{{ route('actualizarColor') }}" method="GET">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria">
                                <i style="color: green" class="fa-solid fa-rotate fa-xl"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form id="eliminarForm-{{ $item->id }}" action="{{ route('eliminarColor') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="button" class="bntEliminarCategoria"
                            onclick="confirmarEliminacion('{{ $item->nombreColor }}', '{{ $item->id }}')">
                                <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

<!-- creado correctamente -->
@if(session('correctoColores'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Acción exitosa!',
            text: '{{ session('correctoColores') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

<!-- Error por que ya estaba creado -->
@if(session('errorColores'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '{{ session('errorColores') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif


<!-- actualizado correctamente -->
@if(session('actualizarCorrectoColores'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Acción exitosa!',
            text: '{{ session('actualizarCorrectoColores') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif


<!-- Error actualizado por que ya existe -->
@if(session('actualizarExisteColores'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '{{ session('actualizarExisteColores') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif



<!-- Eliminado correctamente -->
<script>
    function confirmarEliminacion(nombreColor, id) {
        Swal.fire({
            title: '¿Estás seguro de que deseas eliminar?',
            text: "No podrás revertir esto. Se eliminará el color: " + nombreColor,
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
