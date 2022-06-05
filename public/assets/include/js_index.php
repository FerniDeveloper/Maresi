<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<!-- jQuery Migrate JS -->
<script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr-3.8.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins/plugins.js"></script>
<!-- Jquery ui JS -->
<script src="assets/js/plugins/jquery.ui.js"></script>
<!-- Mailchimp JS -->
<script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
<!-- Jquery Magnific Popup JS -->
<script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
<!-- Slick JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Modal JS -->
<script src="assets/js/plugins/modal.min.js"></script>
<!-- Sticky Sidebar JS -->
<script src="assets/js/plugins/sticky-sidebar.min.js"></script>
<!-- Countdown JS -->
<script src="assets/js/plugins/countdown.min.js"></script>
<!-- jQuery Nice Select JS -->
<script src="assets/js/plugins/jquery.nice-select.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/funciones.js"></script>
<script type="text/javascript" src="assets/js/popover.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/echo.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="assets/js/electro.js"></script>

<script type="text/javascript" src="assets/js/zazvsp.js"></script>

<script type="text/javascript" src="assets/js/jquery-ui.js"></script>


<script type="text/javascript" src="assets/js/slick/slick.min.js"></script>
<script type="text/javascript" src="assets/js/lazysizes.js"></script>

<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/slick.js"></script>



<script type="text/javascript" src="assets/js/geo/geonamesData.js"></script>
<script type="text/javascript" src="assets/js/geo/jsr_class.js"></script>
<script type="text/javascript" src="assets/js/geo/city_ajax.js"></script>


<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>



 <script type="text/javascript">
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: true,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 4
              }
            }, {
              breakpoint: 520,
              settings: {
                slidesToShow: 3
              }
            }]
        });
    });
</script>

<?php
    $sql="select tags from prds where activo = '1'";
    $result = $db->query($sql);
    $eti = "";
    $tags_arr = array();
    $cc = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $porciones = explode(",", $row['tags']);
            foreach ($porciones as $valor) {
                $tags_arr[$cc] = $valor;
                $cc++;
            }
        }
        $unicos = array_unique($tags_arr);
        foreach ($unicos as $valor) {
            $eti .= "'".$valor."',";
        }
    }
?>

<script async type="text/javascript">
    $(document).ready(function(){
        var availableTags = [<?php echo $eti; ?>];
        $( "#search" ).autocomplete({
            source: availableTags
        });
        $( "#search2" ).autocomplete({
            source: availableTags
        });

        $(document).keypress(
          function(event){
            if (event.which == '13' && event.target.name != undefined  ) {
              event.preventDefault();
            }
        });

        var input = document.getElementById("email");
        input.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("btnb").click();
          }
        });

        var busq = document.getElementById("search");
        busq.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("btnbusq").click();
          }
        });
    });
    
</script>

<?php
    $sql="select tags from prds where activo = '1'";
    $result = $db->query($sql);
    $eti = "";
    $tags_arr = array();
    $cc = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $porciones = explode(",", $row['tags']);
            foreach ($porciones as $valor) {
                $tags_arr[$cc] = $valor;
                $cc++;
            }
        }
        $unicos = array_unique($tags_arr);
        foreach ($unicos as $valor) {
            $eti .= "'".$valor."',";
        }
    }
?>

<script type="text/javascript">
    $( function() {
        var availableTags = [<?php echo $eti; ?>];
        $( "#search" ).autocomplete({
            source: availableTags
        });
        $( "#search2" ).autocomplete({
            source: availableTags
        });

    });

    $(document).keypress(
      function(event){
        if (event.which == '13' && event.target.name != undefined  ) {
          event.preventDefault();
        }
    });

    var input = document.getElementById("email");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btnb").click();
      }
    });

    var busq = document.getElementById("search");
    busq.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btnbusq").click();
      }
    });
</script>
<script type="text/javascript">
    $("#newsBtn").click(function(){
        $("#newslettersection").css("border", "5px solid #f1d411");
        setTimeout(
          function() 
          {
              $("#newslettersection").css("border", "0px solid #f1d411");
        }, 2000);
    });
</script>
