<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form crear producto seccion categoria</title>
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
                <a class="navbar-brand" href="{{ route('seccionImagenesCategoria') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <br><br>

        <h2>Crear seccion producto categoria</h2>
        <br><br>

        <br><br>
        <form action="{{ 'storeSeccionCrearProductoCategoria' }}"method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleImage">Seleccionar imagen</label>
                <input type="file" class="form-control-file" name="imagen" required>
            </div>
            <br>
            <div class="form-group">
                <label>Seleccione la categoria:</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->nombreCategoria }}">{{ $item->nombreCategoria }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear seccion producto categoria</button>
            <br><br>
            {{ session('creadoCorrectamente') }}
            {{ session('max') }}
        </form>
    </div>

</body>

</html>
