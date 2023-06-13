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
        <h2>Añadir tamaños para el producto</h2>
        <br>
        {{session("repiteTamaño")}}
        {{session("repiteTamañoCorrecto")}}
        <br>
        <form action="{{route("storeAñadirTamaños")}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$producto->id}}">
            <br>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione el tamaño</label>
                <select class="form-control" name="tamaño">
                    @foreach ($tamaños as $item)
                        <option>{{ $item->tamaño }}mm</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-default">Añadir tamaño</button>
        </form>        
    </div>

</body>
</html>