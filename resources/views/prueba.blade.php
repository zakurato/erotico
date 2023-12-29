<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .contenedor {
            padding: 20px;
        }

        .pestaña {
            position: fixed;
            right: 0;
            top: 20%;
            background-color: #b5b5b500;
            color: #fff;
            padding: 1px;
            cursor: pointer;
            z-index: 1;
        }

        .contenido-pestaña {
            position: fixed;
            right: 0;
            top: 17%;
            right: 50px;
            background-color: #2c3e5000;
            color: #EA6A2F;
            width: 50px;
            padding: 20px;
            box-sizing: border-box;
            display: none;
            z-index: 0;
        }

        .contenido-pestaña p {
            margin: 0;
        }

        .icono {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <!-- Pestaña desplegable -->
    <div id="pestaña" class="pestaña" onclick="togglePestaña()">
        <div class="icono">
            <i class='fas fa-angle-left' style='font-size:30px; color:#EA6A2F '></i>

        </div>
    </div>

    <!-- Contenido de la pestaña -->
    <div id="contenidoPestaña" class="contenido-pestaña">
        <!-- Agrega aquí el contenido que deseas mostrar en la pestaña desplegable -->
        <!-- carrito -->
        <i class="fa-solid fa-cart-shopping" style="font-size:30px;"></i>
    </div>

</body>



<script>
    function togglePestaña() {
        var contenidoPestaña = document.getElementById("contenidoPestaña");

        if (contenidoPestaña.style.display === "none" || contenidoPestaña.style.display === "") {
            contenidoPestaña.style.display = "block";
        } else {
            contenidoPestaña.style.display = "none";
        }
    }
</script>

</html>
