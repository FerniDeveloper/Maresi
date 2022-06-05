<footer class="mt-30">
    <!-- Newslatter area start -->
    <div id="newslettersection" class="newsletter-group">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="newsletter-inner d-flex align-items-center">
                        <!--<i class="fa fa-envelope-open-o"></i>-->
                        <div class="newsletter-title">
                            <h1 class="sign-title">Reg&iacute;strate al bolet&iacute;n</h1>
                            <p>...y no dejes pasar ninguna <strong>s&uacute;per promoci&oacute;n</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="newsletter-box">
                        <form class="mc-form">
                            <input type="email" class="email-box" id="email" placeholder="Ingresa tu correo electr&oacute;nico" >
                            <button id="btnb" class="newsletter-btn" type="button" onclick="javascript:boletin($('#email').val())">Reg&iacute;strate</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newslatter area End -->
    <!-- Footer Top Start -->
    <div class="footer-top mt-50 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-single-widget">
                        <div class="footer-logo mb-40">
                            <a href="/"><img src="assets/images/logo/pos-circle-logo.jpg" alt=""></a>
                        </div>
                        <div class="widget-body">
                            <!--<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>-->
                            <div class="widget-address mt-30 mb-20">
                                <p><strong>Direcci&oacute;n:</strong> Calle Hidalgo 96-Local 4, Centro, 45430 Zapotlanejo, Jal.</p>
                                <p><strong>N&uacute;mero Telef&oacute;nico:</strong> <a href="tel:3324258632"> 332 425 8632</a></p>
                                <p><strong>Correo Electr&oacute;nico:</strong><a href="mailto:contacto@vspshop.mx"> &nbsp;contacto@vspshop.mx</a></p>
                            </div>
                        </div>
                        <div class="footer_social">
                            <ul class="d-flex">
                                <li><a class="facebook" href="https://www.facebook.com/VSPShopZapotlanejo" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a class="instagram" href="https://www.instagram.com/vspshopzapotlanejo" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="widgets_container">
                                <h6>Secciones</h6>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="/">Inicio</a></li>
                                        <li><a href="shop"> Tienda</a></li>
                                        <li><a href="contact"> Contacto</a></li>
                                        <li><a href="about-us">Nosotros</a></li>
                                        <li><a href="aviso-de-privacidad">Aviso de Privacidad</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="widgets_container">
                                <h6>&nbsp;</h6>
                                <div class="footer_menu">
                                    <ul>
                                        <?php
                                        $red = "";
                                        if(isset($_SESSION['VSPCOMP']['cliente'])){
                                            $red = "info";
                                        }else{
                                            $red = "my-account";
                                        }
                                        ?>
                                        <li><a href="<?=$red?>">Mi cuenta</a></li>
                                        <li><a href="wishlist">Lista de deseos</a></li>
                                        <li><a href="cart">Carrito de compras</a></li>
                                        <li><a id="newsBtn" href="#newslettersection">Boletín</a></li>
                                        <li><a href="terminos-y-condiciones">T&eacute;rminos y condiciones</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="widgets_container">
                                <h6><a href="shop">Tienda</a></h6>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="shop?s=ACCESORIOS">Accesorios</a></li>
                                        <li><a href="shop?s=ALMACENAMIENTO">Almacenamiento</a></li>
                                        <li><a href="shop?s=AUDIO">Audio</a></li>
                                        <li><a href="shop?s=CARGADORES">Cargadores</a></li>
                                        <li><a href="shop?s=CONSUMIBLE">Consumible</a></li>
                                        <li><a href="shop?s=CONTROL DE ACCESO">Control de acceso</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="widgets_container">
                                <h6>&nbsp;</h6>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="shop?s=ENERGIA">Energía</a></li>
                                        <li><a href="shop?s=ENTRETENIMIENTO">Entretenimiento</a></li>
                                        <li><a href="shop?s=HERRAMIENTAS">Herramientas</a></li>
                                        <li><a href="shop?s=PUNTO DE VENTA">Punto de venta</a></li>
                                        <li><a href="shop?s=REDES">Redes</a></li>
                                        <li><a href="shop?s=VIDEOVIGILANCIA">Videovigilancia</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->
    
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="footer-bottom-content">
                        <div class="footer-copyright">
                            <p>© 2021 Copyright <strong>VSP SHOP</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="payment" style="text-align: right;">
                        <a href="javascript:void(0)">
                            <img src="assets/images/credit-cards/paypal.svg" width="52" alt="" class="img-fluid">
                            &nbsp;
                            <img src="assets/images/credit-cards/bbva.svg" width="52" alt="" class="img-fluid">
                            &nbsp;
                            <img src="assets/images/payment/cards1_bbva.png" width="120" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>