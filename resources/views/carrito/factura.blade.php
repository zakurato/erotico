<html lang="es" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Facturacion</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="{{ asset('index/styles.Css') }}?v={{ time() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, maximum-scale=1.0">
</head>

<body id="cart"
    class="cart lang-es country-es currency-eur layout-full-width page-cart tax-display-enabled lang_es    desktop_device   	 hide-left-column hide-right-column "
    onload="myFunction()">



    <div class="navbar navbar-inverse" style="background-color: #e7e7e7 !important; width: 100% !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-header">
                        <a href="#" class="header__logo-link">
                            <img style="height: 70px;" class="header__logo-image"
                                src="{{ asset('images/logoShopis.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <br><br><br><br>
    <div class="factura">
        <form action="{{ route('verFactura') }}">
            <label for="" id="facturaLabel"></label>
            <br>
            <label for="" id="telefonoLabel"></label>
            <br>
            <label for="" id="nombreCliente"></label>
            <br><br>
            <input type="hidden" value="" id="numeroFactura" name="nFactura">
            <input type="hidden" value="" id="telefono" name="telefono">
            <button class="btn btn-primary btn-lg" type="submit">Ver Factura</button>
        </form>
    </div>




    <footer class="footer" data-section-id="sections--14562733293631__footer" data-section-type="footer"
        role="contentinfo" style="background-color: #e7e7e7; color: black">
        <div class="container">
            <div class="footer__wrapper">
                <div class="footer__block-list">
                    <div class="footer__block-item footer__block-item--text">
                        <button class="footer__title heading h6" aria-expanded="false" aria-controls="block-footer-0"
                            data-action="toggle-collapsible" disabled="disabled">
                            <span style="color: black">Acerca de nosotros</span>
                        </button>
                        <p>
                            En ShopisCr, nuestra misión es ofrecer una amplia variedad de productos de alta calidad
                            a precios inigualables. Somos más que una empresa, somos un compromiso con la excelencia y
                            la satisfacción
                            de nuestros clientes, haciendo realidad tus sueños a través de productos excepcionales.
                        </p>
                    </div>
                </div>
                <aside class="footer__aside">
                    <div class="footer__aside-item footer__aside-item--social">
                        <p class="footer__aside-title">Síguenos</p>
                        <ul class="social-media__item-list  list--unstyled" role="list">
                            <li class="social-media__item social-media__item--facebook">
                                <a href="https://www.facebook.com/profile.php?id=100063694886908" target="_blank"
                                    rel="noopener" aria-label="Síguenos en Facebook"
                                    aria-describedby="a11y-new-window-message"><svg focusable="false"
                                        class="icon icon--facebook " viewBox="0 0 30 30">
                                        <path
                                            d="M15 30C6.71572875 30 0 23.2842712 0 15 0 6.71572875 6.71572875 0 15 0c8.2842712 0 15 6.71572875 15 15 0 8.2842712-6.7157288 15-15 15zm3.2142857-17.1429611h-2.1428678v-2.1425646c0-.5852979.8203285-1.07160109 1.0714928-1.07160109h1.071375v-2.1428925h-2.1428678c-2.3564786 0-3.2142536 1.98610393-3.2142536 3.21449359v2.1425646h-1.0714822l.0032143 2.1528011 1.0682679-.0099086v7.499969h3.2142536v-7.499969h2.1428678v-2.1428925z"
                                            fill="currentColor" fill-rule="evenodd"></path>
                                    </svg></a>
                            </li>
                            <li class="social-media__item social-media__item--instagram">
                                <a href="https://www.instagram.com/shopis.cr/" target="_blank" rel="noopener"
                                    aria-label="Síguenos en Instagram" aria-describedby="a11y-new-window-message"><svg
                                        focusable="false" class="icon icon--instagram " role="presentation"
                                        viewBox="0 0 30 30">
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


</body>

<script>
    function myFunction() {
        // Obtener la URL actual
        var url = window.location.href;
        var partes = url.split('/');

        // Obtener los valores deseados
        var valor1 = partes[4]; // numero factura
        var valor2 = partes[5]; // telefono

        //quitarle el signo numeral al telefono
        valor2 = valor2.replace("#", "")
        //inputs Hidden para enviar por el formulario
        var nFactura = document.getElementById("numeroFactura");
        var telefono = document.getElementById("telefono");
        nFactura.value = valor1;
        telefono.value = valor2;

        //Labels para mostrar al usuario
        var nFacturaLabel = document.getElementById("facturaLabel");
        var telefonoLabel = document.getElementById("telefonoLabel");
        nFacturaLabel.innerText = "Número de factura: " + valor1;
        telefonoLabel.innerText = "Teléfono: " + valor2;


        //ajax para traer el nombre del cliente
        $.ajax({
            url: 'http://shopiscr.com/traerNombreCliente', // aqui va el nombre de la ruta
            method: 'GET', // el metodo que se usa en la ruta
            dataType: 'json',
            data: {
                nFactura: valor1,
                telefono: valor2,
            }, //los parametros enviados
            success: function(response) {
                var nombreCliente = document.getElementById("nombreCliente");
                nombreCliente.innerText = response.nombre;
            }
        });
    }
</script>

</html>
