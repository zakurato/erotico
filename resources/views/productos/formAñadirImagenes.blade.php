<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form Añadir Imagenes</title>
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
                <a class="navbar-brand" href="{{ route('crearProducto') }}">Inicio</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div style="text-align: center">
        <img style="width: 380px; height: 380px;" src="imagesProductos/{{ $producto->imagen }}" alt="">
    </div>

    <div>
        {{session("productoCreadoCorrectamenteFotos")}}
    </div>

    <br><br><br>
    <form action="{{ route("colorSeleccionado") }}" method="GET" id="myForm">
        @csrf 
        <input type="hidden" name="id" value="{{$producto->id}}">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione el color</label>
            <select class="form-control" name="color" required id="campoTexto" onchange="submitForm()">
                <option selected disabled></option>
                <option value="NINGUNO">NINGUNO</option>
                @foreach ($colores as $item)
                    <option>{{ $item->nombreColor }}</option>
                @endforeach
            </select>
        </div>
    </form>


</body>



<script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }
</script>

</html>
