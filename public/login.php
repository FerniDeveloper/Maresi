<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('db/dss.php');
$db = conecta();
?>
<!DOCTYPE html>
<html>
<head>
	
	<?php require("assets/include/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="assets/css/bg.css">
</head>
<body class="login-page">

	<div class="area" >
    <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>

  <div class="context">
 		<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-lg-12">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title" style="text-align: center;">
								<img style="max-width: 350px;" src="assets/images/logo/logo_with_text_trazo.png">
								<br><br>
								<h2 class="text-center text-primary">¡Bienvenido!</h2>
							</div>
							<form action="login" method="POST">
								<div class="input-group custom">
									<input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Nombre de usuario">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="password" name="pss" class="form-control form-control-lg" id="pss" placeholder="**********">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<button class="btn btn-primary btn-lg btn-block" id="ingresar" type="button">Ingresar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- js -->
	<?php require("assets/include/jsfooter.php"); ?>
	<script src="vendors/scripts/core.js"></script>
	<script src="assets/js/funciones.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		enterClick('username','ingresar');
		enterClick('pss','ingresar');
        $(document).ready(function() {

          $('#ingresar').on('click', function() {
            $("#ingresar").attr("disabled", "disabled");
            var username = $('input[name="username"]').val();
            var pss = $('input[name="pss"]').val();
               
            data = new FormData();
            data.append('username', username);
            data.append('pss', pss);


            if((username!="") && (pss!="")){
              $.ajax({
                url: "controller/login",
                type: "POST",
                data:data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                cache: false,
                success: function(dataResult){
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                      $("#ingresar").removeAttr("disabled");
                        window.location.href="index";
                        
                      
                    
                  }else if (dataResult.statusCode==201) {
                    $("#ingresar").removeAttr("disabled");
                    
                        alertae('Hubo un error, reintentalo de nuevo más tarde');
                  }else if (dataResult.statusCode==202) {
                    $("#ingresar").removeAttr("disabled");
                    
                        alertae('La contraseña que ingresaste no es la correcta');
                        
                  }else if (dataResult.statusCode==203) {
                    $("#ingresar").removeAttr("disabled");
                        alertae('No existe el usuario que ingresaste');
                  }
                }
              });
            }else{
              alertae('Todos los campos son obligatorios');
              $("#ingresar").removeAttr("disabled");
            }
          });
        });
      </script>
</body>
</html>