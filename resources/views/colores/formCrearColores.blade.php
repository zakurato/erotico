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
                        <form id="eliminarForm" action="{{ route('eliminarColor') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar el color {{ $item->nombreColor }}')">
                                <i style="color: red" class="fa-solid fa-trash-can fa-xl"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
