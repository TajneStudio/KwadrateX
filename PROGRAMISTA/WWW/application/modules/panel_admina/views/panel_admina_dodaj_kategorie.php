<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-eye-open"></span> Panel admina - Dodaj kategorie</h1></div>
					<div class="panel-body">
					
						<?php if(validation_errors()){ ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Zamknij</span></button>
							<strong>Uwaga!</strong> <p></p><?php echo validation_errors(); ?>
						</div>
						<?php } ?>
					
						<?php echo form_open_multipart('','id="add_form"'); ?>
						
							<div id="panel_up" class="clearfix">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<?php
								echo form_button(
									array(
										'name'  => 'add_form_submit',
										'id'    => 'add_form_submit',
										'type' => 'submit',
										'content' => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Zapisz',
										'class' => 'btn btn-success'
									)
								);
							?>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
										<button type="button" class="btn btn-warning back"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Wróć</button>
									</div>
							</div>
						
							<div class="form-group">
							<?php 
								echo form_label('Nazwa:', 'kategorie_nazwa');
								echo form_input(
									array(
										'name'  => 'kategorie_nazwa',
										'id'    => 'kategorie_nazwa',
										'value' => set_value('kategorie_nazwa'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div id="obrazekSelect" class="form-group clearfix">
							<div>
								<div class="selectorPliku">
							<?php 
								echo form_label('Plik graficzny kategorii:', 'kategorie_plikGraficzny');
								echo form_upload(
									array(
										'name'  => 'kategorie_plikGraficzny',
										'id'    => 'kategorie_plikGraficzny',
										'value' => set_value('kategorie_plikGraficzny'),
										'class' => ''
									)
								); 
							?>
								</div>
							</div>
							<div>
								<div class="obrazek">
									<img id="zdjecie" src="#" alt="your image" />
								</div>
							</div>
							</div>
							<div id="panel_down" class="clearfix">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<?php
								echo form_button(
									array(
										'name'  => 'add_form_submit',
										'id'    => 'add_form_submit',
										'type' => 'submit',
										'content' => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Zapisz',
										'class' => 'btn btn-success'
									)
								);
							?>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
										<button type="button" class="btn btn-warning back"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Wróć</button>
									</div>
							</div>
						<?php echo form_close(); ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '/template/static/footer.php'; ?>