<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear tamaño</title>
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
    <div class="container">
        <h2>Crear tamaño</h2>
        <br><br>
        {{ session('errorTamaños') }}
        {{ session('correctoTamaños') }}
        {{ session('eliminarTamaños') }}
        {{ session('actualizarCorrectoTamaños') }}
        {{ session('actualizarExisteTamaños') }}
        <br><br>
        <form action="{{ 'storeTamaños' }}">
            @csrf
            <div class="form-group" style="display: flex;">
                <label style="margin-top: 5px">Tamaño:</label>
                <input type="text" class="form-control" name="tamaño" autocomplete="off"
                    oninput="this.value = this.value.toUpperCase();" required style="width: 20%;">
                <label style="margin-top: 10px">cm</label>
            </div>
            <button type="submit" class="btn btn-default">Crear tamaño</button>
        </form>
    </div>


    <br><br>
    <h2>Tabla tamaños</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Tamaño</th>
                <th>Acción editar</th>
                <th>Acción eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tamaños as $item)
                <tr>

                    <td>
                        @if (is_numeric($item->tamaño))
                            {{ $item->tamaño }}cm
                        @else
                            {{$item->tamaño}}
                        @endif
                    </td>
                    <td>
                        <form id="actualizarForm" action="{{ route('actualizarTamaño') }}" method="GET">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria">
                                <i style="color: green" class="fa-solid fa-rotate fa-xl"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form id="eliminarForm" action="{{ route('eliminarTamaño') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar el producto {{ $item->nombre }}')">
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
