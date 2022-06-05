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
								<h4 style="color: #2583C9;" class="text-blue h4">Categorías</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Categorías</li>
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
										<h4 class="text-blue h4">Categorías</h4>
										<p class="mb-0">Da de alta una nueva categoría</p>
									</div>
									<div class="col-md-12">
										<br />
										<input type="hidden" name="accion" value="<?= $accion ?>">
										<input type="hidden" name="id" value="<?= $id ?>">
										<div class="item form-group row">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre de la categoría
											</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" id="categoria1" name="categoria1" class="form-control " value="">
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ícono</label>
											<div class="col-md-8 col-sm-8 ">
												<input onchange="$('#iconMin1').attr('class', 'dw '+$(this).val());" onclick="edit='1'" data-toggle="modal" readonly data-target="#modalPro" type="text" id="icon1" name="icon1" class="form-control " value="">
											</div>
											<div style="margin-top: 0.7vh; padding-left: .7% !important;" class="col-md-1 col-sm-1 ">
												<i style="font-size: 2em; " id="iconMin1"></i>
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group row">
											<div class="col-md-9 col-sm-9 offset-md-3">
												<button type="button" id="save1" class="btn save btn-success">Guardar</button>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="pd-20 card-box mb-30">
								<div class="pd-20 col-md-12">
									<h4 class="text-blue h4">Lista de categorías</h4>
									<p class="mb-0">Revisa y edita las categorias existentes</p>
								</div>
								<div class="col-md-12">
									<table id="lista" class="table table-striped table-bordered table-sm" style="width:100%">
										<thead>
											<tr>
												<th>Categor&iacute;a</th>
												<th>Ícono</th>
												<th style="width: 15%;">Acci&oacute;n</th>
											</tr>
										</thead>

										<tbody id="Contenido">
											<?php
											$sql = "select * from categorias WHERE elim = '0' order by categoria";
											$result = $db->query($sql);
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
											?>
													<tr id="<?= $row['id'] ?>">
														<td><?= $row['categoria'] ?></td>
														<td><i style="font-size: 2em; " class="dw <?= $row['icon'] ?>"></i></td>
														<!--<td><a href="categorias?id=<?= $row['id'] ?>"><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="delCat('<?= $row['id'] ?>')"><i class="icon-copy fa fa-trash-o" aria-hidden="true"></i></a> </td>-->
														<td><a href="javascript:void(0)" data-toggle="modal" data-target="#modal" type="button" onclick="dataModal('<?= $row['id'] ?>','<?= $row['icon'] ?>','<?= $row['categoria'] ?>')"><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="delCat('<?= $row['id'] ?>')"><i class="icon-copy fa fa-trash-o" aria-hidden="true"></i></a> </td>
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
										<h4 class="modal-title" id="Large">Editar categoría</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<div class="item form-group row">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre de la categoría
													</label>
													<div class="col-md-9 col-sm-9 ">
														<input type="text" name="categoria" id="categoria" class="form-control " value="<?= $categoria ?>">
													</div>
												</div>
												<div class="item form-group row">
													<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ícono</label>
													<div class="col-md-8 col-sm-8 ">
														<input onchange="$('#iconMin').attr('class', 'dw '+$(this).val());" onclick="edit=''" data-toggle="modal" readonly data-target="#modalPro" type="text" id="icon" name="icon" class="form-control " value="">
													</div>
													<div style="margin-top: 0.7vh; padding-left: .7% !important;" class="col-md-1 col-sm-1 ">
														<i style="font-size: 2em; " id="iconMin"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
										<button type="button" id="save" class="btn save btn-success">Actualizar datos</button>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade bs-example-modal-xl" id="modalPro" tabindex="-1" role="dialog" aria-labelledby="Large" aria-hidden="true">
							<div class="modal-dialog modal-xl modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="Large">Elige un icono</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<div class="search-icon-box card-box mb-30">
													<input type="text" class="border-radius-10" id="filter_input" placeholder="Buscar iconos..." title="Escribe un nombre">
													<i class="search_icon dw dw-search"></i>
												</div>
												<div id="filter_list">
													<div class="icon-list card-box pd-20 mb-30">
														<div class="row fontawesome-icon-list custom-icon-list">
															<div onclick="$('#icon'+edit).val('dw-analytics1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics1');">
																	<i class="icon-copy dw dw-analytics1"></i> dw-analytics1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-11');">
																	<i class="icon-copy dw dw-analytics-11"></i> dw-analytics-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-21');">
																	<i class="icon-copy dw dw-analytics-21"></i> dw-analytics-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-3');">
																	<i class="icon-copy dw dw-analytics-3"></i> dw-analytics-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-4');">
																	<i class="icon-copy dw dw-analytics-4"></i> dw-analytics-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-5');">
																	<i class="icon-copy dw dw-analytics-5"></i> dw-analytics-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-6');">
																	<i class="icon-copy dw dw-analytics-6"></i> dw-analytics-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-7');">
																	<i class="icon-copy dw dw-analytics-7"></i> dw-analytics-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-8');">
																	<i class="icon-copy dw dw-analytics-8"></i> dw-analytics-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-9').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-9');">
																	<i class="icon-copy dw dw-analytics-9"></i> dw-analytics-9
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-10').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-10');">
																	<i class="icon-copy dw dw-analytics-10"></i> dw-analytics-10
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-111').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-111');">
																	<i class="icon-copy dw dw-analytics-111"></i> dw-analytics-111
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-12');">
																	<i class="icon-copy dw dw-analytics-12"></i> dw-analytics-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-13').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-13');">
																	<i class="icon-copy dw dw-analytics-13"></i> dw-analytics-13
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-14').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-14');">
																	<i class="icon-copy dw dw-analytics-14"></i> dw-analytics-14
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-15').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-15');">
																	<i class="icon-copy dw dw-analytics-15"></i> dw-analytics-15
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-16').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-16');">
																	<i class="icon-copy dw dw-analytics-16"></i> dw-analytics-16
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-17').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-17');">
																	<i class="icon-copy dw dw-analytics-17"></i> dw-analytics-17
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-18').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-18');">
																	<i class="icon-copy dw dw-analytics-18"></i> dw-analytics-18
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-19').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-19');">
																	<i class="icon-copy dw dw-analytics-19"></i> dw-analytics-19
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-20').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-20');">
																	<i class="icon-copy dw dw-analytics-20"></i> dw-analytics-20
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-211').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-211');">
																	<i class="icon-copy dw dw-analytics-211"></i> dw-analytics-211
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-22').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-22');">
																	<i class="icon-copy dw dw-analytics-22"></i> dw-analytics-22
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-logout1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-logout1');">
																	<i class="icon-copy dw dw-logout1"></i> dw-logout1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-name').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-name');">
																	<i class="icon-copy dw dw-name"></i> dw-name
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-logout-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-logout-1');">
																	<i class="icon-copy dw dw-logout-1"></i> dw-logout-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user3');">
																	<i class="icon-copy dw dw-user3"></i> dw-user3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-enter').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-enter');">
																	<i class="icon-copy dw dw-enter"></i> dw-enter
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user-13').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user-13');">
																	<i class="icon-copy dw dw-user-13"></i> dw-user-13
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-unlock1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-unlock1');">
																	<i class="icon-copy dw dw-unlock1"></i> dw-unlock1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-logout-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-logout-2');">
																	<i class="icon-copy dw dw-logout-2"></i> dw-logout-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-password').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-password');">
																	<i class="icon-copy dw dw-password"></i> dw-password
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-lock').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-lock');">
																	<i class="icon-copy dw dw-lock"></i> dw-lock
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-id-card2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-id-card2');">
																	<i class="icon-copy dw dw-id-card2"></i> dw-id-card2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-enter-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-enter-1');">
																	<i class="icon-copy dw dw-enter-1"></i> dw-enter-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-keyhole').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-keyhole');">
																	<i class="icon-copy dw dw-keyhole"></i> dw-keyhole
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user-2');">
																	<i class="icon-copy dw dw-user-2"></i> dw-user-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-browser2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-browser2');">
																	<i class="icon-copy dw dw-browser2"></i> dw-browser2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-key3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-key3');">
																	<i class="icon-copy dw dw-key3"></i> dw-key3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-login').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-login');">
																	<i class="icon-copy dw dw-login"></i> dw-login
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-door').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-door');">
																	<i class="icon-copy dw dw-door"></i> dw-door
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user-3');">
																	<i class="icon-copy dw dw-user-3"></i> dw-user-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-keyhole-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-keyhole-1');">
																	<i class="icon-copy dw dw-keyhole-1"></i> dw-keyhole-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-alarm-clock').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-alarm-clock');">
																	<i class="icon-copy dw dw-alarm-clock"></i> dw-alarm-clock
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-antenna').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-antenna');">
																	<i class="icon-copy dw dw-antenna"></i> dw-antenna
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-apartment').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-apartment');">
																	<i class="icon-copy dw dw-apartment"></i> dw-apartment
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-bag').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-bag');">
																	<i class="icon-copy dw dw-shopping-bag"></i> dw-shopping-bag
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-basket').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-basket');">
																	<i class="icon-copy dw dw-shopping-basket"></i> dw-shopping-basket
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-basket-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-basket-1');">
																	<i class="icon-copy dw dw-shopping-basket-1"></i> dw-shopping-basket-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-battery').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-battery');">
																	<i class="icon-copy dw dw-battery"></i> dw-battery
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-battery-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-battery-1');">
																	<i class="icon-copy dw dw-battery-1"></i> dw-battery-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bell').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bell');">
																	<i class="icon-copy dw dw-bell"></i> dw-bell
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-binocular').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-binocular');">
																	<i class="icon-copy dw dw-binocular"></i> dw-binocular
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sailboat').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sailboat');">
																	<i class="icon-copy dw dw-sailboat"></i> dw-sailboat
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-book').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-book');">
																	<i class="icon-copy dw dw-book"></i> dw-book
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bookmark').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bookmark');">
																	<i class="icon-copy dw dw-bookmark"></i> dw-bookmark
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-briefcase').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-briefcase');">
																	<i class="icon-copy dw dw-briefcase"></i> dw-briefcase
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-brightness').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-brightness');">
																	<i class="icon-copy dw dw-brightness"></i> dw-brightness
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-browser').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-browser');">
																	<i class="icon-copy dw dw-browser"></i> dw-browser
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paint-brush').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paint-brush');">
																	<i class="icon-copy dw dw-paint-brush"></i> dw-paint-brush
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-building').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-building');">
																	<i class="icon-copy dw dw-building"></i> dw-building
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-idea').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-idea');">
																	<i class="icon-copy dw dw-idea"></i> dw-idea
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-school-bus').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-school-bus');">
																	<i class="icon-copy dw dw-school-bus"></i> dw-school-bus
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-birthday-cake').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-birthday-cake');">
																	<i class="icon-copy dw dw-birthday-cake"></i> dw-birthday-cake
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-birthday-cake-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-birthday-cake-1');">
																	<i class="icon-copy dw dw-birthday-cake-1"></i> dw-birthday-cake-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calculator').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calculator');">
																	<i class="icon-copy dw dw-calculator"></i> dw-calculator
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar');">
																	<i class="icon-copy dw dw-calendar"></i> dw-calendar
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-1');">
																	<i class="icon-copy dw dw-calendar-1"></i> dw-calendar-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-2');">
																	<i class="icon-copy dw dw-calendar-2"></i> dw-calendar-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-cart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-cart');">
																	<i class="icon-copy dw dw-shopping-cart"></i> dw-shopping-cart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-money').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-money');">
																	<i class="icon-copy dw dw-money"></i> dw-money
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-money-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-money-1');">
																	<i class="icon-copy dw dw-money-1"></i> dw-money-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-money-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-money-2');">
																	<i class="icon-copy dw dw-money-2"></i> dw-money-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cctv').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cctv');">
																	<i class="icon-copy dw dw-cctv"></i> dw-cctv
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-certificate').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-certificate');">
																	<i class="icon-copy dw dw-certificate"></i> dw-certificate
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-certificate-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-certificate-1');">
																	<i class="icon-copy dw dw-certificate-1"></i> dw-certificate-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chair').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chair');">
																	<i class="icon-copy dw dw-chair"></i> dw-chair
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat');">
																	<i class="icon-copy dw dw-chat"></i> dw-chat
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-1');">
																	<i class="icon-copy dw dw-chat-1"></i> dw-chat-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chef').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chef');">
																	<i class="icon-copy dw dw-chef"></i> dw-chef
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor');">
																	<i class="icon-copy dw dw-cursor"></i> dw-cursor
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wall-clock').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wall-clock');">
																	<i class="icon-copy dw dw-wall-clock"></i> dw-wall-clock
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coding').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coding');">
																	<i class="icon-copy dw dw-coding"></i> dw-coding
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coffee').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coffee');">
																	<i class="icon-copy dw dw-coffee"></i> dw-coffee
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coffee-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coffee-1');">
																	<i class="icon-copy dw dw-coffee-1"></i> dw-coffee-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-compass').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-compass');">
																	<i class="icon-copy dw dw-compass"></i> dw-compass
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-computer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-computer');">
																	<i class="icon-copy dw dw-computer"></i> dw-computer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-computer-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-computer-1');">
																	<i class="icon-copy dw dw-computer-1"></i> dw-computer-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-agenda').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-agenda');">
																	<i class="icon-copy dw dw-agenda"></i> dw-agenda
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-crop').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-crop');">
																	<i class="icon-copy dw dw-crop"></i> dw-crop
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-crown').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-crown');">
																	<i class="icon-copy dw dw-crown"></i> dw-crown
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pendrive').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pendrive');">
																	<i class="icon-copy dw dw-pendrive"></i> dw-pendrive
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-3');">
																	<i class="icon-copy dw dw-calendar-3"></i> dw-calendar-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-4');">
																	<i class="icon-copy dw dw-calendar-4"></i> dw-calendar-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ruler').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ruler');">
																	<i class="icon-copy dw dw-ruler"></i> dw-ruler
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagram').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagram');">
																	<i class="icon-copy dw dw-diagram"></i> dw-diagram
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diamond').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diamond');">
																	<i class="icon-copy dw dw-diamond"></i> dw-diamond
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-book-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-book-1');">
																	<i class="icon-copy dw dw-book-1"></i> dw-book-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-2');">
																	<i class="icon-copy dw dw-chat-2"></i> dw-chat-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-3');">
																	<i class="icon-copy dw dw-chat-3"></i> dw-chat-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-route').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-route');">
																	<i class="icon-copy dw dw-route"></i> dw-route
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file');">
																	<i class="icon-copy dw dw-file"></i> dw-file
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inbox').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inbox');">
																	<i class="icon-copy dw dw-inbox"></i> dw-inbox
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-download').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-download');">
																	<i class="icon-copy dw dw-download"></i> dw-download
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cocktail').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cocktail');">
																	<i class="icon-copy dw dw-cocktail"></i> dw-cocktail
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dumbbell').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dumbbell');">
																	<i class="icon-copy dw dw-dumbbell"></i> dw-dumbbell
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dvd').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dvd');">
																	<i class="icon-copy dw dw-dvd"></i> dw-dvd
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit');">
																	<i class="icon-copy dw dw-edit"></i> dw-edit
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit-1');">
																	<i class="icon-copy dw dw-edit-1"></i> dw-edit-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit-2');">
																	<i class="icon-copy dw dw-edit-2"></i> dw-edit-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mortarboard').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mortarboard');">
																	<i class="icon-copy dw dw-mortarboard"></i> dw-mortarboard
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-5');">
																	<i class="icon-copy dw dw-calendar-5"></i> dw-calendar-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-6');">
																	<i class="icon-copy dw dw-calendar-6"></i> dw-calendar-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-factory').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-factory');">
																	<i class="icon-copy dw dw-factory"></i> dw-factory
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-1');">
																	<i class="icon-copy dw dw-file-1"></i> dw-file-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-2');">
																	<i class="icon-copy dw dw-file-2"></i> dw-file-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-filter').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-filter');">
																	<i class="icon-copy dw dw-filter"></i> dw-filter
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-filter-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-filter-1');">
																	<i class="icon-copy dw dw-filter-1"></i> dw-filter-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fire-extinguisher').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fire-extinguisher');">
																	<i class="icon-copy dw dw-fire-extinguisher"></i> dw-fire-extinguisher
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flag').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flag');">
																	<i class="icon-copy dw dw-flag"></i> dw-flag
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flame').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flame');">
																	<i class="icon-copy dw dw-flame"></i> dw-flame
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flash').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flash');">
																	<i class="icon-copy dw dw-flash"></i> dw-flash
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flight').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flight');">
																	<i class="icon-copy dw dw-flight"></i> dw-flight
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flight-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flight-1');">
																	<i class="icon-copy dw dw-flight-1"></i> dw-flight-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bottle').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bottle');">
																	<i class="icon-copy dw dw-bottle"></i> dw-bottle
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-floppy-disk').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-floppy-disk');">
																	<i class="icon-copy dw dw-floppy-disk"></i> dw-floppy-disk
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flow');">
																	<i class="icon-copy dw dw-flow"></i> dw-flow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-focus').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-focus');">
																	<i class="icon-copy dw dw-focus"></i> dw-focus
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder');">
																	<i class="icon-copy dw dw-folder"></i> dw-folder
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dinner').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dinner');">
																	<i class="icon-copy dw dw-dinner"></i> dw-dinner
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fuel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fuel');">
																	<i class="icon-copy dw dw-fuel"></i> dw-fuel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-gamepad').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-gamepad');">
																	<i class="icon-copy dw dw-gamepad"></i> dw-gamepad
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-gift').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-gift');">
																	<i class="icon-copy dw dw-gift"></i> dw-gift
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-trolley').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-trolley');">
																	<i class="icon-copy dw dw-trolley"></i> dw-trolley
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-package').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-package');">
																	<i class="icon-copy dw dw-package"></i> dw-package
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hammer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hammer');">
																	<i class="icon-copy dw dw-hammer"></i> dw-hammer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hammer-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hammer-1');">
																	<i class="icon-copy dw dw-hammer-1"></i> dw-hammer-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-headset').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-headset');">
																	<i class="icon-copy dw dw-headset"></i> dw-headset
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-house').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-house');">
																	<i class="icon-copy dw dw-house"></i> dw-house
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-house-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-house-1');">
																	<i class="icon-copy dw dw-house-1"></i> dw-house-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hook').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hook');">
																	<i class="icon-copy dw dw-hook"></i> dw-hook
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-id-card').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-id-card');">
																	<i class="icon-copy dw dw-id-card"></i> dw-id-card
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-id-card-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-id-card-1');">
																	<i class="icon-copy dw dw-id-card-1"></i> dw-id-card-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-idea-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-idea-1');">
																	<i class="icon-copy dw dw-idea-1"></i> dw-idea-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image');">
																	<i class="icon-copy dw dw-image"></i> dw-image
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image-1');">
																	<i class="icon-copy dw dw-image-1"></i> dw-image-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image-2');">
																	<i class="icon-copy dw dw-image-2"></i> dw-image-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inbox-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inbox-1');">
																	<i class="icon-copy dw dw-inbox-1"></i> dw-inbox-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inbox-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inbox-2');">
																	<i class="icon-copy dw dw-inbox-2"></i> dw-inbox-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inbox-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inbox-3');">
																	<i class="icon-copy dw dw-inbox-3"></i> dw-inbox-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inbox-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inbox-4');">
																	<i class="icon-copy dw dw-inbox-4"></i> dw-inbox-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-download-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-download-1');">
																	<i class="icon-copy dw dw-download-1"></i> dw-download-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bug').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bug');">
																	<i class="icon-copy dw dw-bug"></i> dw-bug
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-invoice').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-invoice');">
																	<i class="icon-copy dw dw-invoice"></i> dw-invoice
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-invoice-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-invoice-1');">
																	<i class="icon-copy dw dw-invoice-1"></i> dw-invoice-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-key').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-key');">
																	<i class="icon-copy dw dw-key"></i> dw-key
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-startup').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-startup');">
																	<i class="icon-copy dw dw-startup"></i> dw-startup
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-startup-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-startup-1');">
																	<i class="icon-copy dw dw-startup-1"></i> dw-startup-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-library').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-library');">
																	<i class="icon-copy dw dw-library"></i> dw-library
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-idea-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-idea-2');">
																	<i class="icon-copy dw dw-idea-2"></i> dw-idea-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-lighthouse').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-lighthouse');">
																	<i class="icon-copy dw dw-lighthouse"></i> dw-lighthouse
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link');">
																	<i class="icon-copy dw dw-link"></i> dw-link
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin');">
																	<i class="icon-copy dw dw-pin"></i> dw-pin
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-1');">
																	<i class="icon-copy dw dw-pin-1"></i> dw-pin-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-padlock').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-padlock');">
																	<i class="icon-copy dw dw-padlock"></i> dw-padlock
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-magic-wand').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-magic-wand');">
																	<i class="icon-copy dw dw-magic-wand"></i> dw-magic-wand
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-magnifying-glass').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-magnifying-glass');">
																	<i class="icon-copy dw dw-magnifying-glass"></i> dw-magnifying-glass
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-email').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-email');">
																	<i class="icon-copy dw dw-email"></i> dw-email
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-email-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-email-1');">
																	<i class="icon-copy dw dw-email-1"></i> dw-email-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map');">
																	<i class="icon-copy dw dw-map"></i> dw-map
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-2');">
																	<i class="icon-copy dw dw-pin-2"></i> dw-pin-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-1');">
																	<i class="icon-copy dw dw-map-1"></i> dw-map-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-marker').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-marker');">
																	<i class="icon-copy dw dw-marker"></i> dw-marker
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-first-aid-kit').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-first-aid-kit');">
																	<i class="icon-copy dw dw-first-aid-kit"></i> dw-first-aid-kit
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mail').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mail');">
																	<i class="icon-copy dw dw-mail"></i> dw-mail
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-4');">
																	<i class="icon-copy dw dw-chat-4"></i> dw-chat-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-email-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-email-2');">
																	<i class="icon-copy dw dw-email-2"></i> dw-email-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chip').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chip');">
																	<i class="icon-copy dw dw-chip"></i> dw-chip
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chip-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chip-1');">
																	<i class="icon-copy dw dw-chip-1"></i> dw-chip-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-microphone').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-microphone');">
																	<i class="icon-copy dw dw-microphone"></i> dw-microphone
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-microphone-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-microphone-1');">
																	<i class="icon-copy dw dw-microphone-1"></i> dw-microphone-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-smartphone').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-smartphone');">
																	<i class="icon-copy dw dw-smartphone"></i> dw-smartphone
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cocktail-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cocktail-1');">
																	<i class="icon-copy dw dw-cocktail-1"></i> dw-cocktail-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-more').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-more');">
																	<i class="icon-copy dw dw-more"></i> dw-more
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ticket').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ticket');">
																	<i class="icon-copy dw dw-ticket"></i> dw-ticket
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-compass-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-compass-1');">
																	<i class="icon-copy dw dw-compass-1"></i> dw-compass-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add-file').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add-file');">
																	<i class="icon-copy dw dw-add-file"></i> dw-add-file
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-nib').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-nib');">
																	<i class="icon-copy dw dw-nib"></i> dw-nib
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notebook').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notebook');">
																	<i class="icon-copy dw dw-notebook"></i> dw-notebook
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notepad').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notepad');">
																	<i class="icon-copy dw dw-notepad"></i> dw-notepad
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notepad-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notepad-1');">
																	<i class="icon-copy dw dw-notepad-1"></i> dw-notepad-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notepad-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notepad-2');">
																	<i class="icon-copy dw dw-notepad-2"></i> dw-notepad-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notification').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notification');">
																	<i class="icon-copy dw dw-notification"></i> dw-notification
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notification-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notification-1');">
																	<i class="icon-copy dw dw-notification-1"></i> dw-notification-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-open-book').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-open-book');">
																	<i class="icon-copy dw dw-open-book"></i> dw-open-book
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-open-book-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-open-book-1');">
																	<i class="icon-copy dw dw-open-book-1"></i> dw-open-book-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-3');">
																	<i class="icon-copy dw dw-file-3"></i> dw-file-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paint-bucket').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paint-bucket');">
																	<i class="icon-copy dw dw-paint-bucket"></i> dw-paint-bucket
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paint-roller').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paint-roller');">
																	<i class="icon-copy dw dw-paint-roller"></i> dw-paint-roller
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paper-plane').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paper-plane');">
																	<i class="icon-copy dw dw-paper-plane"></i> dw-paper-plane
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pen').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pen');">
																	<i class="icon-copy dw dw-pen"></i> dw-pen
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pencil').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pencil');">
																	<i class="icon-copy dw dw-pencil"></i> dw-pencil
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pencil-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pencil-1');">
																	<i class="icon-copy dw dw-pencil-1"></i> dw-pencil-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-smartphone-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-smartphone-1');">
																	<i class="icon-copy dw dw-smartphone-1"></i> dw-smartphone-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-photo-camera').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-photo-camera');">
																	<i class="icon-copy dw dw-photo-camera"></i> dw-photo-camera
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-push-pin').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-push-pin');">
																	<i class="icon-copy dw dw-push-pin"></i> dw-push-pin
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-3');">
																	<i class="icon-copy dw dw-pin-3"></i> dw-pin-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-push-pin-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-push-pin-1');">
																	<i class="icon-copy dw dw-push-pin-1"></i> dw-push-pin-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-push-pin-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-push-pin-2');">
																	<i class="icon-copy dw dw-push-pin-2"></i> dw-push-pin-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-player').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-player');">
																	<i class="icon-copy dw dw-video-player"></i> dw-video-player
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-swimming-pool').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-swimming-pool');">
																	<i class="icon-copy dw dw-swimming-pool"></i> dw-swimming-pool
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-presentation').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-presentation');">
																	<i class="icon-copy dw dw-presentation"></i> dw-presentation
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-presentation-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-presentation-1');">
																	<i class="icon-copy dw dw-presentation-1"></i> dw-presentation-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-presentation-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-presentation-2');">
																	<i class="icon-copy dw dw-presentation-2"></i> dw-presentation-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-4');">
																	<i class="icon-copy dw dw-file-4"></i> dw-file-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user');">
																	<i class="icon-copy dw dw-user"></i> dw-user
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-property').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-property');">
																	<i class="icon-copy dw dw-property"></i> dw-property
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wallet').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wallet');">
																	<i class="icon-copy dw dw-wallet"></i> dw-wallet
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-radio').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-radio');">
																	<i class="icon-copy dw dw-radio"></i> dw-radio
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-radio-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-radio-1');">
																	<i class="icon-copy dw dw-radio-1"></i> dw-radio-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-random').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-random');">
																	<i class="icon-copy dw dw-random"></i> dw-random
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-open-book-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-open-book-2');">
																	<i class="icon-copy dw dw-open-book-2"></i> dw-open-book-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-reload').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-reload');">
																	<i class="icon-copy dw dw-reload"></i> dw-reload
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cutlery').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cutlery');">
																	<i class="icon-copy dw dw-cutlery"></i> dw-cutlery
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-startup-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-startup-2');">
																	<i class="icon-copy dw dw-startup-2"></i> dw-startup-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-router').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-router');">
																	<i class="icon-copy dw dw-router"></i> dw-router
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ruler-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ruler-1');">
																	<i class="icon-copy dw dw-ruler-1"></i> dw-ruler-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-safebox').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-safebox');">
																	<i class="icon-copy dw dw-safebox"></i> dw-safebox
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hourglass').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hourglass');">
																	<i class="icon-copy dw dw-hourglass"></i> dw-hourglass
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-satellite').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-satellite');">
																	<i class="icon-copy dw dw-satellite"></i> dw-satellite
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-7');">
																	<i class="icon-copy dw dw-calendar-7"></i> dw-calendar-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-monitor').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-monitor');">
																	<i class="icon-copy dw dw-monitor"></i> dw-monitor
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-monitor-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-monitor-1');">
																	<i class="icon-copy dw dw-monitor-1"></i> dw-monitor-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-search').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-search');">
																	<i class="icon-copy dw dw-search"></i> dw-search
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor-1');">
																	<i class="icon-copy dw dw-cursor-1"></i> dw-cursor-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-settings').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-settings');">
																	<i class="icon-copy dw dw-settings"></i> dw-settings
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-share').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-share');">
																	<i class="icon-copy dw dw-share"></i> dw-share
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-share-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-share-1');">
																	<i class="icon-copy dw dw-share-1"></i> dw-share-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-share-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-share-2');">
																	<i class="icon-copy dw dw-share-2"></i> dw-share-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-crane').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-crane');">
																	<i class="icon-copy dw dw-crane"></i> dw-crane
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ship').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ship');">
																	<i class="icon-copy dw dw-ship"></i> dw-ship
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-cart-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-cart-1');">
																	<i class="icon-copy dw dw-shopping-cart-1"></i> dw-shopping-cart-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sim-card').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sim-card');">
																	<i class="icon-copy dw dw-sim-card"></i> dw-sim-card
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sofa').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sofa');">
																	<i class="icon-copy dw dw-sofa"></i> dw-sofa
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-speaker').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-speaker');">
																	<i class="icon-copy dw dw-speaker"></i> dw-speaker
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-speaker-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-speaker-1');">
																	<i class="icon-copy dw dw-speaker-1"></i> dw-speaker-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-speech').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-speech');">
																	<i class="icon-copy dw dw-speech"></i> dw-speech
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-stamp').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-stamp');">
																	<i class="icon-copy dw dw-stamp"></i> dw-stamp
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-stethoscope').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-stethoscope');">
																	<i class="icon-copy dw dw-stethoscope"></i> dw-stethoscope
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-suitcase').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-suitcase');">
																	<i class="icon-copy dw dw-suitcase"></i> dw-suitcase
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-syringe').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-syringe');">
																	<i class="icon-copy dw dw-syringe"></i> dw-syringe
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tag').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tag');">
																	<i class="icon-copy dw dw-tag"></i> dw-tag
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tag-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tag-1');">
																	<i class="icon-copy dw dw-tag-1"></i> dw-tag-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-target').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-target');">
																	<i class="icon-copy dw dw-target"></i> dw-target
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tea').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tea');">
																	<i class="icon-copy dw dw-tea"></i> dw-tea
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chip-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chip-2');">
																	<i class="icon-copy dw dw-chip-2"></i> dw-chip-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-telescope').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-telescope');">
																	<i class="icon-copy dw dw-telescope"></i> dw-telescope
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ticket-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ticket-1');">
																	<i class="icon-copy dw dw-ticket-1"></i> dw-ticket-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ticket-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ticket-2');">
																	<i class="icon-copy dw dw-ticket-2"></i> dw-ticket-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-8');">
																	<i class="icon-copy dw dw-calendar-8"></i> dw-calendar-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-torch').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-torch');">
																	<i class="icon-copy dw dw-torch"></i> dw-torch
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-train').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-train');">
																	<i class="icon-copy dw dw-train"></i> dw-train
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delivery-truck').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delivery-truck');">
																	<i class="icon-copy dw dw-delivery-truck"></i> dw-delivery-truck
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delivery-truck-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delivery-truck-1');">
																	<i class="icon-copy dw dw-delivery-truck-1"></i> dw-delivery-truck-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delivery-truck-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delivery-truck-2');">
																	<i class="icon-copy dw dw-delivery-truck-2"></i> dw-delivery-truck-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-trash').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-trash');">
																	<i class="icon-copy dw dw-trash"></i> dw-trash
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-suitcase-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-suitcase-1');">
																	<i class="icon-copy dw dw-suitcase-1"></i> dw-suitcase-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-television').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-television');">
																	<i class="icon-copy dw dw-television"></i> dw-television
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-umbrella').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-umbrella');">
																	<i class="icon-copy dw dw-umbrella"></i> dw-umbrella
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-outbox').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-outbox');">
																	<i class="icon-copy dw dw-outbox"></i> dw-outbox
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-upload').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-upload');">
																	<i class="icon-copy dw dw-upload"></i> dw-upload
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-usb').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-usb');">
																	<i class="icon-copy dw dw-usb"></i> dw-usb
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user-1');">
																	<i class="icon-copy dw dw-user-1"></i> dw-user-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-camera').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-camera');">
																	<i class="icon-copy dw dw-video-camera"></i> dw-video-camera
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-gallery').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-gallery');">
																	<i class="icon-copy dw dw-gallery"></i> dw-gallery
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-film-reel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-film-reel');">
																	<i class="icon-copy dw dw-film-reel"></i> dw-film-reel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-player-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-player-1');">
																	<i class="icon-copy dw dw-video-player-1"></i> dw-video-player-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wallet-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wallet-1');">
																	<i class="icon-copy dw dw-wallet-1"></i> dw-wallet-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-watch').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-watch');">
																	<i class="icon-copy dw dw-watch"></i> dw-watch
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bottle-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bottle-1');">
																	<i class="icon-copy dw dw-bottle-1"></i> dw-bottle-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coding-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coding-1');">
																	<i class="icon-copy dw dw-coding-1"></i> dw-coding-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wifi').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wifi');">
																	<i class="icon-copy dw dw-wifi"></i> dw-wifi
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-writing').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-writing');">
																	<i class="icon-copy dw dw-writing"></i> dw-writing
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-zoom-in').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-zoom-in');">
																	<i class="icon-copy dw dw-zoom-in"></i> dw-zoom-in
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-zoom-out').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-zoom-out');">
																	<i class="icon-copy dw dw-zoom-out"></i> dw-zoom-out
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow');">
																	<i class="icon-copy dw dw-down-arrow"></i> dw-down-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow');">
																	<i class="icon-copy dw dw-up-arrow"></i> dw-up-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow');">
																	<i class="icon-copy dw dw-left-arrow"></i> dw-left-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-1');">
																	<i class="icon-copy dw dw-up-arrow-1"></i> dw-up-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shrink').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shrink');">
																	<i class="icon-copy dw dw-shrink"></i> dw-shrink
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-skip').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-skip');">
																	<i class="icon-copy dw dw-skip"></i> dw-skip
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-minimize').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-minimize');">
																	<i class="icon-copy dw dw-minimize"></i> dw-minimize
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-back').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-back');">
																	<i class="icon-copy dw dw-back"></i> dw-back
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow');">
																	<i class="icon-copy dw dw-diagonal-arrow"></i> dw-diagonal-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-2');">
																	<i class="icon-copy dw dw-up-arrow-2"></i> dw-up-arrow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-1');">
																	<i class="icon-copy dw dw-diagonal-arrow-1"></i> dw-diagonal-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-1');">
																	<i class="icon-copy dw dw-down-arrow-1"></i> dw-down-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-3');">
																	<i class="icon-copy dw dw-up-arrow-3"></i> dw-up-arrow-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-return').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-return');">
																	<i class="icon-copy dw dw-return"></i> dw-return
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-share1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-share1');">
																	<i class="icon-copy dw dw-share1"></i> dw-share1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-1');">
																	<i class="icon-copy dw dw-left-arrow-1"></i> dw-left-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-2');">
																	<i class="icon-copy dw dw-diagonal-arrow-2"></i> dw-diagonal-arrow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-return-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-return-1');">
																	<i class="icon-copy dw dw-return-1"></i> dw-return-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-3');">
																	<i class="icon-copy dw dw-diagonal-arrow-3"></i> dw-diagonal-arrow-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-curved-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-curved-arrow');">
																	<i class="icon-copy dw dw-curved-arrow"></i> dw-curved-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-resize').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-resize');">
																	<i class="icon-copy dw dw-resize"></i> dw-resize
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-minimize-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-minimize-1');">
																	<i class="icon-copy dw dw-minimize-1"></i> dw-minimize-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-resize-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-resize-1');">
																	<i class="icon-copy dw dw-resize-1"></i> dw-resize-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-4');">
																	<i class="icon-copy dw dw-up-arrow-4"></i> dw-up-arrow-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-2');">
																	<i class="icon-copy dw dw-down-arrow-2"></i> dw-down-arrow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-return-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-return-2');">
																	<i class="icon-copy dw dw-return-2"></i> dw-return-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-return-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-return-3');">
																	<i class="icon-copy dw dw-return-3"></i> dw-return-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-return-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-return-4');">
																	<i class="icon-copy dw dw-return-4"></i> dw-return-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-resize-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-resize-2');">
																	<i class="icon-copy dw dw-resize-2"></i> dw-resize-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-4');">
																	<i class="icon-copy dw dw-diagonal-arrow-4"></i> dw-diagonal-arrow-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-5');">
																	<i class="icon-copy dw dw-diagonal-arrow-5"></i> dw-diagonal-arrow-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-resize-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-resize-3');">
																	<i class="icon-copy dw dw-resize-3"></i> dw-resize-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-3');">
																	<i class="icon-copy dw dw-down-arrow-3"></i> dw-down-arrow-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shrink-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shrink-1');">
																	<i class="icon-copy dw dw-shrink-1"></i> dw-shrink-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-6');">
																	<i class="icon-copy dw dw-diagonal-arrow-6"></i> dw-diagonal-arrow-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-7');">
																	<i class="icon-copy dw dw-diagonal-arrow-7"></i> dw-diagonal-arrow-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-8');">
																	<i class="icon-copy dw dw-diagonal-arrow-8"></i> dw-diagonal-arrow-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-minimize-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-minimize-2');">
																	<i class="icon-copy dw dw-minimize-2"></i> dw-minimize-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-minimize-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-minimize-3');">
																	<i class="icon-copy dw dw-minimize-3"></i> dw-minimize-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-9').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-9');">
																	<i class="icon-copy dw dw-diagonal-arrow-9"></i> dw-diagonal-arrow-9
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-10').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-10');">
																	<i class="icon-copy dw dw-diagonal-arrow-10"></i> dw-diagonal-arrow-10
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-11');">
																	<i class="icon-copy dw dw-diagonal-arrow-11"></i> dw-diagonal-arrow-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-12');">
																	<i class="icon-copy dw dw-diagonal-arrow-12"></i> dw-diagonal-arrow-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-13').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-13');">
																	<i class="icon-copy dw dw-diagonal-arrow-13"></i> dw-diagonal-arrow-13
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-14').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-14');">
																	<i class="icon-copy dw dw-diagonal-arrow-14"></i> dw-diagonal-arrow-14
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-15').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-15');">
																	<i class="icon-copy dw dw-diagonal-arrow-15"></i> dw-diagonal-arrow-15
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-16').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-16');">
																	<i class="icon-copy dw dw-diagonal-arrow-16"></i> dw-diagonal-arrow-16
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shrink-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shrink-2');">
																	<i class="icon-copy dw dw-shrink-2"></i> dw-shrink-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-17').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-17');">
																	<i class="icon-copy dw dw-diagonal-arrow-17"></i> dw-diagonal-arrow-17
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-5');">
																	<i class="icon-copy dw dw-up-arrow-5"></i> dw-up-arrow-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow1');">
																	<i class="icon-copy dw dw-left-arrow1"></i> dw-left-arrow1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow');">
																	<i class="icon-copy dw dw-right-arrow"></i> dw-right-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-1');">
																	<i class="icon-copy dw dw-right-arrow-1"></i> dw-right-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-expand').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-expand');">
																	<i class="icon-copy dw dw-expand"></i> dw-expand
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sort').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sort');">
																	<i class="icon-copy dw dw-sort"></i> dw-sort
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-switch').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-switch');">
																	<i class="icon-copy dw dw-switch"></i> dw-switch
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-expand-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-expand-1');">
																	<i class="icon-copy dw dw-expand-1"></i> dw-expand-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-2');">
																	<i class="icon-copy dw dw-right-arrow-2"></i> dw-right-arrow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shuffle').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shuffle');">
																	<i class="icon-copy dw dw-shuffle"></i> dw-shuffle
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-11');">
																	<i class="icon-copy dw dw-left-arrow-11"></i> dw-left-arrow-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow1');">
																	<i class="icon-copy dw dw-down-arrow1"></i> dw-down-arrow1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-11');">
																	<i class="icon-copy dw dw-down-arrow-11"></i> dw-down-arrow-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow1');">
																	<i class="icon-copy dw dw-diagonal-arrow1"></i> dw-diagonal-arrow1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-18').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-18');">
																	<i class="icon-copy dw dw-diagonal-arrow-18"></i> dw-diagonal-arrow-18
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-2');">
																	<i class="icon-copy dw dw-left-arrow-2"></i> dw-left-arrow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-3');">
																	<i class="icon-copy dw dw-left-arrow-3"></i> dw-left-arrow-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rotate').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rotate');">
																	<i class="icon-copy dw dw-rotate"></i> dw-rotate
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-21');">
																	<i class="icon-copy dw dw-down-arrow-21"></i> dw-down-arrow-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-3');">
																	<i class="icon-copy dw dw-right-arrow-3"></i> dw-right-arrow-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-21');">
																	<i class="icon-copy dw dw-diagonal-arrow-21"></i> dw-diagonal-arrow-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-repeat').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-repeat');">
																	<i class="icon-copy dw dw-repeat"></i> dw-repeat
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-4');">
																	<i class="icon-copy dw dw-right-arrow-4"></i> dw-right-arrow-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-31').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-31');">
																	<i class="icon-copy dw dw-down-arrow-31"></i> dw-down-arrow-31
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow1');">
																	<i class="icon-copy dw dw-up-arrow1"></i> dw-up-arrow1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-11');">
																	<i class="icon-copy dw dw-up-arrow-11"></i> dw-up-arrow-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-5');">
																	<i class="icon-copy dw dw-right-arrow-5"></i> dw-right-arrow-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-4');">
																	<i class="icon-copy dw dw-left-arrow-4"></i> dw-left-arrow-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-21');">
																	<i class="icon-copy dw dw-up-arrow-21"></i> dw-up-arrow-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-5');">
																	<i class="icon-copy dw dw-left-arrow-5"></i> dw-left-arrow-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-4');">
																	<i class="icon-copy dw dw-down-arrow-4"></i> dw-down-arrow-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-31').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-31');">
																	<i class="icon-copy dw dw-up-arrow-31"></i> dw-up-arrow-31
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-31').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-31');">
																	<i class="icon-copy dw dw-diagonal-arrow-31"></i> dw-diagonal-arrow-31
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-6');">
																	<i class="icon-copy dw dw-right-arrow-6"></i> dw-right-arrow-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-move').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-move');">
																	<i class="icon-copy dw dw-move"></i> dw-move
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-refresh').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-refresh');">
																	<i class="icon-copy dw dw-refresh"></i> dw-refresh
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-41').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-41');">
																	<i class="icon-copy dw dw-diagonal-arrow-41"></i> dw-diagonal-arrow-41
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-5');">
																	<i class="icon-copy dw dw-down-arrow-5"></i> dw-down-arrow-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-repeat-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-repeat-1');">
																	<i class="icon-copy dw dw-repeat-1"></i> dw-repeat-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow-41').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow-41');">
																	<i class="icon-copy dw dw-up-arrow-41"></i> dw-up-arrow-41
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-7');">
																	<i class="icon-copy dw dw-right-arrow-7"></i> dw-right-arrow-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow-8');">
																	<i class="icon-copy dw dw-right-arrow-8"></i> dw-right-arrow-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-51').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-51');">
																	<i class="icon-copy dw dw-diagonal-arrow-51"></i> dw-diagonal-arrow-51
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow-6');">
																	<i class="icon-copy dw dw-left-arrow-6"></i> dw-left-arrow-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-6');">
																	<i class="icon-copy dw dw-down-arrow-6"></i> dw-down-arrow-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow-7');">
																	<i class="icon-copy dw dw-down-arrow-7"></i> dw-down-arrow-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-61').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-61');">
																	<i class="icon-copy dw dw-diagonal-arrow-61"></i> dw-diagonal-arrow-61
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-return1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-return1');">
																	<i class="icon-copy dw dw-return1"></i> dw-return1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-71').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-71');">
																	<i class="icon-copy dw dw-diagonal-arrow-71"></i> dw-diagonal-arrow-71
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-81').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-81');">
																	<i class="icon-copy dw dw-diagonal-arrow-81"></i> dw-diagonal-arrow-81
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-91').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-91');">
																	<i class="icon-copy dw dw-diagonal-arrow-91"></i> dw-diagonal-arrow-91
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-align').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-align');">
																	<i class="icon-copy dw dw-down-align"></i> dw-down-align
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-align1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-align1');">
																	<i class="icon-copy dw dw-down-align1"></i> dw-down-align1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-align2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-align2');">
																	<i class="icon-copy dw dw-down-align2"></i> dw-down-align2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align');">
																	<i class="icon-copy dw dw-center-align"></i> dw-center-align
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align1');">
																	<i class="icon-copy dw dw-center-align1"></i> dw-center-align1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align2');">
																	<i class="icon-copy dw dw-center-align2"></i> dw-center-align2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align3');">
																	<i class="icon-copy dw dw-center-align3"></i> dw-center-align3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-left').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-left');">
																	<i class="icon-copy dw dw-align-left"></i> dw-align-left
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-left1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-left1');">
																	<i class="icon-copy dw dw-align-left1"></i> dw-align-left1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-left2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-left2');">
																	<i class="icon-copy dw dw-align-left2"></i> dw-align-left2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-right').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-right');">
																	<i class="icon-copy dw dw-align-right"></i> dw-align-right
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-right1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-right1');">
																	<i class="icon-copy dw dw-align-right1"></i> dw-align-right1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-right2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-right2');">
																	<i class="icon-copy dw dw-align-right2"></i> dw-align-right2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-align').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-align');">
																	<i class="icon-copy dw dw-up-align"></i> dw-up-align
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-align1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-align1');">
																	<i class="icon-copy dw dw-up-align1"></i> dw-up-align1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-align2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-align2');">
																	<i class="icon-copy dw dw-up-align2"></i> dw-up-align2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bottom').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bottom');">
																	<i class="icon-copy dw dw-bottom"></i> dw-bottom
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bottom1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bottom1');">
																	<i class="icon-copy dw dw-bottom1"></i> dw-bottom1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-align3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-align3');">
																	<i class="icon-copy dw dw-down-align3"></i> dw-down-align3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align4');">
																	<i class="icon-copy dw dw-center-align4"></i> dw-center-align4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align5');">
																	<i class="icon-copy dw dw-center-align5"></i> dw-center-align5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-center-align6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-center-align6');">
																	<i class="icon-copy dw dw-center-align6"></i> dw-center-align6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-grid').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-grid');">
																	<i class="icon-copy dw dw-grid"></i> dw-grid
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rows').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rows');">
																	<i class="icon-copy dw dw-rows"></i> dw-rows
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-header').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-header');">
																	<i class="icon-copy dw dw-header"></i> dw-header
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inner').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inner');">
																	<i class="icon-copy dw dw-inner"></i> dw-inner
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-layout').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-layout');">
																	<i class="icon-copy dw dw-layout"></i> dw-layout
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-layout1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-layout1');">
																	<i class="icon-copy dw dw-layout1"></i> dw-layout1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-layout2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-layout2');">
																	<i class="icon-copy dw dw-layout2"></i> dw-layout2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel');">
																	<i class="icon-copy dw dw-panel"></i> dw-panel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel1');">
																	<i class="icon-copy dw dw-panel1"></i> dw-panel1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sidebar').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sidebar');">
																	<i class="icon-copy dw dw-sidebar"></i> dw-sidebar
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-align').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-align');">
																	<i class="icon-copy dw dw-left-align"></i> dw-left-align
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-no-border').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-no-border');">
																	<i class="icon-copy dw dw-no-border"></i> dw-no-border
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-outer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-outer');">
																	<i class="icon-copy dw dw-outer"></i> dw-outer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-header1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-header1');">
																	<i class="icon-copy dw dw-header1"></i> dw-header1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel2');">
																	<i class="icon-copy dw dw-panel2"></i> dw-panel2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel3');">
																	<i class="icon-copy dw dw-panel3"></i> dw-panel3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sidebar1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sidebar1');">
																	<i class="icon-copy dw dw-sidebar1"></i> dw-sidebar1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-align').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-align');">
																	<i class="icon-copy dw dw-right-align"></i> dw-right-align
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-grid1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-grid1');">
																	<i class="icon-copy dw dw-grid1"></i> dw-grid1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-table').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-table');">
																	<i class="icon-copy dw dw-table"></i> dw-table
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-columns').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-columns');">
																	<i class="icon-copy dw dw-columns"></i> dw-columns
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-columns1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-columns1');">
																	<i class="icon-copy dw dw-columns1"></i> dw-columns1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel4');">
																	<i class="icon-copy dw dw-panel4"></i> dw-panel4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel5');">
																	<i class="icon-copy dw dw-panel5"></i> dw-panel5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-columns2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-columns2');">
																	<i class="icon-copy dw dw-columns2"></i> dw-columns2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rows1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rows1');">
																	<i class="icon-copy dw dw-rows1"></i> dw-rows1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rows2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rows2');">
																	<i class="icon-copy dw dw-rows2"></i> dw-rows2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-align3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-align3');">
																	<i class="icon-copy dw dw-up-align3"></i> dw-up-align3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat1');">
																	<i class="icon-copy dw dw-chat1"></i> dw-chat1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-center').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-center');">
																	<i class="icon-copy dw dw-align-center"></i> dw-align-center
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-left3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-left3');">
																	<i class="icon-copy dw dw-align-left3"></i> dw-align-left3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-align-right3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-align-right3');">
																	<i class="icon-copy dw dw-align-right3"></i> dw-align-right3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bold').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bold');">
																	<i class="icon-copy dw dw-bold"></i> dw-bold
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-broken-link').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-broken-link');">
																	<i class="icon-copy dw dw-broken-link"></i> dw-broken-link
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-clear-format').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-clear-format');">
																	<i class="icon-copy dw dw-clear-format"></i> dw-clear-format
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-clipboard').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-clipboard');">
																	<i class="icon-copy dw dw-clipboard"></i> dw-clipboard
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-columns3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-columns3');">
																	<i class="icon-copy dw dw-columns3"></i> dw-columns3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file1');">
																	<i class="icon-copy dw dw-file1"></i> dw-file1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-scissors').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-scissors');">
																	<i class="icon-copy dw dw-scissors"></i> dw-scissors
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-size').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-size');">
																	<i class="icon-copy dw dw-size"></i> dw-size
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat2');">
																	<i class="icon-copy dw dw-chat2"></i> dw-chat2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit1');">
																	<i class="icon-copy dw dw-edit1"></i> dw-edit1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-font').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-font');">
																	<i class="icon-copy dw dw-font"></i> dw-font
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-grammar').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-grammar');">
																	<i class="icon-copy dw dw-grammar"></i> dw-grammar
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-highlight').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-highlight');">
																	<i class="icon-copy dw dw-highlight"></i> dw-highlight
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-idea1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-idea1');">
																	<i class="icon-copy dw dw-idea1"></i> dw-idea1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-font1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-font1');">
																	<i class="icon-copy dw dw-font1"></i> dw-font1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-italic').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-italic');">
																	<i class="icon-copy dw dw-italic"></i> dw-italic
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-indent').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-indent');">
																	<i class="icon-copy dw dw-left-indent"></i> dw-left-indent
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-line-spacing').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-line-spacing');">
																	<i class="icon-copy dw dw-line-spacing"></i> dw-line-spacing
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link1');">
																	<i class="icon-copy dw dw-link1"></i> dw-link1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link2');">
																	<i class="icon-copy dw dw-link2"></i> dw-link2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-list').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-list');">
																	<i class="icon-copy dw dw-list"></i> dw-list
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-more1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-more1');">
																	<i class="icon-copy dw dw-more1"></i> dw-more1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-note').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-note');">
																	<i class="icon-copy dw dw-note"></i> dw-note
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-note1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-note1');">
																	<i class="icon-copy dw dw-note1"></i> dw-note1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-note2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-note2');">
																	<i class="icon-copy dw dw-note2"></i> dw-note2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-list1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-list1');">
																	<i class="icon-copy dw dw-list1"></i> dw-list1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-list2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-list2');">
																	<i class="icon-copy dw dw-list2"></i> dw-list2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-page').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-page');">
																	<i class="icon-copy dw dw-page"></i> dw-page
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-page1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-page1');">
																	<i class="icon-copy dw dw-page1"></i> dw-page1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paperclip').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paperclip');">
																	<i class="icon-copy dw dw-paperclip"></i> dw-paperclip
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paragraph').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paragraph');">
																	<i class="icon-copy dw dw-paragraph"></i> dw-paragraph
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paragraph1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paragraph1');">
																	<i class="icon-copy dw dw-paragraph1"></i> dw-paragraph1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paste').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paste');">
																	<i class="icon-copy dw dw-paste"></i> dw-paste
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-note3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-note3');">
																	<i class="icon-copy dw dw-note3"></i> dw-note3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-print').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-print');">
																	<i class="icon-copy dw dw-print"></i> dw-print
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-redo').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-redo');">
																	<i class="icon-copy dw dw-redo"></i> dw-redo
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-indent').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-indent');">
																	<i class="icon-copy dw dw-right-indent"></i> dw-right-indent
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diskette').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diskette');">
																	<i class="icon-copy dw dw-diskette"></i> dw-diskette
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-search1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-search1');">
																	<i class="icon-copy dw dw-search1"></i> dw-search1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-size1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-size1');">
																	<i class="icon-copy dw dw-size1"></i> dw-size1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin1');">
																	<i class="icon-copy dw dw-pin1"></i> dw-pin1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-table1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-table1');">
																	<i class="icon-copy dw dw-table1"></i> dw-table1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-text').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-text');">
																	<i class="icon-copy dw dw-text"></i> dw-text
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-text1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-text1');">
																	<i class="icon-copy dw dw-text1"></i> dw-text1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-underline').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-underline');">
																	<i class="icon-copy dw dw-underline"></i> dw-underline
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-undo').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-undo');">
																	<i class="icon-copy dw dw-undo"></i> dw-undo
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow2');">
																	<i class="icon-copy dw dw-down-arrow2"></i> dw-down-arrow2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-arrow2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-arrow2');">
																	<i class="icon-copy dw dw-up-arrow2"></i> dw-up-arrow2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-arrow2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-arrow2');">
																	<i class="icon-copy dw dw-left-arrow2"></i> dw-left-arrow2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-arrow1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-arrow1');">
																	<i class="icon-copy dw dw-right-arrow1"></i> dw-right-arrow1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow2');">
																	<i class="icon-copy dw dw-diagonal-arrow2"></i> dw-diagonal-arrow2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-19').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-19');">
																	<i class="icon-copy dw dw-diagonal-arrow-19"></i> dw-diagonal-arrow-19
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-22').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-22');">
																	<i class="icon-copy dw dw-diagonal-arrow-22"></i> dw-diagonal-arrow-22
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diagonal-arrow-32').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diagonal-arrow-32');">
																	<i class="icon-copy dw dw-diagonal-arrow-32"></i> dw-diagonal-arrow-32
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-double-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-double-arrow');">
																	<i class="icon-copy dw dw-double-arrow"></i> dw-double-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-double-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-double-arrow-1');">
																	<i class="icon-copy dw dw-double-arrow-1"></i> dw-double-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bus').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bus');">
																	<i class="icon-copy dw dw-bus"></i> dw-bus
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-truck').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-truck');">
																	<i class="icon-copy dw dw-truck"></i> dw-truck
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ambulance').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ambulance');">
																	<i class="icon-copy dw dw-ambulance"></i> dw-ambulance
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-helicopters').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-helicopters');">
																	<i class="icon-copy dw dw-helicopters"></i> dw-helicopters
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sailboat1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sailboat1');">
																	<i class="icon-copy dw dw-sailboat1"></i> dw-sailboat1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cable-car-cabin').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cable-car-cabin');">
																	<i class="icon-copy dw dw-cable-car-cabin"></i> dw-cable-car-cabin
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shop').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shop');">
																	<i class="icon-copy dw dw-shop"></i> dw-shop
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-groceries-store').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-groceries-store');">
																	<i class="icon-copy dw dw-groceries-store"></i> dw-groceries-store
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pagoda').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pagoda');">
																	<i class="icon-copy dw dw-pagoda"></i> dw-pagoda
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coffee-cup').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coffee-cup');">
																	<i class="icon-copy dw dw-coffee-cup"></i> dw-coffee-cup
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sort1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sort1');">
																	<i class="icon-copy dw dw-sort1"></i> dw-sort1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-food-cart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-food-cart');">
																	<i class="icon-copy dw dw-food-cart"></i> dw-food-cart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mosque').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mosque');">
																	<i class="icon-copy dw dw-mosque"></i> dw-mosque
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-building1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-building1');">
																	<i class="icon-copy dw dw-building1"></i> dw-building1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-police-box').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-police-box');">
																	<i class="icon-copy dw dw-police-box"></i> dw-police-box
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-caravan').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-caravan');">
																	<i class="icon-copy dw dw-caravan"></i> dw-caravan
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-school').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-school');">
																	<i class="icon-copy dw dw-school"></i> dw-school
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-kayak').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-kayak');">
																	<i class="icon-copy dw dw-kayak"></i> dw-kayak
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-skyscraper').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-skyscraper');">
																	<i class="icon-copy dw dw-skyscraper"></i> dw-skyscraper
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-building-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-building-1');">
																	<i class="icon-copy dw dw-building-1"></i> dw-building-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bonfire').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bonfire');">
																	<i class="icon-copy dw dw-bonfire"></i> dw-bonfire
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-exchange').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-exchange');">
																	<i class="icon-copy dw dw-exchange"></i> dw-exchange
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tent').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tent');">
																	<i class="icon-copy dw dw-tent"></i> dw-tent
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-house1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-house1');">
																	<i class="icon-copy dw dw-house1"></i> dw-house1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hospital').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hospital');">
																	<i class="icon-copy dw dw-hospital"></i> dw-hospital
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-factory1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-factory1');">
																	<i class="icon-copy dw dw-factory1"></i> dw-factory1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-city-hall').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-city-hall');">
																	<i class="icon-copy dw dw-city-hall"></i> dw-city-hall
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-city').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-city');">
																	<i class="icon-copy dw dw-city"></i> dw-city
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bridge').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bridge');">
																	<i class="icon-copy dw dw-bridge"></i> dw-bridge
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ferris-wheel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ferris-wheel');">
																	<i class="icon-copy dw dw-ferris-wheel"></i> dw-ferris-wheel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-billboard').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-billboard');">
																	<i class="icon-copy dw dw-billboard"></i> dw-billboard
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-phone-booth').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-phone-booth');">
																	<i class="icon-copy dw dw-phone-booth"></i> dw-phone-booth
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-expand1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-expand1');">
																	<i class="icon-copy dw dw-expand1"></i> dw-expand1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bus-stop').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bus-stop');">
																	<i class="icon-copy dw dw-bus-stop"></i> dw-bus-stop
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-turn-right').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-turn-right');">
																	<i class="icon-copy dw dw-turn-right"></i> dw-turn-right
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-street-light').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-street-light');">
																	<i class="icon-copy dw dw-street-light"></i> dw-street-light
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hotel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hotel');">
																	<i class="icon-copy dw dw-hotel"></i> dw-hotel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-obelisk').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-obelisk');">
																	<i class="icon-copy dw dw-obelisk"></i> dw-obelisk
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-electric-tower').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-electric-tower');">
																	<i class="icon-copy dw dw-electric-tower"></i> dw-electric-tower
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-signboard').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-signboard');">
																	<i class="icon-copy dw dw-signboard"></i> dw-signboard
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-traffic-light').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-traffic-light');">
																	<i class="icon-copy dw dw-traffic-light"></i> dw-traffic-light
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hydrant').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hydrant');">
																	<i class="icon-copy dw dw-hydrant"></i> dw-hydrant
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bench').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bench');">
																	<i class="icon-copy dw dw-bench"></i> dw-bench
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-move1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-move1');">
																	<i class="icon-copy dw dw-move1"></i> dw-move1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fountain').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fountain');">
																	<i class="icon-copy dw dw-fountain"></i> dw-fountain
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panels').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panels');">
																	<i class="icon-copy dw dw-panels"></i> dw-panels
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mountain').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mountain');">
																	<i class="icon-copy dw dw-mountain"></i> dw-mountain
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-barn').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-barn');">
																	<i class="icon-copy dw dw-barn"></i> dw-barn
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-desert').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-desert');">
																	<i class="icon-copy dw dw-desert"></i> dw-desert
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-trees').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-trees');">
																	<i class="icon-copy dw dw-trees"></i> dw-trees
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-house-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-house-11');">
																	<i class="icon-copy dw dw-house-11"></i> dw-house-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sun-umbrella').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sun-umbrella');">
																	<i class="icon-copy dw dw-sun-umbrella"></i> dw-sun-umbrella
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-island').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-island');">
																	<i class="icon-copy dw dw-island"></i> dw-island
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-waterfall').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-waterfall');">
																	<i class="icon-copy dw dw-waterfall"></i> dw-waterfall
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-expand-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-expand-11');">
																	<i class="icon-copy dw dw-expand-11"></i> dw-expand-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-windmill').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-windmill');">
																	<i class="icon-copy dw dw-windmill"></i> dw-windmill
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-helm').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-helm');">
																	<i class="icon-copy dw dw-helm"></i> dw-helm
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-anchor').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-anchor');">
																	<i class="icon-copy dw dw-anchor"></i> dw-anchor
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-umbrella1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-umbrella1');">
																	<i class="icon-copy dw dw-umbrella1"></i> dw-umbrella1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-polaroids').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-polaroids');">
																	<i class="icon-copy dw dw-polaroids"></i> dw-polaroids
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-lifesaver').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-lifesaver');">
																	<i class="icon-copy dw dw-lifesaver"></i> dw-lifesaver
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-suitcase1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-suitcase1');">
																	<i class="icon-copy dw dw-suitcase1"></i> dw-suitcase1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-earth-globe').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-earth-globe');">
																	<i class="icon-copy dw dw-earth-globe"></i> dw-earth-globe
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flight1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flight1');">
																	<i class="icon-copy dw dw-flight1"></i> dw-flight1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-heart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-heart');">
																	<i class="icon-copy dw dw-heart"></i> dw-heart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-compress').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-compress');">
																	<i class="icon-copy dw dw-compress"></i> dw-compress
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-download1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-download1');">
																	<i class="icon-copy dw dw-download1"></i> dw-download1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-upload1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-upload1');">
																	<i class="icon-copy dw dw-upload1"></i> dw-upload1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-search2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-search2');">
																	<i class="icon-copy dw dw-search2"></i> dw-search2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image1');">
																	<i class="icon-copy dw dw-image1"></i> dw-image1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-trash1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-trash1');">
																	<i class="icon-copy dw dw-trash1"></i> dw-trash1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-attachment').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-attachment');">
																	<i class="icon-copy dw dw-attachment"></i> dw-attachment
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit2');">
																	<i class="icon-copy dw dw-edit2"></i> dw-edit2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-email1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-email1');">
																	<i class="icon-copy dw dw-email1"></i> dw-email1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-cart1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-cart1');">
																	<i class="icon-copy dw dw-shopping-cart1"></i> dw-shopping-cart1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user1');">
																	<i class="icon-copy dw dw-user1"></i> dw-user1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-curve-arrow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-curve-arrow');">
																	<i class="icon-copy dw dw-curve-arrow"></i> dw-curve-arrow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add-user').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add-user');">
																	<i class="icon-copy dw dw-add-user"></i> dw-add-user
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloud').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloud');">
																	<i class="icon-copy dw dw-cloud"></i> dw-cloud
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bug1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bug1');">
																	<i class="icon-copy dw dw-bug1"></i> dw-bug1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fire').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fire');">
																	<i class="icon-copy dw dw-fire"></i> dw-fire
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-copyright').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-copyright');">
																	<i class="icon-copy dw dw-copyright"></i> dw-copyright
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-star').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-star');">
																	<i class="icon-copy dw dw-star"></i> dw-star
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-star-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-star-1');">
																	<i class="icon-copy dw dw-star-1"></i> dw-star-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notification1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notification1');">
																	<i class="icon-copy dw dw-notification1"></i> dw-notification1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-notification-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-notification-11');">
																	<i class="icon-copy dw dw-notification-11"></i> dw-notification-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-volume').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-volume');">
																	<i class="icon-copy dw dw-volume"></i> dw-volume
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-curve-arrow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-curve-arrow-1');">
																	<i class="icon-copy dw dw-curve-arrow-1"></i> dw-curve-arrow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-list3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-list3');">
																	<i class="icon-copy dw dw-list3"></i> dw-list3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-check').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-check');">
																	<i class="icon-copy dw dw-check"></i> dw-check
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-expand-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-expand-2');">
																	<i class="icon-copy dw dw-expand-2"></i> dw-expand-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-subtitles').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-subtitles');">
																	<i class="icon-copy dw dw-subtitles"></i> dw-subtitles
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paper-plane1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paper-plane1');">
																	<i class="icon-copy dw dw-paper-plane1"></i> dw-paper-plane1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-zoom-in1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-zoom-in1');">
																	<i class="icon-copy dw dw-zoom-in1"></i> dw-zoom-in1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-zoom-out1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-zoom-out1');">
																	<i class="icon-copy dw dw-zoom-out1"></i> dw-zoom-out1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-settings1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-settings1');">
																	<i class="icon-copy dw dw-settings1"></i> dw-settings1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file2');">
																	<i class="icon-copy dw dw-file2"></i> dw-file2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-11');">
																	<i class="icon-copy dw dw-file-11"></i> dw-file-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-curved-arrow1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-curved-arrow1');">
																	<i class="icon-copy dw dw-curved-arrow1"></i> dw-curved-arrow1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add-file1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add-file1');">
																	<i class="icon-copy dw dw-add-file1"></i> dw-add-file1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-21');">
																	<i class="icon-copy dw dw-file-21"></i> dw-file-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-31').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-31');">
																	<i class="icon-copy dw dw-file-31"></i> dw-file-31
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit-file').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit-file');">
																	<i class="icon-copy dw dw-edit-file"></i> dw-edit-file
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-audio-file').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-audio-file');">
																	<i class="icon-copy dw dw-audio-file"></i> dw-audio-file
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image-11');">
																	<i class="icon-copy dw dw-image-11"></i> dw-image-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-file').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-file');">
																	<i class="icon-copy dw dw-video-file"></i> dw-video-file
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-41').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-41');">
																	<i class="icon-copy dw dw-file-41"></i> dw-file-41
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-camera1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-camera1');">
																	<i class="icon-copy dw dw-video-camera1"></i> dw-video-camera1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-camera-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-camera-1');">
																	<i class="icon-copy dw dw-video-camera-1"></i> dw-video-camera-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-curve-arrow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-curve-arrow-2');">
																	<i class="icon-copy dw dw-curve-arrow-2"></i> dw-curve-arrow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-phone-call').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-phone-call');">
																	<i class="icon-copy dw dw-phone-call"></i> dw-phone-call
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-phone-call-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-phone-call-1');">
																	<i class="icon-copy dw dw-phone-call-1"></i> dw-phone-call-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-photo-camera1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-photo-camera1');">
																	<i class="icon-copy dw dw-photo-camera1"></i> dw-photo-camera1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wall-clock1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wall-clock1');">
																	<i class="icon-copy dw dw-wall-clock1"></i> dw-wall-clock1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-refresh1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-refresh1');">
																	<i class="icon-copy dw dw-refresh1"></i> dw-refresh1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-padlock1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-padlock1');">
																	<i class="icon-copy dw dw-padlock1"></i> dw-padlock1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-open-padlock').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-open-padlock');">
																	<i class="icon-copy dw dw-open-padlock"></i> dw-open-padlock
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-price-tag').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-price-tag');">
																	<i class="icon-copy dw dw-price-tag"></i> dw-price-tag
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-inbox1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-inbox1');">
																	<i class="icon-copy dw dw-inbox1"></i> dw-inbox1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-outbox1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-outbox1');">
																	<i class="icon-copy dw dw-outbox1"></i> dw-outbox1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-chevron').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-chevron');">
																	<i class="icon-copy dw dw-down-chevron"></i> dw-down-chevron
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cancel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cancel');">
																	<i class="icon-copy dw dw-cancel"></i> dw-cancel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-warning').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-warning');">
																	<i class="icon-copy dw dw-warning"></i> dw-warning
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-question').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-question');">
																	<i class="icon-copy dw dw-question"></i> dw-question
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat3');">
																	<i class="icon-copy dw dw-chat3"></i> dw-chat3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar1');">
																	<i class="icon-copy dw dw-calendar1"></i> dw-calendar1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder1');">
																	<i class="icon-copy dw dw-folder1"></i> dw-folder1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-like').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-like');">
																	<i class="icon-copy dw dw-like"></i> dw-like
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-thumb-down').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-thumb-down');">
																	<i class="icon-copy dw dw-thumb-down"></i> dw-thumb-down
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-filter1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-filter1');">
																	<i class="icon-copy dw dw-filter1"></i> dw-filter1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-worldwide').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-worldwide');">
																	<i class="icon-copy dw dw-worldwide"></i> dw-worldwide
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-chevron').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-chevron');">
																	<i class="icon-copy dw dw-up-chevron"></i> dw-up-chevron
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-smartphone1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-smartphone1');">
																	<i class="icon-copy dw dw-smartphone1"></i> dw-smartphone1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tablet').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tablet');">
																	<i class="icon-copy dw dw-tablet"></i> dw-tablet
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-personal-computer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-personal-computer');">
																	<i class="icon-copy dw dw-personal-computer"></i> dw-personal-computer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diskette1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diskette1');">
																	<i class="icon-copy dw dw-diskette1"></i> dw-diskette1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-logout').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-logout');">
																	<i class="icon-copy dw dw-logout"></i> dw-logout
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-menu').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-menu');">
																	<i class="icon-copy dw dw-menu"></i> dw-menu
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-menu-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-menu-1');">
																	<i class="icon-copy dw dw-menu-1"></i> dw-menu-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-menu-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-menu-2');">
																	<i class="icon-copy dw dw-menu-2"></i> dw-menu-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-credit-card').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-credit-card');">
																	<i class="icon-copy dw dw-credit-card"></i> dw-credit-card
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-eye').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-eye');">
																	<i class="icon-copy dw dw-eye"></i> dw-eye
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-chevron').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-chevron');">
																	<i class="icon-copy dw dw-left-chevron"></i> dw-left-chevron
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hide').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hide');">
																	<i class="icon-copy dw dw-hide"></i> dw-hide
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-crown1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-crown1');">
																	<i class="icon-copy dw dw-crown1"></i> dw-crown1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paint-palette').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paint-palette');">
																	<i class="icon-copy dw dw-paint-palette"></i> dw-paint-palette
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-undo1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-undo1');">
																	<i class="icon-copy dw dw-undo1"></i> dw-undo1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-redo1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-redo1');">
																	<i class="icon-copy dw dw-redo1"></i> dw-redo1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-opacity').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-opacity');">
																	<i class="icon-copy dw dw-opacity"></i> dw-opacity
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-copy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-copy');">
																	<i class="icon-copy dw dw-copy"></i> dw-copy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-layers').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-layers');">
																	<i class="icon-copy dw dw-layers"></i> dw-layers
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sheet').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sheet');">
																	<i class="icon-copy dw dw-sheet"></i> dw-sheet
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shield').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shield');">
																	<i class="icon-copy dw dw-shield"></i> dw-shield
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-chevron').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-chevron');">
																	<i class="icon-copy dw dw-right-chevron"></i> dw-right-chevron
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-quotation').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-quotation');">
																	<i class="icon-copy dw dw-quotation"></i> dw-quotation
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cookie').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cookie');">
																	<i class="icon-copy dw dw-cookie"></i> dw-cookie
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link3');">
																	<i class="icon-copy dw dw-link3"></i> dw-link3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-book1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-book1');">
																	<i class="icon-copy dw dw-book1"></i> dw-book1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coupon').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coupon');">
																	<i class="icon-copy dw dw-coupon"></i> dw-coupon
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor1');">
																	<i class="icon-copy dw dw-cursor1"></i> dw-cursor1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor-11');">
																	<i class="icon-copy dw dw-cursor-11"></i> dw-cursor-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-suitcase-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-suitcase-11');">
																	<i class="icon-copy dw dw-suitcase-11"></i> dw-suitcase-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-group').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-group');">
																	<i class="icon-copy dw dw-group"></i> dw-group
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-conference').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-conference');">
																	<i class="icon-copy dw dw-conference"></i> dw-conference
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-chevron-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-chevron-1');">
																	<i class="icon-copy dw dw-down-chevron-1"></i> dw-down-chevron-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-deal').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-deal');">
																	<i class="icon-copy dw dw-deal"></i> dw-deal
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-id-card1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-id-card1');">
																	<i class="icon-copy dw dw-id-card1"></i> dw-id-card1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-human-resources').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-human-resources');">
																	<i class="icon-copy dw dw-human-resources"></i> dw-human-resources
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-goal').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-goal');">
																	<i class="icon-copy dw dw-goal"></i> dw-goal
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-meeting').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-meeting');">
																	<i class="icon-copy dw dw-meeting"></i> dw-meeting
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-elderly').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-elderly');">
																	<i class="icon-copy dw dw-elderly"></i> dw-elderly
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-insurance').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-insurance');">
																	<i class="icon-copy dw dw-insurance"></i> dw-insurance
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user-11');">
																	<i class="icon-copy dw dw-user-11"></i> dw-user-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-time-management').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-time-management');">
																	<i class="icon-copy dw dw-time-management"></i> dw-time-management
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-strategy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-strategy');">
																	<i class="icon-copy dw dw-strategy"></i> dw-strategy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-up-chevron-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-up-chevron-1');">
																	<i class="icon-copy dw dw-up-chevron-1"></i> dw-up-chevron-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-workflow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-workflow');">
																	<i class="icon-copy dw dw-workflow"></i> dw-workflow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pyramid-chart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pyramid-chart');">
																	<i class="icon-copy dw dw-pyramid-chart"></i> dw-pyramid-chart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-profits').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-profits');">
																	<i class="icon-copy dw dw-profits"></i> dw-profits
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-loss').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-loss');">
																	<i class="icon-copy dw dw-loss"></i> dw-loss
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bar-chart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bar-chart');">
																	<i class="icon-copy dw dw-bar-chart"></i> dw-bar-chart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-profits-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-profits-1');">
																	<i class="icon-copy dw dw-profits-1"></i> dw-profits-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-loss-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-loss-1');">
																	<i class="icon-copy dw dw-loss-1"></i> dw-loss-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pie-chart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pie-chart');">
																	<i class="icon-copy dw dw-pie-chart"></i> dw-pie-chart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bar-chart-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bar-chart-1');">
																	<i class="icon-copy dw dw-bar-chart-1"></i> dw-bar-chart-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-agenda1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-agenda1');">
																	<i class="icon-copy dw dw-agenda1"></i> dw-agenda1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-left-chevron-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-left-chevron-1');">
																	<i class="icon-copy dw dw-left-chevron-1"></i> dw-left-chevron-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flower').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flower');">
																	<i class="icon-copy dw dw-flower"></i> dw-flower
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pamela').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pamela');">
																	<i class="icon-copy dw dw-pamela"></i> dw-pamela
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-branch').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-branch');">
																	<i class="icon-copy dw dw-branch"></i> dw-branch
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-winter').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-winter');">
																	<i class="icon-copy dw dw-winter"></i> dw-winter
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainy');">
																	<i class="icon-copy dw dw-rainy"></i> dw-rainy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainy-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainy-1');">
																	<i class="icon-copy dw dw-rainy-1"></i> dw-rainy-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainy-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainy-2');">
																	<i class="icon-copy dw dw-rainy-2"></i> dw-rainy-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-umbrella-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-umbrella-1');">
																	<i class="icon-copy dw dw-umbrella-1"></i> dw-umbrella-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloud-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloud-1');">
																	<i class="icon-copy dw dw-cloud-1"></i> dw-cloud-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-clouds').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-clouds');">
																	<i class="icon-copy dw dw-clouds"></i> dw-clouds
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-right-chevron-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-right-chevron-1');">
																	<i class="icon-copy dw dw-right-chevron-1"></i> dw-right-chevron-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloudy-night').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloudy-night');">
																	<i class="icon-copy dw dw-cloudy-night"></i> dw-cloudy-night
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sun').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sun');">
																	<i class="icon-copy dw dw-sun"></i> dw-sun
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-thermometer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-thermometer');">
																	<i class="icon-copy dw dw-thermometer"></i> dw-thermometer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-thermometer-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-thermometer-1');">
																	<i class="icon-copy dw dw-thermometer-1"></i> dw-thermometer-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-thermometer-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-thermometer-2');">
																	<i class="icon-copy dw dw-thermometer-2"></i> dw-thermometer-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-thermometer-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-thermometer-3');">
																	<i class="icon-copy dw dw-thermometer-3"></i> dw-thermometer-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-thermometer-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-thermometer-4');">
																	<i class="icon-copy dw dw-thermometer-4"></i> dw-thermometer-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-drop').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-drop');">
																	<i class="icon-copy dw dw-drop"></i> dw-drop
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-windy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-windy');">
																	<i class="icon-copy dw dw-windy"></i> dw-windy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wind').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wind');">
																	<i class="icon-copy dw dw-wind"></i> dw-wind
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shuffle1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shuffle1');">
																	<i class="icon-copy dw dw-shuffle1"></i> dw-shuffle1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wind-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wind-1');">
																	<i class="icon-copy dw dw-wind-1"></i> dw-wind-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wind-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wind-2');">
																	<i class="icon-copy dw dw-wind-2"></i> dw-wind-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-snow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-snow');">
																	<i class="icon-copy dw dw-snow"></i> dw-snow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-snowflake').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-snowflake');">
																	<i class="icon-copy dw dw-snowflake"></i> dw-snowflake
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-snowflake-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-snowflake-1');">
																	<i class="icon-copy dw dw-snowflake-1"></i> dw-snowflake-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-windy-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-windy-1');">
																	<i class="icon-copy dw dw-windy-1"></i> dw-windy-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hail').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hail');">
																	<i class="icon-copy dw dw-hail"></i> dw-hail
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainbow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainbow');">
																	<i class="icon-copy dw dw-rainbow"></i> dw-rainbow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainbow-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainbow-1');">
																	<i class="icon-copy dw dw-rainbow-1"></i> dw-rainbow-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainbow-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainbow-2');">
																	<i class="icon-copy dw dw-rainbow-2"></i> dw-rainbow-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-recycle').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-recycle');">
																	<i class="icon-copy dw dw-recycle"></i> dw-recycle
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainbow-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainbow-3');">
																	<i class="icon-copy dw dw-rainbow-3"></i> dw-rainbow-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-storm').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-storm');">
																	<i class="icon-copy dw dw-storm"></i> dw-storm
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bolt').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bolt');">
																	<i class="icon-copy dw dw-bolt"></i> dw-bolt
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloudy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloudy');">
																	<i class="icon-copy dw dw-cloudy"></i> dw-cloudy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloudy-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloudy-1');">
																	<i class="icon-copy dw dw-cloudy-1"></i> dw-cloudy-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloudy-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloudy-2');">
																	<i class="icon-copy dw dw-cloudy-2"></i> dw-cloudy-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-eclipse').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-eclipse');">
																	<i class="icon-copy dw dw-eclipse"></i> dw-eclipse
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-moon-phase').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-moon-phase');">
																	<i class="icon-copy dw dw-moon-phase"></i> dw-moon-phase
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-moon-phase-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-moon-phase-1');">
																	<i class="icon-copy dw dw-moon-phase-1"></i> dw-moon-phase-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-moon-phase-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-moon-phase-2');">
																	<i class="icon-copy dw dw-moon-phase-2"></i> dw-moon-phase-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-split').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-split');">
																	<i class="icon-copy dw dw-split"></i> dw-split
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-moon-phase-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-moon-phase-3');">
																	<i class="icon-copy dw dw-moon-phase-3"></i> dw-moon-phase-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-moon-phase-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-moon-phase-4');">
																	<i class="icon-copy dw dw-moon-phase-4"></i> dw-moon-phase-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-moon-phase-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-moon-phase-5');">
																	<i class="icon-copy dw dw-moon-phase-5"></i> dw-moon-phase-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-half-moon').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-half-moon');">
																	<i class="icon-copy dw dw-half-moon"></i> dw-half-moon
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hurricane').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hurricane');">
																	<i class="icon-copy dw dw-hurricane"></i> dw-hurricane
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-foggy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-foggy');">
																	<i class="icon-copy dw dw-foggy"></i> dw-foggy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-co2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-co2');">
																	<i class="icon-copy dw dw-co2"></i> dw-co2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-humidity').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-humidity');">
																	<i class="icon-copy dw dw-humidity"></i> dw-humidity
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tornado').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tornado');">
																	<i class="icon-copy dw dw-tornado"></i> dw-tornado
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-basketball').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-basketball');">
																	<i class="icon-copy dw dw-basketball"></i> dw-basketball
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-merge').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-merge');">
																	<i class="icon-copy dw dw-merge"></i> dw-merge
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-baseball').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-baseball');">
																	<i class="icon-copy dw dw-baseball"></i> dw-baseball
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-football').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-football');">
																	<i class="icon-copy dw dw-football"></i> dw-football
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-volleyball').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-volleyball');">
																	<i class="icon-copy dw dw-volleyball"></i> dw-volleyball
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rugby-ball').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rugby-ball');">
																	<i class="icon-copy dw dw-rugby-ball"></i> dw-rugby-ball
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tennis').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tennis');">
																	<i class="icon-copy dw dw-tennis"></i> dw-tennis
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bowling').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bowling');">
																	<i class="icon-copy dw dw-bowling"></i> dw-bowling
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ice-skate').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ice-skate');">
																	<i class="icon-copy dw dw-ice-skate"></i> dw-ice-skate
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-roller-skate').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-roller-skate');">
																	<i class="icon-copy dw dw-roller-skate"></i> dw-roller-skate
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-skateboard').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-skateboard');">
																	<i class="icon-copy dw dw-skateboard"></i> dw-skateboard
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-karate').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-karate');">
																	<i class="icon-copy dw dw-karate"></i> dw-karate
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-u-turn').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-u-turn');">
																	<i class="icon-copy dw dw-u-turn"></i> dw-u-turn
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ice-hockey').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ice-hockey');">
																	<i class="icon-copy dw dw-ice-hockey"></i> dw-ice-hockey
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-golf').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-golf');">
																	<i class="icon-copy dw dw-golf"></i> dw-golf
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-boxing').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-boxing');">
																	<i class="icon-copy dw dw-boxing"></i> dw-boxing
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-surfboard').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-surfboard');">
																	<i class="icon-copy dw dw-surfboard"></i> dw-surfboard
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dart').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dart');">
																	<i class="icon-copy dw dw-dart"></i> dw-dart
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-goal-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-goal-1');">
																	<i class="icon-copy dw dw-goal-1"></i> dw-goal-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-badminton').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-badminton');">
																	<i class="icon-copy dw dw-badminton"></i> dw-badminton
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ping-pong').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ping-pong');">
																	<i class="icon-copy dw dw-ping-pong"></i> dw-ping-pong
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-racket').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-racket');">
																	<i class="icon-copy dw dw-racket"></i> dw-racket
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-soccer-field').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-soccer-field');">
																	<i class="icon-copy dw dw-soccer-field"></i> dw-soccer-field
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-split-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-split-1');">
																	<i class="icon-copy dw dw-split-1"></i> dw-split-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-basketball-court').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-basketball-court');">
																	<i class="icon-copy dw dw-basketball-court"></i> dw-basketball-court
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tennis-court').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tennis-court');">
																	<i class="icon-copy dw dw-tennis-court"></i> dw-tennis-court
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-american-football').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-american-football');">
																	<i class="icon-copy dw dw-american-football"></i> dw-american-football
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mountain-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mountain-1');">
																	<i class="icon-copy dw dw-mountain-1"></i> dw-mountain-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mountain-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mountain-2');">
																	<i class="icon-copy dw dw-mountain-2"></i> dw-mountain-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mountain-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mountain-3');">
																	<i class="icon-copy dw dw-mountain-3"></i> dw-mountain-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-night').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-night');">
																	<i class="icon-copy dw dw-night"></i> dw-night
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rainbow-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rainbow-4');">
																	<i class="icon-copy dw dw-rainbow-4"></i> dw-rainbow-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-barn-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-barn-1');">
																	<i class="icon-copy dw dw-barn-1"></i> dw-barn-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-trees-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-trees-1');">
																	<i class="icon-copy dw dw-trees-1"></i> dw-trees-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-split-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-split-2');">
																	<i class="icon-copy dw dw-split-2"></i> dw-split-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-desert-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-desert-1');">
																	<i class="icon-copy dw dw-desert-1"></i> dw-desert-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-road').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-road');">
																	<i class="icon-copy dw dw-road"></i> dw-road
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sunrise').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sunrise');">
																	<i class="icon-copy dw dw-sunrise"></i> dw-sunrise
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sunset').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sunset');">
																	<i class="icon-copy dw dw-sunset"></i> dw-sunset
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-beach-house').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-beach-house');">
																	<i class="icon-copy dw dw-beach-house"></i> dw-beach-house
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sunbed').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sunbed');">
																	<i class="icon-copy dw dw-sunbed"></i> dw-sunbed
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-island-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-island-1');">
																	<i class="icon-copy dw dw-island-1"></i> dw-island-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sailboat-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sailboat-1');">
																	<i class="icon-copy dw dw-sailboat-1"></i> dw-sailboat-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-waterfall-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-waterfall-1');">
																	<i class="icon-copy dw dw-waterfall-1"></i> dw-waterfall-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-windmill-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-windmill-1');">
																	<i class="icon-copy dw dw-windmill-1"></i> dw-windmill-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-triple-arrows').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-triple-arrows');">
																	<i class="icon-copy dw dw-triple-arrows"></i> dw-triple-arrows
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-plant').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-plant');">
																	<i class="icon-copy dw dw-plant"></i> dw-plant
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flower-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flower-1');">
																	<i class="icon-copy dw dw-flower-1"></i> dw-flower-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sprout').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sprout');">
																	<i class="icon-copy dw dw-sprout"></i> dw-sprout
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-plant-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-plant-1');">
																	<i class="icon-copy dw dw-plant-1"></i> dw-plant-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wheat').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wheat');">
																	<i class="icon-copy dw dw-wheat"></i> dw-wheat
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-harvest').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-harvest');">
																	<i class="icon-copy dw dw-harvest"></i> dw-harvest
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rose').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rose');">
																	<i class="icon-copy dw dw-rose"></i> dw-rose
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-poppy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-poppy');">
																	<i class="icon-copy dw dw-poppy"></i> dw-poppy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tulip').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tulip');">
																	<i class="icon-copy dw dw-tulip"></i> dw-tulip
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pinwheel').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pinwheel');">
																	<i class="icon-copy dw dw-pinwheel"></i> dw-pinwheel
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-happy').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-happy');">
																	<i class="icon-copy dw dw-happy"></i> dw-happy
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fruit-tree').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fruit-tree');">
																	<i class="icon-copy dw dw-fruit-tree"></i> dw-fruit-tree
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tree').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tree');">
																	<i class="icon-copy dw dw-tree"></i> dw-tree
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pine').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pine');">
																	<i class="icon-copy dw dw-pine"></i> dw-pine
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pine-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pine-1');">
																	<i class="icon-copy dw dw-pine-1"></i> dw-pine-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-palm-tree').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-palm-tree');">
																	<i class="icon-copy dw dw-palm-tree"></i> dw-palm-tree
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cactus').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cactus');">
																	<i class="icon-copy dw dw-cactus"></i> dw-cactus
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-recycle-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-recycle-1');">
																	<i class="icon-copy dw dw-recycle-1"></i> dw-recycle-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sprout-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sprout-1');">
																	<i class="icon-copy dw dw-sprout-1"></i> dw-sprout-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-save-water').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-save-water');">
																	<i class="icon-copy dw dw-save-water"></i> dw-save-water
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-faucet').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-faucet');">
																	<i class="icon-copy dw dw-faucet"></i> dw-faucet
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sad').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sad');">
																	<i class="icon-copy dw dw-sad"></i> dw-sad
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ecology').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ecology');">
																	<i class="icon-copy dw dw-ecology"></i> dw-ecology
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cat').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cat');">
																	<i class="icon-copy dw dw-cat"></i> dw-cat
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dog').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dog');">
																	<i class="icon-copy dw dw-dog"></i> dw-dog
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-horse').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-horse');">
																	<i class="icon-copy dw dw-horse"></i> dw-horse
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bird').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bird');">
																	<i class="icon-copy dw dw-bird"></i> dw-bird
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rabbit').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rabbit');">
																	<i class="icon-copy dw dw-rabbit"></i> dw-rabbit
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-butterfly').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-butterfly');">
																	<i class="icon-copy dw dw-butterfly"></i> dw-butterfly
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-deer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-deer');">
																	<i class="icon-copy dw dw-deer"></i> dw-deer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sheep').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sheep');">
																	<i class="icon-copy dw dw-sheep"></i> dw-sheep
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-monkey').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-monkey');">
																	<i class="icon-copy dw dw-monkey"></i> dw-monkey
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-meh').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-meh');">
																	<i class="icon-copy dw dw-meh"></i> dw-meh
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-burger').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-burger');">
																	<i class="icon-copy dw dw-burger"></i> dw-burger
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pizza').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pizza');">
																	<i class="icon-copy dw dw-pizza"></i> dw-pizza
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sandwich').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sandwich');">
																	<i class="icon-copy dw dw-sandwich"></i> dw-sandwich
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hot-dog').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hot-dog');">
																	<i class="icon-copy dw dw-hot-dog"></i> dw-hot-dog
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chicken-leg').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chicken-leg');">
																	<i class="icon-copy dw dw-chicken-leg"></i> dw-chicken-leg
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-french-fries').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-french-fries');">
																	<i class="icon-copy dw dw-french-fries"></i> dw-french-fries
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tomato').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tomato');">
																	<i class="icon-copy dw dw-tomato"></i> dw-tomato
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-onion').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-onion');">
																	<i class="icon-copy dw dw-onion"></i> dw-onion
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bell-pepper').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bell-pepper');">
																	<i class="icon-copy dw dw-bell-pepper"></i> dw-bell-pepper
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cabbage').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cabbage');">
																	<i class="icon-copy dw dw-cabbage"></i> dw-cabbage
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-support').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-support');">
																	<i class="icon-copy dw dw-support"></i> dw-support
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-corn').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-corn');">
																	<i class="icon-copy dw dw-corn"></i> dw-corn
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pumpkin').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pumpkin');">
																	<i class="icon-copy dw dw-pumpkin"></i> dw-pumpkin
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-eggplant').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-eggplant');">
																	<i class="icon-copy dw dw-eggplant"></i> dw-eggplant
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-carrot').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-carrot');">
																	<i class="icon-copy dw dw-carrot"></i> dw-carrot
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-broccoli').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-broccoli');">
																	<i class="icon-copy dw dw-broccoli"></i> dw-broccoli
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-avocado').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-avocado');">
																	<i class="icon-copy dw dw-avocado"></i> dw-avocado
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pear').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pear');">
																	<i class="icon-copy dw dw-pear"></i> dw-pear
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-strawberry').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-strawberry');">
																	<i class="icon-copy dw dw-strawberry"></i> dw-strawberry
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pineapple').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pineapple');">
																	<i class="icon-copy dw dw-pineapple"></i> dw-pineapple
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-orange').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-orange');">
																	<i class="icon-copy dw dw-orange"></i> dw-orange
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-support-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-support-1');">
																	<i class="icon-copy dw dw-support-1"></i> dw-support-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-banana').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-banana');">
																	<i class="icon-copy dw dw-banana"></i> dw-banana
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-watermelon').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-watermelon');">
																	<i class="icon-copy dw dw-watermelon"></i> dw-watermelon
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-grapes').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-grapes');">
																	<i class="icon-copy dw dw-grapes"></i> dw-grapes
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cherry').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cherry');">
																	<i class="icon-copy dw dw-cherry"></i> dw-cherry
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bread').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bread');">
																	<i class="icon-copy dw dw-bread"></i> dw-bread
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-steak').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-steak');">
																	<i class="icon-copy dw dw-steak"></i> dw-steak
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cheese').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cheese');">
																	<i class="icon-copy dw dw-cheese"></i> dw-cheese
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fried-egg').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fried-egg');">
																	<i class="icon-copy dw dw-fried-egg"></i> dw-fried-egg
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-soup').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-soup');">
																	<i class="icon-copy dw dw-soup"></i> dw-soup
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-salad').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-salad');">
																	<i class="icon-copy dw dw-salad"></i> dw-salad
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-information').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-information');">
																	<i class="icon-copy dw dw-information"></i> dw-information
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fish').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fish');">
																	<i class="icon-copy dw dw-fish"></i> dw-fish
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shrimp').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shrimp');">
																	<i class="icon-copy dw dw-shrimp"></i> dw-shrimp
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-crab').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-crab');">
																	<i class="icon-copy dw dw-crab"></i> dw-crab
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cake').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cake');">
																	<i class="icon-copy dw dw-cake"></i> dw-cake
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-muffin').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-muffin');">
																	<i class="icon-copy dw dw-muffin"></i> dw-muffin
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pancakes').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pancakes');">
																	<i class="icon-copy dw dw-pancakes"></i> dw-pancakes
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-water').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-water');">
																	<i class="icon-copy dw dw-water"></i> dw-water
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-milk').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-milk');">
																	<i class="icon-copy dw dw-milk"></i> dw-milk
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-soda').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-soda');">
																	<i class="icon-copy dw dw-soda"></i> dw-soda
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wine').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wine');">
																	<i class="icon-copy dw dw-wine"></i> dw-wine
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-question-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-question-1');">
																	<i class="icon-copy dw dw-question-1"></i> dw-question-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-energy-drink').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-energy-drink');">
																	<i class="icon-copy dw dw-energy-drink"></i> dw-energy-drink
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tea-cup').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tea-cup');">
																	<i class="icon-copy dw dw-tea-cup"></i> dw-tea-cup
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-coffee-cup-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-coffee-cup-1');">
																	<i class="icon-copy dw dw-coffee-cup-1"></i> dw-coffee-cup-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-beer').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-beer');">
																	<i class="icon-copy dw dw-beer"></i> dw-beer
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-warning-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-warning-1');">
																	<i class="icon-copy dw dw-warning-1"></i> dw-warning-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-11');">
																	<i class="icon-copy dw dw-chat-11"></i> dw-chat-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar-11');">
																	<i class="icon-copy dw dw-calendar-11"></i> dw-calendar-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-help').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-help');">
																	<i class="icon-copy dw dw-help"></i> dw-help
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cone').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cone');">
																	<i class="icon-copy dw dw-cone"></i> dw-cone
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-counterclockwise').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-counterclockwise');">
																	<i class="icon-copy dw dw-counterclockwise"></i> dw-counterclockwise
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-headphones').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-headphones');">
																	<i class="icon-copy dw dw-headphones"></i> dw-headphones
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-key1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-key1');">
																	<i class="icon-copy dw dw-key1"></i> dw-key1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-server').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-server');">
																	<i class="icon-copy dw dw-server"></i> dw-server
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-24-hours').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-24-hours');">
																	<i class="icon-copy dw dw-24-hours"></i> dw-24-hours
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-target1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-target1');">
																	<i class="icon-copy dw dw-target1"></i> dw-target1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-target-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-target-1');">
																	<i class="icon-copy dw dw-target-1"></i> dw-target-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-target-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-target-2');">
																	<i class="icon-copy dw dw-target-2"></i> dw-target-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin2');">
																	<i class="icon-copy dw dw-pin2"></i> dw-pin2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-11');">
																	<i class="icon-copy dw dw-pin-11"></i> dw-pin-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-21');">
																	<i class="icon-copy dw dw-pin-21"></i> dw-pin-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-31').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-31');">
																	<i class="icon-copy dw dw-pin-31"></i> dw-pin-31
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-4');">
																	<i class="icon-copy dw dw-pin-4"></i> dw-pin-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-5');">
																	<i class="icon-copy dw dw-pin-5"></i> dw-pin-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flag1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flag1');">
																	<i class="icon-copy dw dw-flag1"></i> dw-flag1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-6');">
																	<i class="icon-copy dw dw-pin-6"></i> dw-pin-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-7');">
																	<i class="icon-copy dw dw-pin-7"></i> dw-pin-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-finger').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-finger');">
																	<i class="icon-copy dw dw-finger"></i> dw-finger
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-position').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-position');">
																	<i class="icon-copy dw dw-position"></i> dw-position
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-position-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-position-1');">
																	<i class="icon-copy dw dw-position-1"></i> dw-position-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-compass1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-compass1');">
																	<i class="icon-copy dw dw-compass1"></i> dw-compass1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wind-rose').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wind-rose');">
																	<i class="icon-copy dw dw-wind-rose"></i> dw-wind-rose
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor-2');">
																	<i class="icon-copy dw dw-cursor-2"></i> dw-cursor-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-route1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-route1');">
																	<i class="icon-copy dw dw-route1"></i> dw-route1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-distance').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-distance');">
																	<i class="icon-copy dw dw-distance"></i> dw-distance
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pin-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pin-8');">
																	<i class="icon-copy dw dw-pin-8"></i> dw-pin-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-worldwide-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-worldwide-1');">
																	<i class="icon-copy dw dw-worldwide-1"></i> dw-worldwide-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-internet').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-internet');">
																	<i class="icon-copy dw dw-internet"></i> dw-internet
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-internet-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-internet-1');">
																	<i class="icon-copy dw dw-internet-1"></i> dw-internet-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-internet-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-internet-2');">
																	<i class="icon-copy dw dw-internet-2"></i> dw-internet-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map1');">
																	<i class="icon-copy dw dw-map1"></i> dw-map1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-11');">
																	<i class="icon-copy dw dw-map-11"></i> dw-map-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-2');">
																	<i class="icon-copy dw dw-map-2"></i> dw-map-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-3');">
																	<i class="icon-copy dw dw-map-3"></i> dw-map-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-4');">
																	<i class="icon-copy dw dw-map-4"></i> dw-map-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-5');">
																	<i class="icon-copy dw dw-map-5"></i> dw-map-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-6');">
																	<i class="icon-copy dw dw-map-6"></i> dw-map-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-7');">
																	<i class="icon-copy dw dw-map-7"></i> dw-map-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-panel6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-panel6');">
																	<i class="icon-copy dw dw-panel6"></i> dw-panel6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bookmark1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bookmark1');">
																	<i class="icon-copy dw dw-bookmark1"></i> dw-bookmark1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wifi1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wifi1');">
																	<i class="icon-copy dw dw-wifi1"></i> dw-wifi1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-car').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-car');">
																	<i class="icon-copy dw dw-car"></i> dw-car
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-taxi').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-taxi');">
																	<i class="icon-copy dw dw-taxi"></i> dw-taxi
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flight-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flight-11');">
																	<i class="icon-copy dw dw-flight-11"></i> dw-flight-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-boat').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-boat');">
																	<i class="icon-copy dw dw-boat"></i> dw-boat
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-rocket').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-rocket');">
																	<i class="icon-copy dw dw-rocket"></i> dw-rocket
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-metro').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-metro');">
																	<i class="icon-copy dw dw-metro"></i> dw-metro
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-train1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-train1');">
																	<i class="icon-copy dw dw-train1"></i> dw-train1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tram').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tram');">
																	<i class="icon-copy dw dw-tram"></i> dw-tram
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-motorcycle').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-motorcycle');">
																	<i class="icon-copy dw dw-motorcycle"></i> dw-motorcycle
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bicycle').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bicycle');">
																	<i class="icon-copy dw dw-bicycle"></i> dw-bicycle
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add-file2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add-file2');">
																	<i class="icon-copy dw dw-add-file2"></i> dw-add-file2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add-file-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add-file-1');">
																	<i class="icon-copy dw dw-add-file-1"></i> dw-add-file-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder2');">
																	<i class="icon-copy dw dw-folder2"></i> dw-folder2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-1');">
																	<i class="icon-copy dw dw-folder-1"></i> dw-folder-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-2');">
																	<i class="icon-copy dw dw-folder-2"></i> dw-folder-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add-file-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add-file-2');">
																	<i class="icon-copy dw dw-add-file-2"></i> dw-add-file-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file3');">
																	<i class="icon-copy dw dw-file3"></i> dw-file3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-12');">
																	<i class="icon-copy dw dw-file-12"></i> dw-file-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-3');">
																	<i class="icon-copy dw dw-folder-3"></i> dw-folder-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-4');">
																	<i class="icon-copy dw dw-folder-4"></i> dw-folder-4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-5');">
																	<i class="icon-copy dw dw-folder-5"></i> dw-folder-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-22').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-22');">
																	<i class="icon-copy dw dw-file-22"></i> dw-file-22
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-32').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-32');">
																	<i class="icon-copy dw dw-file-32"></i> dw-file-32
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-42').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-42');">
																	<i class="icon-copy dw dw-file-42"></i> dw-file-42
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-6');">
																	<i class="icon-copy dw dw-folder-6"></i> dw-folder-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-7');">
																	<i class="icon-copy dw dw-folder-7"></i> dw-folder-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-8');">
																	<i class="icon-copy dw dw-folder-8"></i> dw-folder-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-5').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-5');">
																	<i class="icon-copy dw dw-file-5"></i> dw-file-5
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-6').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-6');">
																	<i class="icon-copy dw dw-file-6"></i> dw-file-6
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-7').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-7');">
																	<i class="icon-copy dw dw-file-7"></i> dw-file-7
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-9').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-9');">
																	<i class="icon-copy dw dw-folder-9"></i> dw-folder-9
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-10').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-10');">
																	<i class="icon-copy dw dw-folder-10"></i> dw-folder-10
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-11');">
																	<i class="icon-copy dw dw-folder-11"></i> dw-folder-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-8').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-8');">
																	<i class="icon-copy dw dw-file-8"></i> dw-file-8
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-9').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-9');">
																	<i class="icon-copy dw dw-file-9"></i> dw-file-9
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-10').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-10');">
																	<i class="icon-copy dw dw-file-10"></i> dw-file-10
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-12');">
																	<i class="icon-copy dw dw-folder-12"></i> dw-folder-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-13').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-13');">
																	<i class="icon-copy dw dw-folder-13"></i> dw-folder-13
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-14').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-14');">
																	<i class="icon-copy dw dw-folder-14"></i> dw-folder-14
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-111').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-111');">
																	<i class="icon-copy dw dw-file-111"></i> dw-file-111
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics');">
																	<i class="icon-copy dw dw-analytics"></i> dw-analytics
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-1');">
																	<i class="icon-copy dw dw-analytics-1"></i> dw-analytics-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-15').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-15');">
																	<i class="icon-copy dw dw-folder-15"></i> dw-folder-15
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-16').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-16');">
																	<i class="icon-copy dw dw-folder-16"></i> dw-folder-16
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-17').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-17');">
																	<i class="icon-copy dw dw-folder-17"></i> dw-folder-17
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-analytics-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-analytics-2');">
																	<i class="icon-copy dw dw-analytics-2"></i> dw-analytics-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-121').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-121');">
																	<i class="icon-copy dw dw-file-121"></i> dw-file-121
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-13').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-13');">
																	<i class="icon-copy dw dw-file-13"></i> dw-file-13
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-18').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-18');">
																	<i class="icon-copy dw dw-folder-18"></i> dw-folder-18
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-19').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-19');">
																	<i class="icon-copy dw dw-folder-19"></i> dw-folder-19
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-20').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-20');">
																	<i class="icon-copy dw dw-folder-20"></i> dw-folder-20
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-14').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-14');">
																	<i class="icon-copy dw dw-file-14"></i> dw-file-14
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-15').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-15');">
																	<i class="icon-copy dw dw-file-15"></i> dw-file-15
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-16').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-16');">
																	<i class="icon-copy dw dw-file-16"></i> dw-file-16
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-21');">
																	<i class="icon-copy dw dw-folder-21"></i> dw-folder-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-22').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-22');">
																	<i class="icon-copy dw dw-folder-22"></i> dw-folder-22
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-23').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-23');">
																	<i class="icon-copy dw dw-folder-23"></i> dw-folder-23
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-17').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-17');">
																	<i class="icon-copy dw dw-file-17"></i> dw-file-17
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-18').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-18');">
																	<i class="icon-copy dw dw-file-18"></i> dw-file-18
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-19').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-19');">
																	<i class="icon-copy dw dw-file-19"></i> dw-file-19
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-24').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-24');">
																	<i class="icon-copy dw dw-folder-24"></i> dw-folder-24
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-25').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-25');">
																	<i class="icon-copy dw dw-folder-25"></i> dw-folder-25
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-26').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-26');">
																	<i class="icon-copy dw dw-folder-26"></i> dw-folder-26
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-20').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-20');">
																	<i class="icon-copy dw dw-file-20"></i> dw-file-20
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-211').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-211');">
																	<i class="icon-copy dw dw-file-211"></i> dw-file-211
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-221').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-221');">
																	<i class="icon-copy dw dw-file-221"></i> dw-file-221
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-27').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-27');">
																	<i class="icon-copy dw dw-folder-27"></i> dw-folder-27
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-28').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-28');">
																	<i class="icon-copy dw dw-folder-28"></i> dw-folder-28
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-29').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-29');">
																	<i class="icon-copy dw dw-folder-29"></i> dw-folder-29
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-23').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-23');">
																	<i class="icon-copy dw dw-file-23"></i> dw-file-23
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-24').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-24');">
																	<i class="icon-copy dw dw-file-24"></i> dw-file-24
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-25').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-25');">
																	<i class="icon-copy dw dw-file-25"></i> dw-file-25
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-30').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-30');">
																	<i class="icon-copy dw dw-folder-30"></i> dw-folder-30
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-31').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-31');">
																	<i class="icon-copy dw dw-folder-31"></i> dw-folder-31
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-32').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-32');">
																	<i class="icon-copy dw dw-folder-32"></i> dw-folder-32
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-26').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-26');">
																	<i class="icon-copy dw dw-file-26"></i> dw-file-26
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-27').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-27');">
																	<i class="icon-copy dw dw-file-27"></i> dw-file-27
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-28').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-28');">
																	<i class="icon-copy dw dw-file-28"></i> dw-file-28
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-33').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-33');">
																	<i class="icon-copy dw dw-folder-33"></i> dw-folder-33
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-34').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-34');">
																	<i class="icon-copy dw dw-folder-34"></i> dw-folder-34
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-35').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-35');">
																	<i class="icon-copy dw dw-folder-35"></i> dw-folder-35
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-29').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-29');">
																	<i class="icon-copy dw dw-file-29"></i> dw-file-29
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-30').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-30');">
																	<i class="icon-copy dw dw-file-30"></i> dw-file-30
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-311').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-311');">
																	<i class="icon-copy dw dw-file-311"></i> dw-file-311
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-36').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-36');">
																	<i class="icon-copy dw dw-folder-36"></i> dw-folder-36
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-37').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-37');">
																	<i class="icon-copy dw dw-folder-37"></i> dw-folder-37
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-38').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-38');">
																	<i class="icon-copy dw dw-folder-38"></i> dw-folder-38
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-321').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-321');">
																	<i class="icon-copy dw dw-file-321"></i> dw-file-321
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-33').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-33');">
																	<i class="icon-copy dw dw-file-33"></i> dw-file-33
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-34').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-34');">
																	<i class="icon-copy dw dw-file-34"></i> dw-file-34
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-39').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-39');">
																	<i class="icon-copy dw dw-folder-39"></i> dw-folder-39
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-40').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-40');">
																	<i class="icon-copy dw dw-folder-40"></i> dw-folder-40
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-41').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-41');">
																	<i class="icon-copy dw dw-folder-41"></i> dw-folder-41
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-35').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-35');">
																	<i class="icon-copy dw dw-file-35"></i> dw-file-35
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-36').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-36');">
																	<i class="icon-copy dw dw-file-36"></i> dw-file-36
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-37').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-37');">
																	<i class="icon-copy dw dw-file-37"></i> dw-file-37
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-42').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-42');">
																	<i class="icon-copy dw dw-folder-42"></i> dw-folder-42
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-43').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-43');">
																	<i class="icon-copy dw dw-folder-43"></i> dw-folder-43
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-44').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-44');">
																	<i class="icon-copy dw dw-folder-44"></i> dw-folder-44
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-38').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-38');">
																	<i class="icon-copy dw dw-file-38"></i> dw-file-38
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-39').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-39');">
																	<i class="icon-copy dw dw-file-39"></i> dw-file-39
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-40').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-40');">
																	<i class="icon-copy dw dw-file-40"></i> dw-file-40
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-45').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-45');">
																	<i class="icon-copy dw dw-folder-45"></i> dw-folder-45
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-46').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-46');">
																	<i class="icon-copy dw dw-folder-46"></i> dw-folder-46
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-47').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-47');">
																	<i class="icon-copy dw dw-folder-47"></i> dw-folder-47
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-411').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-411');">
																	<i class="icon-copy dw dw-file-411"></i> dw-file-411
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-421').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-421');">
																	<i class="icon-copy dw dw-file-421"></i> dw-file-421
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-43').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-43');">
																	<i class="icon-copy dw dw-file-43"></i> dw-file-43
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-48').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-48');">
																	<i class="icon-copy dw dw-folder-48"></i> dw-folder-48
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-49').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-49');">
																	<i class="icon-copy dw dw-folder-49"></i> dw-folder-49
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-50').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-50');">
																	<i class="icon-copy dw dw-folder-50"></i> dw-folder-50
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-44').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-44');">
																	<i class="icon-copy dw dw-file-44"></i> dw-file-44
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-45').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-45');">
																	<i class="icon-copy dw dw-file-45"></i> dw-file-45
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-46').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-46');">
																	<i class="icon-copy dw dw-file-46"></i> dw-file-46
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-51').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-51');">
																	<i class="icon-copy dw dw-folder-51"></i> dw-folder-51
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-52').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-52');">
																	<i class="icon-copy dw dw-folder-52"></i> dw-folder-52
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-53').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-53');">
																	<i class="icon-copy dw dw-folder-53"></i> dw-folder-53
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-47').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-47');">
																	<i class="icon-copy dw dw-file-47"></i> dw-file-47
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-48').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-48');">
																	<i class="icon-copy dw dw-file-48"></i> dw-file-48
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-49').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-49');">
																	<i class="icon-copy dw dw-file-49"></i> dw-file-49
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-54').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-54');">
																	<i class="icon-copy dw dw-folder-54"></i> dw-folder-54
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-55').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-55');">
																	<i class="icon-copy dw dw-folder-55"></i> dw-folder-55
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-56').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-56');">
																	<i class="icon-copy dw dw-folder-56"></i> dw-folder-56
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-50').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-50');">
																	<i class="icon-copy dw dw-file-50"></i> dw-file-50
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-51').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-51');">
																	<i class="icon-copy dw dw-file-51"></i> dw-file-51
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-52').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-52');">
																	<i class="icon-copy dw dw-file-52"></i> dw-file-52
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-57').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-57');">
																	<i class="icon-copy dw dw-folder-57"></i> dw-folder-57
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-58').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-58');">
																	<i class="icon-copy dw dw-folder-58"></i> dw-folder-58
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-59').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-59');">
																	<i class="icon-copy dw dw-folder-59"></i> dw-folder-59
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-53').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-53');">
																	<i class="icon-copy dw dw-file-53"></i> dw-file-53
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-60').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-60');">
																	<i class="icon-copy dw dw-folder-60"></i> dw-folder-60
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-54').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-54');">
																	<i class="icon-copy dw dw-file-54"></i> dw-file-54
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-55').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-55');">
																	<i class="icon-copy dw dw-file-55"></i> dw-file-55
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-61').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-61');">
																	<i class="icon-copy dw dw-folder-61"></i> dw-folder-61
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-62').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-62');">
																	<i class="icon-copy dw dw-folder-62"></i> dw-folder-62
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-63').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-63');">
																	<i class="icon-copy dw dw-folder-63"></i> dw-folder-63
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-56').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-56');">
																	<i class="icon-copy dw dw-file-56"></i> dw-file-56
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-57').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-57');">
																	<i class="icon-copy dw dw-file-57"></i> dw-file-57
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-58').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-58');">
																	<i class="icon-copy dw dw-file-58"></i> dw-file-58
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-64').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-64');">
																	<i class="icon-copy dw dw-folder-64"></i> dw-folder-64
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-65').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-65');">
																	<i class="icon-copy dw dw-folder-65"></i> dw-folder-65
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-66').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-66');">
																	<i class="icon-copy dw dw-folder-66"></i> dw-folder-66
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-59').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-59');">
																	<i class="icon-copy dw dw-file-59"></i> dw-file-59
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-60').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-60');">
																	<i class="icon-copy dw dw-file-60"></i> dw-file-60
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-61').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-61');">
																	<i class="icon-copy dw dw-file-61"></i> dw-file-61
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-67').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-67');">
																	<i class="icon-copy dw dw-folder-67"></i> dw-folder-67
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-68').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-68');">
																	<i class="icon-copy dw dw-folder-68"></i> dw-folder-68
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-69').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-69');">
																	<i class="icon-copy dw dw-folder-69"></i> dw-folder-69
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-62').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-62');">
																	<i class="icon-copy dw dw-file-62"></i> dw-file-62
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-63').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-63');">
																	<i class="icon-copy dw dw-file-63"></i> dw-file-63
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-64').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-64');">
																	<i class="icon-copy dw dw-file-64"></i> dw-file-64
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-70').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-70');">
																	<i class="icon-copy dw dw-folder-70"></i> dw-folder-70
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-71').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-71');">
																	<i class="icon-copy dw dw-folder-71"></i> dw-folder-71
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-72').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-72');">
																	<i class="icon-copy dw dw-folder-72"></i> dw-folder-72
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-65').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-65');">
																	<i class="icon-copy dw dw-file-65"></i> dw-file-65
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-66').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-66');">
																	<i class="icon-copy dw dw-file-66"></i> dw-file-66
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-67').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-67');">
																	<i class="icon-copy dw dw-file-67"></i> dw-file-67
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-73').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-73');">
																	<i class="icon-copy dw dw-folder-73"></i> dw-folder-73
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-74').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-74');">
																	<i class="icon-copy dw dw-folder-74"></i> dw-folder-74
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-75').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-75');">
																	<i class="icon-copy dw dw-folder-75"></i> dw-folder-75
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-68').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-68');">
																	<i class="icon-copy dw dw-file-68"></i> dw-file-68
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-69').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-69');">
																	<i class="icon-copy dw dw-file-69"></i> dw-file-69
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-70').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-70');">
																	<i class="icon-copy dw dw-file-70"></i> dw-file-70
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-76').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-76');">
																	<i class="icon-copy dw dw-folder-76"></i> dw-folder-76
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-77').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-77');">
																	<i class="icon-copy dw dw-folder-77"></i> dw-folder-77
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-78').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-78');">
																	<i class="icon-copy dw dw-folder-78"></i> dw-folder-78
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-71').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-71');">
																	<i class="icon-copy dw dw-file-71"></i> dw-file-71
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-72').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-72');">
																	<i class="icon-copy dw dw-file-72"></i> dw-file-72
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-73').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-73');">
																	<i class="icon-copy dw dw-file-73"></i> dw-file-73
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-79').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-79');">
																	<i class="icon-copy dw dw-folder-79"></i> dw-folder-79
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-80').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-80');">
																	<i class="icon-copy dw dw-folder-80"></i> dw-folder-80
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-81').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-81');">
																	<i class="icon-copy dw dw-folder-81"></i> dw-folder-81
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-74').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-74');">
																	<i class="icon-copy dw dw-file-74"></i> dw-file-74
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-75').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-75');">
																	<i class="icon-copy dw dw-file-75"></i> dw-file-75
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-76').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-76');">
																	<i class="icon-copy dw dw-file-76"></i> dw-file-76
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-82').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-82');">
																	<i class="icon-copy dw dw-folder-82"></i> dw-folder-82
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-83').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-83');">
																	<i class="icon-copy dw dw-folder-83"></i> dw-folder-83
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-77').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-77');">
																	<i class="icon-copy dw dw-file-77"></i> dw-file-77
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-78').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-78');">
																	<i class="icon-copy dw dw-file-78"></i> dw-file-78
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-79').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-79');">
																	<i class="icon-copy dw dw-file-79"></i> dw-file-79
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-84').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-84');">
																	<i class="icon-copy dw dw-folder-84"></i> dw-folder-84
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-85').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-85');">
																	<i class="icon-copy dw dw-folder-85"></i> dw-folder-85
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-86').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-86');">
																	<i class="icon-copy dw dw-folder-86"></i> dw-folder-86
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-80').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-80');">
																	<i class="icon-copy dw dw-file-80"></i> dw-file-80
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-81').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-81');">
																	<i class="icon-copy dw dw-file-81"></i> dw-file-81
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-82').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-82');">
																	<i class="icon-copy dw dw-file-82"></i> dw-file-82
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-87').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-87');">
																	<i class="icon-copy dw dw-folder-87"></i> dw-folder-87
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-88').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-88');">
																	<i class="icon-copy dw dw-folder-88"></i> dw-folder-88
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-89').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-89');">
																	<i class="icon-copy dw dw-folder-89"></i> dw-folder-89
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-83').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-83');">
																	<i class="icon-copy dw dw-file-83"></i> dw-file-83
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-84').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-84');">
																	<i class="icon-copy dw dw-file-84"></i> dw-file-84
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-85').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-85');">
																	<i class="icon-copy dw dw-file-85"></i> dw-file-85
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-90').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-90');">
																	<i class="icon-copy dw dw-folder-90"></i> dw-folder-90
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-91').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-91');">
																	<i class="icon-copy dw dw-folder-91"></i> dw-folder-91
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-92').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-92');">
																	<i class="icon-copy dw dw-folder-92"></i> dw-folder-92
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-86').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-86');">
																	<i class="icon-copy dw dw-file-86"></i> dw-file-86
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-87').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-87');">
																	<i class="icon-copy dw dw-file-87"></i> dw-file-87
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-88').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-88');">
																	<i class="icon-copy dw dw-file-88"></i> dw-file-88
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-93').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-93');">
																	<i class="icon-copy dw dw-folder-93"></i> dw-folder-93
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-94').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-94');">
																	<i class="icon-copy dw dw-folder-94"></i> dw-folder-94
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-95').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-95');">
																	<i class="icon-copy dw dw-folder-95"></i> dw-folder-95
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-89').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-89');">
																	<i class="icon-copy dw dw-file-89"></i> dw-file-89
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-90').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-90');">
																	<i class="icon-copy dw dw-file-90"></i> dw-file-90
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-91').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-91');">
																	<i class="icon-copy dw dw-file-91"></i> dw-file-91
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-96').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-96');">
																	<i class="icon-copy dw dw-folder-96"></i> dw-folder-96
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-97').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-97');">
																	<i class="icon-copy dw dw-folder-97"></i> dw-folder-97
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-98').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-98');">
																	<i class="icon-copy dw dw-folder-98"></i> dw-folder-98
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-92').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-92');">
																	<i class="icon-copy dw dw-file-92"></i> dw-file-92
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-93').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-93');">
																	<i class="icon-copy dw dw-file-93"></i> dw-file-93
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-94').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-94');">
																	<i class="icon-copy dw dw-file-94"></i> dw-file-94
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-99').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-99');">
																	<i class="icon-copy dw dw-folder-99"></i> dw-folder-99
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-100').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-100');">
																	<i class="icon-copy dw dw-folder-100"></i> dw-folder-100
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-101').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-101');">
																	<i class="icon-copy dw dw-folder-101"></i> dw-folder-101
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-95').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-95');">
																	<i class="icon-copy dw dw-file-95"></i> dw-file-95
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-96').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-96');">
																	<i class="icon-copy dw dw-file-96"></i> dw-file-96
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-97').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-97');">
																	<i class="icon-copy dw dw-file-97"></i> dw-file-97
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-102').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-102');">
																	<i class="icon-copy dw dw-folder-102"></i> dw-folder-102
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-103').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-103');">
																	<i class="icon-copy dw dw-folder-103"></i> dw-folder-103
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-104').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-104');">
																	<i class="icon-copy dw dw-folder-104"></i> dw-folder-104
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-98').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-98');">
																	<i class="icon-copy dw dw-file-98"></i> dw-file-98
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-99').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-99');">
																	<i class="icon-copy dw dw-file-99"></i> dw-file-99
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-100').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-100');">
																	<i class="icon-copy dw dw-file-100"></i> dw-file-100
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-105').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-105');">
																	<i class="icon-copy dw dw-folder-105"></i> dw-folder-105
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-106').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-106');">
																	<i class="icon-copy dw dw-folder-106"></i> dw-folder-106
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-107').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-107');">
																	<i class="icon-copy dw dw-folder-107"></i> dw-folder-107
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-101').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-101');">
																	<i class="icon-copy dw dw-file-101"></i> dw-file-101
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-102').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-102');">
																	<i class="icon-copy dw dw-file-102"></i> dw-file-102
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-103').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-103');">
																	<i class="icon-copy dw dw-file-103"></i> dw-file-103
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-108').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-108');">
																	<i class="icon-copy dw dw-folder-108"></i> dw-folder-108
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-109').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-109');">
																	<i class="icon-copy dw dw-folder-109"></i> dw-folder-109
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-110').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-110');">
																	<i class="icon-copy dw dw-folder-110"></i> dw-folder-110
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-104').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-104');">
																	<i class="icon-copy dw dw-file-104"></i> dw-file-104
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-remove').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-remove');">
																	<i class="icon-copy dw dw-remove"></i> dw-remove
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-remove-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-remove-1');">
																	<i class="icon-copy dw dw-remove-1"></i> dw-remove-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-111').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-111');">
																	<i class="icon-copy dw dw-folder-111"></i> dw-folder-111
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-112').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-112');">
																	<i class="icon-copy dw dw-folder-112"></i> dw-folder-112
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-113').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-113');">
																	<i class="icon-copy dw dw-folder-113"></i> dw-folder-113
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-105').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-105');">
																	<i class="icon-copy dw dw-file-105"></i> dw-file-105
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-106').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-106');">
																	<i class="icon-copy dw dw-file-106"></i> dw-file-106
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-107').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-107');">
																	<i class="icon-copy dw dw-file-107"></i> dw-file-107
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-114').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-114');">
																	<i class="icon-copy dw dw-folder-114"></i> dw-folder-114
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-115').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-115');">
																	<i class="icon-copy dw dw-folder-115"></i> dw-folder-115
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-116').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-116');">
																	<i class="icon-copy dw dw-folder-116"></i> dw-folder-116
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-108').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-108');">
																	<i class="icon-copy dw dw-file-108"></i> dw-file-108
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-109').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-109');">
																	<i class="icon-copy dw dw-file-109"></i> dw-file-109
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-110').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-110');">
																	<i class="icon-copy dw dw-file-110"></i> dw-file-110
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-117').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-117');">
																	<i class="icon-copy dw dw-folder-117"></i> dw-folder-117
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-118').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-118');">
																	<i class="icon-copy dw dw-folder-118"></i> dw-folder-118
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-119').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-119');">
																	<i class="icon-copy dw dw-folder-119"></i> dw-folder-119
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-1111').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-1111');">
																	<i class="icon-copy dw dw-file-1111"></i> dw-file-1111
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-112').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-112');">
																	<i class="icon-copy dw dw-file-112"></i> dw-file-112
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-113').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-113');">
																	<i class="icon-copy dw dw-file-113"></i> dw-file-113
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-120').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-120');">
																	<i class="icon-copy dw dw-folder-120"></i> dw-folder-120
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-121').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-121');">
																	<i class="icon-copy dw dw-folder-121"></i> dw-folder-121
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-122').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-122');">
																	<i class="icon-copy dw dw-folder-122"></i> dw-folder-122
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-114').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-114');">
																	<i class="icon-copy dw dw-file-114"></i> dw-file-114
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-115').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-115');">
																	<i class="icon-copy dw dw-file-115"></i> dw-file-115
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-116').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-116');">
																	<i class="icon-copy dw dw-file-116"></i> dw-file-116
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-123').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-123');">
																	<i class="icon-copy dw dw-folder-123"></i> dw-folder-123
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-124').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-124');">
																	<i class="icon-copy dw dw-folder-124"></i> dw-folder-124
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-125').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-125');">
																	<i class="icon-copy dw dw-folder-125"></i> dw-folder-125
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-117').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-117');">
																	<i class="icon-copy dw dw-file-117"></i> dw-file-117
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-118').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-118');">
																	<i class="icon-copy dw dw-file-118"></i> dw-file-118
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-119').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-119');">
																	<i class="icon-copy dw dw-file-119"></i> dw-file-119
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-126').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-126');">
																	<i class="icon-copy dw dw-folder-126"></i> dw-folder-126
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-127').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-127');">
																	<i class="icon-copy dw dw-folder-127"></i> dw-folder-127
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-128').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-128');">
																	<i class="icon-copy dw dw-folder-128"></i> dw-folder-128
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-120').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-120');">
																	<i class="icon-copy dw dw-file-120"></i> dw-file-120
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-1211').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-1211');">
																	<i class="icon-copy dw dw-file-1211"></i> dw-file-1211
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-122').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-122');">
																	<i class="icon-copy dw dw-file-122"></i> dw-file-122
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-129').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-129');">
																	<i class="icon-copy dw dw-folder-129"></i> dw-folder-129
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-130').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-130');">
																	<i class="icon-copy dw dw-folder-130"></i> dw-folder-130
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-131').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-131');">
																	<i class="icon-copy dw dw-folder-131"></i> dw-folder-131
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-123').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-123');">
																	<i class="icon-copy dw dw-file-123"></i> dw-file-123
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-124').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-124');">
																	<i class="icon-copy dw dw-file-124"></i> dw-file-124
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-125').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-125');">
																	<i class="icon-copy dw dw-file-125"></i> dw-file-125
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-132').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-132');">
																	<i class="icon-copy dw dw-folder-132"></i> dw-folder-132
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-133').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-133');">
																	<i class="icon-copy dw dw-folder-133"></i> dw-folder-133
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-134').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-134');">
																	<i class="icon-copy dw dw-folder-134"></i> dw-folder-134
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-126').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-126');">
																	<i class="icon-copy dw dw-file-126"></i> dw-file-126
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-127').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-127');">
																	<i class="icon-copy dw dw-file-127"></i> dw-file-127
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-128').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-128');">
																	<i class="icon-copy dw dw-file-128"></i> dw-file-128
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-135').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-135');">
																	<i class="icon-copy dw dw-folder-135"></i> dw-folder-135
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-136').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-136');">
																	<i class="icon-copy dw dw-folder-136"></i> dw-folder-136
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-137').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-137');">
																	<i class="icon-copy dw dw-folder-137"></i> dw-folder-137
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-129').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-129');">
																	<i class="icon-copy dw dw-file-129"></i> dw-file-129
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-130').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-130');">
																	<i class="icon-copy dw dw-file-130"></i> dw-file-130
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-131').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-131');">
																	<i class="icon-copy dw dw-file-131"></i> dw-file-131
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-138').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-138');">
																	<i class="icon-copy dw dw-folder-138"></i> dw-folder-138
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-139').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-139');">
																	<i class="icon-copy dw dw-folder-139"></i> dw-folder-139
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-140').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-140');">
																	<i class="icon-copy dw dw-folder-140"></i> dw-folder-140
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-132').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-132');">
																	<i class="icon-copy dw dw-file-132"></i> dw-file-132
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-133').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-133');">
																	<i class="icon-copy dw dw-file-133"></i> dw-file-133
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-134').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-134');">
																	<i class="icon-copy dw dw-file-134"></i> dw-file-134
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-141').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-141');">
																	<i class="icon-copy dw dw-folder-141"></i> dw-folder-141
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-142').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-142');">
																	<i class="icon-copy dw dw-folder-142"></i> dw-folder-142
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-143').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-143');">
																	<i class="icon-copy dw dw-folder-143"></i> dw-folder-143
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-135').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-135');">
																	<i class="icon-copy dw dw-file-135"></i> dw-file-135
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-136').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-136');">
																	<i class="icon-copy dw dw-file-136"></i> dw-file-136
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-137').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-137');">
																	<i class="icon-copy dw dw-file-137"></i> dw-file-137
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-144').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-144');">
																	<i class="icon-copy dw dw-folder-144"></i> dw-folder-144
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-145').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-145');">
																	<i class="icon-copy dw dw-folder-145"></i> dw-folder-145
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-146').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-146');">
																	<i class="icon-copy dw dw-folder-146"></i> dw-folder-146
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-138').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-138');">
																	<i class="icon-copy dw dw-file-138"></i> dw-file-138
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-139').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-139');">
																	<i class="icon-copy dw dw-file-139"></i> dw-file-139
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-140').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-140');">
																	<i class="icon-copy dw dw-file-140"></i> dw-file-140
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-147').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-147');">
																	<i class="icon-copy dw dw-folder-147"></i> dw-folder-147
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-148').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-148');">
																	<i class="icon-copy dw dw-folder-148"></i> dw-folder-148
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-149').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-149');">
																	<i class="icon-copy dw dw-folder-149"></i> dw-folder-149
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-141').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-141');">
																	<i class="icon-copy dw dw-file-141"></i> dw-file-141
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-142').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-142');">
																	<i class="icon-copy dw dw-file-142"></i> dw-file-142
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-143').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-143');">
																	<i class="icon-copy dw dw-file-143"></i> dw-file-143
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-150').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-150');">
																	<i class="icon-copy dw dw-folder-150"></i> dw-folder-150
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-151').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-151');">
																	<i class="icon-copy dw dw-folder-151"></i> dw-folder-151
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-152').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-152');">
																	<i class="icon-copy dw dw-folder-152"></i> dw-folder-152
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-144').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-144');">
																	<i class="icon-copy dw dw-file-144"></i> dw-file-144
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-file1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-file1');">
																	<i class="icon-copy dw dw-video-file1"></i> dw-video-file1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-file-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-file-1');">
																	<i class="icon-copy dw dw-video-file-1"></i> dw-video-file-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-153').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-153');">
																	<i class="icon-copy dw dw-folder-153"></i> dw-folder-153
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-154').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-154');">
																	<i class="icon-copy dw dw-folder-154"></i> dw-folder-154
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-155').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-155');">
																	<i class="icon-copy dw dw-folder-155"></i> dw-folder-155
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-file-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-file-2');">
																	<i class="icon-copy dw dw-video-file-2"></i> dw-video-file-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-145').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-145');">
																	<i class="icon-copy dw dw-file-145"></i> dw-file-145
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-146').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-146');">
																	<i class="icon-copy dw dw-file-146"></i> dw-file-146
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-156').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-156');">
																	<i class="icon-copy dw dw-folder-156"></i> dw-folder-156
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-157').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-157');">
																	<i class="icon-copy dw dw-folder-157"></i> dw-folder-157
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-158').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-158');">
																	<i class="icon-copy dw dw-folder-158"></i> dw-folder-158
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-147').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-147');">
																	<i class="icon-copy dw dw-file-147"></i> dw-file-147
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-148').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-148');">
																	<i class="icon-copy dw dw-file-148"></i> dw-file-148
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-149').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-149');">
																	<i class="icon-copy dw dw-file-149"></i> dw-file-149
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-159').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-159');">
																	<i class="icon-copy dw dw-folder-159"></i> dw-folder-159
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-160').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-160');">
																	<i class="icon-copy dw dw-folder-160"></i> dw-folder-160
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-161').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-161');">
																	<i class="icon-copy dw dw-folder-161"></i> dw-folder-161
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-150').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-150');">
																	<i class="icon-copy dw dw-file-150"></i> dw-file-150
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-151').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-151');">
																	<i class="icon-copy dw dw-file-151"></i> dw-file-151
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-152').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-152');">
																	<i class="icon-copy dw dw-file-152"></i> dw-file-152
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-162').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-162');">
																	<i class="icon-copy dw dw-folder-162"></i> dw-folder-162
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-163').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-163');">
																	<i class="icon-copy dw dw-folder-163"></i> dw-folder-163
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder-164').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder-164');">
																	<i class="icon-copy dw dw-folder-164"></i> dw-folder-164
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-153').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-153');">
																	<i class="icon-copy dw dw-file-153"></i> dw-file-153
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wifi2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wifi2');">
																	<i class="icon-copy dw dw-wifi2"></i> dw-wifi2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-webcam').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-webcam');">
																	<i class="icon-copy dw dw-webcam"></i> dw-webcam
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wallet1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wallet1');">
																	<i class="icon-copy dw dw-wallet1"></i> dw-wallet1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-view').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-view');">
																	<i class="icon-copy dw dw-view"></i> dw-view
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-video-camera2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-video-camera2');">
																	<i class="icon-copy dw dw-video-camera2"></i> dw-video-camera2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user-12');">
																	<i class="icon-copy dw dw-user-12"></i> dw-user-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link-3');">
																	<i class="icon-copy dw dw-link-3"></i> dw-link-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-upload2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-upload2');">
																	<i class="icon-copy dw dw-upload2"></i> dw-upload2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-unlock').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-unlock');">
																	<i class="icon-copy dw dw-unlock"></i> dw-unlock
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-undo2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-undo2');">
																	<i class="icon-copy dw dw-undo2"></i> dw-undo2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tick').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tick');">
																	<i class="icon-copy dw dw-tick"></i> dw-tick
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-tag1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-tag1');">
																	<i class="icon-copy dw dw-tag1"></i> dw-tag1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-suitcase2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-suitcase2');">
																	<i class="icon-copy dw dw-suitcase2"></i> dw-suitcase2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-box-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-box-1');">
																	<i class="icon-copy dw dw-box-1"></i> dw-box-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-stop').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-stop');">
																	<i class="icon-copy dw dw-stop"></i> dw-stop
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sound').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sound');">
																	<i class="icon-copy dw dw-sound"></i> dw-sound
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-slideshow').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-slideshow');">
																	<i class="icon-copy dw dw-slideshow"></i> dw-slideshow
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shuffle2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shuffle2');">
																	<i class="icon-copy dw dw-shuffle2"></i> dw-shuffle2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-share-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-share-11');">
																	<i class="icon-copy dw dw-share-11"></i> dw-share-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-share2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-share2');">
																	<i class="icon-copy dw dw-share2"></i> dw-share2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-settings2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-settings2');">
																	<i class="icon-copy dw dw-settings2"></i> dw-settings2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor-12');">
																	<i class="icon-copy dw dw-cursor-12"></i> dw-cursor-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shield1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shield1');">
																	<i class="icon-copy dw dw-shield1"></i> dw-shield1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-loupe').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-loupe');">
																	<i class="icon-copy dw dw-loupe"></i> dw-loupe
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-210').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-210');">
																	<i class="icon-copy dw dw-file-210"></i> dw-file-210
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-balance').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-balance');">
																	<i class="icon-copy dw dw-balance"></i> dw-balance
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-diskette2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-diskette2');">
																	<i class="icon-copy dw dw-diskette2"></i> dw-diskette2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-hourglass1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-hourglass1');">
																	<i class="icon-copy dw dw-hourglass1"></i> dw-hourglass1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ruler1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ruler1');">
																	<i class="icon-copy dw dw-ruler1"></i> dw-ruler1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-next-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-next-2');">
																	<i class="icon-copy dw dw-next-2"></i> dw-next-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pie-chart1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pie-chart1');">
																	<i class="icon-copy dw dw-pie-chart1"></i> dw-pie-chart1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-repeat-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-repeat-11');">
																	<i class="icon-copy dw dw-repeat-11"></i> dw-repeat-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-repeat1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-repeat1');">
																	<i class="icon-copy dw dw-repeat1"></i> dw-repeat1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-refresh2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-refresh2');">
																	<i class="icon-copy dw dw-refresh2"></i> dw-refresh2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-books').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-books');">
																	<i class="icon-copy dw dw-books"></i> dw-books
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-random1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-random1');">
																	<i class="icon-copy dw dw-random1"></i> dw-random1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-user2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-user2');">
																	<i class="icon-copy dw dw-user2"></i> dw-user2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-light-bulb').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-light-bulb');">
																	<i class="icon-copy dw dw-light-bulb"></i> dw-light-bulb
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flash-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flash-1');">
																	<i class="icon-copy dw dw-flash-1"></i> dw-flash-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-export').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-export');">
																	<i class="icon-copy dw dw-export"></i> dw-export
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-pulse').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-pulse');">
																	<i class="icon-copy dw dw-pulse"></i> dw-pulse
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-next-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-next-1');">
																	<i class="icon-copy dw dw-next-1"></i> dw-next-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-piggy-bank').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-piggy-bank');">
																	<i class="icon-copy dw dw-piggy-bank"></i> dw-piggy-bank
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dropper').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dropper');">
																	<i class="icon-copy dw dw-dropper"></i> dw-dropper
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-smartphone2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-smartphone2');">
																	<i class="icon-copy dw dw-smartphone2"></i> dw-smartphone2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-message-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-message-1');">
																	<i class="icon-copy dw dw-message-1"></i> dw-message-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-paint-bucket1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-paint-bucket1');">
																	<i class="icon-copy dw dw-paint-bucket1"></i> dw-paint-bucket1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file-154').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file-154');">
																	<i class="icon-copy dw dw-file-154"></i> dw-file-154
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bell1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bell1');">
																	<i class="icon-copy dw dw-bell1"></i> dw-bell1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-clipboard1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-clipboard1');">
																	<i class="icon-copy dw dw-clipboard1"></i> dw-clipboard1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-newspaper-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-newspaper-1');">
																	<i class="icon-copy dw dw-newspaper-1"></i> dw-newspaper-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-newspaper').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-newspaper');">
																	<i class="icon-copy dw dw-newspaper"></i> dw-newspaper
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-antenna1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-antenna1');">
																	<i class="icon-copy dw dw-antenna1"></i> dw-antenna1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bar-chart1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bar-chart1');">
																	<i class="icon-copy dw dw-bar-chart1"></i> dw-bar-chart1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mute-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mute-1');">
																	<i class="icon-copy dw dw-mute-1"></i> dw-mute-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-music-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-music-1');">
																	<i class="icon-copy dw dw-music-1"></i> dw-music-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-sound-waves').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-sound-waves');">
																	<i class="icon-copy dw dw-sound-waves"></i> dw-sound-waves
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-music').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-music');">
																	<i class="icon-copy dw dw-music"></i> dw-music
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-film').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-film');">
																	<i class="icon-copy dw dw-film"></i> dw-film
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-move-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-move-1');">
																	<i class="icon-copy dw dw-move-1"></i> dw-move-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-move2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-move2');">
																	<i class="icon-copy dw dw-move2"></i> dw-move2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mouse').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mouse');">
																	<i class="icon-copy dw dw-mouse"></i> dw-mouse
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-more2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-more2');">
																	<i class="icon-copy dw dw-more2"></i> dw-more2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-mute').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-mute');">
																	<i class="icon-copy dw dw-mute"></i> dw-mute
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-microphone-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-microphone-11');">
																	<i class="icon-copy dw dw-microphone-11"></i> dw-microphone-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-microphone1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-microphone1');">
																	<i class="icon-copy dw dw-microphone1"></i> dw-microphone1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-message').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-message');">
																	<i class="icon-copy dw dw-message"></i> dw-message
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map-12');">
																	<i class="icon-copy dw dw-map-12"></i> dw-map-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-placeholder').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-placeholder');">
																	<i class="icon-copy dw dw-placeholder"></i> dw-placeholder
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-low-battery').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-low-battery');">
																	<i class="icon-copy dw dw-low-battery"></i> dw-low-battery
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-map2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-map2');">
																	<i class="icon-copy dw dw-map2"></i> dw-map2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link-2');">
																	<i class="icon-copy dw dw-link-2"></i> dw-link-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-like1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-like1');">
																	<i class="icon-copy dw dw-like1"></i> dw-like1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-layers1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-layers1');">
																	<i class="icon-copy dw dw-layers1"></i> dw-layers1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-key2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-key2');">
																	<i class="icon-copy dw dw-key2"></i> dw-key2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image-12');">
																	<i class="icon-copy dw dw-image-12"></i> dw-image-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-image2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-image2');">
																	<i class="icon-copy dw dw-image2"></i> dw-image2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link-1');">
																	<i class="icon-copy dw dw-link-1"></i> dw-link-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-home').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-home');">
																	<i class="icon-copy dw dw-home"></i> dw-home
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-headphones-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-headphones-1');">
																	<i class="icon-copy dw dw-headphones-1"></i> dw-headphones-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-headphones1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-headphones1');">
																	<i class="icon-copy dw dw-headphones1"></i> dw-headphones1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-focus1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-focus1');">
																	<i class="icon-copy dw dw-focus1"></i> dw-focus1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fast-forward-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fast-forward-1');">
																	<i class="icon-copy dw dw-fast-forward-1"></i> dw-fast-forward-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-folder3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-folder3');">
																	<i class="icon-copy dw dw-folder3"></i> dw-folder3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flash1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flash1');">
																	<i class="icon-copy dw dw-flash1"></i> dw-flash1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-flag2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-flag2');">
																	<i class="icon-copy dw dw-flag2"></i> dw-flag2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-filter2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-filter2');">
																	<i class="icon-copy dw dw-filter2"></i> dw-filter2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-fast-forward').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-fast-forward');">
																	<i class="icon-copy dw dw-fast-forward"></i> dw-fast-forward
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-exit').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-exit');">
																	<i class="icon-copy dw dw-exit"></i> dw-exit
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-expand2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-expand2');">
																	<i class="icon-copy dw dw-expand2"></i> dw-expand2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-email2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-email2');">
																	<i class="icon-copy dw dw-email2"></i> dw-email2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-edit3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-edit3');">
																	<i class="icon-copy dw dw-edit3"></i> dw-edit3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-dvd1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-dvd1');">
																	<i class="icon-copy dw dw-dvd1"></i> dw-dvd1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-download2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-download2');">
																	<i class="icon-copy dw dw-download2"></i> dw-download2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-down-arrow3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-down-arrow3');">
																	<i class="icon-copy dw dw-down-arrow3"></i> dw-down-arrow3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-file4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-file4');">
																	<i class="icon-copy dw dw-file4"></i> dw-file4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delete-3').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delete-3');">
																	<i class="icon-copy dw dw-delete-3"></i> dw-delete-3
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delete-2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delete-2');">
																	<i class="icon-copy dw dw-delete-2"></i> dw-delete-2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delete-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delete-1');">
																	<i class="icon-copy dw dw-delete-1"></i> dw-delete-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-browser-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-browser-1');">
																	<i class="icon-copy dw dw-browser-1"></i> dw-browser-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cursor2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cursor2');">
																	<i class="icon-copy dw dw-cursor2"></i> dw-cursor2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-crop1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-crop1');">
																	<i class="icon-copy dw dw-crop1"></i> dw-crop1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-21').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-21');">
																	<i class="icon-copy dw dw-chat-21"></i> dw-chat-21
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cloud1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cloud1');">
																	<i class="icon-copy dw dw-cloud1"></i> dw-cloud1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-wall-clock2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-wall-clock2');">
																	<i class="icon-copy dw dw-wall-clock2"></i> dw-wall-clock2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-checked').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-checked');">
																	<i class="icon-copy dw dw-checked"></i> dw-checked
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat-12').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat-12');">
																	<i class="icon-copy dw dw-chat-12"></i> dw-chat-12
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-chat4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-chat4');">
																	<i class="icon-copy dw dw-chat4"></i> dw-chat4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-link4').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-link4');">
																	<i class="icon-copy dw dw-link4"></i> dw-link4
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-cctv1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-cctv1');">
																	<i class="icon-copy dw dw-cctv1"></i> dw-cctv1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-cart2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-cart2');">
																	<i class="icon-copy dw dw-shopping-cart2"></i> dw-shopping-cart2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-photo-camera-1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-photo-camera-1');">
																	<i class="icon-copy dw dw-photo-camera-1"></i> dw-photo-camera-1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-photo-camera2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-photo-camera2');">
																	<i class="icon-copy dw dw-photo-camera2"></i> dw-photo-camera2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-calendar2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-calendar2');">
																	<i class="icon-copy dw dw-calendar2"></i> dw-calendar2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bug2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bug2');">
																	<i class="icon-copy dw dw-bug2"></i> dw-bug2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-browser1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-browser1');">
																	<i class="icon-copy dw dw-browser1"></i> dw-browser1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-broken').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-broken');">
																	<i class="icon-copy dw dw-broken"></i> dw-broken
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-brightness1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-brightness1');">
																	<i class="icon-copy dw dw-brightness1"></i> dw-brightness1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-box').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-box');">
																	<i class="icon-copy dw dw-box"></i> dw-box
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bookmark2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bookmark2');">
																	<i class="icon-copy dw dw-bookmark2"></i> dw-bookmark2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-book2').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-book2');">
																	<i class="icon-copy dw dw-book2"></i> dw-book2
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-board').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-board');">
																	<i class="icon-copy dw dw-board"></i> dw-board
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-bluetooth').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-bluetooth');">
																	<i class="icon-copy dw dw-bluetooth"></i> dw-bluetooth
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-alarm').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-alarm');">
																	<i class="icon-copy dw dw-alarm"></i> dw-alarm
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-battery-11').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-battery-11');">
																	<i class="icon-copy dw dw-battery-11"></i> dw-battery-11
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-battery1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-battery1');">
																	<i class="icon-copy dw dw-battery1"></i> dw-battery1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-ban').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-ban');">
																	<i class="icon-copy dw dw-ban"></i> dw-ban
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-shopping-bag1').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-shopping-bag1');">
																	<i class="icon-copy dw dw-shopping-bag1"></i> dw-shopping-bag1
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-delete').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-delete');">
																	<i class="icon-copy dw dw-delete"></i> dw-delete
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-next').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-next');">
																	<i class="icon-copy dw dw-next"></i> dw-next
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-megaphone').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-megaphone');">
																	<i class="icon-copy dw dw-megaphone"></i> dw-megaphone
																</a>
															</div>
															<div onclick="$('#icon'+edit).val('dw-add').trigger('change');" data-dismiss="modal" class="fa-hover col-md-3 col-sm-6 col-12" data-toggle="tooltip" data-placement="bottom" title="Da click para seleccionar este icono">
																<a href="javascript:$('#icon'+edit).val('dw-add');">
																	<i class="icon-copy dw dw-add"></i> dw-add
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
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
				"pageLength": 25
			});
			$("#modal").on('hide.bs.modal', function() {
				$('#categoria').val('');
				$('#icon').val('');
				$('#iconMin').attr('class', '');
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
			enterClick('categoria', 'save');
			enterClick('categoria1', 'save1');
			$('.save').on('click', function() {
				$(".save").attr("disabled", "disabled");

				if (idA != "") {
					edit = "";
				} else {
					edit = "1";
				}

				var categoria = $('#categoria' + edit).val();
				var icon = $('#icon' + edit).val();

				data = new FormData();
				data.append('categoria', categoria);
				data.append('icon', icon);
				data.append('update', idA);



				if ((categoria != "") && (icon != "")) {
					$.ajax({
						url: "controller/categorie",
						type: "POST",
						data: data,
						enctype: 'multipart/form-data',
						processData: false, // tell jQuery not to process the data
						contentType: false,
						cache: false,
						success: function(dataResult) {
							var dataResult = JSON.parse(dataResult);
							if (dataResult.statusCode == 200) {

								$("#boton-especial").remove();

								$(".save").removeAttr("disabled");
								$('#categoria1').val('');
								$('#icon1').val('');
								$('#iconMin1').attr('class', '');
								alerta2("La categoría se ha subido correctamente");
								$('#lista').DataTable().clear();
								$('#lista').DataTable().destroy();
								$('#Contenido').html(dataResult.data1);
								$('#lista').DataTable({
									"pageLength": 25
								});

								$('#menu-cat').append('<li><button id="boton-especial" onclick="location.reload()" class="btn btn-secondary" style=" width: 90%;">Recarga para visualizar los cambios efectuados</button></li>');

							} else if (dataResult.statusCode == 202) {

								$("#boton-especial").remove();

								$(".save").removeAttr("disabled");
								$('#modal').modal('toggle');
								alerta2("La categoría se ha actualizado correctamente");
								$('#lista').DataTable().clear();
								$('#lista').DataTable().destroy();
								$('#Contenido').html(dataResult.data1);
								$('#lista').DataTable({
									"pageLength": 25
								});

								$('#menu-cat').append('<li><button id="boton-especial" onclick="location.reload()" class="btn btn-secondary" style=" width: 90%;">Recarga para visualizar los cambios efectuados</button></li>');

							} else if (dataResult.statusCode == 203) {
								$(".save").removeAttr("disabled");
								alertae('Ha ocurrido un error intentalo de nuevo más tarde');
							}
						}
					});
				} else {
					if (categoria == "") {
						$('#categoria' + edit).addClass("form-control-danger");
					}
					if (icon == "") {
						$('#icon' + edit).addClass("form-control-danger");
					}
					alertae('Rellena los campos en rojo antes de continuar');
					$(".save").removeAttr("disabled");
				}
			});
		});
	</script>
</body>

</html>