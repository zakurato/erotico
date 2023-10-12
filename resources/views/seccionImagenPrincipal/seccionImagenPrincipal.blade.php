<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seccion imagen inicial</title>

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
                <a class="navbar-brand" href="{{ route('seccionImagenesCategoria') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
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
                        style="width: 100%; height: 300px;">
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
