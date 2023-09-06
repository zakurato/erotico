<html lang="en">

<head class="at-element-marker">
    <!-- este script no se elimina es el de descripcion dropdown-->
    <script
        src="https://cdn-fsly.yottaa.net/5b75bbacf1598a37954bd49c/www.womanwithin.com/v~4b.73a/on/demandware.static/Sites-oss-Site/-/default/v1692183242659/js/main.js?yocs=1b_"
        data-yo-type="text/javascript"></script>

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Descripción del producto MagixSexShop</title>
    <!--este style no se quita-->
    <link rel="stylesheet" href="{{ asset('index/index3.Css') }}?v={{ time() }}">
    <!--mis css-->
    <!--/Css propios public-->
    <link rel="stylesheet" href="{{ asset('index/styles.Css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('index/stylesBoost.Css') }}?v={{ time() }}">

    <!--iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--animaciones-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"> //animaciones</script>


</head>

<body>
    <div class="navbar navbar-inverse"
        style="background-color: black !important; position: fixed; width: 100% !important; z-index: 9999 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-header">
                        <button id="parpadeoDrop" class="navbar-toggle" data-target="#mobile_menu"
                            data-toggle="collapse"><span class="icon-bar">
                            </span>
                            <span class="icon-bar">
                            </span>
                            <span class="icon-bar">
                            </span>
                        </button>

                        <a href="{{ route('index2') }}" class="header__logo-link">
                            <img style="height: 80px;" class="header__logo-image" src="images/logo4.png?v=1676468577" alt="">
                        </a>
                    </div>
                    <form action="http://54.89.124.204/index2" method="GET">
                        <div class="navbar-collapse collapse" id="mobile_menu">
                            <a href="http://54.89.124.204/carritoCompras">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <div style="display: inline-flex; position: relative; top: 7px" id="parpadeo">
                                            <!-- carrito -->
                                            <svg style="color: #9d9d9d" xmlns="http://www.w3.org/2000/svg"
                                                width="28" height="28" fill="currentColor" class="bi bi-cart3"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    fill="#9d9d9d">
                                                </path>
                                            </svg>
                                            <div style="color: #9d9d9d" id="contadorCarrito">
                                                {{ $contadorCarrito->contadorCarrito }}
                                            </div>
                                            <h4 style="color: #9d9d9d;">Carrito de compras</h4>
                                            <!-- carrito -->
                                        </div>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <br><br><br><br><br><br><br><br><br><br><br>
<div data-aos="fade-right">
<form id="miFormulario{{ $id }}">
        @csrf
        <div>
            <div>
                <div>
                    <div class="row ">
                        <!-- Product Images Carousel -->
                        <!-- isCartQuickView Start -->
                        <div class="col-md-6">
                            <!-- isCartQuickView End -->
                            <div>
                                <div class="row m-0">
                                    <div class="thumb-col">
                                        <div class="row mr-0" >
                                            @foreach ($combinadosImages as $index => $item)
                                                @if ($item->imagen != 'formTamañosCantidades')
                                                    <div class="mb-1"
                                                        id="imagenPequeña{{ $index }}">
                                                        <button type="button" class="btn p-0">
                                                            <picture>
                                                                <source media="(min-width: 761px)"srcset="imagesProductos/{{ $item->imagen }}">
                                                                <img src="imagesProductos/{{ $item->imagen }}">
                                                            </picture>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div>
                                            <div class="product-primary-image  active-primary " data-index="0">
                                                <picture class="d-block w-100" style="">
                                                    <source media="(min-width: 1980px)"
                                                        class="position-relative img-fluid w-md-100 h-md-100"
                                                        alt="Twist-Front Swim Dress, BLUE PAINTERLY LEAVES, hi-res image number null"
                                                        itemprop="image">
                                                    @foreach ($combinadosImages as $item)
                                                        <img src="imagesProductos/{{ $item->imagen }}"
                                                            class="lazy picture-el-img position-relative img-fluid w-100 h-md-100 entered loaded imagenGrande"
                                                            itemprop="image" onerror="onImageLoadError(this)"
                                                            style="transform-origin: 0% 0%; position: absolute; transform: scale3d(1, 1, 1) translate3d(0px, 0px, 0px);">
                                                    @break
                                                @endforeach
                                            </picture>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-6 col-xl-7 mb-5" style="text-align: center !important">
                        <!-- Product Name -->
                        <div class="row hidden-sm-down">
                            <div class="col">
                                <h1 class="product-name mb-0">
                                    {{ $nombre }} {{ $color }}
                                </h1>
                            </div>
                        </div>
                        <div class="attributes mt-2" id="primary-zoom-container">
                            <!-- Attributes and Quantity -->
                            <div class="row">
                                <div class="col">
                                </div>
                            </div>
                            <div class="row attr-type-selecter" data-attr="color">
                                <div class="col-12">
                                    <div class="attribute">
                                        <div class="row mb-2">
                                            <div
                                                class="col attribute-label-container brand-font-primary line-height-1">
                                                <!-- Select <Attribute> Label -->
                                                <h2 class="color attribute-label d-inline-block mb-0 h5">
                                                    Nombre:
                                                </h2>
                                                <span class="attribute-detail-selected selected-color"
                                                    aria-live="off">
                                                    {{ $nombre }} {{ $color }}
                                                </span>
                                                <span class="attribute-detail-hovered hovered-color d-none"
                                                    aria-live="off"></span>
                                            </div>
                                        </div>
                                        <!-- container end -->
                                    </div>
                                </div>
                            </div>

                            <div class="row attr-type-selecter" data-attr="color">
                                <div class="col-12">
                                    <div class="attribute">
                                        <div class="row mb-2">
                                            <div
                                                class="col attribute-label-container brand-font-primary line-height-1">
                                                <!-- Select <Attribute> Label -->
                                                <h2 class="color attribute-label d-inline-block mb-0 h5">
                                                    Precio:
                                                </h2>
                                                <span class="attribute-detail-selected selected-color"
                                                    aria-live="off">
                                                    ₡{{ $precio }}
                                                </span>
                                                <span class="attribute-detail-hovered hovered-color d-none"
                                                    aria-live="off"></span>
                                            </div>
                                        </div>
                                        <!-- container end -->
                                    </div>
                                </div>
                            </div>
                            @if ($categoria != "RAPTOR FORD")
                            <div class="row attr-type-selecter" data-attr="color">
                                <div class="col-12">
                                    <div class="attribute">
                                        <div class="row mb-2">
                                            <div
                                                class="col attribute-label-container brand-font-primary line-height-1">
                                                <!-- Select <Attribute> Label -->
                                                <h2 class="color attribute-label d-inline-block mb-0 h5">
                                                    color:
                                                </h2>
                                                <span class="attribute-detail-selected selected-color"
                                                    aria-live="off">
                                                    @foreach ($combinadosImages as $item)
                                                        <span id="colorValue">{{ $item->color }}</span>
                                                    @break
                                                @endforeach
                                            </span>
                                            <br><br>
                                            <select class="a-native-dropdown a-declarative">
                                                <option> Seleccionar </option>
                                                @foreach ($coloresDiferentesAProductoSeleccionado as $item)
                                                    <option
                                                        value="color:{{ $item }} id:{{ $id }}">
                                                        {{ $item }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- container end -->
                                </div>
                            </div>
                        </div>
                        <div class="row attr-type-selecter" data-attr="size">
                            <div class="col-12">
                                <div class="attribute">
                                    <!-- Select <Attribute> Label -->
                                    <div class="row">
                                        <div class="col">
                                            <!-- Select <Attribute> Label -->
                                            <div
                                                class="attribute-label-container d-inline-block brand-font-primary line-height-1">
                                                <h2 class="size attribute-label queryParamSelector d-inline-block mb-0 h5"
                                                    data-queryparam="dwvar_1045320_size">
                                                    Tamaño:
                                                </h2>
                                                <br><br>
                                                <span class="attribute-detail-selected selected-size"
                                                    aria-live="off">
                                                    <select name="tamaño">
                                                        <option disabled selected> Seleccionar </option>
                                                        @foreach ($tamañosCombinados as $item)
                                                            <option> {{ $item }} </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                                <span class="attribute-detail-hovered hovered-size d-none"
                                                    aria-live="off"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- isCartQuickView Start -->
                    <div class="description-and-detail mt-4 pt-5">
                        <div class="accordion" id="detailsAccordionPDP-1045320">
                            <div class="card mb-0">
                                <div class="card-header" id="detailsAccordion">
                                    <h2 class="mb-0 h5">
                                        <button
                                            class="btn btn-link text-capitalize details-accordion-btn collapsed"
                                            data-productid="1045320" type="button" data-toggle="collapse"
                                            data-target="#descriptionAndDetails-1045320" aria-expanded="false"
                                            aria-controls="descriptionAndDetails">
                                            Descripción &amp; detalles
                                        </button>
                                    </h2>
                                    <div id="descriptionAndDetails-1045320" class="d-xl-block collapse"
                                        aria-labelledby="detailsAccordion"
                                        data-parent="#detailsAccordionPDP-1045320" style="">
                                        <div class="col value content" id="collapsible-details-1">
                                            {{ $descripcion }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- isCartQuickView End -->
                </div>
            </div>
        </div>
        <input type="hidden" name="color" id="color" value="">
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="sessionCliente" value="{{ $sessionCliente }}">
        <input type="hidden" name="categoria" value="{{ $categoria }}">
        <br><br><br>
        <button style="width: 100%" type="submit" id="botonCarrito{{ $id }}"
            class="product-item__action-button button button--small button--primary">Añadir
            al carrito</button>
        <div id="mensajeContainer{{ $id }}"></div>
</form>
<br><br><br><br><br><br>
</div>
<div id="shopify-section-sections--14562733293631__footer" class="shopify-section shopify-section-group-footer-group">
    <footer class="footer" data-section-id="sections--14562733293631__footer" data-section-type="footer" role="contentinfo">
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__block-list">
                    <div class="footer__block-item footer__block-item--text">
                        <button class="footer__title heading h6" aria-expanded="false" aria-controls="block-footer-0" data-action="toggle-collapsible" disabled="disabled">
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
                    <div class="footer__aside-item footer__aside-item--social">
                        <p class="footer__aside-title">Síguenos</p>
                        <ul class="social-media__item-list  list--unstyled" role="list">
                            <li class="social-media__item social-media__item--facebook">
                                <a href="https://www.facebook.com/profile.php?id=100063694886908" target="_blank" rel="noopener" aria-label="Síguenos en Facebook" aria-describedby="a11y-new-window-message" style="color: #337AB6"><svg focusable="false" class="icon icon--facebook " viewBox="0 0 30 30">
                                        <path d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm3.2142857-17.1429611h-2.1428678v-2.1425646c0-.5852979.8203285-1.07160109 1.0714928-1.07160109h1.071375v-2.1428925h-2.1428678c-2.3564786 0-3.2142536 1.98610393-3.2142536 3.21449359v2.1425646h-1.0714822l.0032143 2.1528011 1.0682679-.0099086v7.499969h3.2142536v-7.499969h2.1428678v-2.1428925z" fill="currentColor" fill-rule="evenodd"></path>
                                    </svg></a>
                            </li>
                            <li class="social-media__item social-media__item--instagram">
                                <a href="https://www.instagram.com/magicsexshop27/?hl=es" target="_blank" rel="noopener" aria-label="Síguenos en Instagram" aria-describedby="a11y-new-window-message" style="color: #337AB6"><svg focusable="false" class="icon icon--instagram " role="presentation" viewBox="0 0 30 30">
                                        <path d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm.0000159-23.03571429c-2.1823849 0-2.4560363.00925037-3.3131306.0483571-.8553081.03901103-1.4394529.17486384-1.9505835.37352345-.52841925.20532625-.9765517.48009406-1.42331254.926823-.44672894.44676084-.72149675.89489329-.926823 1.42331254-.19865961.5111306-.33451242 1.0952754-.37352345 1.9505835-.03910673.8570943-.0483571 1.1307457-.0483571 3.3131306 0 2.1823531.00925037 2.4560045.0483571 3.3130988.03901103.8553081.17486384 1.4394529.37352345 1.9505835.20532625.5284193.48009406.9765517.926823 1.4233125.44676084.446729.89489329.7214968 1.42331254.9268549.5111306.1986278 1.0952754.3344806 1.9505835.3734916.8570943.0391067 1.1307457.0483571 3.3131306.0483571 2.1823531 0 2.4560045-.0092504 3.3130988-.0483571.8553081-.039011 1.4394529-.1748638 1.9505835-.3734916.5284193-.2053581.9765517-.4801259 1.4233125-.9268549.446729-.4467608.7214968-.8948932.9268549-1.4233125.1986278-.5111306.3344806-1.0952754.3734916-1.9505835.0391067-.8570943.0483571-1.1307457.0483571-3.3130988 0-2.1823849-.0092504-2.4560363-.0483571-3.3131306-.039011-.8553081-.1748638-1.4394529-.3734916-1.9505835-.2053581-.52841925-.4801259-.9765517-.9268549-1.42331254-.4467608-.44672894-.8948932-.72149675-1.4233125-.926823-.5111306-.19865961-1.0952754-.33451242-1.9505835-.37352345-.8570943-.03910673-1.1307457-.0483571-3.3130988-.0483571zm0 1.44787387c2.1456068 0 2.3997686.00819774 3.2471022.04685789.7834742.03572556 1.2089592.1666342 1.4921162.27668167.3750864.14577303.6427729.31990322.9239522.60111439.2812111.28117926.4553413.54886575.6011144.92395217.1100474.283157.2409561.708642.2766816 1.4921162.0386602.8473336.0468579 1.1014954.0468579 3.247134 0 2.1456068-.0081977 2.3997686-.0468579 3.2471022-.0357255.7834742-.1666342 1.2089592-.2766816 1.4921162-.1457731.3750864-.3199033.6427729-.6011144.9239522-.2811793.2812111-.5488658.4553413-.9239522.6011144-.283157.1100474-.708642.2409561-1.4921162.2766816-.847206.0386602-1.1013359.0468579-3.2471022.0468579-2.1457981 0-2.3998961-.0081977-3.247134-.0468579-.7834742-.0357255-1.2089592-.1666342-1.4921162-.2766816-.37508642-.1457731-.64277291-.3199033-.92395217-.6011144-.28117927-.2811793-.45534136-.5488658-.60111439-.9239522-.11004747-.283157-.24095611-.708642-.27668167-1.4921162-.03866015-.8473336-.04685789-1.1014954-.04685789-3.2471022 0-2.1456386.00819774-2.3998004.04685789-3.247134.03572556-.7834742.1666342-1.2089592.27668167-1.4921162.14577303-.37508642.31990322-.64277291.60111439-.92395217.28117926-.28121117.54886575-.45534136.92395217-.60111439.283157-.11004747.708642-.24095611 1.4921162-.27668167.8473336-.03866015 1.1014954-.04685789 3.247134-.04685789zm0 9.26641182c-1.479357 0-2.6785873-1.1992303-2.6785873-2.6785555 0-1.479357 1.1992303-2.6785873 2.6785873-2.6785873 1.4793252 0 2.6785555 1.1992303 2.6785555 2.6785873 0 1.4793252-1.1992303 2.6785555-2.6785555 2.6785555zm0-6.8050167c-2.2790034 0-4.1264612 1.8474578-4.1264612 4.1264612 0 2.2789716 1.8474578 4.1264294 4.1264612 4.1264294 2.2789716 0 4.1264294-1.8474578 4.1264294-4.1264294 0-2.2790034-1.8474578-4.1264612-4.1264294-4.1264612zm5.2537621-.1630297c0-.532566-.431737-.96430298-.964303-.96430298-.532534 0-.964271.43173698-.964271.96430298 0 .5325659.431737.964271.964271.964271.532566 0 .964303-.4317051.964303-.964271z" fill="currentColor" fill-rule="evenodd"></path>
                                    </svg></a>
                            </li>
                            <li class="social-media__item social-media__item--whatsapp">
                                <a href="https://wa.me/50660168568?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F" target="_blank" rel="noopener" aria-label="Síguenos en Instagram" aria-describedby="a11y-new-window-message" style="color: #337AB6"><svg focusable="false" class="icon" role="presentation" viewBox="2 1 21 21">
                                        <path d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z" fill="currentColor" fill-rule="evenodd" class="focusAlWhatapps">
                                        </path>
                                    </svg></a>
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


    
</div>













<form id="miFormularioImage2" action="{{ route('descriccionProducto2') }}" method="GET">
<input type="hidden" id="idInput" name="id" value="">
<input type="hidden" id="colorInput" name="color" value="">
</form>

</body>




<script>
    //scrip para cambiar de posicion las imagenes cuando se seleccionen
    document.addEventListener("DOMContentLoaded", function() {
        var imagenGrande = document.getElementsByClassName("imagenGrande");
        var src = imagenGrande[0].getAttribute("src");
        var imagenPequeña;
        @foreach ($combinadosImages as $index => $item)
            @if ($item->imagen != 'formTamañosCantidades')
                $('#imagenPequeña{{ $index }}').click(function() {
                    imagenPequeña = '{{ $item->imagen }}';
                    imagenPequeña2 = "imagesProductos/" + imagenPequeña;
                    imagenGrande[0].src = imagenPequeña2;
                });
            @endif
        @endforeach
    });
</script>





<script>
    $(document).ready(function() {
        // Asigna un controlador de eventos al botón
        $('#botonCarrito{{ $id }}').click(function(e) {
            
            // Obtener el valor actual del span y asignarlo al campo oculto antes de enviar el formulario
            var colorValue = document.getElementById("colorValue").innerText;
            document.getElementById("color").value = colorValue;

            console.log(colorValue)

            e.preventDefault(); // Evita que se envíe el formulario por defecto
            // Obtén los datos del formulario
            var formData = $('#miFormulario{{ $id }}').serialize();


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

                console.log(categoria);
                var id = data['id'];
                var color = data['color'];
                var tamaño = data['tamaño'];
                var sessionCliente = data['sessionCliente'];
                if(categoria == "RAPTOR FORD"){
                    color = "NINGUNO";
                    tamaño = "NINGUNO";
                }

            if (color == undefined || tamaño == null) {
                var mensajeContainer = document.getElementById("mensajeContainer{{ $id }}");
                mensajeContainer.innerHTML =
                    "Debe seleccionar un tamaño"; // limpio el mensajecontainer
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
                                    "mensajeContainer{{ $id }}");
                                mensajeContainer.innerHTML =
                                    "No quedan en inventario del tamaño " + response
                                    .producto.tamaño;

                            } else {
                                var mensajeContainer = document.getElementById(
                                    "mensajeContainer{{ $id }}");
                                mensajeContainer.innerHTML =
                                    ""; // limpio el mensajecontainer
                                //enviar a otro ajax donde me guarde el articulo y tambien se sume el carrito del usuario
                                //console.log("Agregar al carrito");
                                //tabla productos
                                $.ajax({
                                    url: 'http://54.89.124.204/carritoCompraTablaProducto', // aqui va el nombre de la ruta
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
                                                    "mensajeContainer{{ $id }}"
                                                );
                                            mensajeContainer.innerHTML =
                                                response; // limpio el mensajecontainer
                                        } else {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer{{ $id }}"
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
                                    "mensajeContainer{{ $id }}");
                                mensajeContainer.innerHTML =
                                    "No quedan en inventario del tamaño " + response.foto
                                    .tamaño;
                            } else {
                                var mensajeContainer = document.getElementById(
                                    "mensajeContainer{{ $id }}");
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
                                        console.log(response);
                                        if (response ==
                                            "Si desea sumar mas de este producto entrar al carrito de compra"
                                        ) {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer{{ $id }}"
                                                );
                                            mensajeContainer.innerHTML =
                                                response; // limpio el mensajecontainer
                                        } else {
                                            var mensajeContainer = document
                                                .getElementById(
                                                    "mensajeContainer{{ $id }}"
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

<script>

    //script para cuando seleccione un color y se cambien las imagenes del color seleccionado
    // Obtén una referencia al elemento select
    var selectElement = document.querySelector('.a-native-dropdown');
    // Agrega un evento de cambio para detectar cuando se selecciona una opción
    selectElement.addEventListener('change', function() {
        // Obtiene el valor seleccionado
        var selectedValue = selectElement.value;
        // Hacer algo con el valor seleccionado
        //console.log(selectedValue);
        var partes = selectedValue.split(" ");
        var color = partes[0].split(":")[1]; //color seleccionado
        var id = partes[1].split(":")[1]; //id del item seleccionado
        console.log(color)
        // Actualizar el valor del campo oculto en el formulario
        document.getElementById('colorInput').value = color;
        // Actualizar el valor del campo oculto en el formulario
        document.getElementById('idInput').value = id;
        // Enviar el formulario
        document.getElementById('miFormularioImage2').submit();
    });
</script>


<script>
    //animaciones
    AOS.init({
        duration: 1000,
        once: true
    });
</script>




</html>
