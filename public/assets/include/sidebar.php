<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index">
			<img style="" src="assets/images/logo/maresi_with_text.png" alt="" class="dark-logo">
			<img src="assets/images/logo/logo_white.png" alt="" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<div id="menu-cat">
					<?php
					$sql="SELECT * FROM categorias WHERE elim = 0 ORDER BY categoria";
					$result = $db->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							?>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="micon dw <?=$row['icon']?>"></span><span class="mtext"><?=$row['categoria']?></span>
								</a>
								<ul class="submenu">
									<?php
									$sql1="SELECT * FROM reportes WHERE categoria = '".$row['id']."'";
									$result1 = $db->query($sql1);
									if ($result1->num_rows > 0) {
										while($row1 = $result1->fetch_assoc()) {
											?>
											<li><a href="reporte?id=<?=$row1['id']?>"><?=$row1['titulo']?></a></li>
											<?php
										}
									}
									?>
								</ul>
							</li>
							<?php
						}
					}
					?>
				</div>
				

				<?php
				if ($_SESSION['MARESI']['tipo'] > 1) {
					?>

					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sidebar-small-cap">Editor</div>
					</li>
					<li>
						<a href="categories" class="dropdown-toggle no-arrow">
							<span class="micon dw dw dw-header1"></span><span class="mtext">Categorías</span>
						</a>
					</li>
					<li>
						<a href="reports" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-add-file-1"></span><span class="mtext">Reportes</span>
						</a>
					</li>
					<li>
						<a href="databases" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-analytics-17"></span><span class="mtext">Bases de datos</span>
						</a>
					</li>
					<li style="display: none;">
						<a href="help" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-question"></span><span class="mtext">Ayuda</span>
						</a>
					</li>

					<?php
				}
				?>

				<?php
				if ($_SESSION['MARESI']['tipo'] > 2) {
					?>

					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sidebar-small-cap">Configuración</div>
					</li>
					<li>
						<a href="users" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-add-user"></span><span class="mtext">Usuarios</span>
						</a>
					</li>
		

					<?php
				}
				?>				
				
				
			</ul>
		</div>
	</div>
</div>