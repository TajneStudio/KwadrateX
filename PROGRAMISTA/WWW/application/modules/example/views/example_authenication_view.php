<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-lock"></span> Witaj na stronie dostępnej dla admina</h1></div>
					<div class="panel-body">
						<p class="text-center">Jest to przykładowa strona testowa dostępna tylko dla admina</p>
						<p>&nbsp;</p>
						<p>Zmienna przesłana to: <?php echo $zmienna_przeslana; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '/template/static/footer.php'; ?>