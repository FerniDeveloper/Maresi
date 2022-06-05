<?php
include('db/dss.php');
$db = conecta();
?>
<!DOCTYPE html>
<html>
<head>
	<?php require("assets/include/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
</head>
<body>
	
	<?php require("assets/include/funcionesjs.php"); ?>

	<?php require("assets/include/seseditor.php"); ?>

	<?php require("assets/include/preloader.php"); ?>
	
	<?php require("assets/include/header.php"); ?>

	<?php require("assets/include/sidebar.php"); ?>
	
	<div class="mobile-menu-overlay"></div>

<script type="text/javascript">
	var idA = '';
	var edit = '1';
</script>

<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- MINI NAVEGACIÓN -->
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4 style="color: #2583C9;" class="text-blue h4">Reportes</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Reportes</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- FIN MINI NAVEGACIÓN -->
        

        <!-- page content -->
        
       <div class="pd-20 card-box mb-30">
			<div class="clearfix">
				<h4 class="text-blue h4">Nuevo reporte</h4>
				<p class="mb-30">Crea un nuevo reporte</p>
			</div>
			<div class="wizard-content">
				<form class="tab-wizard wizard-circle wizard">
					<h5>Base de datos</h5>
					<section>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label >Base de datos :</label>
									<select class="custom-select2 form-control" onchange="loadTables($('#datab option:selected').data('tipo'),$('#datab option:selected').data('server'),$('#datab option:selected').data('name'),$('#datab option:selected').data('user'),$('#datab option:selected').data('pass'))" name="datab" id="datab" style="width: 100%; height: 38px;">
										<option value="">Selecciona</option>
				                    	<?php
					                      $sql="SELECT * FROM dbconn";
					                      $result = $db->query($sql);
					                      if ($result->num_rows > 0) {
					                        while($row = $result->fetch_assoc()) {
					                        ?>
											<option data-tipo="<?=$row['tipo']?>" data-server="<?=$row['server']?>" data-name="<?=$row['name']?>" data-user="<?=$row['user']?>" data-pass="<?=$row['pass']?>" value="<?=$row['id']?>"><?=$row['tag']?></option>
					                        <?php
					                        } 
					                      }
					                    ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label >Tabla :</label>
									<select class="custom-select2 form-control" onchange="loadColumns($('#datab option:selected').data('tipo'),$('#datab option:selected').data('server'),$('#datab option:selected').data('name'),$('#datab option:selected').data('user'),$('#datab option:selected').data('pass'),$('#tabla').val())" name="tabla" id="tabla" style="width: 100%; height: 38px;">
										<option value="">Selecciona</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label >Columnas :</label>
									<select class="custom-select2 form-control" multiple onchange="preview($('#datab option:selected').data('tipo'),$('#datab option:selected').data('server'),$('#datab option:selected').data('name'),$('#datab option:selected').data('user'),$('#datab option:selected').data('pass'),$('#tabla').val(),$('#columnas').val())" name="columnas" id="columnas" style="width: 100%; height: 38px;">
										<option value="">Selecciona</option>
									</select>
								</div>
							</div>
						</div>
						
					</section>
					<!-- Step 2 -->
					<h5>Datos generales</h5>
					<section>
						<div class="row">
							
							<div class="col-md-8">
								<div class="form-group">
									<label>Título :</label>
									<input type="text" id="titulo" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Categoría :</label>
									<select class="custom-select2 form-control" name="categoria" id="categoria" style="width: 100%; height: 38px;">
										<option value="">Selecciona</option>
				                    	<?php
					                      $sql="SELECT * FROM categorias WHERE elim = 0";
					                      $result = $db->query($sql);
					                      if ($result->num_rows > 0) {
					                        while($row = $result->fetch_assoc()) {
					                          ?>
												<option value="<?=$row['id']?>"><?=$row['categoria']?></option>
					                          <?php
					                        } 
					                      }
					                    ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Descripción :</label>
									<textarea class="form-control" id="descripcion"></textarea>
								</div>
							</div>
						</div>
					</section>
					
					<!-- Step 4 -->
					<h5>Vista Previa</h5>
					<section>
						<div class="row">
							<div class="col-md-12">
								<table id="lista" class=" ">
				                  	<thead>
				                    	<tr id="headTable">

				                    	</tr>
				                  	</thead>

				                  	<tbody id="Contenido">

									</tbody>
				                </table>
							</div>
						</div>
					</section>
				</form>
			</div>
		</div>


        <!-- /page content -->
      </div>
      <?php include("assets/include/developby.php"); ?>
    </div>
  </div>
	<?php require("assets/include/jsfooter.php"); ?>
	<?php include("assets/include/dtjs.php"); ?>
  	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
	<script type="text/javascript">
		$('a[href="#finish"]').on('click', function() {
            $('a[href="#finish"]').attr("disabled", "disabled");


            var datab = $('#datab').val();
            var tabla = $('#tabla').val();
            var categoria = $('#categoria').val();
            var columnas = $('#columnas').val();
            var titulo = $('#titulo').val();
            var descripcion = $('#descripcion').val();
            var consulta = "";
               
            data = new FormData();
            data.append('datab', datab);
            data.append('tabla', tabla);
            data.append('categoria', categoria);
            data.append('consulta', consulta);
            data.append('columnas', columnas);
            data.append('titulo', titulo);
            data.append('descripcion', descripcion);            


            if((datab != "") && (tabla != "") && (columnas != "") && (titulo != "") && (descripcion != "")){
              $.ajax({
                url: "controller/report",
                type: "POST",
                data:data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                cache: false,
                success: function(dataResult){
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                      $('a[href="#finish"]').removeAttr("disabled");

     					$('#datab').val('');
            			$('#tabla').val('');
            			$('#columnas').val('');
            			$('#titulo').val('');
            			$('#descripcion').val('');

     					alerta2("Se creo el reporte de manera exitosa");
                    
                  }else if (dataResult.statusCode==202) {
                    $('a[href="#finish"]').removeAttr("disabled");
                      alerta2("No funciono de manera correcta");
     					
                        
                  }else if (dataResult.statusCode==203) {
                    $('a[href="#finish"]').removeAttr("disabled");
                      alertae('Ha ocurrido un error intentalo de nuevo más tarde');
                  }
                }
              });
            }else{
				alertae('Rellena todos los campos antes de continuar');
              $('a[href="#finish"]').removeAttr("disabled");
            }
          });
	</script>
</body>
</html>