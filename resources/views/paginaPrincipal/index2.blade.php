<html class="js hydrated shopify-features__smart-payment-buttons--enabled" lang="es"
    style="--announcement-bar-height: 43px; --header-height: 230px;">

<head>
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
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="theme-color" content="#000000">
    <!-- BEGIN app block: shopify://apps/yoast-seo-seo-for-everyone/blocks/metatags/7c777011-bc88-4743-a24e-64336e1e5b46 -->
    <!-- This site is optimized with Yoast SEO for Shopify -->
    <title>ShopisCr</title>
    <meta name="description"
        content="La mejor Tienda De Productos Para Adultos Chat Con Asesora Gratis. Envíos 100% discretos, Enviamos a todo el país.">
    <meta property="og:site_name" content="ShopisCr">
    <meta property="og:url" content="https://www.shopiscr.com/">
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website">
    <meta property="og:title" content="La mejor Tienda ShopisCr">
    <meta property="og:description" content="La mejor Tienda De Productos Para Adultos">
    <meta property="og:image" content="">
    <meta property="og:image:height" content="628">
    <meta property="og:image:width" content="1200">
    <!--/ Yoast SEO -->
    <!-- END app app block -->
    <!--icono-->
    <link style="width: 16px; height: 16px;" rel="icon" href="images/icono.png" type="image/png">
</head>

<body class="warehouse--v4 features--animate-zoom template-index" data-instant-intensity="viewport">
    <!-- END sections: header-group -->
    <!-- BEGIN sections: overlay-group -->
    <div class="navbar navbar-inverse"
        style="background-color: #e7e7e7 !important; position: fixed; width: 100% !important; z-index: 9999 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-header" style="position: relative; top: 5px">
                        <button style="background-color: #EA6A2F; border-color: white" id="parpadeoDrop"
                            class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span></button>
                        <a href="#" class="header__logo-link">
                            <img style="height: 70px;" class="header__logo-image"
                                src="images/logoShopis.jpg?v=1676468577" alt="" id="logo">
                        </a>
                    </div>
                    <form action="{{ route('index') }}" method="GET">
                        <div class="navbar-collapse collapse" id="mobile_menu">
                            <ul class="nav navbar-nav">
                                <!--<li class="active"><a href="#">Home</a></li>-->
                                <li class="dropdown"> <!-- Agregamos la clase "dropdown" al elemento li -->
                                    <a style="color: 9d9d9d !important; background-color: #e7e7e7; position: relative; top: 10px"class="dropdown-toggle"
                                        data-toggle="dropdown">Categorías</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('index', ['categoria' => 'TODOS']) }}">TODOS</a></li>
                                        @foreach ($categorias as $item)
                                            <li>
                                                <a
                                                    href="{{ route('index', ['categoria' => $item->nombreCategoria]) }}">{{ $item->nombreCategoria }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <!--
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                            -->
                            </ul>
                            <ul class="nav navbar-nav">
                                <!--<li class="active"><a href="#">Home</a></li>-->
                                <li class="dropdown"> <!-- Agregamos la clase "dropdown" al elemento li -->
                                    <a style="color: 9d9d9d !important; background-color: #e7e7e7; position: relative; top: 10px"class="dropdown-toggle"
                                        data-toggle="dropdown">Horario</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Lunes de 9am a 6 pm</a></li>
                                        <li><a href="#">Martes de 9am a 6 pm</a></li>
                                        <li><a href="#">Miércoles de 9am a 6 pm</a></li>
                                        <li><a href="#">Jueves de 9am a 6 pm</a></li>
                                        <li><a href="#">Viernes de 9am a 6 pm</a></li>
                                        <li><a href="#">Sábado de 9am a 6 pm</a></li>
                                        <li><a href="#">Domingo Cerrado</a></li>
                                    </ul>
                                </li>
                                <!--
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                            -->
                            </ul>
                            <ul class="nav navbar-nav">
                                <li>
                                    <form action="" class="navbar-form" style="width: 100%">
                                        <div class="form-group">
                                            <div
                                                style="display: flex;align-items: center; position: relative; top: 15px">
                                                <input type="search" name="txtBuscar" id="search-input"
                                                    placeholder="Nombre/Tamaño/Color" class="form-control">
                                                <button type="submit">
                                                    <i class="fa-solid fa-magnifying-glass fa-xl"
                                                        style="color: #ffffff;"></i> </button>
                                            </div>
                                    </form>
                                </li>
                            </ul>
                            <a href="{{ route('carritoCompras') }}">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <div style="display: inline-flex; position: relative; top: 7px" id="parpadeo">
                                            <!-- carrito -->
                                            <svg style="color: #9d9d9d" xmlns="http://www.w3.org/2000/svg"
                                                width="28" height="28" fill="currentColor"
                                                class="bi bi-cart3" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    fill="#9d9d9d">
                                                </path>
                                            </svg>
                                            <div style="color: #9d9d9d" id="contadorCarrito">
                                                {{ $contadorCarrito->contadorCarrito }}</div>
                                            <h4 style="color: #9d9d9d;">Carrito de compras</h4>
                                            <!-- carrito -->
                                        </div>
                                    </li>
                                </ul>
                            </a>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 60px;" id="espacioImagenPrincipal"></div>

    @if (isset($imagenPrincipal->imagen))
        <section class="animacion1" style="display: none">
            <div id="shopify-section-sections--14562733359167__popups"
                class="shopify-section shopify-section-group-overlay-group">
                <div data-section-id="sections--14562733359167__popups" data-section-type="popups"></div>
            </div>
            <!-- END sections: overlay-group -->
            <main id="main" role="main" class="component">
                <div class="hidden-phone">
                    <img src="images/{{ $imagenPrincipal->imagen }}?v=1680025258&amp;width=1920" alt=""
                        width="1920" height="600" loading="lazy" class="slideshow__image zoom">
                </div>
                <div class="hidden-tablet-and-up zoom"><img
                        src="images/{{ $imagenPrincipal->imagen }}?v=1680025277&amp;width=1200" alt=""
                        width="1200" height="1080" loading="lazy" class="slideshow__image ">
                </div>
                </div>
                <div id="shopify-section-template--14562732638271__collection-list" class="shopify-section">
                    <section class="section" data-section-id="template--14562732638271__collection-list"
                        data-section-type="collection-list">
                    </section>
                </div>

                <section class="section section--text-centered"
                    data-section-id="template--14562732638271__8d8dabb7-46e1-4ebb-82e1-523d2e198241"
                    data-section-type="rich-text">
                    <div class="container container--narrow">
                        <h3>Descubre el poder de la calidad en cada uno de nuestros productos.</h3>
                    </div>
                </section>

        </section>
    @endif

    <div style="height: 30px;" id="espacioImagenPrincipal"></div>


    <div class="container">
        <header class="section__header">
            <div class="section__header-stack">
                <h2 class="section__title heading h3">Productos</h2>
            </div>
        </header>
    </div>


    <div class="container">
        <header class="section__header">
            <div class="section__header-stack">
                <p>{{ session('noEncontroProducto') }}</p>
            </div>
        </header>
    </div>


    {{ $productos->appends(request()->input())->links('pagination::bootstrap-4') }}
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($productos as $index => $item)
                    <form id="miFormulario{{ $item->id }}">
                        @csrf
                        <div class="col mb-5" style="padding-top: 30px">
                            <div class="card h-100">
                                <div id="myCarousel{{ $index }}" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" id="carousel-inner{{ $item->id }}">
                                        <div id="selectImagenes{{ $item->id }}" class="item active"
                                            file-name="{{ $item->imagen }}">
                                            <img onclick="showImage('imagesProductos/{{ $item->imagen }}')"
                                                style="width: 380px; height: 260px;"class="card-img-top"
                                                src="imagesProductos/{{ $item->imagen }}" alt="...">
                                        </div>
                                    </div>
                                    <script>
                                        //me trae las imagenes del color seleccionado y del producto seleccionado
                                        $(document).ready(function() {
                                            $('#color-select-{{ $item->id }}').change(function() {
                                                //console.log($(this));
                                                var productId = $(this).attr('id').replace('color-select-', '');
                                                var selectedColor = $(this).val();
                                                if ($.trim(productId != "")) {
                                                    $.ajax({
                                                        url: 'jqImagenes', // aqui va el nombre de la ruta
                                                        method: 'GET', // el metodo que se usa en la ruta
                                                        data: {
                                                            productId: productId,
                                                            selectedColor: selectedColor
                                                        }, //los parametros enviados
                                                        dataType: 'json',
                                                        success: function(response) {
                                                            //console.log(response);
                                                            var divElement = document.getElementById(
                                                                "selectImagenes{{ $item->id }}"); // class item
                                                            divElement.innerHTML =
                                                                ""; // Limpiar el contenido del div asignando una cadena vacía
                                                            var car_element = document.getElementById("carousel-inner" +
                                                                productId);
                                                            if (response.length == 1) {
                                                                divElement.innerHTML = "";
                                                                $("#selectImagenes" + productId).append(
                                                                    "<img onclick=\"showImage('imagesProductos/" + response[
                                                                        0] +
                                                                    "')\" style='width: 380px; height: 260px;' class='card-img-top' src='imagesProductos/" +
                                                                    response[0] + "'>"
                                                                );
                                                                //coloca la primera opcion
                                                                divElement.setAttribute("file-name", response[0]);
                                                                var images = car_element.querySelectorAll(".item");
                                                                images.forEach((element) => {
                                                                    if (element.getAttribute("file-name") != response[
                                                                            0]) {
                                                                        element.remove();
                                                                    } else {
                                                                        element.classList.add("active");
                                                                    }
                                                                });
                                                            } else {
                                                                var array_images = [];
                                                                response.forEach((image) => {
                                                                    array_images.push(image);
                                                                });
                                                                var imageCount = 0;
                                                                for (var i = 0; i < response
                                                                    .length; i++
                                                                ) { //me trae las imagenes de la consulta que viene del response
                                                                    if (response[i] != "formTamañosCantidades") {
                                                                        if (i == 0) {
                                                                            $("#selectImagenes" + productId).append(
                                                                                "<img onclick=\"showImage('imagesProductos/" +
                                                                                response[i] +
                                                                                "')\" style='width: 380px; height: 260px;' class='card-img-top' src='imagesProductos/" +
                                                                                response[i] + "'>");
                                                                            divElement.setAttribute("file-name", response[i]);
                                                                        } else {
                                                                            var clone = divElement.cloneNode(true);
                                                                            clone.firstChild.src = "imagesProductos/" +
                                                                                response[i];
                                                                            clone.classList.remove("active");
                                                                            clone.setAttribute("file-name", response[i]);
                                                                            clone.setAttribute("onclick",
                                                                                "showImage('imagesProductos/" + response[
                                                                                    i] + "')");
                                                                            car_element.appendChild(clone);
                                                                        }
                                                                        var isactive = false;
                                                                        var images = car_element.querySelectorAll(".item");
                                                                        images.forEach((element) => {
                                                                            if (!array_images.includes(element
                                                                                    .getAttribute("file-name"))) {
                                                                                element.remove();
                                                                            } else {
                                                                                if (!isactive) {
                                                                                    element.classList.add("active");
                                                                                    isactive = true;
                                                                                }
                                                                            }
                                                                        });
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    </script>

                                    @if ($item->categoria != 'EMINENCE' && $item->categoria != 'PROTEINAS')
                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel{{ $index }}"
                                            data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel{{ $index }}"
                                            data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    @endif



                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder nombre">{{ $item->nombre }}</h5>
                                    <!-- Product price-->
                                    <h5 class="fw-bolder precio">Precio: ₡{{ $item->precio }}</h5>
                                </div>
                            </div>
                            <br>
                            <!-- Dependiendo la categoria muestra las opciones-->
                            @if ($item->categoria != 'EMINENCE' && $item->categoria != 'PROTEINAS')
                                <div class="product-item__info-inner">
                                    <div class="form-group">
                                        <select class="form-control styleSelect"
                                            name="color"id="color-select-{{ $item->id }}">
                                            <option disabled selected>Seleccione el color</option>
                                            <option>{{ $item->color }}</option>
                                            <?php $coloresExistentes = []; ?>
                                            @foreach ($fotos as $item2)
                                                @if ($item->id == $item2->idFK && !in_array($item2->color, $coloresExistentes))
                                                    @if ($item->color != $item2->color)
                                                        <option>{{ $item2->color }}</option>
                                                        <?php $coloresExistentes[] = $item2->color; ?>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="product-item__info-inner">
                                    <div class="form-group">
                                        <select class="form-control styleSelect"name="tamaño"
                                            id="selectTamaños{{ $item->id }}">
                                            <option disabled selected>Seleccione el tamaño</option>
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <script>
                                //me trae los tamaños del color seleccionado y del producto seleccionado
                                $(document).ready(function() {
                                    $('#color-select-{{ $item->id }}').change(function() {
                                        var productId = $(this).attr('id').replace('color-select-', '');
                                        var selectedColor = $(this).val();
                                        //console.log(selectedColor);
                                        if ($.trim(productId != "")) {
                                            $.ajax({
                                                url: 'jqTamaños', // aqui va el nombre de la ruta
                                                method: 'GET', // el metodo que se usa en la ruta
                                                data: {
                                                    productId: productId,
                                                    selectedColor: selectedColor
                                                }, //los parametros enviados
                                                dataType: 'json',
                                                success: function(response) {
                                                    const filteredObj = Object.fromEntries(
                                                        Object.entries(response).filter(([key, value]) => value !==
                                                            'formImagenes')
                                                    );
                                                    // Crear un arreglo con los valores filtrados sin que vengan con 'formImagenes'
                                                    const newArray = Object.values(filteredObj);
                                                    $("#selectTamaños" + productId)
                                                        .empty(); //limpia el select de tamaños
                                                    $("#selectTamaños" + productId).append(
                                                        "<option value=''>Selecciona el tamaño</option>"
                                                    ); //coloca la primera opcion
                                                    for (var i = 0; i < newArray
                                                        .length; i++
                                                    ) { //me trae los tamaños de la consulta que viene del response
                                                        $("#selectTamaños" + productId).append("<option value='" +
                                                            newArray[i] + "'>" + newArray[i] + "</option>"
                                                        ); // Agrega las opciones con los tamaños
                                                    }
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="sessionCliente" value="{{ $sessionCliente }}">
                            <input type="hidden" name="categoria" value="{{ $item->categoria }}">
                            <button style="width: 100%" type="submit" id="botonCarrito{{ $item->id }}"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</button>
                            <div id="mensajeContainer{{ $item->id }}"></div>
                            <script>
                                $(document).ready(function() {
                                    // Asigna un controlador de eventos al botón
                                    $('#botonCarrito{{ $item->id }}').click(function(e) {
                                        e.preventDefault(); // Evita que se envíe el formulario por defecto
                                        // Obtén los datos del formulario
                                        var formData = $('#miFormulario{{ $item->id }}').serialize();
                                        console.log(formData);
                                        // Separar los pares clave-valor por el caracter "&"
                                        var pairs = formData.split('&');
                                        // Crear un objeto para almacenar los valores separados
                                        var data = {};
                                        // Recorrer los pares clave-valor separados
                                        for (var i = 0; i < pairs.length; i++) {
                                            // Separar cada par en clave y valor
                                            var pair = pairs[i].split('=');
                                            // Obtener la clave y el valor
                                            var key = decodeURIComponent(pair[0]);
                                            //console.log(key);
                                            var value = decodeURIComponent(pair[1]);
                                            // Almacenar el valor en el objeto usando la clave
                                            data[key] = value;
                                        }

                                        // Acceder a los valores separados por clave
                                        var categoria = data['categoria'];
                                        var id = data['id'];
                                        var color = data['color'];
                                        var tamaño = data['tamaño'];
                                        var sessionCliente = data['sessionCliente'];
                                        if (categoria == "EMINENCE" || categoria == "PROTEINAS") {
                                            color = "NINGUNO";
                                            tamaño = "NINGUNO";
                                        }


                                        if (color == undefined || tamaño == "") {
                                            var mensajeContainer = document.getElementById("mensajeContainer{{ $item->id }}");
                                            mensajeContainer.innerHTML =
                                                "Debe seleccionar un color y un tamaño"; // limpio el mensajecontainer
                                        } else {
                                            //console.log("color:" + color);
                                            //console.log("tamaño:" + tamaño);
                                            //console.log(sessionCliente);
                                            //console.log("si se selecciono el color");
                                            $.ajax({
                                                url: 'carritoCompraVerificarCantidad', // aqui va el nombre de la ruta
                                                method: 'GET', // el metodo que se usa en la ruta
                                                data: {
                                                    productId: id,
                                                    selectedColor: color,
                                                    selectedTamaño: tamaño,
                                                    sessionCliente: sessionCliente,
                                                }, //los parametros enviados
                                                dataType: 'json',
                                                success: function(response) {
                                                    //respuesta del controlador 
                                                    console.log(response.producto.cantidad);
                                                    console.log(response.foto.cantidad);
                                                    if (response.producto.cantidad != null) {
                                                        //console.log("Cantidad de producto tabla producto " + response.producto.cantidad + " del tamaño " + response.producto.tamaño);
                                                        if (response.producto.cantidad <= 0) {
                                                            var mensajeContainer = document.getElementById(
                                                                "mensajeContainer{{ $item->id }}");
                                                            mensajeContainer.innerHTML =
                                                                "No quedan en inventario del tamaño " + response
                                                                .producto.tamaño;
                                                        } else {
                                                            var mensajeContainer = document.getElementById(
                                                                "mensajeContainer{{ $item->id }}");
                                                            mensajeContainer.innerHTML =
                                                                ""; // limpio el mensajecontainer
                                                            //enviar a otro ajax donde me guarde el articulo y tambien se sume el carrito del usuario
                                                            //console.log("Agregar al carrito");
                                                            //tabla productos
                                                            $.ajax({
                                                                url: 'carritoCompraTablaProducto', // aqui va el nombre de la ruta
                                                                method: 'GET', // el metodo que se usa en la ruta
                                                                data: {
                                                                    productId: id,
                                                                    selectedColor: color,
                                                                    selectedTamaño: tamaño,
                                                                    sessionCliente: sessionCliente,
                                                                }, //los parametros enviados
                                                                dataType: 'json',
                                                                success: function(response) {
                                                                    console.log(response);
                                                                    if (response ==
                                                                        "Si desea sumar mas de este producto entrar al carrito de compra"
                                                                    ) {
                                                                        var mensajeContainer = document
                                                                            .getElementById(
                                                                                "mensajeContainer{{ $item->id }}"
                                                                            );
                                                                        mensajeContainer.innerHTML =
                                                                            response; // limpio el mensajecontainer
                                                                    } else {
                                                                        var mensajeContainer = document
                                                                            .getElementById(
                                                                                "mensajeContainer{{ $item->id }}"
                                                                            );
                                                                        mensajeContainer.innerHTML =
                                                                            "Se agrego correctamente al carrito"; // limpio el mensajecontainer
                                                                        var numeroContadorCarrito = document
                                                                            .getElementById(
                                                                                "contadorCarrito");
                                                                        var parpadeo2 = document
                                                                            .getElementById("parpadeo");
                                                                        var parpadeo3 = document
                                                                            .getElementById("parpadeoDrop");
                                                                        // Función para actualizar el valor del contador y añadir la clase "parpadeo"
                                                                        function actualizarContador(
                                                                            nuevoValor) {
                                                                            numeroContadorCarrito
                                                                                .innerHTML = nuevoValor;
                                                                            parpadeo2.classList.add(
                                                                                "parpadeo");
                                                                            parpadeo3.classList.add(
                                                                                "parpadeo");
                                                                            // Eliminar la clase "parpadeo" después de la animación
                                                                            setTimeout(function() {
                                                                                    parpadeo2.classList
                                                                                        .remove(
                                                                                            "parpadeo");
                                                                                    parpadeo3.classList
                                                                                        .remove(
                                                                                            "parpadeo");
                                                                                },
                                                                                6000
                                                                            ); // 2s * 3 = 6s (duración total de la animación)
                                                                        }
                                                                        // Ejemplo de uso: actualizar el contador con un nuevo valor
                                                                        var nuevoValor = response;
                                                                        actualizarContador(nuevoValor);
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    } else if (response.foto.cantidad != null) {
                                                        //console.log("Cantidad de producto tabla foto " + response.foto.cantidad + " del tamaño " + response.foto.tamaño);
                                                        if (response.foto.cantidad <= 0) {
                                                            //console.log("Debo mandar una variable donde se imprima que no se pudo agregar el producto al carrito");
                                                            var mensajeContainer = document.getElementById(
                                                                "mensajeContainer{{ $item->id }}");
                                                            mensajeContainer.innerHTML =
                                                                "No quedan en inventario del tamaño " + response.foto
                                                                .tamaño;
                                                        } else {
                                                            var mensajeContainer = document.getElementById(
                                                                "mensajeContainer{{ $item->id }}");
                                                            mensajeContainer.innerHTML =
                                                                ""; // limpio el mensajecontainer
                                                            //enviar a otro ajax donde me guarde el articulo y tambien se sume el carrito del usuario
                                                            //console.log("Agregar al carrito");
                                                            //tabla fotos
                                                            $.ajax({
                                                                url: 'carritoCompraTablaFotos', // aqui va el nombre de la ruta
                                                                method: 'GET', // el metodo que se usa en la ruta
                                                                data: {
                                                                    productId: id,
                                                                    selectedColor: color,
                                                                    selectedTamaño: tamaño,
                                                                    sessionCliente: sessionCliente,
                                                                }, //los parametros enviados
                                                                dataType: 'json',
                                                                success: function(response) {
                                                                    //respuesta del controlador 
                                                                    //console.log(response);
                                                                    if (response ==
                                                                        "Si desea sumar mas de este producto entrar al carrito de compra"
                                                                    ) {
                                                                        var mensajeContainer = document
                                                                            .getElementById(
                                                                                "mensajeContainer{{ $item->id }}"
                                                                            );
                                                                        mensajeContainer.innerHTML =
                                                                            response; // limpio el mensajecontainer
                                                                    } else {
                                                                        var mensajeContainer = document
                                                                            .getElementById(
                                                                                "mensajeContainer{{ $item->id }}"
                                                                            );
                                                                        mensajeContainer.innerHTML =
                                                                            "Se agrego correctamente al carrito"; // limpio el mensajecontainer
                                                                        var numeroContadorCarrito = document
                                                                            .getElementById(
                                                                                "contadorCarrito");
                                                                        var parpadeo2 = document
                                                                            .getElementById("parpadeo");
                                                                        var parpadeo3 = document
                                                                            .getElementById("parpadeoDrop");
                                                                        // Función para actualizar el valor del contador y añadir la clase "parpadeo"
                                                                        function actualizarContador(
                                                                            nuevoValor) {
                                                                            numeroContadorCarrito
                                                                                .innerHTML = nuevoValor;
                                                                            parpadeo2.classList.add(
                                                                                "parpadeo");
                                                                            parpadeo3.classList.add(
                                                                                "parpadeo");
                                                                            // Eliminar la clase "parpadeo" después de la animación
                                                                            setTimeout(function() {
                                                                                    parpadeo2.classList
                                                                                        .remove(
                                                                                            "parpadeo");
                                                                                    parpadeo3.classList
                                                                                        .remove(
                                                                                            "parpadeo");
                                                                                },
                                                                                6000
                                                                            ); // 2s * 3 = 6s (duración total de la animación)
                                                                        }
                                                                        // Ejemplo de uso: actualizar el contador con un nuevo valor
                                                                        var nuevoValor = response;
                                                                        actualizarContador(nuevoValor);
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    }
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </section>
    </section>
    </div>
    <div id="shopify-section-template--14562732638271__5199ee47-c016-4657-bf0b-bfd73334618b" class="shopify-section">
        <section class="section section--text-centered"
            data-section-id="template--14562732638271__5199ee47-c016-4657-bf0b-bfd73334618b"
            data-section-type="rich-text">
            <div class="container container--medium" data-aos="fade-right">
                <h2 class="heading h1">Tu estilo merece la excelencia.</h2>
                <div class="rte">
                </div>
            </div>
        </section>
    </div>
    <div id="shopify-section-template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03" class="shopify-section">
        <div class="container">
            <header class="section__header">
                <div class="section__header-stack">
                    <h2 class="section__title heading h3">Los productos más vendidos</h2>
                </div>
            </header>
        </div>
        <div id="cellProductosMasVendidos" style="display: block;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($productosMasVendidos as $index => $item)
                        <li data-target="#myCarousel" data-slide-to="{{ $index }}"
                            @if ($index === 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="display: grid;  place-items: center;">
                    @foreach ($productosMasVendidos as $index => $item)
                        <div class="item @if ($index === 0) active @endif">
                            <img src="imagesProductos/{{ $item->imagen }}" style="width: 500px; height: 380px;"
                                onclick="showImage('imagesProductos/{{ $item->imagen }}')">
                        </div>
                    @endforeach
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
        <div class="container container--flush">
            <section class="py-5" id="pcProductosMasVendidos" style="display: block">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @foreach ($productosMasVendidos as $index => $item)
                            @csrf
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div id="myCarousel{{ $index }}" class="carousel slide"
                                        data-ride="carousel">
                                        <!-- Indicators -->
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" id="carousel-inner{{ $item->id }}">
                                            <div id="selectImagenes{{ $item->id }}" class="item active"
                                                file-name="{{ $item->imagen }}">
                                                <img onclick="showImage('imagesProductos/{{ $item->imagen }}')"
                                                    style="width: 380px; height: 260px;"class="card-img-top"
                                                    src="imagesProductos/{{ $item->imagen }}" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder nombre">{{ $item->nombre }}</h5>
                                        <!-- Product price-->
                                        <h5 class="fw-bolder precio">Precio: ₡{{ $item->precio }}</h5>
                                    </div>
                                </div>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        // Llama a la función cuando se carga la página y cuando se cambia el tamaño de la ventana
        window.addEventListener('load', function() {
            var pcProductosMasVendidos = document.getElementById("pcProductosMasVendidos");
            var cellProductosMasVendidos = document.getElementById("cellProductosMasVendidos");
            //console.log(pcProductosMasVendidos.style.display);
            if (window.innerWidth >= 600) {
                pcProductosMasVendidos.style.display = "block";
                cellProductosMasVendidos.style.display = "none";
            } else {
                pcProductosMasVendidos.style.display = "none";
                cellProductosMasVendidos.style.display = "block";
            }
        });
        window.addEventListener('resize', function() {
            var pcProductosMasVendidos = document.getElementById("pcProductosMasVendidos");
            //console.log(pcProductosMasVendidos.style.display);
            if (window.innerWidth >= 600) {
                pcProductosMasVendidos.style.display = "block";
                cellProductosMasVendidos.style.display = "none";
            } else {
                pcProductosMasVendidos.style.display = "none";
                cellProductosMasVendidos.style.display = "block";
            }
        });
    </script>
    <div id="shopify-section-template--14562732638271__3c0c8859-6c6a-460f-9e13-00fdb706e079" class="shopify-section">
        <section class="section" data-section-id="template--14562732638271__3c0c8859-6c6a-460f-9e13-00fdb706e079"
            data-section-type="featured-collection"
            data-section-settings="{
    &quot;stackable&quot;: true,
    &quot;layout&quot;: &quot;vertical&quot;
  }">
        </section>
        <div class="container">
            <header class="section__header">
                <div class="section__header-stack">
                    <h2 class="section__title heading h3">Lo más nuevo.</h2>
                </div>
            </header>
        </div>
        <div class="container container--flush">
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @foreach ($top5ProductosMasActuales as $index => $item)
                            @csrf
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <div id="myCarousel{{ $index }}" class="carousel slide"
                                        data-ride="carousel">
                                        <!-- Indicators -->
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" id="carousel-inner{{ $item->id }}">
                                            <div id="selectImagenes{{ $item->id }}" class="item active"
                                                file-name="{{ $item->imagen }}">
                                                <img onclick="showImage('imagesProductos/{{ $item->imagen }}')"
                                                    style="width: 380px; height: 260px;"class="card-img-top"
                                                    src="imagesProductos/{{ $item->imagen }}" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder nombre">{{ $item->nombre }}</h5>
                                        <!-- Product price-->
                                        <h5 class="fw-bolder precio">Precio: ₡{{ $item->precio }}</h5>
                                    </div>
                                </div>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        </section>
    </div>
    <div id="shopify-section-template--14562732638271__127e7bfe-e656-4552-b607-86d223e6a4d2" class="shopify-section">
        <section class="section section--text-centered"
            data-section-id="template--14562732638271__127e7bfe-e656-4552-b607-86d223e6a4d2"
            data-section-type="rich-text">
            <div class="container container--narrow" data-aos="fade-right">
                <h2 class="heading h1">Haz que tu vida sea más cómoda, saludable y feliz con nuestros productos.</h2>
                <div class="rte">
                </div>
            </div>
        </section>
    </div>
    <form id="categoryForm" action="{{ route('index') }}" method="GET">
        <input type="hidden" id="categoryInput" name="categoria" value="">
    </form>
    <div class="shopify-section">
        <section class="section" data-section-id="template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8"
            data-section-type="mosaic">
            <div class="container">
                <div class="mosaic mosaic--medium mosaic--three-columns">
                    <div class="mosaic__column">
                        @foreach ($productosSeccionCategoria as $index => $item)
                            @if ($index < 2)
                                <div class="mosaic__item">
                                    <a href="#" class="promo-block promo-block--bottom-left"
                                        onclick="submitCategoryForm('{{ $item->categoria }}'); return false;">
                                        <div class="promo-block__image-clip">
                                            <div class="promo-block__image-wrapper promo-block__image-wrapper--cover">
                                                <img src="imagesSeccionProductoCategoria/{{ $item->imagenName }}"
                                                    alt="{{ $item->categoria }}" width="801" height="520"
                                                    loading="lazy" sizes="min(100vw, 560px)"
                                                    class="image-background">
                                                <h1 class="overlay-heading">{{ $item->categoria }}</h1>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @else
                            @break
                        @endif
                    @endforeach
                </div>
                <div class="mosaic__column">
                    @foreach ($productosSeccionCategoria as $index => $item)
                        @if ($index == 2)
                            <div class="mosaic__item">
                                <a href="#" class="promo-block promo-block--bottom-left"
                                    onclick="submitCategoryForm('{{ $item->categoria }}'); return false;">
                                    <div class="promo-block__image-clip">
                                        <div class="promo-block__image-wrapper promo-block__image-wrapper--cover">
                                            <img src="imagesSeccionProductoCategoria/{{ $item->imagenName }}"
                                                alt="{{ $item->categoria }}" width="1101" height="1101"
                                                loading="lazy" sizes="min(100vw, 560px)"
                                                class="image-background">
                                            <h1 class="overlay-heading">{{ $item->categoria }}</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="mosaic__column">
                    @foreach ($productosSeccionCategoria as $index => $item)
                        @if ($index > 2 && $index < 5)
                            <div class="mosaic__item">
                                <a href="#" class="promo-block promo-block--bottom-left"
                                    onclick="submitCategoryForm('{{ $item->categoria }}'); return false;">
                                    <div class="promo-block__image-clip">
                                        <div class="promo-block__image-wrapper promo-block__image-wrapper--cover">
                                            <img src="imagesSeccionProductoCategoria/{{ $item->imagenName }}"
                                                alt="{{ $item->categoria }}" width="801" height="520"
                                                loading="lazy" sizes="min(100vw, 560px)"
                                                class="image-background">
                                            <h1 class="overlay-heading">{{ $item->categoria }}</h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function submitCategoryForm(category) {
        document.getElementById('categoryInput').value = category;
        document.getElementById('categoryForm').submit();
    }
</script>
<div id="shopify-section-template--14562732638271__220c92e8-4944-411d-b5f7-cdc598a18b79" class="shopify-section">
    <section class="section section--text-centered"
        data-section-id="template--14562732638271__220c92e8-4944-411d-b5f7-cdc598a18b79"
        data-section-type="rich-text">
        <div class="container container--narrow" data-aos="fade-right">
            <h2 class="heading h1">Rompe tus límites, haz historia.</h2>
            <div class="rte">
            </div>
        </div>
    </section>
</div>
<div class="container">
    <div style="text-align: right !important;">
        <p>Síguenos</p>
        <li class="social-media__item social-media__item--facebook">
            <a href="https://www.facebook.com/profile.php?id=100063694886908" target="_blank" rel="noopener"
                aria-label="Síguenos en Facebook" aria-describedby="a11y-new-window-message"><svg
                    focusable="false" class="icon icon--facebook " viewBox="0 0 30 30">
                    <path
                        d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm3.2142857-17.1429611h-2.1428678v-2.1425646c0-.5852979.8203285-1.07160109 1.0714928-1.07160109h1.071375v-2.1428925h-2.1428678c-2.3564786 0-3.2142536 1.98610393-3.2142536 3.21449359v2.1425646h-1.0714822l.0032143 2.1528011 1.0682679-.0099086v7.499969h3.2142536v-7.499969h2.1428678v-2.1428925z"
                        fill="currentColor" fill-rule="evenodd"></path>
                </svg></a>
        </li>
        <li class="social-media__item social-media__item--instagram">
            <a href="https://www.instagram.com/shopis.cr/" target="_blank" rel="noopener"
                aria-label="Síguenos en Instagram" aria-describedby="a11y-new-window-message"><svg
                    focusable="false" class="icon icon--instagram " role="presentation" viewBox="0 0 30 30">
                    <path
                        d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm.0000159-23.03571429c-2.1823849 0-2.4560363.00925037-3.3131306.0483571-.8553081.03901103-1.4394529.17486384-1.9505835.37352345-.52841925.20532625-.9765517.48009406-1.42331254.926823-.44672894.44676084-.72149675.89489329-.926823 1.42331254-.19865961.5111306-.33451242 1.0952754-.37352345 1.9505835-.03910673.8570943-.0483571 1.1307457-.0483571 3.3131306 0 2.1823531.00925037 2.4560045.0483571 3.3130988.03901103.8553081.17486384 1.4394529.37352345 1.9505835.20532625.5284193.48009406.9765517.926823 1.4233125.44676084.446729.89489329.7214968 1.42331254.9268549.5111306.1986278 1.0952754.3344806 1.9505835.3734916.8570943.0391067 1.1307457.0483571 3.3131306.0483571 2.1823531 0 2.4560045-.0092504 3.3130988-.0483571.8553081-.039011 1.4394529-.1748638 1.9505835-.3734916.5284193-.2053581.9765517-.4801259 1.4233125-.9268549.446729-.4467608.7214968-.8948932.9268549-1.4233125.1986278-.5111306.3344806-1.0952754.3734916-1.9505835.0391067-.8570943.0483571-1.1307457.0483571-3.3130988 0-2.1823849-.0092504-2.4560363-.0483571-3.3131306-.039011-.8553081-.1748638-1.4394529-.3734916-1.9505835-.2053581-.52841925-.4801259-.9765517-.9268549-1.42331254-.4467608-.44672894-.8948932-.72149675-1.4233125-.926823-.5111306-.19865961-1.0952754-.33451242-1.9505835-.37352345-.8570943-.03910673-1.1307457-.0483571-3.3130988-.0483571zm0 1.44787387c2.1456068 0 2.3997686.00819774 3.2471022.04685789.7834742.03572556 1.2089592.1666342 1.4921162.27668167.3750864.14577303.6427729.31990322.9239522.60111439.2812111.28117926.4553413.54886575.6011144.92395217.1100474.283157.2409561.708642.2766816 1.4921162.0386602.8473336.0468579 1.1014954.0468579 3.247134 0 2.1456068-.0081977 2.3997686-.0468579 3.2471022-.0357255.7834742-.1666342 1.2089592-.2766816 1.4921162-.1457731.3750864-.3199033.6427729-.6011144.9239522-.2811793.2812111-.5488658.4553413-.9239522.6011144-.283157.1100474-.708642.2409561-1.4921162.2766816-.847206.0386602-1.1013359.0468579-3.2471022.0468579-2.1457981 0-2.3998961-.0081977-3.247134-.0468579-.7834742-.0357255-1.2089592-.1666342-1.4921162-.2766816-.37508642-.1457731-.64277291-.3199033-.92395217-.6011144-.28117927-.2811793-.45534136-.5488658-.60111439-.9239522-.11004747-.283157-.24095611-.708642-.27668167-1.4921162-.03866015-.8473336-.04685789-1.1014954-.04685789-3.2471022 0-2.1456386.00819774-2.3998004.04685789-3.247134.03572556-.7834742.1666342-1.2089592.27668167-1.4921162.14577303-.37508642.31990322-.64277291.60111439-.92395217.28117926-.28121117.54886575-.45534136.92395217-.60111439.283157-.11004747.708642-.24095611 1.4921162-.27668167.8473336-.03866015 1.1014954-.04685789 3.247134-.04685789zm0 9.26641182c-1.479357 0-2.6785873-1.1992303-2.6785873-2.6785555 0-1.479357 1.1992303-2.6785873 2.6785873-2.6785873 1.4793252 0 2.6785555 1.1992303 2.6785555 2.6785873 0 1.4793252-1.1992303 2.6785555-2.6785555 2.6785555zm0-6.8050167c-2.2790034 0-4.1264612 1.8474578-4.1264612 4.1264612 0 2.2789716 1.8474578 4.1264294 4.1264612 4.1264294 2.2789716 0 4.1264294-1.8474578 4.1264294-4.1264294 0-2.2790034-1.8474578-4.1264612-4.1264294-4.1264612zm5.2537621-.1630297c0-.532566-.431737-.96430298-.964303-.96430298-.532534 0-.964271.43173698-.964271.96430298 0 .5325659.431737.964271.964271.964271.532566 0 .964303-.4317051.964303-.964271z"
                        fill="currentColor" fill-rule="evenodd"></path>
                </svg></a>
        </li>
        <li class="social-media__item social-media__item--whatsapp">
            <a href="https://wa.me/50687249099?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
                target="_blank" rel="noopener" aria-label="Síguenos en Instagram"
                aria-describedby="a11y-new-window-message"><svg focusable="false" class="icon"
                    role="presentation" viewBox="2 1 21 21">
                    <path
                        d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z"
                        fill="currentColor" fill-rule="evenodd" class="focusAlWhatapps"></path>
                </svg></a>
        </li>
    </div>
    <header class="section__header">
        <h2 class="section__title heading h3">El mejor artículo de la temporada</h2>
    </header>
</div>
@if (isset($productoTemporada->id))
    <div>
        <div class="container container--flush">
            <div class="featured-product">
                <div class="card">
                    <div class="card__section card__section--tight">
                        <div class="product-gallery product-gallery--with-thumbnails">
                            <div class="product-gallery__carousel-wrapper">
                                <div class="product-gallery__carousel product-gallery__carousel--zoomable flickity-enabled is-fade"
                                    data-media-count="20" data-initial-media-id="22584943902783" style="">
                                    <div class="flickity-viewport" style="height: 400px; touch-action: pan-y;">
                                        <div class="flickity-slider"
                                            style="left: 0px; transform: translateX(50%);">
                                            <div class="product-gallery__carousel-item is-selected" tabindex="-1"
                                                data-media-id="22584943902783" data-media-type="image"
                                                style="position: absolute; left: -50%; opacity: 1;">
                                                <div class="product-gallery__size-limiter"
                                                    style="max-width: 1000px">
                                                    <div class="aspect-ratio" style="padding-bottom: 100.0%">
                                                        <img style="width: 380px; height: 380px;"
                                                            src="imagesProductos/{{ $productoTemporada->imagen }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card--collapsed ">
                    <div id="product-zoom-template--14562732638271__featured-product"
                        class="product__zoom-wrapper">
                    </div>
                    <div class="card__section">
                        <div class="product-meta">
                            <h3 class="product-meta__title heading h2">
                                <p>{{ $productoTemporada->nombre }}</p>
                            </h3>
                            <hr class="card__separator">
                            <div class="product-form__info-list">
                                <div class="product-form__info-item">
                                    <span class="product-form__info-title text--strong">Precio:</span>
                                    <div class="product-form__info-content" role="region" aria-live="polite">
                                        <div class="price-list"><span class="price">
                                                <p>₡{{ $productoTemporada->precio }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if ($productoTemporada->categoria != 'EMINENCE' && $productoTemporada->categoria != 'PROTEINAS')
                                    <div class="product-form__info-item">
                                        <span class="product-form__info-title text--strong">Color:</span>
                                        <div class="product-form__info-content" role="region"
                                            aria-live="polite">
                                            <div class="price-list"
                                                id="colorTemporada{{ $productoTemporada->color }}">
                                                <span class="price">
                                                    <p>{{ $productoTemporada->color }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-form__info-item">
                                        <span class="product-form__info-title text--strong">Tamaño:</span>
                                        <div class="product-form__info-content" role="region"
                                            aria-live="polite">
                                            <div id="tamañoTemporada{{ $productoTemporada->tamaño }}"
                                                class="price-list">
                                                <span class="price">
                                                    <p>{{ $productoTemporada->tamaño }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="product-form__info-item product-form__info-item--quantity">
                                    <label for="template--14562732638271__featured-product-7064984518719-quantity"
                                        class="product-form__info-title text--strong">Descripción:
                                    </label>
                                    <p><strong> {{ $productoTemporada->descripcion }}</strong></p>

                                </div>
                            </div>
                            <button style="width: 100%" type="submit"
                                id="botonCarritoTemporada{{ $productoTemporada->id }}"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</button>
                            <br><br>
                            <input id="session{{ $sessionCliente }}" type="hidden" name="sessionCliente"
                                value="{{ $sessionCliente }}">
                            <div id="mensajeContainer2{{ $productoTemporada->id }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#botonCarritoTemporada{{ $productoTemporada->id }}").click(function() {
                console.log("estoy aqui");
                var elementId = document.getElementById("mensajeContainer2{{ $productoTemporada->id }}");
                var id = elementId.id; // Get the ID attribute of the element
                id = id.replace("mensajeContainer2", ""); // Remove the prefix
                var elementColor = document.getElementById(
                "colorTemporada{{ $productoTemporada->color }}");
                var color = "";
                if (elementColor == null) {
                    color = "NINGUNO";
                } else {
                    color = elementColor.id; // Get the ID attribute of the element
                    color = color.replace("colorTemporada", ""); // Remove the prefix
                }
                var elementTamaño = document.getElementById(
                    "tamañoTemporada{{ $productoTemporada->tamaño }}");
                var tamaño = "";
                if (elementTamaño == null) {
                    tamaño = "NINGUNO";
                } else {
                    tamaño = elementTamaño.id; // Get the ID attribute of the element
                    tamaño = tamaño.replace("tamañoTemporada", ""); // Remove the prefix
                }
                var elementSession = document.getElementById("session{{ $sessionCliente }}");
                var sessionCliente = elementSession.id; // Get the ID attribute of the element
                sessionCliente = sessionCliente.replace("session", ""); // Remove the prefix



                $.ajax({
                    url: 'carritoCompraVerificarCantidad', // aqui va el nombre de la ruta
                    method: 'GET', // el metodo que se usa en la ruta
                    data: {
                        productId: id,
                        selectedColor: color,
                        selectedTamaño: tamaño,
                        sessionCliente: sessionCliente,
                    }, //los parametros enviados
                    dataType: 'json',
                    success: function(response) {
                        //arreglar
                        //respuesta del controlador 
                        console.log(response.producto.cantidad);
                        console.log(response.foto.cantidad);
                        if (response.producto.cantidad != null) {
                            console.log("Cantidad de producto tabla producto " + response
                                .producto.cantidad + " del tamaño " + response.producto
                                .tamaño);
                            if (response.producto.cantidad <= 0) {
                                var mensajeContainer = document.getElementById(
                                    "mensajeContainer2{{ $productoTemporada->id }}");
                                mensajeContainer.innerHTML =
                                    "No quedan en inventario del tamaño " + response
                                    .producto.tamaño;
                            } else {
                                var mensajeContainer = document.getElementById(
                                    "mensajeContainer2{{ $productoTemporada->id }}");
                                mensajeContainer.innerHTML = ""; // limpio el mensajecontainer
                                //enviar a otro ajax donde me guarde el articulo y tambien se sume el carrito del usuario
                                //console.log("Agregar al carrito");
                                //tabla productos
                                $.ajax({
                                    url: 'carritoCompraTablaProducto', // aqui va el nombre de la ruta
                                    method: 'GET', // el metodo que se usa en la ruta
                                    data: {
                                        productId: id,
                                        selectedColor: color,
                                        selectedTamaño: tamaño,
                                        sessionCliente: sessionCliente,
                                    }, //los parametros enviados
                                    dataType: 'json',
                                    success: function(response) {
                                        //console.log(response);
                                        if (response ==
                                            "Si desea sumar mas de este producto entrar al carrito de compra"
                                        ) {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer2{{ $productoTemporada->id }}"
                                                );
                                            mensajeContainer.innerHTML =
                                                response; // limpio el mensajecontainer
                                        } else {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer2{{ $productoTemporada->id }}"
                                                );
                                            mensajeContainer.innerHTML =
                                                "Se agrego correctamente al carrito"; // limpio el mensajecontainer
                                            var numeroContadorCarrito = document
                                                .getElementById(
                                                    "contadorCarrito");
                                            var parpadeo2 = document
                                                .getElementById("parpadeo");
                                            var parpadeo3 = document
                                                .getElementById("parpadeoDrop");
                                            // Función para actualizar el valor del contador y añadir la clase "parpadeo"
                                            function actualizarContador(
                                                nuevoValor) {
                                                numeroContadorCarrito
                                                    .innerHTML = nuevoValor;
                                                parpadeo2.classList.add(
                                                    "parpadeo");
                                                parpadeo3.classList.add(
                                                    "parpadeo");
                                                // Eliminar la clase "parpadeo" después de la animación
                                                setTimeout(function() {
                                                        parpadeo2.classList
                                                            .remove(
                                                                "parpadeo");
                                                        parpadeo3.classList
                                                            .remove(
                                                                "parpadeo");
                                                    },
                                                    6000
                                                ); // 2s * 3 = 6s (duración total de la animación)
                                            }
                                            // Ejemplo de uso: actualizar el contador con un nuevo valor
                                            var nuevoValor = response;
                                            actualizarContador(nuevoValor);
                                        }
                                    }
                                });
                            }
                        } else if (response.foto.cantidad != null) {
                            console.log("Cantidad de producto tabla foto " + response.foto
                                .cantidad + " del tamaño " + response.foto.tamaño);
                            if (response.foto.cantidad <= 0) {
                                console.log(
                                    "Debo mandar una variable donde se imprima que no se pudo agregar el producto al carrito"
                                );
                                var mensajeContainer = document.getElementById(
                                    "mensajeContainer2{{ $productoTemporada->id }}");
                                mensajeContainer.innerHTML =
                                    "No quedan en inventario del tamaño " + response.foto
                                    .tamaño;
                            } else {
                                var mensajeContainer = document.getElementById(
                                    "mensajeContainer2{{ $productoTemporada->id }}");
                                mensajeContainer.innerHTML = ""; // limpio el mensajecontainer
                                //enviar a otro ajax donde me guarde el articulo y tambien se sume el carrito del usuario
                                //console.log("Agregar al carrito");
                                //tabla fotos
                                $.ajax({
                                    url: 'carritoCompraTablaFotos', // aqui va el nombre de la ruta
                                    method: 'GET', // el metodo que se usa en la ruta
                                    data: {
                                        productId: id,
                                        selectedColor: color,
                                        selectedTamaño: tamaño,
                                        sessionCliente: sessionCliente,
                                    }, //los parametros enviados
                                    dataType: 'json',
                                    success: function(response) {
                                        //respuesta del controlador 
                                        console.log(response);
                                        if (response ==
                                            "Si desea sumar mas de este producto entrar al carrito de compra"
                                        ) {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer2{{ $productoTemporada->id }}"
                                                );
                                            mensajeContainer.innerHTML =
                                                response; // limpio el mensajecontainer
                                        } else {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer2{{ $productoTemporada->id }}"
                                                );
                                            mensajeContainer.innerHTML =
                                                "Se agrego correctamente al carrito"; // limpio el mensajecontainer
                                            var numeroContadorCarrito = document
                                                .getElementById(
                                                    "contadorCarrito");
                                            var parpadeo2 = document
                                                .getElementById("parpadeo");
                                            var parpadeo3 = document
                                                .getElementById("parpadeoDrop");
                                            // Función para actualizar el valor del contador y añadir la clase "parpadeo"
                                            function actualizarContador(
                                                nuevoValor) {
                                                numeroContadorCarrito
                                                    .innerHTML = nuevoValor;
                                                parpadeo2.classList.add(
                                                    "parpadeo");
                                                parpadeo3.classList.add(
                                                    "parpadeo");
                                                // Eliminar la clase "parpadeo" después de la animación
                                                setTimeout(function() {
                                                        parpadeo2.classList
                                                            .remove(
                                                                "parpadeo");
                                                        parpadeo3.classList
                                                            .remove(
                                                                "parpadeo");
                                                    },
                                                    6000
                                                ); // 2s * 3 = 6s (duración total de la animación)
                                            }
                                            // Ejemplo de uso: actualizar el contador con un nuevo valor
                                            var nuevoValor = response;
                                            actualizarContador(nuevoValor);
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
            });
        });
    </script>
@endif
<form id="miFormularioImage" action="{{ route('descriccionProducto') }}" method="GET">
    <input type="hidden" id="imagenInput" name="imagen" value="">
</form>
<div id="shopify-section-template--14562732638271__05ad0977-fcfc-476f-948d-e9119e0da40c" class="shopify-section">
    <section class="section section--text-centered"
        data-section-id="template--14562732638271__05ad0977-fcfc-476f-948d-e9119e0da40c"
        data-section-type="rich-text">
        <div class="container container--narrow" data-aos="fade-right">
            <h2 class="heading h1">Elige ShopisCr con las mejores marcas.</h2>
            <div class="rte">
            </div>
        </div>
    </section>
    <div id="shopify-section-sections--14562733293631__footer"
        class="shopify-section shopify-section-group-footer-group">
        <footer class="footer" data-section-id="sections--14562733293631__footer" data-section-type="footer"
            role="contentinfo" style="background-color: #e7e7e7; color: black">
            <div class="container">
                <div class="footer__wrapper">
                    <div class="footer__block-list">
                        <div class="footer__block-item footer__block-item--text">
                            <button class="footer__title heading h6" aria-expanded="false"
                                aria-controls="block-footer-0" data-action="toggle-collapsible"
                                disabled="disabled">
                                <span>Acerca de nosotros</span>
                            </button>
                            <p>
                                En ShopisCr, nuestra misión es ofrecer una amplia variedad de productos de alta
                                calidad
                                a precios inigualables. Somos más que una empresa, somos un compromiso con la
                                excelencia y la satisfacción
                                de nuestros clientes, haciendo realidad tus sueños a través de productos
                                excepcionales.
                            </p>
                        </div>
                    </div>
                    <aside class="footer__aside">
                        <div class="footer__aside-item footer__aside-item--social">
                            <p class="footer__aside-title">Síguenos</p>
                            <ul class="social-media__item-list  list--unstyled" role="list">
                                <li class="social-media__item social-media__item--facebook">
                                    <a href="https://www.facebook.com/profile.php?id=100063694886908"
                                        target="_blank" rel="noopener" aria-label="Síguenos en Facebook"
                                        aria-describedby="a11y-new-window-message"><svg focusable="false"
                                            class="icon icon--facebook " viewBox="0 0 30 30">
                                            <path
                                                d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm3.2142857-17.1429611h-2.1428678v-2.1425646c0-.5852979.8203285-1.07160109 1.0714928-1.07160109h1.071375v-2.1428925h-2.1428678c-2.3564786 0-3.2142536 1.98610393-3.2142536 3.21449359v2.1425646h-1.0714822l.0032143 2.1528011 1.0682679-.0099086v7.499969h3.2142536v-7.499969h2.1428678v-2.1428925z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg></a>
                                </li>
                                <li class="social-media__item social-media__item--instagram">
                                    <a href="https://www.instagram.com/shopis.cr/" target="_blank" rel="noopener"
                                        aria-label="Síguenos en Instagram"
                                        aria-describedby="a11y-new-window-message"><svg focusable="false"
                                            class="icon icon--instagram " role="presentation"
                                            viewBox="0 0 30 30">
                                            <path
                                                d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm.0000159-23.03571429c-2.1823849 0-2.4560363.00925037-3.3131306.0483571-.8553081.03901103-1.4394529.17486384-1.9505835.37352345-.52841925.20532625-.9765517.48009406-1.42331254.926823-.44672894.44676084-.72149675.89489329-.926823 1.42331254-.19865961.5111306-.33451242 1.0952754-.37352345 1.9505835-.03910673.8570943-.0483571 1.1307457-.0483571 3.3131306 0 2.1823531.00925037 2.4560045.0483571 3.3130988.03901103.8553081.17486384 1.4394529.37352345 1.9505835.20532625.5284193.48009406.9765517.926823 1.4233125.44676084.446729.89489329.7214968 1.42331254.9268549.5111306.1986278 1.0952754.3344806 1.9505835.3734916.8570943.0391067 1.1307457.0483571 3.3131306.0483571 2.1823531 0 2.4560045-.0092504 3.3130988-.0483571.8553081-.039011 1.4394529-.1748638 1.9505835-.3734916.5284193-.2053581.9765517-.4801259 1.4233125-.9268549.446729-.4467608.7214968-.8948932.9268549-1.4233125.1986278-.5111306.3344806-1.0952754.3734916-1.9505835.0391067-.8570943.0483571-1.1307457.0483571-3.3130988 0-2.1823849-.0092504-2.4560363-.0483571-3.3131306-.039011-.8553081-.1748638-1.4394529-.3734916-1.9505835-.2053581-.52841925-.4801259-.9765517-.9268549-1.42331254-.4467608-.44672894-.8948932-.72149675-1.4233125-.926823-.5111306-.19865961-1.0952754-.33451242-1.9505835-.37352345-.8570943-.03910673-1.1307457-.0483571-3.3130988-.0483571zm0 1.44787387c2.1456068 0 2.3997686.00819774 3.2471022.04685789.7834742.03572556 1.2089592.1666342 1.4921162.27668167.3750864.14577303.6427729.31990322.9239522.60111439.2812111.28117926.4553413.54886575.6011144.92395217.1100474.283157.2409561.708642.2766816 1.4921162.0386602.8473336.0468579 1.1014954.0468579 3.247134 0 2.1456068-.0081977 2.3997686-.0468579 3.2471022-.0357255.7834742-.1666342 1.2089592-.2766816 1.4921162-.1457731.3750864-.3199033.6427729-.6011144.9239522-.2811793.2812111-.5488658.4553413-.9239522.6011144-.283157.1100474-.708642.2409561-1.4921162.2766816-.847206.0386602-1.1013359.0468579-3.2471022.0468579-2.1457981 0-2.3998961-.0081977-3.247134-.0468579-.7834742-.0357255-1.2089592-.1666342-1.4921162-.2766816-.37508642-.1457731-.64277291-.3199033-.92395217-.6011144-.28117927-.2811793-.45534136-.5488658-.60111439-.9239522-.11004747-.283157-.24095611-.708642-.27668167-1.4921162-.03866015-.8473336-.04685789-1.1014954-.04685789-3.2471022 0-2.1456386.00819774-2.3998004.04685789-3.247134.03572556-.7834742.1666342-1.2089592.27668167-1.4921162.14577303-.37508642.31990322-.64277291.60111439-.92395217.28117926-.28121117.54886575-.45534136.92395217-.60111439.283157-.11004747.708642-.24095611 1.4921162-.27668167.8473336-.03866015 1.1014954-.04685789 3.247134-.04685789zm0 9.26641182c-1.479357 0-2.6785873-1.1992303-2.6785873-2.6785555 0-1.479357 1.1992303-2.6785873 2.6785873-2.6785873 1.4793252 0 2.6785555 1.1992303 2.6785555 2.6785873 0 1.4793252-1.1992303 2.6785555-2.6785555 2.6785555zm0-6.8050167c-2.2790034 0-4.1264612 1.8474578-4.1264612 4.1264612 0 2.2789716 1.8474578 4.1264294 4.1264612 4.1264294 2.2789716 0 4.1264294-1.8474578 4.1264294-4.1264294 0-2.2790034-1.8474578-4.1264612-4.1264294-4.1264612zm5.2537621-.1630297c0-.532566-.431737-.96430298-.964303-.96430298-.532534 0-.964271.43173698-.964271.96430298 0 .5325659.431737.964271.964271.964271.532566 0 .964303-.4317051.964303-.964271z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg></a>
                                </li>
                                <li class="social-media__item social-media__item--whatsapp">
                                    <a href="https://wa.me/50687249099?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
                                        target="_blank" rel="noopener" aria-label="Síguenos en Instagram"
                                        aria-describedby="a11y-new-window-message"><svg focusable="false"
                                            class="icon" role="presentation" viewBox="2 1 21 21">
                                            <path
                                                d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z"
                                                fill="currentColor" fill-rule="evenodd" class="focusAlWhatapps">
                                            </path>
                                        </svg></a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <br><br>
                    <div>
                        <p>© 2023 ShopisCr</p>
                    </div>
                </div>
            </div>
        </footer>
        <a href="https://wa.me/50687249099?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
            target="_blank" rel="noopener" aria-describedby="a11y-new-window-message">
            <div class="wa__btn_popup" style="left: unset; right: 25px; bottom:35px;">
                <p>
                    <span class="fab-container">
                        <i class="fab fa-whatsapp" style="color: #27d011; font-size: 4em;"></i>
                        <span class="fab-text">¡Contáctanos por WhatsApp!</span>
                    </span>
                </p>
            </div>
        </a>
    </div>
</div>
</body>
<script>
    function toggleText() {
        const fabText = document.querySelector(".fab-text");
        fabText.classList.toggle("show-text");
    }
    setInterval(toggleText, 5000);
</script>
<script>
    // Obtiene la URL actual
    var url = window.location.href;
    // Verifica si el parámetro "?valor=1" existe en la URL
    if (url.indexOf('?valor=1') > -1) {
        // Elimina el parámetro "?valor=1" de la URL
        var newUrl = url.replace('?valor=1', '');
        // Reemplaza la URL actual sin el parámetro "?valor=1" en el historial del navegador
        window.history.replaceState({}, document.title, newUrl);
    }
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js">
    //animaciones
</script>
<script>
    //animaciones
    AOS.init({
        duration: 1000,
        once: true
    });
</script>
<script>
    //script para mostrar la imagen en grande
    function showImage(imageSrc) {
        // Actualizar el valor del campo oculto en el formulario
        document.getElementById('imagenInput').value = imageSrc.replace("imagesProductos/", "");
        // Enviar el formulario
        document.getElementById('miFormularioImage').submit();
    }
</script>

<script>
    //cambia el tamaño del logo dependiendo si es pc o celular
    // Imprime el ancho de la pantalla al cargar la página
    var ancho = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    console.log("Ancho de la pantalla: " + ancho);

    var logo = document.getElementById("logo");
    var espacioImagenPrincipal = document.getElementById("espacioImagenPrincipal");
    if (ancho <= 752) {
        logo.style.height = "50px";
        espacioImagenPrincipal.style.height = "75px";
    } else {
        logo.style.height = "70px";
        espacioImagenPrincipal.style.height = "90px";
    }




    // Registra un manejador de eventos para el evento "resize" que imprime el ancho de la pantalla cuando la ventana se redimensiona
    window.addEventListener("resize", function() {
        var ancho = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        console.log("Ancho de la pantalla: " + ancho);
        var logo = document.getElementById("logo");
        var espacioImagenPrincipal = document.getElementById("espacioImagenPrincipal");
        if (ancho <= 752) {
            logo.style.height = "50px";
            espacioImagenPrincipal.style.height = "75px";
        } else {
            logo.style.height = "70px";
            espacioImagenPrincipal.style.height = "90px";
        }
    });
</script>

</html>
