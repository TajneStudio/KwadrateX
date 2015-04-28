<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-eye-open"></span> Panel admina - Przedmioty</h1></div>
					<div class="panel-body">
					
						<div id="panel_up" class="clearfix">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<button type="button" class="btn btn-success btn-md dodaj">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj przedmiot
								</button>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
								
							</div>
						</div>

						<table id="tabelka_edycji" class="display">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nazwa</th>
									<th>Kategoria</th>
									<th>Typ</th>
									<th>Akcje</th>
								</tr>
							</thead>
							
							<tbody>
							</tbody>
					 
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Nazwa</th>
									<th>Kategoria</th>
									<th>Typ</th>
									<th>Akcje</th>
								</tr>
							</tfoot>
						</table>
						
						<div id="panel_down" class="clearfix">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<button type="button" class="btn btn-success btn-md dodaj">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj przedmiot
								</button>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '/template/static/footer.php'; ?>