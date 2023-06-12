<html class="js hydrated shopify-features__smart-payment-buttons--enabled" lang="es"
    style="--announcement-bar-height: 43px; --header-height: 230px;">

<head>



    <!--/Css propios public-->
    <link rel="stylesheet" href="{{ asset('index/index.Css') }}">
    <link rel="stylesheet" href="{{ asset('index/styles.Css') }}?v=120939182865429120021678115775">

    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="theme-color" content="#000000">

    <!-- BEGIN app block: shopify://apps/yoast-seo-seo-for-everyone/blocks/metatags/7c777011-bc88-4743-a24e-64336e1e5b46 -->
    <!-- This site is optimized with Yoast SEO for Shopify -->
    <title>MagicSexShop</title>
    <meta name="description"
        content="La mejor Tienda De Productos Para Adultos Chat Con Asesora Gratis. Envíos 100% discretos, Enviamos a todo el país.">
    <meta property="og:site_name" content="MagicSexShop - Sex Shop Online">
    <meta property="og:url" content="https://www.magicsexshop.com/">
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website">
    <meta property="og:title" content="La mejor Tienda MagicSexShop">
    <meta property="og:description" content="La mejor Tienda De Productos Para Adultos">
    <meta property="og:image" content="">
    <meta property="og:image:height" content="628">
    <meta property="og:image:width" content="1200">
    <!--/ Yoast SEO -->
    <!-- END app app block -->
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body class="warehouse--v4 features--animate-zoom template-index" data-instant-intensity="viewport">
    <!-- END sections: header-group -->
    <!-- BEGIN sections: overlay-group -->





    <div class="navbar navbar-inverse"
        style="background-color: black !important; position: fixed; width: 100% !important; z-index: 9999 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if ($contadorCarrito->contadorCarrito > 0)
                    <div class="navbar-header">
                        <button id="parpadeo" class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span
                                class="icon-bar"></span><span class="icon-bar"></span><span
                                class="icon-bar"></span></button>
                        <a href="#" class="header__logo-link">
                            <img class="header__logo-image" src="images/logo4.png?v=1676468577" alt="">
                        </a>
                    </div>
                    @else
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span
                                class="icon-bar"></span><span class="icon-bar"></span><span
                                class="icon-bar"></span></button>
                        <a href="#" class="header__logo-link">
                            <img class="header__logo-image" src="images/logo4.png?v=1676468577" alt="">
                        </a>
                    </div>
                    @endif

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <!--<li class="active"><a href="#">Home</a></li>-->
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorías<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($categorias as $item)
                                        <li><a href="#">{{ $item->nombreCategoria }}</a></li>
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
                            <li>
                                <form action="" class="navbar-form" style="width: 100%">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Buscar..."
                                                class="form-control">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-search">
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <a href="">
                            @if ($contadorCarrito->contadorCarrito > 0)
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <div style="display: inline-flex;">
                                            <!-- carrito -->
                                            <svg id="parpadeo" style="color: #9d9d9d"
                                                xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    fill="#9d9d9d">
                                                </path>
                                            </svg>
                                            <p id="parpadeo" style="color: #9d9d9d">
                                                {{ $contadorCarrito->contadorCarrito }}</p>
                                            <h4 id="parpadeo" style="color: #9d9d9d;">Carrito de compras</h4>
                                            <!-- carrito -->
                                        </div>

                                    </li>
                                </ul>
                            @else
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <div style="display: inline-flex;">
                                            <!-- carrito -->
                                            <svg style="color: #9d9d9d" xmlns="http://www.w3.org/2000/svg"
                                                width="28" height="28" fill="currentColor"
                                                class="bi bi-cart3" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                                                    fill="#9d9d9d">
                                                </path>
                                            </svg>
                                            <p style="color: #9d9d9d">{{ $contadorCarrito->contadorCarrito }}</p>
                                            <h4 style="color: #9d9d9d;">Carrito de compras</h4>
                                            <!-- carrito -->
                                        </div>

                                    </li>
                                </ul>
                        </a>
                        @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>










    <br><br><br><br><br><br>

























    <section class="animacion1">

        <div id="shopify-section-sections--14562733359167__popups"
            class="shopify-section shopify-section-group-overlay-group">
            <div data-section-id="sections--14562733359167__popups" data-section-type="popups"></div>
        </div>

        <!-- END sections: overlay-group -->
        <main id="main" role="main" class="component">

            <div class="hidden-phone">
                <img src="images/inicio3.png?v=1680025258&amp;width=1920" alt="" width="1920"
                    height="600" loading="lazy" class="slideshow__image zoom">
            </div>
            <div class="hidden-tablet-and-up zoom"><img src="images/inicio3.png?v=1680025277&amp;width=1200"
                    alt="" width="1200" height="1080" loading="lazy" class="slideshow__image ">
            </div>

            </div>
            <div id="shopify-section-template--14562732638271__collection-list" class="shopify-section">
                <section class="section" data-section-id="template--14562732638271__collection-list"
                    data-section-type="collection-list">
                </section>
            </div>
            <div id="shopify-section-template--14562732638271__8d8dabb7-46e1-4ebb-82e1-523d2e198241"
                class="shopify-section">
                <section class="section section--text-centered"
                    data-section-id="template--14562732638271__8d8dabb7-46e1-4ebb-82e1-523d2e198241"
                    data-section-type="rich-text">
                    <div class="container container--narrow">
                        <h2 class="heading h1">Encuentra la magia dentro de ti en MagicSexShop.</h2>
                        <div class="rte">
                        </div>
                    </div>
                </section>
            </div>
            </div>
    </section>
    <!--hasta aqui llega la seccion -->

    <div id="shopify-section-template--14562732638271__featured-collection" class="shopify-section">
        <section class="section" data-section-id="template--14562732638271__featured-collection"
            data-section-type="featured-collection"
            data-section-settings="{
    &quot;stackable&quot;: true,
    &quot;layout&quot;: &quot;vertical&quot;
  }">
            <div class="container">
                <header class="section__header">
                    <div class="section__header-stack">
                        <h2 class="section__title heading h3">Únete a la diversión con nuestros nuevos productos
                        </h2>
                    </div>
                </header>
            </div>

            <div class="container container--flush">
                {{ $productos->appends(request()->input())->links('pagination::bootstrap-4') }}
                <div class="product-list product-list--vertical product-list--stackable">
                    @foreach ($productos as $item)
                        <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a
                                class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                                <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%">

                                    <img src="imagesProductos/{{ $item->imagen }}" alt=""
                                        class="product-item__primary-image">

                                    <img src="images/logo.jpg?v=1673978877&amp;width=3126" alt=""
                                        width="3126" height="3125" loading="lazy"
                                        sizes="(max-width: 699px) 100vw, 600px" class="product-item__secondary-image">

                                </div>
                            </a>
                            <div class="product-item__info">
                                <div class="product-item__info-inner">{{ $item->categoria }}
                                    <p class="product-item__title text--strong link">{{ $item->nombre }}</p>
                                    <div class="product-item__price-list price-list"><span class="price">
                                            ₡{{ $item->precio }} </span>
                                    </div>
                                </div>

                                <div class="product-item__info-inner">
                                    @if ($item->color != 'NINGUNO')
                                        <div class="form-group">
                                            <select class="form-control" name="color">
                                                <option disabled selected>Seleccione el color</option>
                                                <option>{{ $item->color }}</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-item__info-inner">
                                    @if ($item->tamaño != 'NINGUNO')
                                        <div class="form-group">
                                            <select class="form-control" name="color">
                                                <option disabled selected>Seleccione el tamaño</option>
                                                <option>{{ $item->tamaño }}</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <form method="" action="" class="product-item__action-list button-stack">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit"
                                        class="product-item__action-button button button--small button--primary">Añadir
                                        al carrito</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="modal-quick-view-template--14562732638271__featured-collection" class="modal"
                aria-hidden="true">
                <div class="modal__dialog modal__dialog--stretch" role="dialog">
                    <button class="modal__close link" data-action="close-modal" title="Cerrar"><svg
                            focusable="false" class="icon icon--close " viewBox="0 0 19 19" role="presentation">
                            <path
                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg></button>
                    <div class="modal__loader"><svg focusable="false" class="icon icon--search-loader "
                            viewBox="0 0 64 64" role="presentation">
                            <path opacity=".4"
                                d="M23.8589104 1.05290547C40.92335108-3.43614731 58.45816642 6.79494359 62.94709453 23.8589104c4.48905278 17.06444068-5.74156424 34.59913135-22.80600493 39.08818413S5.54195825 57.2055303 1.05290547 40.1410896C-3.43602265 23.0771228 6.7944697 5.54195825 23.8589104 1.05290547zM38.6146353 57.1445143c13.8647142-3.64731754 22.17719655-17.89443541 18.529879-31.75914961-3.64743965-13.86517841-17.8944354-22.17719655-31.7591496-18.529879S3.20804604 24.7494569 6.8554857 38.6146353c3.64731753 13.8647142 17.8944354 22.17719655 31.7591496 18.529879z">
                            </path>
                            <path
                                d="M1.05290547 40.1410896l5.80258022-1.5264543c3.64731754 13.8647142 17.89443541 22.17719655 31.75914961 18.529879l1.5264543 5.80258023C23.07664892 67.43614731 5.54195825 57.2055303 1.05290547 40.1410896z">
                            </path>
                        </svg></div>
                    <div class="modal__inner"></div>
                </div>
            </div>
        </section>
    </div>
    <div id="shopify-section-template--14562732638271__5199ee47-c016-4657-bf0b-bfd73334618b" class="shopify-section">
        <section class="section section--text-centered"
            data-section-id="template--14562732638271__5199ee47-c016-4657-bf0b-bfd73334618b"
            data-section-type="rich-text">
            <div class="container container--medium">
                <h2 class="heading h1">Recoge un juguete para tu próxima aventura.</h2>
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
        <div class="container container--flush">
            <div class="product-list product-list--vertical product-list--stackable">
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-quick-view-template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03" class="modal"
            aria-hidden="true">
            <div class="modal__dialog modal__dialog--stretch" role="dialog">
                <button class="modal__close link" data-action="close-modal" title="Cerrar"><svg focusable="false"
                        class="icon icon--close " viewBox="0 0 19 19" role="presentation">
                        <path
                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg></button>
                <div class="modal__loader"><svg focusable="false" class="icon icon--search-loader "
                        viewBox="0 0 64 64" role="presentation">
                        <path opacity=".4"
                            d="M23.8589104 1.05290547C40.92335108-3.43614731 58.45816642 6.79494359 62.94709453 23.8589104c4.48905278 17.06444068-5.74156424 34.59913135-22.80600493 39.08818413S5.54195825 57.2055303 1.05290547 40.1410896C-3.43602265 23.0771228 6.7944697 5.54195825 23.8589104 1.05290547zM38.6146353 57.1445143c13.8647142-3.64731754 22.17719655-17.89443541 18.529879-31.75914961-3.64743965-13.86517841-17.8944354-22.17719655-31.7591496-18.529879S3.20804604 24.7494569 6.8554857 38.6146353c3.64731753 13.8647142 17.8944354 22.17719655 31.7591496 18.529879z">
                        </path>
                        <path
                            d="M1.05290547 40.1410896l5.80258022-1.5264543c3.64731754 13.8647142 17.89443541 22.17719655 31.75914961 18.529879l1.5264543 5.80258023C23.07664892 67.43614731 5.54195825 57.2055303 1.05290547 40.1410896z">
                        </path>
                    </svg></div>
                <div class="modal__inner"></div>
            </div>
        </div>
    </div>

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
                    <h2 class="section__title heading h3">Interactivo, conecta con el placer</h2>
                </div>
            </header>
        </div>
        <div class="container container--flush">
            <div class="product-list product-list--vertical product-list--stackable">
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
                <div class="product-item product-item--vertical   1/2 1/4--lap 1/3--desk 1/4--wide"><a href=""
                        class="product-item__image-wrapper product-item__image-wrapper--with-secondary">
                        <div class="aspect-ratio aspect-ratio--short" style="padding-bottom: 100.0%"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                data-media-id="22838291529791" class="product-item__primary-image"><img
                                src="images/logo.jpg?v=1671717460&amp;width=1000" alt="" width="1000"
                                height="1000" loading="lazy" sizes="(max-width: 699px) 100vw, 600px"
                                class="product-item__secondary-image">
                        </div>
                    </a>
                    <div class="product-item__info">
                        <div class="product-item__info-inner"><a class="product-item__vendor link"
                                href="/collections/vendors?q=Bali%20Sex%20Store">Categoría</a>
                            <a href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__title text--strong link">Nombre</a>
                            <div class="product-item__price-list price-list"><span class="price price--highlight">
                                    Precio
                            </div>
                        </div>
                        <form method="post" action="/cart/add"
                            id="product_form_id_1786829832255_template--14562732638271__9f725e29-59ac-478b-9630-95fad80f8d03"
                            accept-charset="UTF-8" class="product-item__action-list button-stack"
                            enctype="multipart/form-data"><input type="hidden" name="form_type"
                                value="product"><input type="hidden" name="utf8" value="✓"><input
                                type="hidden" name="quantity" value="1">
                            <input type="hidden" name="id" value="15108051861567"><a
                                href="/products/limpiador-de-juguetes-elixir-de-melon"
                                class="product-item__action-button button button--small button--primary">Añadir
                                al carrito</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-quick-view-template--14562732638271__3c0c8859-6c6a-460f-9e13-00fdb706e079" class="modal"
            aria-hidden="true">
            <div class="modal__dialog modal__dialog--stretch" role="dialog">
                <button class="modal__close link" data-action="close-modal" title="Cerrar"><svg focusable="false"
                        class="icon icon--close " viewBox="0 0 19 19" role="presentation">
                        <path
                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg></button>
                <div class="modal__loader"><svg focusable="false" class="icon icon--search-loader "
                        viewBox="0 0 64 64" role="presentation">
                        <path opacity=".4"
                            d="M23.8589104 1.05290547C40.92335108-3.43614731 58.45816642 6.79494359 62.94709453 23.8589104c4.48905278 17.06444068-5.74156424 34.59913135-22.80600493 39.08818413S5.54195825 57.2055303 1.05290547 40.1410896C-3.43602265 23.0771228 6.7944697 5.54195825 23.8589104 1.05290547zM38.6146353 57.1445143c13.8647142-3.64731754 22.17719655-17.89443541 18.529879-31.75914961-3.64743965-13.86517841-17.8944354-22.17719655-31.7591496-18.529879S3.20804604 24.7494569 6.8554857 38.6146353c3.64731753 13.8647142 17.8944354 22.17719655 31.7591496 18.529879z">
                        </path>
                        <path
                            d="M1.05290547 40.1410896l5.80258022-1.5264543c3.64731754 13.8647142 17.89443541 22.17719655 31.75914961 18.529879l1.5264543 5.80258023C23.07664892 67.43614731 5.54195825 57.2055303 1.05290547 40.1410896z">
                        </path>
                    </svg></div>
                <div class="modal__inner"></div>
            </div>
        </div>
        </section>
    </div>
    <div id="shopify-section-template--14562732638271__127e7bfe-e656-4552-b607-86d223e6a4d2" class="shopify-section">
        <section class="section section--text-centered"
            data-section-id="template--14562732638271__127e7bfe-e656-4552-b607-86d223e6a4d2"
            data-section-type="rich-text">
            <div class="container container--narrow">
                <h2 class="heading h1">La tienda donde compras placer.</h2>
                <div class="rte">
                </div>
            </div>
        </section>
    </div>
    <div id="shopify-section-template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8" class="shopify-section">
        <section class="section" data-section-id="template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8"
            data-section-type="mosaic">
            <div class="container">
                <div class="mosaic mosaic--medium mosaic--three-columns">
                    <div class="mosaic__column">
                        <div class="mosaic__item">
                            <a href="/collections/bondage"
                                id="block-template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8-1676133389dee69932-0"
                                class="promo-block promo-block--bottom-left ">
                                <div class="promo-block__image-clip">
                                    <div class="promo-block__image-wrapper promo-block__image-wrapper--cover"><img
                                            src="images/lubricantes.jpeg?v=1675344482&amp;width=801" alt=""
                                            width="801" height="520" loading="lazy" sizes="min(100vw, 560px)"
                                            class="image-background">
                                        <h1 class="overlay-heading">Lubricantes</h1>
                                    </div>
                                </div>
                                </noscript>
                            </a>
                        </div>
                        <div class="mosaic__item">
                            <a href="/collections/elixir"
                                id="block-template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8-1676133389dee69932-1"
                                class="promo-block promo-block--bottom-left ">

                                <div class="promo-block__image-clip">
                                    <div class="promo-block__image-wrapper promo-block__image-wrapper--cover">
                                        <img src="images/vibradores.jpeg?v=1675344516&amp;width=1101" alt=""
                                            width="801" height="520" loading="lazy" sizes="min(100vw, 560px)"
                                            class="image-background">
                                        <h1 class="overlay-heading">Vibradores</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mosaic__column">
                        <div class="mosaic__item">
                            <a href="/collections/modelos-webcam"
                                id="block-template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8-1676133389dee69932-2"
                                class="promo-block promo-block--bottom-left ">
                                <div class="promo-block__image-clip">
                                    <div class="promo-block__image-wrapper promo-block__image-wrapper--cover">
                                        <img src="images/lenceria.jpeg?v=1675344516&amp;width=1101" alt=""
                                            width="1101" height="1101" loading="lazy" sizes="min(100vw, 560px)"
                                            class="image-background">
                                        <h1 class="overlay-heading">Lencería</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mosaic__column">
                        <div class="mosaic__item">
                            <a href="/collections/wanna"
                                id="block-template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8-1676133389dee69932-3"
                                class="promo-block promo-block--bottom-left ">
                                <div class="promo-block__image-clip">
                                    <div class="promo-block__image-wrapper promo-block__image-wrapper--cover"><img
                                            src="images/anales.jpeg?v=1675344531&amp;width=801" alt=""
                                            width="801" height="520" loading="lazy" sizes="min(100vw, 560px)"
                                            class="image-background">
                                        <h1 class="overlay-heading">Accesorios anales</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="mosaic__item">
                            <a href="/collections/lerot"
                                id="block-template--14562732638271__a1776496-d8d8-4585-84dd-e0eee5f7a9a8-1676133389dee69932-4"
                                class="promo-block promo-block--bottom-left ">
                                <div class="promo-block__image-clip">
                                    <div class="promo-block__image-wrapper promo-block__image-wrapper--cover"><img
                                            src="images/bondage2.jpeg?v=1675344549&amp;width=801" alt=""
                                            width="801" height="520" loading="lazy" sizes="min(100vw, 560px)"
                                            class="image-background">
                                        <h1 class="overlay-heading">Bondage</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="shopify-section-template--14562732638271__220c92e8-4944-411d-b5f7-cdc598a18b79" class="shopify-section">
        <section class="section section--text-centered"
            data-section-id="template--14562732638271__220c92e8-4944-411d-b5f7-cdc598a18b79"
            data-section-type="rich-text">
            <div class="container container--narrow">
                <h2 class="heading h1">¡Estás a un juguete de conseguir un orgasmo!</h2>
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
                <a href="https://www.instagram.com/magicsexshop27/?hl=es" target="_blank" rel="noopener"
                    aria-label="Síguenos en Instagram" aria-describedby="a11y-new-window-message"><svg
                        focusable="false" class="icon icon--instagram " role="presentation" viewBox="0 0 30 30">
                        <path
                            d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm.0000159-23.03571429c-2.1823849 0-2.4560363.00925037-3.3131306.0483571-.8553081.03901103-1.4394529.17486384-1.9505835.37352345-.52841925.20532625-.9765517.48009406-1.42331254.926823-.44672894.44676084-.72149675.89489329-.926823 1.42331254-.19865961.5111306-.33451242 1.0952754-.37352345 1.9505835-.03910673.8570943-.0483571 1.1307457-.0483571 3.3131306 0 2.1823531.00925037 2.4560045.0483571 3.3130988.03901103.8553081.17486384 1.4394529.37352345 1.9505835.20532625.5284193.48009406.9765517.926823 1.4233125.44676084.446729.89489329.7214968 1.42331254.9268549.5111306.1986278 1.0952754.3344806 1.9505835.3734916.8570943.0391067 1.1307457.0483571 3.3131306.0483571 2.1823531 0 2.4560045-.0092504 3.3130988-.0483571.8553081-.039011 1.4394529-.1748638 1.9505835-.3734916.5284193-.2053581.9765517-.4801259 1.4233125-.9268549.446729-.4467608.7214968-.8948932.9268549-1.4233125.1986278-.5111306.3344806-1.0952754.3734916-1.9505835.0391067-.8570943.0483571-1.1307457.0483571-3.3130988 0-2.1823849-.0092504-2.4560363-.0483571-3.3131306-.039011-.8553081-.1748638-1.4394529-.3734916-1.9505835-.2053581-.52841925-.4801259-.9765517-.9268549-1.42331254-.4467608-.44672894-.8948932-.72149675-1.4233125-.926823-.5111306-.19865961-1.0952754-.33451242-1.9505835-.37352345-.8570943-.03910673-1.1307457-.0483571-3.3130988-.0483571zm0 1.44787387c2.1456068 0 2.3997686.00819774 3.2471022.04685789.7834742.03572556 1.2089592.1666342 1.4921162.27668167.3750864.14577303.6427729.31990322.9239522.60111439.2812111.28117926.4553413.54886575.6011144.92395217.1100474.283157.2409561.708642.2766816 1.4921162.0386602.8473336.0468579 1.1014954.0468579 3.247134 0 2.1456068-.0081977 2.3997686-.0468579 3.2471022-.0357255.7834742-.1666342 1.2089592-.2766816 1.4921162-.1457731.3750864-.3199033.6427729-.6011144.9239522-.2811793.2812111-.5488658.4553413-.9239522.6011144-.283157.1100474-.708642.2409561-1.4921162.2766816-.847206.0386602-1.1013359.0468579-3.2471022.0468579-2.1457981 0-2.3998961-.0081977-3.247134-.0468579-.7834742-.0357255-1.2089592-.1666342-1.4921162-.2766816-.37508642-.1457731-.64277291-.3199033-.92395217-.6011144-.28117927-.2811793-.45534136-.5488658-.60111439-.9239522-.11004747-.283157-.24095611-.708642-.27668167-1.4921162-.03866015-.8473336-.04685789-1.1014954-.04685789-3.2471022 0-2.1456386.00819774-2.3998004.04685789-3.247134.03572556-.7834742.1666342-1.2089592.27668167-1.4921162.14577303-.37508642.31990322-.64277291.60111439-.92395217.28117926-.28121117.54886575-.45534136.92395217-.60111439.283157-.11004747.708642-.24095611 1.4921162-.27668167.8473336-.03866015 1.1014954-.04685789 3.247134-.04685789zm0 9.26641182c-1.479357 0-2.6785873-1.1992303-2.6785873-2.6785555 0-1.479357 1.1992303-2.6785873 2.6785873-2.6785873 1.4793252 0 2.6785555 1.1992303 2.6785555 2.6785873 0 1.4793252-1.1992303 2.6785555-2.6785555 2.6785555zm0-6.8050167c-2.2790034 0-4.1264612 1.8474578-4.1264612 4.1264612 0 2.2789716 1.8474578 4.1264294 4.1264612 4.1264294 2.2789716 0 4.1264294-1.8474578 4.1264294-4.1264294 0-2.2790034-1.8474578-4.1264612-4.1264294-4.1264612zm5.2537621-.1630297c0-.532566-.431737-.96430298-.964303-.96430298-.532534 0-.964271.43173698-.964271.96430298 0 .5325659.431737.964271.964271.964271.532566 0 .964303-.4317051.964303-.964271z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg></a>
            </li>
            <li class="social-media__item social-media__item--whatsapp">
                <a href="https://wa.me/50660168568?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
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
    <div class="container container--flush">
        <div class="featured-product">
            <div class="card">
                <div class="card__section card__section--tight">
                    <div class="product-gallery product-gallery--with-thumbnails">
                        <div class="product-gallery__carousel-wrapper">
                            <div class="product-gallery__carousel product-gallery__carousel--zoomable flickity-enabled is-fade"
                                data-media-count="20" data-initial-media-id="22584943902783" style="">
                                <div class="flickity-viewport" style="height: 695px; touch-action: pan-y;">
                                    <div class="flickity-slider" style="left: 0px; transform: translateX(50%);">
                                        <div class="product-gallery__carousel-item is-selected" tabindex="-1"
                                            data-media-id="22584943902783" data-media-type="image"
                                            style="position: absolute; left: -50%; opacity: 1;">
                                            <div class="product-gallery__size-limiter" style="max-width: 1000px">

                                                <div class="aspect-ratio" style="padding-bottom: 100.0%">
                                                    @foreach ($productos as $item)
                                                        @if ($item->temporada == '1')
                                                            <img style="width: 380px; height: 380px;"
                                                                src="imagesProductos/{{ $item->imagen }}"
                                                                alt="">
                                                        @endif
                                                    @endforeach
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
                <div id="product-zoom-template--14562732638271__featured-product" class="product__zoom-wrapper"></div>
                <div class="card__section">
                    <form method="post" action="/cart/add"
                        id="product_form_template--14562732638271__featured-product7064984518719"
                        accept-charset="UTF-8" class="product-form" enctype="multipart/form-data">
                        <div class="product-meta">
                            <h3 class="product-meta__title heading h2">
                                @foreach ($productos as $item)
                                    @if ($item->temporada == '1')
                                        <p>{{ $item->nombre }}</p>
                                    @endif
                                @endforeach
                            </h3>
                            <hr class="card__separator">

                            <div class="product-form__info-list">
                                <div class="product-form__info-item">
                                    <span class="product-form__info-title text--strong">Precio:</span>
                                    <div class="product-form__info-content" role="region" aria-live="polite">
                                        <div class="price-list"><span class="price">
                                                @foreach ($productos as $item)
                                                    @if ($item->temporada == '1')
                                                        <p>₡{{ $item->precio }}</p>
                                                    @endif
                                                @endforeach
                                        </div>
                                        <div class="product-form__price-info" style="display: none">
                                            <div class="unit-price-measurement">
                                                <span class="unit-price-measurement__price"></span>
                                                <span class="unit-price-measurement__separator">/ </span>
                                                <span class="unit-price-measurement__reference-value"></span>
                                                <span class="unit-price-measurement__reference-unit"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-form__info-item product-form__info-item--quantity">
                                    <label for="template--14562732638271__featured-product-7064984518719-quantity"
                                        class="product-form__info-title text--strong">Cantidad:</label>
                                    <div class="product-form__info-content">
                                        <div class="quantity-selector quantity-selector--product">
                                            <button type="button" class="quantity-selector__button"
                                                data-action="decrease-picker-quantity"
                                                aria-label="Disminuir la cantidad en 1"
                                                title="Disminuir la cantidad en 1"><svg focusable="false"
                                                    class="icon icon--minus " viewBox="0 0 10 2" role="presentation">
                                                    <path d="M10 0v2H0V0z" fill="currentColor"></path>
                                                </svg></button>
                                            <input name="quantity" aria-label="Cantidad"
                                                class="quantity-selector__value" inputmode="numeric" value="1"
                                                size="3">
                                            <button type="button" class="quantity-selector__button"
                                                data-action="increase-picker-quantity"
                                                aria-label="Aumentar la cantidad en 1"
                                                title="Aumentar la cantidad en 1"><svg focusable="false"
                                                    class="icon icon--plus " viewBox="0 0 10 10" role="presentation">
                                                    <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z" fill="currentColor"
                                                        fill-rule="evenodd"></path>
                                                </svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-form__payment-container"><button type="submit"
                                    class="product-form__add-button button button--primary"
                                    data-action="add-to-cart">Añadir al carrito</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    <div id="shopify-section-template--14562732638271__05ad0977-fcfc-476f-948d-e9119e0da40c" class="shopify-section">
        <section class="section section--text-centered"
            data-section-id="template--14562732638271__05ad0977-fcfc-476f-948d-e9119e0da40c"
            data-section-type="rich-text">
            <div class="container container--narrow">
                <h2 class="heading h1">Mejora tu vida sexual con las mejores marcas.</h2>
                <div class="rte">
                </div>
            </div>
        </section>
        <div id="shopify-section-sections--14562733293631__footer"
            class="shopify-section shopify-section-group-footer-group">
            <footer class="footer" data-section-id="sections--14562733293631__footer" data-section-type="footer"
                role="contentinfo">
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
                                        <a href="https://www.instagram.com/magicsexshop27/?hl=es" target="_blank"
                                            rel="noopener" aria-label="Síguenos en Instagram"
                                            aria-describedby="a11y-new-window-message"><svg focusable="false"
                                                class="icon icon--instagram " role="presentation"
                                                viewBox="0 0 30 30">
                                                <path
                                                    d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm.0000159-23.03571429c-2.1823849 0-2.4560363.00925037-3.3131306.0483571-.8553081.03901103-1.4394529.17486384-1.9505835.37352345-.52841925.20532625-.9765517.48009406-1.42331254.926823-.44672894.44676084-.72149675.89489329-.926823 1.42331254-.19865961.5111306-.33451242 1.0952754-.37352345 1.9505835-.03910673.8570943-.0483571 1.1307457-.0483571 3.3131306 0 2.1823531.00925037 2.4560045.0483571 3.3130988.03901103.8553081.17486384 1.4394529.37352345 1.9505835.20532625.5284193.48009406.9765517.926823 1.4233125.44676084.446729.89489329.7214968 1.42331254.9268549.5111306.1986278 1.0952754.3344806 1.9505835.3734916.8570943.0391067 1.1307457.0483571 3.3131306.0483571 2.1823531 0 2.4560045-.0092504 3.3130988-.0483571.8553081-.039011 1.4394529-.1748638 1.9505835-.3734916.5284193-.2053581.9765517-.4801259 1.4233125-.9268549.446729-.4467608.7214968-.8948932.9268549-1.4233125.1986278-.5111306.3344806-1.0952754.3734916-1.9505835.0391067-.8570943.0483571-1.1307457.0483571-3.3130988 0-2.1823849-.0092504-2.4560363-.0483571-3.3131306-.039011-.8553081-.1748638-1.4394529-.3734916-1.9505835-.2053581-.52841925-.4801259-.9765517-.9268549-1.42331254-.4467608-.44672894-.8948932-.72149675-1.4233125-.926823-.5111306-.19865961-1.0952754-.33451242-1.9505835-.37352345-.8570943-.03910673-1.1307457-.0483571-3.3130988-.0483571zm0 1.44787387c2.1456068 0 2.3997686.00819774 3.2471022.04685789.7834742.03572556 1.2089592.1666342 1.4921162.27668167.3750864.14577303.6427729.31990322.9239522.60111439.2812111.28117926.4553413.54886575.6011144.92395217.1100474.283157.2409561.708642.2766816 1.4921162.0386602.8473336.0468579 1.1014954.0468579 3.247134 0 2.1456068-.0081977 2.3997686-.0468579 3.2471022-.0357255.7834742-.1666342 1.2089592-.2766816 1.4921162-.1457731.3750864-.3199033.6427729-.6011144.9239522-.2811793.2812111-.5488658.4553413-.9239522.6011144-.283157.1100474-.708642.2409561-1.4921162.2766816-.847206.0386602-1.1013359.0468579-3.2471022.0468579-2.1457981 0-2.3998961-.0081977-3.247134-.0468579-.7834742-.0357255-1.2089592-.1666342-1.4921162-.2766816-.37508642-.1457731-.64277291-.3199033-.92395217-.6011144-.28117927-.2811793-.45534136-.5488658-.60111439-.9239522-.11004747-.283157-.24095611-.708642-.27668167-1.4921162-.03866015-.8473336-.04685789-1.1014954-.04685789-3.2471022 0-2.1456386.00819774-2.3998004.04685789-3.247134.03572556-.7834742.1666342-1.2089592.27668167-1.4921162.14577303-.37508642.31990322-.64277291.60111439-.92395217.28117926-.28121117.54886575-.45534136.92395217-.60111439.283157-.11004747.708642-.24095611 1.4921162-.27668167.8473336-.03866015 1.1014954-.04685789 3.247134-.04685789zm0 9.26641182c-1.479357 0-2.6785873-1.1992303-2.6785873-2.6785555 0-1.479357 1.1992303-2.6785873 2.6785873-2.6785873 1.4793252 0 2.6785555 1.1992303 2.6785555 2.6785873 0 1.4793252-1.1992303 2.6785555-2.6785555 2.6785555zm0-6.8050167c-2.2790034 0-4.1264612 1.8474578-4.1264612 4.1264612 0 2.2789716 1.8474578 4.1264294 4.1264612 4.1264294 2.2789716 0 4.1264294-1.8474578 4.1264294-4.1264294 0-2.2790034-1.8474578-4.1264612-4.1264294-4.1264612zm5.2537621-.1630297c0-.532566-.431737-.96430298-.964303-.96430298-.532534 0-.964271.43173698-.964271.96430298 0 .5325659.431737.964271.964271.964271.532566 0 .964303-.4317051.964303-.964271z"
                                                    fill="currentColor" fill-rule="evenodd"></path>
                                            </svg></a>
                                    </li>
                                    <li class="social-media__item social-media__item--whatsapp">
                                        <a href="https://wa.me/50660168568?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
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
                            <p style="color: white !important">© 2023 MagicSexShop</p>
                        </div>
                    </div>
                </div>
            </footer>
            <a href="https://wa.me/50660168568?text=¿Me%20gustaría%20consultar%20sobre%20un%20producto%3F"
                target="_blank">
                <div class="joinchat joinchat--right joinchat--btn joinchat--show joinchat--tooltip"
                    style="--vh:321px;">
                    <div class="joinchat__button">
                        <div class="joinchat__button__open"></div>
                        <div class="joinchat__tooltip">
                            <div>Hola, ¿en qué puedo ayudarte?</div>
                        </div>
                    </div>
                </div>
</body>

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

</html>
