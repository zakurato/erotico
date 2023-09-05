<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seccion imagen inicial</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css?1.0') }}">
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('seccionImagenesCategoria') }}">Inicio</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>
    <div class="container">
        <br><br>

        <h2>Seccion imagen principal</h2>
        <br><br>

        <br><br>
        <form action="{{ 'storeSeccionImagenPrincipal' }}"method="POST" enctype="multipart/form-data">
            @csrf
            <div style="text-align: center">
                <h2>Imagen</h2>
                <br>
                @if (isset($imagenPrincipal) && $imagenPrincipal->imagen != null)
                    <img src="images/{{ $imagenPrincipal->imagen }}" alt=""
                        style="width: 200px; height: 200px;">
                    <input type="hidden" name="imagenAntigua" value="{{ $imagenPrincipal->imagen }}">
                @endif

                @if (isset($imagenPrincipal) && $imagenPrincipal->id != null)
                    <input type="hidden" name="id" value="{{ $imagenPrincipal->id }}">
                @endif

            </div>
            <br><br>
            <div class="form-group">
                <label for="exampleImage">Seleccionar imagen</label>
                <input type="file" class="form-control-file" name="imagen">
            </div>
            <br>

            <br>
            <button type="submit" class="btn btn-primary">Crear seccion imagen principal</button>
            <br><br>
            {{ session('creadoCorrectamente') }}
            {{ session('max') }}
        </form>
    </div>

</body>

</html>
