<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Magic Sex Shop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset("login/formLogin.Css")}}">
</head>
<body>

    <div class="navbar">
        <ul>
            <li><a href="{{route("index")}}">Inicio</a></li>
            <!-- Agrega aquí más elementos del navbar si es necesario -->
        </ul>
    </div>


    <div style="position: relative;">
        <div style="text-align: center">
            <img src="images/logo.jpg" alt="" class="img">
        </div>
        <div style="position: absolute; top: 0; left: 0; width: 100%;">
            <div class="container" >
                <br><br><br><br><br><br>
                <form action="{{route("authLogin")}}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" class="form-control" id="email" placeholder="Correo..." name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Contraseña..." name="password">
                    </div>          
                    {{session("errorLogueo")}}
                    <br><br>
                    <button type="submit" class="btn btn-default">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
    
    
      </body>
</html>