<html lang="es" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carrito Compras MagicSexShop</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One" type="text/css" media="all">
    <link rel="stylesheet" href="https://momakids.es/themes/transformer/assets/cache/theme-a0ba16.css" type="text/css"
        media="all">
    <link href="https://momakids.es/modules/stthemeeditor/views/css/customer-s1.css" rel="stylesheet" type="text/css"
        media="all">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body id="cart"
    class="cart lang-es country-es currency-eur layout-full-width page-cart tax-display-enabled lang_es    desktop_device   	 hide-left-column hide-right-column ">
    <div id="st-container" class="st-container st-effect-0">
        <section id="wrapper" class="columns-container">
            <div id="columns" class="container">
                <div class="row">
                    <div id="center_column" class="single_column col-sm-12">
                        <section id="main">
                            <div class="row">

                                @php
                                    $ContadorProducto = 1;
                                @endphp


                                @foreach ($comprasDeClienteCache as $item)
                                    @foreach ($productos as $index => $item2)
                                        @if ($item->idFKProducto == $item2->id && $item->nombreClienteSession == $sessionCache)
                                            <!-- Left Block: cart product informations & shpping -->
                                            <div class="cart-grid-body col-12 col-lg-8 mb-3">
                                                <!-- cart products detailed -->
                                                <div class="card card_trans mb-3">
                                                    <div class="card-header">
                                                        Carrito MagicSexShop Producto({{ $ContadorProducto }}) <div
                                                            style="display: inline-block; margin-left: 90%"><a
                                                                href="#"><i class="fa-solid fa-trash-can fa-xl"
                                                                    style="color: #db0a0a;"></i></a></div>
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

                                                                        @foreach ($fotos as $item3)
                                                                            @if ($item->idFKProducto == $item2->id && $item->colorSeleccionado == $item2->color)
                                                                                <div
                                                                                    class="product-line-grid-left col-md-2 col-3">
                                                                                    <img src="imagesProductos/{{ $item2->imagen }}"
                                                                                        width="150" height="150"
                                                                                        alt="">
                                                                                </div>
                                                                            @else
                                                                                <div
                                                                                    class="product-line-grid-left col-md-2 col-3">
                                                                                    <img src="imagesProductos/{{ $item3->imagen }}"
                                                                                        width="150" height="150"
                                                                                        alt="">
                                                                                </div>
                                                                            @endif
                                                                        @endforeach


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
                                                                                <div class="current-price">
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
                                                                                        <div class="col-md-6 col-6 qty">
                                                                                            <div class="qty_wrap">
                                                                                                <div
                                                                                                    class="input-group bootstrap-touchspin">
                                                                                                    <button
                                                                                                        class="btn btn-touchspin js-touchspin js-increase-product-quantity bootstrap-touchspin-down"
                                                                                                        type="button"
                                                                                                        id="btnMenos{{ $item->id }}">-</button>
                                                                                                    <input
                                                                                                        class="js-cart-line-product-quantity cart_quantity cart_quantity_206 form-control"
                                                                                                        type="text"
                                                                                                        value="{{ $item->cantidad }}"
                                                                                                        style="display: block;"
                                                                                                        id="inputCantidad{{ $item->id }}"
                                                                                                        readonly>
                                                                                                    <button
                                                                                                        class="btn btn-touchspin js-touchspin js-decrease-product-quantity bootstrap-touchspin-up"
                                                                                                        type="button"
                                                                                                        id="btnMas{{ $item->id }}">+</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <script>
                                                                                            //primera vez que entra
                                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                                var precioTotalProductoIva = document.getElementById("sumaTotalProductos");
                                                                                                var $resultadoTotalArticulos = document.getElementById("resultado");

                                                                                                //TOTAL IVA PRECIO TOTAL DE ARTICULOS----------------------------------------------------------------------------
                                                                                                $.ajax({
                                                                                                    url: 'primeraVezPaginaCarrito', // aqui va el nombre de la ruta
                                                                                                    method: 'GET', // el metodo que se usa en la ruta
                                                                                                    dataType: 'json',
                                                                                                    success: function(response) {
                                                                                                        //respuesta del controlador 
                                                                                                        precioTotalProductoIva.textContent = "₡" + response.suma;
                                                                                                        $resultadoTotalArticulos.textContent = response.sumaTotalArticulos;
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
                                                                                                    var btnMas = document.getElementById("btnMas{{ $item->id }}");
                                                                                                    var sumarInput = document.getElementById('inputCantidad{{ $item->id }}');
                                                                                                    var colorSeleccionado = document.getElementById("colorSelect{{ $item->id }}");
                                                                                                    var soloDejarColor = colorSeleccionado.textContent.replace("Color:", "");
                                                                                                    var precioTotalProductoIva = document.getElementById("sumaTotalProductos");
                                                                                                    var idProductoCarrito = sumarInput.id.replace("inputCantidad", "");
                                                                                                    var $resultadoTotalArticulos = document.getElementById("resultado");


                                                                                                    $.ajax({
                                                                                                        url: 'sumarCambioInputCambioTotalIva', // aqui va el nombre de la ruta
                                                                                                        method: 'GET', // el metodo que se usa en la ruta
                                                                                                        data: {
                                                                                                            id: idProductoCarrito,
                                                                                                            color: soloDejarColor,
                                                                                                        }, //los parametros enviados
                                                                                                        dataType: 'json',
                                                                                                        success: function(response) {
                                                                                                            //respuesta del controlador 
                                                                                                            precioTotalProductoIva.textContent = "₡" + response.suma;
                                                                                                            sumarInput.value = response.cantidad;
                                                                                                            $resultadoTotalArticulos.textContent = response.sumaTotalArticulos;

                                                                                                        }
                                                                                                    });


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
                            </div>
                            @endif
                            @endforeach
                            @endforeach


                            <!-- Right Block: cart subtotal & cart total -->
                            <div class="cart-grid-right col-12 col-lg-4  mb-3">
                                <div class="card card_trans cart-summary">
                                    <div class="cart-detailed-totals">
                                        <div class="card-block">
                                            <div class="cart-summary-line clearfix" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    <div style="display: inline-block;" id="resultado"></div>
                                                    Total de artículos
                                                </span>
                                            </div>

                                        </div>
                                        <div class="cart-voucher">
                                            <hr>

                                        </div>
                                        <hr>
                                        <div class="card-block">
                                            <div class="cart-summary-line clearfix cart-total">
                                                <span class="label">Total (IVA inc.)</span>
                                                <span class="value price fs_lg font-weight-bold"
                                                    id="sumaTotalProductos"></span>
                                            </div>
                                            <div class="cart-summary-line clearfix">
                                                <span class="label"></span>
                                                <span class="value price"></span>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="checkout cart-detailed-actions card-block">
                                        <a href="https://momakids.es/pedido"
                                            class="btn btn-default btn-full-width">finalizar
                                            compra</a>
                                    </div>
                                </div>
                            </div>
                    </div>
        </section>
    </div>
    </div>
    </div>
    </section>


</body>

</html>
