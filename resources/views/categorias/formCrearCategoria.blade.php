<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear categoría</title>

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
                        <form id="eliminarForm" action="{{ route('eliminarCategoria') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar la categoría {{ $item->nombreCategoria }}')">
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
