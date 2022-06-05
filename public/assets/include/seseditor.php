<?php
if (isset($_SESSION['MARESI'])) {
	if ($_SESSION['MARESI']['tipo'] < 2) {
		?>
		<script type="text/javascript">
			window.stop();
	      	alertaPermi("No tienes permiso para acceder a esta sección");
		</script>
		<?php
	}
}else{
	?>
	<script type="text/javascript">
      window.stop();
      alertaSes("Debes iniciar sesión");
  	</script>
  	<?php
}
?>