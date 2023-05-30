<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Magic Sex Shop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}">
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('logout') }}">Cerrar sesion</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>

    <a href="{{route("formCrearCategoria")}}">
        <input type="button" value="Crear categoría">
    </a>
    <br><br><br>
    <a href="{{route("formCrear")}}">
        <input type="button" value="Crear producto">
    </a>

</body>

</html>
