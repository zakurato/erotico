<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear tamaño</title>

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
                <input type="number" class="form-control" name="tamaño" autocomplete="off"
                    oninput="this.value = this.value.toUpperCase();" required style="width: 20%;" id="numericInput">
                <label style="margin-top: 10px">mm</label>
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
                    <td>{{ $item->tamaño }}mm</td>
                    <td>
                        <form id="actualizarForm" action="{{ route('actualizarTamaño') }}" method="GET">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green"
                                    class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form id="eliminarForm" action="{{ route('eliminarTamaño') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $item->id }}" hidden>
                            <button type="submit" class="bntEliminarCategoria"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar el tamaño {{ $item->tamaño }}mm')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 512 512">
                                    <path d="M296,64H216a7.91,7.91,0,0,0-8,8V96h96V72A7.91,7.91,0,0,0,296,64Z"
                                        style="fill:red" />
                                    <path d="M292,64H220a4,4,0,0,0-4,4V96h80V68A4,4,0,0,0,292,64Z" style="fill:red" />
                                    <path
                                        d="M447.55,96H336V48a16,16,0,0,0-16-16H192a16,16,0,0,0-16,16V96H64.45L64,136H97l20.09,314A32,32,0,0,0,149,480H363a32,32,0,0,0,31.93-29.95L415,136h33ZM176,416l-9-256h33l9,256Zm96,0H240V160h32ZM296,96H216V68a4,4,0,0,1,4-4h72a4,4,0,0,1,4,4Zm40,320H303l9-256h33Z"
                                        style="fill:red" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

<script>
    document.getElementById("numericInput").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
</script>

</html>
