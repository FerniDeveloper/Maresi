<script type="text/javascript" src="assets/js/popover.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/echo.min.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="assets/js/electro.js"></script>
<script type="text/javascript" src="assets/js/slick.js"></script>

<script type="text/javascript" src="assets/js/zazvsp.js"></script>

<script type="text/javascript" src="assets/js/jquery-ui.js"></script>

<script type="text/javascript" src="assets/js/geo/geonamesData.js"></script>
<script type="text/javascript" src="assets/js/geo/jsr_class.js"></script>
<script type="text/javascript" src="assets/js/geo/city_ajax.js"></script>

<script type="text/javascript" src="assets/js/slick/slick.min.js"></script>

<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script type="text/javascript">
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Please fix this field.",
        email: "Ingresa una dirección de correo electrónico válida.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Las contraseñas no coinciden.",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Ingresa minimo {0} caracteres."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });
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

