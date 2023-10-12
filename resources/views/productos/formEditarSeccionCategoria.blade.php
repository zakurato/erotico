<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form editar producto seccion categoria</title>
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

        <h2>Editar seccion producto categoria</h2>
        <br><br>

        <br><br>
        <form action="{{ 'storeEditarSeccionCrearProductoCategoria' }}"method="POST" enctype="multipart/form-data">
            @csrf
            <div style="text-align: center">
                <h2>Imagen</h2>
                <br>
                <img src="imagesSeccionProductoCategoria/{{ $editarSeccionCategoria->imagenName }}" alt=""
                    style="width: 200px; height: 200px;">
                <input type="hidden" name="imagenAntigua" value="{{ $editarSeccionCategoria->imagenName }}">
                <input type="hidden" name="id" value="{{ $editarSeccionCategoria->id }}">
            </div>
            <br><br>
            <div class="form-group">
                <label for="exampleImage">Seleccionar imagen para editar</label>
                <input type="file" class="form-control-file" name="imagen">
            </div>
            <br>
            <div class="form-group">
                <label>Seleccione la categoria:</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                    <option value="{{ $editarSeccionCategoria->categoria }}">{{ $editarSeccionCategoria->categoria }}
                    </option>
                    @foreach ($categorias as $item)
                        <option value="{{ $item->nombreCategoria }}">{{ $item->nombreCategoria }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Editar seccion producto categoria</button>
            <br><br>
            {{ session('creadoCorrectamente') }}
            {{ session('max') }}
        </form>
    </div>

</body>

</html>
