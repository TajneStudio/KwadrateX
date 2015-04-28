<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-eye-open"></span> Panel admina - Dodaj przedmiot</h1></div>
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
								echo form_label('Nazwa:', 'rzeczy_nazwa');
								echo form_input(
									array(
										'name'  => 'rzeczy_nazwa',
										'id'    => 'rzeczy_nazwa',
										'value' => set_value('rzeczy_nazwa'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div class="form-group">
							<?php 
								echo form_label('Kategoria:', 'rzeczy_kategoria_id');
								echo form_dropdown('rzeczy_kategoria_id',$rzeczy_kategorie_opcje,set_value('rzeczy_kategoria_id'),'class="form-control"'); 
							?>
							</div>
							<div class="form-group">
							<?php 
								echo form_label('Typ:', 'rzeczy_typy_id');
								echo form_dropdown('rzeczy_typy_id',$rzeczy_typy_opcje,set_value('rzeczy_typy_id'),'class="form-control"'); 
							?>
							</div>
							<div class="form-group">
							<?php 
								echo form_label('Opis:', 'rzeczy_opis');
								echo form_textarea(
									array(
										'name'  => 'rzeczy_opis',
										'id'    => 'rzeczy_opis',
										'value' => set_value('rzeczy_opis'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div id="obrazekSelect" class="form-group clearfix">
							<div>
								<div class="selectorPliku">
							<?php 
								echo form_label('Plik graficzny rzeczy:', 'rzeczy_plikGraficzny');
								echo form_upload(
									array(
										'name'  => 'rzeczy_plikGraficzny',
										'id'    => 'rzeczy_plikGraficzny',
										'value' => set_value('rzeczy_plikGraficzny'),
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