<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h1><span class="glyphicon glyphicon-warning-sign"></span> BŁĄD</h1>
					</div>
					<div class="panel-body">
						<p class="text-center"><?php echo $tresc_bledu; ?></p>
						<p>&nbsp;</p>
						<div class="text-center">
							<button id="backButton" type="button" class="btn btn-danger">Wróć na poprzednią stronę</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '/template/static/footer.php'; ?>