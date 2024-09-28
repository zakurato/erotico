<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login ShopisCr</title>


    <link rel="stylesheet" href="{{ asset('login/loginAdentro.Css') }}">
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('loginDentro') }}">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('crearProducto') }}">Crear producto</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('vistaReporteFacturas') }}">Reportes de facturas</a></li>
                </ul>
                <ul class="nav navbar-nav">
                  <li><a href="{{ route('seccionImagenesCategoria') }}">Seccion de imagenes categorias</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('seccionImagenInicial') }}">Seccion de imagen inicial</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('formCategoriaSinColorNiTamaño') }}">Crear categorias sin color ni tamaño</a></li>
                </ul>
              <ul class="nav navbar-nav">
                <li><a href="{{ route('logout') }}">Cerrar sesion</a></li>
              </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container" style="width: auto; text-align: center !important;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/magixSexShop1.png" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <img src="images/magixSexShop2.png" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                    <img src="images/magixSexShop3.png" alt="New york" style="width:100%;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>














</body>

</html>
