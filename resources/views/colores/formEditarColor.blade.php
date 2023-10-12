<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar color</title>
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
                <a class="navbar-brand" href="{{ route('formCrearColores') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <h2>Editar color</h2>
        <br><br>

        <form action="{{ 'storeActualizarColor' }}">
            @csrf            
            <input type="text" name="id" value="{{$colorEditar->id}}" hidden>
            <input type="text" name="oldNombreColor" value="{{$colorEditar->nombreColor}}" hidden>
            <div class="form-group">
                <label>Nombre del color:</label>
                <input type="text" class="form-control" name="nombreColor" autocomplete="off"
                    oninput="this.value = this.value.toUpperCase();" required
                    value="{{ $colorEditar->nombreColor}}">
            </div>
            <button type="submit" class="btn btn-default">Editar color</button>
        </form>
    </div>
</body>

</html>
