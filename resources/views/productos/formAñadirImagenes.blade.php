<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form Añadir Imagenes</title>
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
    <div style="text-align: center">
        <img style="width: 380px; height: 380px;" src="imagesProductos/{{$producto->imagen}}" alt="">
    </div>
    

    <div class="container">
        <h2>Añadir imagenes para el producto</h2>
        <br>
        {{ session('correcto') }}
        <br>
        <form action="{{route("storeImagenes")}}" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$producto->id}}">
            <br>
            <div class="form-group">
                <label for="exampleImage">Seleccionar imágenes</label>
                <input 
                type="file" 
                name="image[]"
                class="form-control" 
                multiple
                required>
            </div>
            <button type="submit" class="btn btn-default">Añadir imagenes</button>
        </form>        
    </div>


</body>
</html>