<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tamaño</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('formCrearTamaños') }}">Inicio</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>
    <div class="container">
        <h2>Editar tamaño</h2>
        <br><br>

        <form action="{{ 'storeActualizarTamaño' }}">
            @csrf            
            <input type="text" name="id" value="{{$tamañoEditar->id}}" hidden>
            <input type="text" name="oldTamaño" value="{{$tamañoEditar->tamaño}}" hidden>
            <div class="form-group" style="display: flex;">
                <label style="margin-top: 10px">Tamaño:</label>
                <input type="numbre" class="form-control" name="tamaño" autocomplete="off" value="{{$tamañoEditar->tamaño}}"
                    oninput="this.value = this.value.toUpperCase();" required style="width: 20%;" id="numericInput">
                    <label style="margin-top: 10px">mm</label>
            </div>
            </div>
            <button type="submit" class="btn btn-default">Editar tamaño</button>
        </form>
    </div>
</body>

<script>
    document.getElementById("numericInput").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
</script>
</html>
