<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login ShopisCr</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset("login/formLogin.Css")}}?v={{ time() }}">


    <!--icono-->
    <link style="width: 16px; height: 16px;" rel="icon" href="images/icono.png" type="image/png">
</head>
<body>

    <div class="navbar navbar-inverse"
    style="background-color: #e7e7e7 !important; width: 100% !important; z-index: 9999 !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header" style="position: relative; top: 5px">
                    <a href="{{route("index")}}" class="header__logo-link">
                        <img style="height: 70px;" class="header__logo-image"
                            src="images/logoShopis.jpg?v=1676468577" alt="" id="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


    <div style="position: relative;">
        <div style="position: absolute; top: 0; left: 0; width: 100%;">
            <div class="container" >
                <div style="height: 120px"></div>
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