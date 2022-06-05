<?php
include('db/dss.php');
$db = conecta();
?>
<!DOCTYPE html>
<html>
<head>
	<?php require("assets/include/head.php"); ?>
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
								<h4 style="color: #2583C9;" class="text-blue h4">Bases de datos</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Bases de datos</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- FIN MINI NAVEGACIÓN -->
        

        <!-- page content -->
        
        	<div class="right_col" role="main">
        		<div class="row">
        			<div class="col-md-6">
								<div class="pd-20 card-box mb-30">
				          <div class="x_panel">
				            <div class="pd-20 col-md-12">
				              <h4 class="text-blue h4">Bases de datos</h4>
				              <p class="mb-0">Crea o edita una conexión a base de datos</p>
				          	</div>
				            <div class="col-md-12">
				              <br />
		                  <div class="item form-group row">
				                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Etiqueta</label>
				                  <div class="col-md-9 col-sm-9 ">
			                      <input type="text" id="tag1" name="tag1" class="form-control " value="">
			                    </div>
				               </div>
		                  <div class="item form-group row">
			                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tipo</label>
				                  <div class="col-md-9 col-sm-9 ">
			                      <select class="custom-select2 form-control" name="tipo1" id="tipo1" style="width: 100%; height: 38px;">
															<option value="">Selecciona</option>
				                    	<?php
					                      $sql="SELECT * FROM dbtipo";
					                      $result = $db->query($sql);
					                      if ($result->num_rows > 0) {
					                        while($row = $result->fetch_assoc()) {
					                          ?>
																			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
					                          <?php
					                        } 
					                      }
					                    ?>
														</select>
			                    </div>
				               </div>
		                  <div class="item form-group row">
			                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Servidor</label>
				                  <div class="col-md-9 col-sm-9 ">
			                      <input type="text" id="server1" name="server1"  class="form-control " placeholder="localhost:3306" value="">
			                    </div>
				               </div>
		                  <div class="item form-group row">
			                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre</label>
				                  <div class="col-md-9 col-sm-9 ">
			                      <input type="text" id="name1" name="name1"  class="form-control " placeholder="db_maresi" value="">
			                    </div>
				               </div>
		                  <div class="item form-group row">
			                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Usuario</label>
				                  <div class="col-md-9 col-sm-9 ">
			                      <input type="text" id="user1" name="user1"  class="form-control " placeholder="root" value="">
			                    </div>
				               </div>
		                  <div class="item form-group row">
			                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Contraseña</label>
				                  <div class="col-md-9 col-sm-9 ">
			                      <input type="text" id="pass1" name="pass1"  class="form-control " placeholder="root" value="">
			                    </div>
				               </div>
				                
				                <div class="ln_solid"></div>
				                <div class="item form-group row">
				                  <div class="col-md-9 col-sm-9 offset-md-3">
				                    <button type="button" id="save1" class="btn save btn-success">Guardar</button>
														<button type="button" class="btn pCon btn-secondary">Probar conexión</button>
				                  </div>
				                </div>
				             
				            </div>
				          </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="pd-20 card-box mb-30">
									<div class="pd-20 col-md-12">
										<h4 class="text-blue h4">Lista de bases de datos</h4>
				            <p class="mb-0">Revisa y edita las bases de datos existentes</p>
									</div>
									<div class="col-md-12">
										<table id="lista" class="table table-striped table-bordered table-sm" style="width:100%">
                        <thead>
                          <tr>
                            <th>Etiqueta</th>
                            <th>Tipo</th>
                            <th>Servidor</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th style="width: 15%;">Acci&oacute;n</th>  
                          </tr>
                        </thead>

                        <tbody id="Contenido">
                          <?php
                            $sql="select * from dbconn order by tag";
                            $result = $db->query($sql);
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                ?>
                                <tr id="<?=$row['id']?>">
                                  <td><?=$row['tag']?></td>
                                  <td><?=$row['tipo']?></td>
                                  <td><?=$row['server']?></td>
                                  <td><?=$row['name']?></td>
                                  <td><?=$row['user']?></td>
                                  
                                  <td><a href="javascript:void(0)" data-toggle="modal" data-target="#modal" type="button" onclick="dataModalDB('<?=$row['id']?>','<?=$row['tag']?>','<?=$row['tipo']?>','<?=$row['server']?>','<?=$row['name']?>','<?=$row['user']?>','<?=$row['pass']?>')"><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="delDB('<?=$row['id']?>')"><i class="icon-copy fa fa-trash-o" aria-hidden="true"></i></a> </td>
                                </tr>
                                <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>
									</div>
								</div>
							</div>

							
							
							<div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="Large" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="Large">Editar base de datos</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<div class="row">
						            <div class="col-md-12">
				                  <div class="item form-group row">
					                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Etiqueta</label>
					                  <div class="col-md-9 col-sm-9 ">
				                      <input type="text" id="tag" name="tag" class="form-control " value="">
				                    </div>
					               	</div>
			                  	<div class="item form-group row">
				                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tipo</label>
					                  <div class="col-md-9 col-sm-9 ">
				                      <select class="custom-select2 form-control" name="tipo" id="tipo" style="width: 100%; height: 38px;">
																<option value="">Selecciona</option>
				                    	<?php
					                      $sql="SELECT * FROM dbtipo";
					                      $result = $db->query($sql);
					                      if ($result->num_rows > 0) {
					                        while($row = $result->fetch_assoc()) {
					                          ?>
																			<option value="<?=$row['id']?>"><?=$row['nombre']?></option>
					                          <?php
					                        } 
					                      }
					                    ?>
															</select>
				                    </div>
					               	</div>
			                  	<div class="item form-group row">
				                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Servidor</label>
					                  <div class="col-md-9 col-sm-9 ">
				                      <input type="text" id="server" name="server"  class="form-control " placeholder="localhost:3306" value="">
				                    </div>
					               	</div>
			                  	<div class="item form-group row">
				                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre</label>
					                  <div class="col-md-9 col-sm-9 ">
				                      <input type="text" id="name" name="name"  class="form-control " placeholder="db_maresi" value="">
				                    </div>
					               	</div>
			                  	<div class="item form-group row">
				                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Usuario</label>
					                  <div class="col-md-9 col-sm-9 ">
				                      <input type="text" id="user" name="user"  class="form-control " placeholder="root" value="">
				                    </div>
					               	</div>
			                  	<div class="item form-group row">
				                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Contraseña</label>
					                  <div class="col-md-9 col-sm-9 ">
				                      <input type="text" id="pass" name="pass"  class="form-control " value="">
				                    </div>
					               	</div>
					          		</div>
						          </div>
										</div>
										<div class="modal-footer">
										<button type="button" class="btn pCon btn-secondary" >Probar conexión</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
											<button type="button" id="save" class="btn save btn-success">Actualizar datos</button>
										</div>
									</div>
								</div>
							</div>

        		</div>

       	 	</div>

        <!-- /page content -->
      </div>
      <?php include("assets/include/developby.php"); ?>
    </div>
  </div>

	<?php require("assets/include/jsfooter.php"); ?>
	<?php include("assets/include/dtjs.php"); ?>
	<script type="text/javascript">
			$(document).ready(function() {
				$('#lista').DataTable({
					"pageLength": 25,
					responsive: true
				});
				$("#modal").on('hide.bs.modal', function(){
					$('#tag').val('');
				  $('#tipo').val('');
				  $('#tipo').change();
				  $('#server').val('');
				  $('#name').val('');
				  $('#user').val('');
				  $('#pass').val('');
					idA = '';
					edit = '1';
				});
				$(".form-control").on('input', function() {
					if ($(this).hasClass('form-control-danger')) {
				    	$(this).removeClass('form-control-danger');
					}
				});
				$(".form-control").on('change', function() {
					if ($(this).hasClass('form-control-danger')) {
				    	$(this).removeClass('form-control-danger');
					}
				});
				enterClick('pass','save');
				enterClick('pass1','save1');
          $('.save').on('click', function() {
            $(".save").attr("disabled", "disabled");

            if (idA != "") {
            	edit = "";
            }else{
            	edit = "1";
            }

            var tag = $('#tag'+edit).val();
            var tipo = $('#tipo'+edit).val();
            var server = $('#server'+edit).val();
            var name = $('#name'+edit).val();
            var user = $('#user'+edit).val();
            var pass = $('#pass'+edit).val();
               
            data = new FormData();
            data.append('tag', tag);
            data.append('tipo', tipo);
            data.append('server', server);
            data.append('name', name);
            data.append('user', user);
            data.append('pass', pass);
            data.append('update', idA);
            


            if((tag != "") && (tipo != "") && (server != "") && (name != "") && (user != "")){
              $.ajax({
                url: "controller/dbs",
                type: "POST",
                data:data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                cache: false,
                success: function(dataResult){
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
                      $(".save").removeAttr("disabled");

     									$('#tag1').val('');
										  $('#tipo1').val('');
										  $('#tipo1').change();
										  $('#server1').val('');
										  $('#name1').val('');
										  $('#user1').val('');
										  $('#pass1').val('');

     									alerta2("La base de datos se ha subido correctamente");

     									$('#lista').DataTable().clear();
              				$('#lista').DataTable().destroy();
     									$('#Contenido').html(dataResult.data1);
											$('#lista').DataTable({
												"pageLength": 25,
												responsive: true
											});
                    
                  }else if (dataResult.statusCode==202) {
                    $(".save").removeAttr("disabled");
                    	$('#modal').modal('toggle');
                      alerta2("La base de datos se ha actualizado correctamente");
     									$('#lista').DataTable().clear();
              				$('#lista').DataTable().destroy();
     									$('#Contenido').html(dataResult.data1);
											$('#lista').DataTable({
												"pageLength": 25,
												responsive: true
											});
                        
                  }else if (dataResult.statusCode==203) {
                    $(".save").removeAttr("disabled");
                      alertae('Ha ocurrido un error intentalo de nuevo más tarde');
                  }
                }
              });
            }else{
            	if (tag == "") {
            		$('#tag'+edit).addClass("form-control-danger");
            	}
            	if (tipo == "") {
            		$('#tipo'+edit).addClass("form-control-danger");
            	}
            	if (server == "") {
            		$('#server'+edit).addClass("form-control-danger");
            	}
            	if (name == "") {
            		$('#name'+edit).addClass("form-control-danger");
            	}
            	if (user == "") {
            		$('#user'+edit).addClass("form-control-danger");
            	}
							alertae('Rellena los campos en rojo antes de continuar');
              $(".save").removeAttr("disabled");
            }
          });


          $('.pCon').on('click', function() {
            $(".pCon").attr("disabled", "disabled");

            if (idA != "") {
            	edit = "";
            }else{
            	edit = "1";
            }

            var tag = $('#tag'+edit).val();
            var tipo = $('#tipo'+edit).val();
            var server = $('#server'+edit).val();
            var name = $('#name'+edit).val();
            var user = $('#user'+edit).val();
            var pass = $('#pass'+edit).val();
               
            data = new FormData();
            data.append('tag', tag);
            data.append('tipo', tipo);
            data.append('server', server);
            data.append('name', name);
            data.append('user', user);
            data.append('pass', pass);
            data.append('update', idA);
            


            if((tag != "") && (tipo != "") && (server != "") && (name != "") && (user != "")){
              $.ajax({
                url: "controller/dbsTry",
                type: "POST",
                data:data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                cache: false,
                success: function(dataResult){
                  var dataResult = JSON.parse(dataResult);
                  if(dataResult.statusCode==200){
	                  $(".pCon").removeAttr("disabled");
				     				alerta2("Conexión exitosa");
			                    
									}else if (dataResult.statusCode==201) {
			              $(".pCon").removeAttr("disabled");
			              alertae('No se pudo establecer la conexión, revisa tus datos ingresados');
			           	}else if (dataResult.statusCode==202) {
			              $(".pCon").removeAttr("disabled");
			              alertae('Ocurrio un error, contacta a un administrador');
			           	}
			          }
			        });
            }else{
            	if (tag == "") {
            		$('#tag'+edit).addClass("form-control-danger");
            	}
            	if (tipo == "") {
            		$('#tipo'+edit).addClass("form-control-danger");
            	}
            	if (server == "") {
            		$('#server'+edit).addClass("form-control-danger");
            	}
            	if (name == "") {
            		$('#name'+edit).addClass("form-control-danger");
            	}
            	if (user == "") {
            		$('#user'+edit).addClass("form-control-danger");
            	}
							alertae('Rellena los campos en rojo antes de continuar');
              $(".pCon").removeAttr("disabled");
            }
          });

        });

	</script>
</body>
</html>