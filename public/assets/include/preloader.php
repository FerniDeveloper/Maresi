
<?php require("assets/include/seshead.php"); ?>
<?php if (isset($_SESSION['MARESI'])) {
	?>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img style="max-width: 650px;" src="assets/images/logo/maresi_with_text.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Cargando...
			</div>
		</div>
	</div>
	<?php
}
?>