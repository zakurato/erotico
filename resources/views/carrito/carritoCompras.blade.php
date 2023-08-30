<html lang="es" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carrito Compras MagicSexShop</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="{{ asset('carrito/carritoForm.Css') }}?v={{ time() }}" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('index/styles.Css') }}?v={{ time() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">





<!--animaciones-->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--/Css propios public-->
<link rel="stylesheet" href="{{ asset('index/index.Css') }}?v={{ time() }}">
<link rel="stylesheet" href="{{ asset('index/styles.Css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--iconos-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, maximum-scale=1.0">
<meta name="theme-color" content="#000000">

</head>

<body id="cart"
    class="cart lang-es country-es currency-eur layout-full-width page-cart tax-display-enabled lang_es    desktop_device   	 hide-left-column hide-right-column "
    style="font: 17px Arial">
    <div class="navbar navbar-inverse" style="background-color: black !important; width: 100% !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-header">
                        <a href="{{ route('index2') }}" class="header__logo-link">
                            <img style="height: 80px;" class="header__logo-image" src="images/logo4.png?v=1676468577" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="st-container" class="st-container st-effect-0" style="background-color: white">
        <section id="wrapper" class="columns-container">
            <form action="{{ route('WA') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="columns" class="container">
                    <div class="row">
                        <div id="center_column" class="single_column col-sm-12">
                            <section id="main">
                                <div class="row">
                                    @php
                                        $ContadorProducto = 1;
                                    @endphp


                                    @foreach ($comprasDeClienteCache as $item)
                                        @php
                                            $pasa = 0;
                                        @endphp
                                        <!-- Left Block: cart product informations & shpping -->
                                        <div class="cart-grid-body col-12 col-lg-8 mb-3">
                                            <!-- cart products detailed -->
                                            <div class="card card_trans mb-3">
                                                <div class="card-header" style="font: 17px Arial">
                                                    Carrito MagicSexShop Producto({{ $ContadorProducto }}) <div
                                                        style="display: inline-block; margin-left: 90%; margin-bottom: 15px">
                                                        <a ref="#" id="basurero{{ $item->id }}">
                                                            <i class="fa-solid fa-trash-can fa-xl"
                                                                style="color: #db0a0a;">
                                                            </i>
                                                        </a>
                                                    </div>
                                                    <input type="hidden"
                                                        value="{{ $ContadorProducto = $ContadorProducto + 1 }}">
                                                </div>
                                                <div class="cart-overview js-cart"
                                                    data-refresh-url="//momakids.es/carrito?ajax=1&amp;action=refresh">
                                                    <ul class="cart-items base_list_line mb-3 m-t-1">
                                                        <li class="cart-item line_item">
                                                            <div class="product-line-grid container-fluid">
                                                                <div class="row">
                                                                    <!--  product left content: image-->
                                                                    <!--  $item = Carrito-->
                                                                    <!--  $item2 = productos-->

                                                                    @foreach ($productos as $item4)
                                                                        @if ($item->idFKProducto == $item4->id && $item->colorSeleccionado == $item4->color)
                                                                            <div
                                                                                class="product-line-grid-left col-md-2 col-3" >
                                                                                <img src="imagesProductos/{{ $item4->imagen }}"
                                                                                    width="150" height="150"
                                                                                    alt=""
                                                                                    onclick="showImage('imagesProductos/{{$item4->imagen}}')"
                                                                                    id="{{$item4->imagen}}">
                                                                            </div>
                                                                            @php
                                                                                $pasa = 1;
                                                                            @endphp
                                                                        @break
                                                                    @endif
                                                                @endforeach

                                                                @if ($pasa != 1)
                                                                    @foreach ($fotos as $item5)
                                                                        @if ($item->idFKProducto == $item5->idFK && $item->colorSeleccionado == $item5->color)
                                                                            <div
                                                                                class="product-line-grid-left col-md-2 col-3">
                                                                                <img src="imagesProductos/{{ $item5->imagen }}"
                                                                                    width="150" height="150"
                                                                                    alt=""
                                                                                    onclick="showImage('imagesProductos/{{$item5->imagen}}')"
                                                                                    >
                                                                            </div>
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                            @endif

                                                            <div id="lightbox" onclick="hideImage()">
                                                                <img id="lightbox-image">
                                                            </div>



                                                            @foreach ($productos as $index => $item2)
                                                                @if ($item->idFKProducto == $item2->id && $item->nombreClienteSession == $sessionCache)
                                                                    <!--  product left body: description -->
                                                                    <div
                                                                        class="product-line-grid-body col-md-5 col-7">
                                                                        <div class="product-line-info">
                                                                            {{ $item2->nombre }}
                                                                        </div>
                                                                        <div
                                                                            class="product-line-info product-price  mar_b6">
                                                                            <div id="colorSelect{{ $item->id }}"
                                                                                class="current-price">
                                                                                Color:
                                                                                {{ $item->colorSeleccionado }}
                                                                            </div>
                                                                            <div class="current-price" id="tamañoSelect{{ $item->id }}">
                                                                                Tamaño:
                                                                                {{ $item->tamañoSeleccionado }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-line-info">
                                                                            Categoría:
                                                                            {{ $item2->categoria }}
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <!--  product left body: description -->
                                                                    <div
                                                                        class="product-line-grid-right product-line-actions col-md-5 col-12">
                                                                        <div class="row">
                                                                            <div class="col-3 hidden-md-up">
                                                                            </div>
                                                                            <div class="col-md-10 col-7">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-md-6 col-6 qty">
                                                                                        <div class="qty_wrap">
                                                                                            <div class="input-group bootstrap-touchspin" style="width: 90px !important;">
                                                                                                <button class="btn btn-touchspin js-touchspin js-increase-product-quantity bootstrap-touchspin-down"
                                                                                                        type="button" id="btnMenos{{ $item->id }}"
                                                                                                        style="width: 30px !important; border-radius: 20px; margin-right: 29px;">-</button>
                                                                                                <input class="js-cart-line-product-quantity cart_quantity cart_quantity_206 form-control"
                                                                                                       type="text" value="{{ $item->cantidad }}"
                                                                                                       style="display: block; color: black; background-color: #44444400;
                                                                                                       border-color: #44444400;"
                                                                                                       id="inputCantidad{{ $item->id }}" readonly>
                                                                                                <button class="btn btn-touchspin js-touchspin js-decrease-product-quantity bootstrap-touchspin-up"
                                                                                                        type="button" id="btnMas{{ $item->id }}"
                                                                                                        style="width: 30px !important; border-radius: 20px; ">+</button>
                                                                                            </div>
                                                                                            
                                                                                        </div>
                                                                                    </div>

                                                                                    <script>
                                                                                        //primera vez que entra
                                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                                            var precioTotalProductoIva = document.getElementById("sumaTotalProductos");
                                                                                            var $resultadoTotalArticulos = document.getElementById("resultado");
                                                                                            var precioTotalProductoIvaHidden = document.getElementById("sumaTotalProductosHidden");


                                                                                            //TOTAL IVA PRECIO TOTAL DE ARTICULOS----------------------------------------------------------------------------
                                                                                            $.ajax({
                                                                                                url: 'primeraVezPaginaCarrito', // aqui va el nombre de la ruta
                                                                                                method: 'GET', // el metodo que se usa en la ruta
                                                                                                dataType: 'json',
                                                                                                success: function(response) {
                                                                                                    //respuesta del controlador 

                                                                                                    precioTotalProductoIva.textContent = "₡" + response.suma;
                                                                                                    $resultadoTotalArticulos.textContent = response.sumaTotalArticulos;
                                                                                                    precioTotalProductoIvaHidden.defaultValue = response.suma;
                                                                                                }
                                                                                            });
                                                                                        });
                                                                                    </script>


                                                                                    <script>
                                                                                        $(document).ready(function() {
                                                                                            //funcion de restar
                                                                                            // Asigna un controlador de eventos al botón
                                                                                            $('#btnMenos{{ $item->id }}').click(function(e) {

                                                                                                //btnMenos seleccionado
                                                                                                var btnMenos = document.getElementById("btnMenos{{ $item->id }}");
                                                                                                var restarInput = document.getElementById('inputCantidad{{ $item->id }}');
                                                                                                var colorSeleccionado = document.getElementById("colorSelect{{ $item->id }}");
                                                                                                var soloDejarColor = colorSeleccionado.textContent.replace("Color:", "");
                                                                                                var precioTotalProductoIva = document.getElementById("sumaTotalProductos");
                                                                                                var idProductoCarrito = restarInput.id.replace("inputCantidad", "");
                                                                                                var $resultadoTotalArticulos = document.getElementById("resultado");
                                                                                                var precioTotalProductoIvaHidden = document.getElementById("sumaTotalProductosHidden");


                                                                                                $.ajax({
                                                                                                    url: 'restarCambioInputCambioTotalIva', // aqui va el nombre de la ruta
                                                                                                    method: 'GET', // el metodo que se usa en la ruta
                                                                                                    data: {
                                                                                                        id: idProductoCarrito,
                                                                                                        color: soloDejarColor,
                                                                                                    }, //los parametros enviados
                                                                                                    dataType: 'json',
                                                                                                    success: function(response) {
                                                                                                        //respuesta del controlador 
                                                                                                        precioTotalProductoIva.textContent = "₡" + response.suma;
                                                                                                        restarInput.value = response.cantidad;
                                                                                                        $resultadoTotalArticulos.textContent = response.sumaTotalArticulos;
                                                                                                        precioTotalProductoIvaHidden.defaultValue = response.suma;

                                                                                                    }
                                                                                                });


                                                                                            });
                                                                                        });
                                                                                    </script>

                                                                                    <script>
                                                                                        $(document).ready(function() {
                                                                                            //funcion de sumar
                                                                                            // Asigna un controlador de eventos al botón
                                                                                            $('#btnMas{{ $item->id }}').click(function(e) {

                                                                                                //btnMenos seleccionado
                                                                                                /*
                                                                                                var btnMas = document.getElementById("btnMas{{ $item->id }}");
                                                                                                var colorSeleccionado = document.getElementById("colorSelect{{ $item->id }}");
                                                                                                var soloDejarColor = colorSeleccionado.textContent.replace("Color:", "");
                                                                                                var tamañoSeleccionado = document.getElementById("tamañoSelect{{ $item->id }}");
                                                                                                var soloDejarTamaño = tamañoSeleccionado.textContent.replace("Tamaño:", "");
                                                                                                var imagenSeleccionado = document.getElementById("{{ $item4->imagen }}");
                                                                                                */

                                                                                                var sumarInput = document.getElementById('inputCantidad{{ $item->id }}');
                                                                                                var precioTotalProductoIva = document.getElementById("sumaTotalProductos");
                                                                                                var idProductoCarrito = sumarInput.id.replace("inputCantidad", "");
                                                                                                var $resultadoTotalArticulos = document.getElementById("resultado");
                                                                                                var precioTotalProductoIvaHidden = document.getElementById("sumaTotalProductosHidden");
                                                                                                
                                                                                                //aqui debo arreglar para traer el $item5->imagen que es la imagen de la foto para poder sumarla o restarla

                                                                                                    $.ajax({
                                                                                                    url: 'sumarCambioInputCambioTotalIva', // aqui va el nombre de la ruta
                                                                                                    method: 'GET', // el metodo que se usa en la ruta
                                                                                                    data: {
                                                                                                        id: idProductoCarrito,
                                                                                                    }, //los parametros enviados
                                                                                                    dataType: 'json',
                                                                                                    success: function(response) {
                                                                                                        //respuesta del controlador 
                                                                                                        precioTotalProductoIva.textContent = "₡" + response.suma;
                                                                                                        sumarInput.value = response.cantidad;
                                                                                                        $resultadoTotalArticulos.textContent = response.sumaTotalArticulos;
                                                                                                        precioTotalProductoIvaHidden.defaultValue = response.suma;
                                                                                                    }
                                                                                                });
                                                                                                

                                                                                            });
                                                                                        });
                                                                                    </script>


                                                                                    <script>
                                                                                        $(document).ready(function() {
                                                                                            // Asigna un controlador de eventos al botón

                                                                                            $('#basurero{{ $item->id }}').click(function(e) {

                                                                                                var confirmacion = confirm(
                                                                                                    "¿Estás seguro de que deseas eliminar este producto del carrito?");

                                                                                                // Verifica si el usuario confirmó la eliminación
                                                                                                if (confirmacion == true) {
                                                                                                    //btnEliminar seleccionado
                                                                                                    var basureroElement = document.getElementById("basurero{{ $item->id }}");
                                                                                                    var idBasurero = basureroElement.id.replace("basurero", "");
                                                                                                    var colorSeleccionado = document.getElementById("colorSelect{{ $item->id }}");
                                                                                                    var soloDejarColor = colorSeleccionado.textContent.replace("Color:", "");



                                                                                                    //console.log(soloDejarColor);

                                                                                                    $.ajax({
                                                                                                        url: 'eliminarTablaCompras', // aqui va el nombre de la ruta
                                                                                                        method: 'GET', // el metodo que se usa en la ruta
                                                                                                        data: {
                                                                                                            id: idBasurero,
                                                                                                            color: soloDejarColor,
                                                                                                        }, //los parametros enviados
                                                                                                        dataType: 'json',
                                                                                                        success: function(response) {
                                                                                                            //respuesta del controlador 
                                                                                                            location.reload();

                                                                                                        }
                                                                                                    });
                                                                                                }



                                                                                            });
                                                                                        });
                                                                                    </script>


                                                                                    <input type="hidden"
                                                                                        value="{{ $item2->precio }}"
                                                                                        class="asdf"
                                                                                        id="precioProductoUni2{{ $item2->id }}">
                                                                                    <span
                                                                                        class="product-price price"
                                                                                        id="precioProductoUni{{ $item2->id }}">
                                                                                        <strong>₡{{ $item2->precio }}</strong>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>

                                                    </div>
                                        </div>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- shipping informations -->
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                        <br>
                        <h1 style="font: 28px Arial">Metodo de pago <strong> SINPE MÓVIL o transferencia bancaria. </strong> </h1>
                        <h1 style="font: 20px Arial">Teléfono SINPE MÓVIL: 60168568</h1>
                        <h1 style="font: 20px Arial">Cuenta tranferencia: CR86015101220010656228</h1>


                        <br>
                        <div class="row">

                            <!-- Left Block: cart product informations & shpping -->
                            <div class="cart-grid-body col-12 col-lg-8 mb-3">
                                <!-- cart products detailed -->
                                <div class="card card_trans mb-3">
                                    <div class="card-header" style="font: 17px Arial">Detalles de facturación</div>
                                    <div class="cart-overview js-cart"
                                        data-refresh-url="//momakids.es/carrito?ajax=1&amp;action=refresh">
                                        <ul class="cart-items base_list_line mb-3 m-t-1">
                                            <li class="cart-item line_item">
                                                <div class="product-line-grid container-fluid">
                                                    <div>
                                                        <!--  Formulario-->
                                                        <div class="mb-3">
                                                            <label class="form-label">Nombre completo:</label>
                                                            <input type="text" class="form-control"
                                                                name="nombre" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Teléfono:</label>
                                                            <input type="text" class="form-control"
                                                                name="telefono" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Dirección exacta:</label>
                                                            <textarea class="form-control" rows="5" name="direccion" required></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleImage">Adjuntar imagen del comprobante de pago:</label>
                                                            <input type="file" class="form-control-file" name="imagen" required id="comprobante">
                                                            <br>
                                                            <div id="previewContainer" style="display: none;">
                                                                <p>Vista previa del comprobante:</p>
                                                                <img id="previewImage" src="#" alt="Imagen previa" style="max-width: 150px; max-height: 150px;" onclick="showImage(this.src)">

                                                            </div>
                                                        </div>
                                                        
                                                        <script>
                                                            document.getElementById("comprobante").addEventListener("change", function() {
                                                                var comprobanteFile = document.getElementById("comprobante").files[0];
                                                                if (comprobanteFile) {
                                                                    var comprobanteName = comprobanteFile.name;
                                                                    console.log(comprobanteName);
                                                        
                                                                    // Mostrar la vista previa de la imagen
                                                                    var reader = new FileReader();
                                                                    reader.onload = function(event) {
                                                                        var previewImage = document.getElementById("previewImage");
                                                                        previewImage.src = event.target.result;
                                                                        document.getElementById("previewContainer").style.display = "block";
                                                                    };
                                                                    reader.readAsDataURL(comprobanteFile);
                                                                }
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                    </div>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- shipping informations -->
                        </div>

                    </section>



                    <!-- Right Block: cart subtotal & cart total -->
                    <div class="cart-grid-right col-12 col-lg-4  mb-3" >
                        <div class="card card_trans cart-summary">
                            <div class="cart-detailed-totals">
                                <div class="card-block">
                                    <div class="cart-summary-line clearfix" id="cart-subtotal-products">
                                        <span class="label js-subtotal">
                                            <div style="display: inline-block; color: black !important" id="resultado">
                                            </div>
                                            <div style="display: inline-block; color: black !important">
                                                Total de artículos
                                            </div>
                                        </span>
                                    </div>

                                </div>
                                <div class="cart-voucher">
                                    <hr>

                                </div>
                                <hr>
                                <div class="card-block">
                                    <div class="cart-summary-line clearfix cart-total">
                                        <span class="label" style="color: black">Total (IVA inc.)</span>
                                        <span class="value price fs_lg font-weight-bold"
                                            id="sumaTotalProductos"></span>
                                        <input type="hidden" value="" id="sumaTotalProductosHidden"
                                            name="sumaTotal">
                                    </div>
                                    <div class="cart-summary-line clearfix">
                                        <span class="label"></span>
                                        <span class="value price"></span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="checkout cart-detailed-actions card-block">
                                <button type="submit" class="btn btn-default btn-full-width"
                                    style="background-color: #444; color: white">Finalizar
                                    compra</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
</div>



<footer class="footer" data-section-id="sections--14562733293631__footer" data-section-type="footer"
role="contentinfo">
<div class="container">
    <div class="footer__wrapper">
        <div class="footer__block-list">
            <div class="footer_block-item footer_block-item--text">
                <button class="footer__title heading h6" aria-expanded="false" aria-controls="block-footer-0"
                    data-action="toggle-collapsible" disabled="disabled">
                    <span>Acerca de nosotros</span>
                </button>
                <p>
                    MagicSexShop ofrece variedad en Juguetes para Adultos,Lencería, Lubricantes y
                    Accesorios.
                    Ventas al por mayor.
                    100% Discreción.
                </p>
            </div>
        </div>
        <aside class="footer__aside">
            <div class="footer_aside-item footer_aside-item--social">
                <p class="footer__aside-title">Síguenos</p>
                <br><br>
                <ul class="social-media__item-list  list--unstyled" role="list">
                    <li style="color: #143149;" class="social-media_item social-media_item--facebook">
                        <i style="font-size: 40px;" class="fab fa-facebook-square fa-lg awensomeFacebook"></i>
                    <li style="color: #143149;" class="social-media_item social-media_item--instagram">
                        <i style="font-size: 40px; padding-left: 10px;" class="fab fa-instagram-square fa-lg awensomeInsta"></i>
                    </li>
                    <li style="color: #143149;" class="social-media_item social-media_item--whatsapp">
                        <i style="font-size: 40px; padding-left: 10px;" class="fab fa-whatsapp-square fa-lg awensomeWa"></i>
                    </li>
                </ul>
            </div>
        </aside>
        <br><br>
        <div>
            <p style="color: white !important">© 2023 MagicSexShop</p>
        </div>
    </div>
</div>
</footer>

<a href="https://wa.me/50660168568?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
target="_blank" rel="noopener"
aria-describedby="a11y-new-window-message">
<div class="wa__btn_popup" style="left: unset; right: 25px; bottom:90px;">
    <p>
        <span class="fab-container">
          <i class="fab fa-whatsapp" style="color: #27d011; font-size: 3em;"></i>
          <span class="fab-text">¡Contáctanos por WhatsApp!</span>
        </span>
      </p>
</div>
</a>


</body>


<script>
    //script para mostrar la imagen en grande
        function showImage(imageSrc) {
            console.log(imageSrc)
            var lightbox = document.getElementById('lightbox');
            var lightboxImage = document.getElementById('lightbox-image');
            lightboxImage.src = imageSrc;
            lightbox.style.display = 'flex';
        }

    function hideImage() {
        var lightbox = document.getElementById('lightbox');
        lightbox.style.display = 'none';
    }
</script>

</html>