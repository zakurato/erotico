<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro&display=swap" rel="stylesheet">
    <!--animaciones-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('index/privacidad.Css') }}">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <title>ShopisCr</title>
</head>

<body>

    <div class="contenedor">
        <div class="texto" data-aos="flip-left">
            <p style="text-align: center !important"> <strong>Políticas de privacidad</strong></p>
            <p>
                <br>
                ShopisCr es una tienda destinada a vender productos. Al utilizar nuestro sitio web
                y realizar compras en nuestra tienda, confirmas que aceptas los términos y
                condiciones de esta Política de Privacidad. Nuestro objetivo es mantener tus datos seguros y utilizarlos
                de manera responsable, cumpliendo con todas las regulaciones y leyes aplicables relacionadas con la
                privacidad y protección de datos.
            </p>

            <div style="display: flex; justify-content: center; ">
                <form action="{{ route('index2') }}" >
                    <input type="hidden" name="valor" value="1"  id="miCampo">
                    <button type="submit" class="btn btn-outline-success" style="margin-right: 20px;!important" id="miBoton">ACEPTAR
                </form>
                <form action="">
                    <button type="submit" class="btn btn-outline-danger" style="margin-right: 20px;!important">RECHAZAR
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-1">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1"
                    href="https://www.facebook.com/profile.php?id=100063694886908" role="button"><i
                        class="fab fa-facebook-f"></i></a>


                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com"
                    role="button"><i class="fab fa-instagram"></i></a>


                <!-- whatsapp -->
                <a class="btn btn-outline-light btn-floating m-1"
                    href="https://wa.me/50687249099?text=¿Me%20gustaría%20consultar%20sobre%20las%20políticas%3F"
                    role="button"><i class="fab fa-whatsapp"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white">ShopisCr</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1500,
        once: true
    });
</script>


</html>
