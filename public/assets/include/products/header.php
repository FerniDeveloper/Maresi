<div class="top-bar hidden-md-down">
  <div class="container">
    <nav>
      <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
      </ul>
    </nav>

    <nav>
      <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
        <li class="menu-item animate-dropdown"><a title="Tienda" href="../shop"><i class="ec ec-shopping-bag"></i>Tienda</a></li>
        <?php
        if(isset($_SESSION['VSPCOMP'])){
          ?>
            <li class="menu-item animate-dropdown"><a title="Mi Cuenta" href="../info"><i class="ec ec-user"></i><?=$_SESSION['VSPCOMP']['nombre']?></a></li>
            <li class="menu-item animate-dropdown"><a title="Cerrar sesi&oacute;n" href="../controller/logout">Salir</a></li>
          <?php
        }
        else{
          ?><li class="menu-item animate-dropdown"><a title="Mi Cuenta" href="../my-account"><i class="ec ec-user"></i>Mi Cuenta</a></li><?php
        }
        ?>
      </ul>

      <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
        <?php
          $sql="select * from categorias order by categoria";
          $result = $db->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
              <li class="menu-item"><a title="<?=$row['categoria']?>" href="../shop?s=<?=$row['categoria']?>"><?=$row['categoria']?></a></li>
            <?php
            }
          }
        ?>
      </ul>
    </nav>
  </div>
</div><!-- /.top-bar -->

<header id="masthead" class="site-header header-v1"> 
  <div class="container hidden-md-down">
    <div class="row">
      <!-- ============================================================= Header Logo ============================================================= -->
      <div class="header-logo">
        <a href="../index" class="header-logo-link">
          <img src="../assets/images/logo.png" alt="VSP Computer">
        </a>
      </div>
      <!-- ============================================================= Header Logo : End============================================================= -->

      <form class="navbar-search" method="get" action="../shop">
        <label class="sr-only screen-reader-text" for="search">B&uacute;squeda de productos:</label>
        <div class="input-group">
          <input type="text" id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="B&uacute;squeda de productos" />
          <div class="input-group-btn">
            <input type="hidden" id="search-param" name="post_type" value="product" />
            <button type="submit" id="btnbusq" class="btn btn-secondary"><i class="ec ec-search"></i></button>
          </div>
        </div>
      </form>

      <div class="header-logo">
        <a href="index" class="header-logo-link">
          <img src="../assets/images/logoshop.png" alt="VSP Shop">
        </a>
      </div>


      <ul class="navbar-mini-cart navbar-nav animate-dropdown nav flip">
        <li class="nav-item dropdown" style="padding-left: 1em">
          <a href="cart" class="nav-link" data-toggle="dropdown">
            <i class="ec ec-shopping-bag"></i>
            <?php
            if(isset($_SESSION['totales'])){
              ?>
                <script type="text/javascript">
                  $.ajax({ url: '../controller/carro/functions',
                    data: {ppo: 'count'},
                    type: 'post',
                    success: function(output) {
                      $("#cart-items-count").html(output);
                    }
                  });

                  $.ajax({ url: '../controller/carro/functions',
                    data: {ppo: 'gettotal'},
                    type: 'post',
                    success: function(output) {
                      $("#cart-items-total-price").html(output);
                    }
                  });
                </script>
              <?php
            }
            else{

            }
            ?>
            <span class="cart-items-count count" id="cart-items-count">0</span>
            <span class="cart-items-total-price total-price"><span class="amount" id="cart-items-total-price"></span></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-mini-cart">
            <li>
              <div class="widget_shopping_cart_content">

                <ul class="cart_list product_list_widget " id="cart_listproduct_list_widget">
                  <?php
                    if(isset($_SESSION['carrito'])){
                      $carrito = new Carrito();
                      $carro = $carrito->get_content();
                      if(!empty($carro)){

                        foreach($carro as $articulo){
                          if($articulo['cantidad'] > 0){
                            ?>
                            <li class="mini_cart_item">
                              <a title="Removep this item" class="remove" href="javascript:removep('<?=$articulo['unique_id']?>')">×</a>
                              <a href="../products/<?=$articulo['id']?>">
                                <img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="../assets/images/products/<?=$articulo['id']?>.jpg" alt=""><?=$articulo['nombre']?>&nbsp;
                              </a>

                              <span class="quantity"><?=$articulo['cantidad']?> × $<span class="amount"><?=number_format($articulo['precio'], 2)?></span></span>
                            </li>
                            <?php
                          }
                        }
                      }
                      else{
                        ?>
                        <p>El carrito de compras est&aacute; vac&iacute;o</p>
                        <?php
                      }
                    }
                    else{
                      ?>
                      <p>El carrito de compras est&aacute; vac&iacute;o</p>
                      <?php
                    }
                  ?>
                </ul><!-- end product list -->

                <form method="post" action="../my-account" id="login1">
                  <p class="buttons">
                    <p style="font-size: 10px; margin-bottom: 0;">Precios y totales mostrados no incluyen gastos de envío</p>
                    <a class="button wc-forward" href="../cart">Ver carrito</a>
                    <a class="button checkout wc-forward" href="../checkout">Pagar</a>
                  </p>
                </form>
              </div>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a href="https://wa.me/523334459561" rel="noreferrer" target="_blank" ><img src="../assets/images/icons/wpp3.png" alt="Contacto" class="img-circle" style="width: 5em"></a>
        </li>
      </ul>
      <?php
        if(isset($_SESSION['VSPCOMP'])){
      ?>
        <ul class="navbar-wishlist nav navbar-nav pull-left ">
          <li class="nav-item">
            <a href="../wishlist" class="nav-link"><i class="ec ec-favorites"></i></a>
          </li>
        </ul>
      <?php } ?>
    </div><!-- /.row -->
  </div>

  <div class="container hidden-lg-up">
    <div class="handheld-header">

      <!-- ============================================================= Header Logo ============================================================= -->
      <div class="header-logo">
        <a href="../index" class="header-logo-link">
          <img src="../assets/images/logo.png">
        </a>
      </div>
      <!-- ============================================================= Header Logo : End============================================================= -->

      <div class="handheld-navigation-wrapper">   
        <div class="handheld-navbar-toggle-buttons clearfix"> 
          <button class="navbar-toggler navbar-toggle-hamburger hidden-lg-up pull-right flip" type="button"> 
            <i class="fa fa-bars" aria-hidden="true"></i> 
          </button> 
          <button class="navbar-toggler navbar-toggle-close hidden-lg-up pull-right flip" type="button"> 
            <i class="ec ec-close-remove"></i> 
          </button>
        </div>  
        <div class="handheld-navigation hidden-lg-up" id="default-hh-header"> 
          <span class="ehm-close">Cerrar</span>
          <form class="navbar-search" method="get" action="shop">
            <label class="sr-only screen-reader-text" for="search2">B&uacute;squeda de productos</label>
            <div class="input-group" style="z-index: 5000">
              <input type="text" id="search2" class="form-control search-field" dir="ltr" value="" name="s" placeholder="B&uacute;squeda de productos" />
              <div class="input-group-btn">
                <input type="hidden" id="search-param2" name="post_type" value="product"  />
                <button type="submit" class="btn btn-secondary" style="position: absolute; top: 0; right: 0;z-index: 1000"><i class="ec ec-search"></i></button>
              </div>
            </div>
          </form>
          <ul id="menu-all-departments-menu-1" class="nav nav-inline yamm">

            <?php
              $sql="select * from lineas order by linea";
              $result = $db->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>
                  <li class="highlight menu-item animate-dropdown ">
                    <a title="<?=$row['linea']?>" href="../shop?s=<?=$row['linea']?>"><?=$row['linea']?></a>
                  </li>
                <?php
                }
              }
            ?>
            
            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown">
              <a title="Computers &amp; Accessories" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Servicios profesionales</a>
              <ul role="menu" class=" dropdown-menu">
                <li class="menu-item animate-dropdown ">
                  <div class="yamm-content">
                    <div class="col-sm-6">
                      <ul>
                        <li><a title="Alarmas de intrusi&oacute;n" href="../slider/ALARMAS-DE-INTRUSION">Alarmas de intrusi&oacute;n</a></li>
                        <li><a title="Cercos electrificados" href="../slider/CERCOS-ELECTRIFICADOS">Cercos electrificados</a></li>
                        <li><a title="Control de acceso" href="../slider/CONTROL-DE-ACCESO">Control de acceso</a></li>
                        <li><a title="Data center y comunicaciones" href="../slider/DATA-CENTER">Data center y comunicaciones</a></li>
                        <li><a title="Espacios inteligentes" href="../slider/ESPACIOS-INTELIGENTES">Espacios inteligentes</a></li>
                        <li><a title="Inform&aacute;tica administrativa" href="../slider/INFORMATICA-ADMINISTRATIVA">Inform&aacute;tica administrativa</a></li>
                        <li><a title="Videovigilancia" href="../slider/VIDEOVIGILANCIA">Videovigilancia</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <?php if(isset($_SESSION['VSPCOMP'])){ ?>
              <li class="highlight menu-item animate-dropdown "><a title="Iniciar sesi&oacute;n" href="../info"><?=$_SESSION['VSPCOMP']['nombre']?> (Mi Cuenta)</a></li>
              <li class="highlight menu-item animate-dropdown "><a title="Cerrar sesi&oacute;n" href="../controller/logout">Cerrar sesi&oacute;n</a></li>
            <?php } else{ ?>
              <li class="highlight menu-item animate-dropdown "><a title="Iniciar sesi&oacute;n" href="../my-account">Mi Cuenta</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header><!-- #masthead -->

<nav class="navbar navbar-primary navbar-full yamm hidden-md-down zazvsp">
  <div class="container">
    <div class="clearfix">
      <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#header-v3">&#9776;</button>
    </div>

    <div class="collapse navbar-toggleable-xs" id="header-v3">
      <ul class="nav navbar-nav">
        <li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Servicios profesionales" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Servicios profesionales</a>
          <ul role="menu" class=" dropdown-menu">
            <li class="menu-item animate-dropdown"><a title="Alarmas de intrusi&oacute;n" href="../slider/ALARMAS-DE-INTRUSION">Alarmas de intrusi&oacute;n</a></li>
            <li class="menu-item animate-dropdown"><a title="Cercos electrificados" href="../slider/CERCOS-ELECTRIFICADOS">Cercos electrificados</a></li>
            <li class="menu-item animate-dropdown"><a title="Control de acceso" href="../slider/CONTROL-DE-ACCESO">Control de acceso</a></li>
            <li class="menu-item animate-dropdown"><a title="Data center y comunicaciones" href="../slider/DATA-CENTER">Data center y comunicaciones</a></li>
            <li class="menu-item animate-dropdown"><a title="Espacios inteligentes" href="../slider/ESPACIOS-INTELIGENTES">Espacios inteligentes</a></li>
            <li class="menu-item animate-dropdown"><a title="Infiorm&aacute;tica administrativa" href="../slider/INFORMATICA-ADMINISTRATIVA">Inform&aacute;tica administrativa</a></li>
            <li class="menu-item animate-dropdown"><a title="Videovigilancia" href="../slider/VIDEOVIGILANCIA">Videovigilancia</a></li>
          </ul>
        </li>

        <li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Servicios profesionales" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Tienda</a>
          <ul role="menu" class=" dropdown-menu">
            <li class="menu-item animate-dropdown"><a title="TODAS LAS CATEGOR&Iacute;AS" href="../shop">TODAS LAS CATEGOR&Iacute;AS</a></li>
            <?php
              $sql="select * from categorias order by categoria";
              $result = $db->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>
                  <li class="menu-item animate-dropdown"><a title="<?=$row['categoria']?>" href="../shop?s=<?=$row['categoria']?>"><?=$row['categoria']?></a></li>
                <?php
                }
              }
            ?>
          </ul>
        </li>

        <li class="menu-item animate-dropdown"><a title="Contacto" href="../contact">Contacto</a></li>
        <li class="menu-item animate-dropdown"><a title="Nosotros" href="../about-us">Nosotros</a></li>

      </ul>
    </div><!-- /.collpase -->
  </div><!-- /.-container -->
</nav><!-- /.navbar -->

<a href="https://wa.me/523334459561" rel="noreferrer" target="_blank"style="position: fixed; bottom: 6.7em; right: 1.8em; color: black; font-weight: bold; z-index: 100;" class="cnct"><img src="../assets/images/icons/wpp3.png" alt="Contacto" style="width: 60px; height: 60px" class="img-circle"></a>
