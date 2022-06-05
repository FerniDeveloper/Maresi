<footer id="colophon" class="site-footer">
    <div class="footer-newsletter zazvsp">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <h5 class="newsletter-title">Reg&iacute;strate al bolet&iacute;n</h5>
                    <span class="newsletter-marketing-text">...y no dejes pasar ninguna <strong>s&uacute;per promoci&oacute;n</strong></span>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electr&oacute;nico">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" id="btnb" onclick="javascript:boletinp($('#email').val())">Reg&iacute;strate</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom-widgets">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5" style="display: flex;">

                    <div class="columns">
                        <aside id="nav_menu-1" class="widget clearfix widget_nav_menu">
                            <div class="body">
                                <h4 class="widget-title">Servicios profesionales</h4>
                                <div class="menu-footer-menu-2-container">
                                    <ul id="menu-footer-menu-2" class="menu">
                                         <li class="menu-item"><a title="Alarmas de intrusi&oacute;n" href="../slider/ALARMAS-DE-INTRUSION">Alarmas de intrusi&oacute;n</a></li>
                                         <li class="menu-item"><a title="Cercos electrificados" href="../slider/CERCOS-ELECTRIFICADOS">Cercos electrificados</a></li>
                                        <li class="menu-item"><a title="Control de acceso" href="../slider/CONTROL-DE-ACCESO">Control de acceso</a></li>
                                        <li class="menu-item"><a title="Data center y comunicaciones" href="../slider/DATA-CENTER">Data center y comunicaciones</a></li>
                                        <li class="menu-item"><a title="Espacios inteligentes" href="../slider/ESPACIOS-INTELIGENTES">Espacios inteligentes</a></li>
                                        <li class="menu-item"><a title="Inform&aacute;tica administrativa" href="../slider/INFORMATICA-ADMINISTRATIVA">Inform&aacute;tica administrativa</a></li>
                                        <li class="menu-item"><a title="Videovigilancia" href="../slider/VIDEOVIGILANCIA">Videovigilancia</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div><!-- /.columns -->

                    <div class="columns">
                        <aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
                            <div class="body">
                                <h4 class="widget-title">Categor&iacute;as</h4>
                                <div class="menu-footer-menu-1-container">
                                    <ul id="menu-footer-menu-1" class="menu">
                                        <?php
                                            $sql="select * from categorias order by categoria";
                                            $result = $db->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                ?>
                                                    <li class="menu-item"><a href="../shop?s=<?=$row['categoria']?>" class="foot"><?=$row['categoria']?></a></li>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div><!-- /.columns -->

                    <div class="columns">
                        <aside id="nav_menu-1" class="widget clearfix widget_nav_menu">
                            <div class="body">
                                <h4 class="widget-title">Atenci&oacute;n al cliente</h4>
                                <div class="menu-footer-menu-3-container">
                                    <ul id="menu-footer-menu-3" class="menu">
                                        <?php
                                            if(isset($_SESSION['VSPCOMP'])){?><li class="menu-item"><a class="foot" href="../info">Mi Cuenta</a></li><?php }
                                            else{?><li class="menu-item"><a class="foot" href="../my-account">Mi Cuenta</a></li><?php }
                                        ?>
                                        <li class="menu-item"><a class="foot" href="../contact">Contacto</a></li>
                                        <?php
                                            if(isset($_SESSION['VSPCOMP'])){?><li class="menu-item"><a class="foot" href="../wishlist">Lista de deseos</a></li><?php }
                                        ?>
                                        <li class="menu-item"><a class="foot" href="../terminos-y-condiciones">T&eacute;rminos y condiciones</a></li>
                                        <li class="menu-item"><a class="foot" href="../aviso-de-privacidad">Aviso de privacidad</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div><!-- /.columns -->

                </div><!-- /.col -->

                <div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
                    <div class="footer-logo">
                        <a href="../index"><img src="../assets/images/logo.png" width="60%"></a>
                    </div><!-- /.footer-contact -->

                    <div class="footer-call-us">
                        <div class="media">
                            <span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
                            <div class="media-body">
                                <span class="call-us-text">Tienes alguna pregunta ? Ll&aacute;manos!</span>
                                <span class="call-us-number">373 734 98 41 </span>
                                <span class="call-us-number">373 106 08 03 </span>
                                <span class="call-us-number footer-wpp" >
                                    <a href="https://wa.me/523334459561" target="_blank" >
                                        <img src="../assets/images/icons/wpp3.png" alt="Contacto" style="width: 3em; display: inline; ">
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div><!-- /.footer-call-us -->

                    <div class="footer-address">
                        <strong class="footer-address-title">Informaci&oacute;n de contacto</strong>
                        <address><strong>Grupo VSP COM S. DE R.L. DE C.V.</strong></address>
                        <address><strong>Oficina:</strong> Industria #28-A, Zapotlanejo Jalisco, M&eacute;xico </address>
                        <address><strong>Centro de servicio:</strong> Carmen Serd&aacute;n #21-B, Zapotlanejo Jalisco, M&eacute;xico </address>
                    </div><!-- /.footer-address -->

                    <div class="footer-social-icons">
                        <ul class="social-icons list-unstyled">
                            <li><a class="fa fa-facebook" rel="noreferrer" target="_blank" href="https://www.facebook.com/vspcomputer/"></a></li>
                            <li><a class="fa fa-instagram" rel="noreferrer" target="_blank" href="https://www.instagram.com/vsp_computer/"></a></li>
                            <li><a class="fa fa-youtube" rel="noreferrer" target="_blank" href="https://www.youtube.com/channel/UCcxS8jMduJOLjjXDSEEvTDQ"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="pull-left flip payment">
                <p style="font-size: 10px; margin-bottom: 0; line-height: normal;">*Precios expresados en pesos mexicanos (MXN) e incluyen IVA<br>*Precios y ofertas sujetos a cambio sin previo aviso</p>
            </div>
            <div class="pull-right flip payment">
                <div class="footer-payment-logo">
                    <ul class="cash-card card-inline">
                        <li class="card-item"><img src="../assets/images/credit-cards/paypal.svg" alt="PayPal" width="52"></li>
                        <li class="card-item"><img src="../assets/images/credit-cards/bbva.svg" alt="BBVA" style="padding-top: 0.5rem;" width="52"></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->
</footer><!-- #colophon -->