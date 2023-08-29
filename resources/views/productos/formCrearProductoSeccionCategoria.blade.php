<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form crear producto seccion categoria</title>

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
