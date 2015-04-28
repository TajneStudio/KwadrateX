<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-eye-open"></span> Panel admina - Dodaj news</h1></div>
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
								echo form_label('Tytuł:', 'news_tytul');
								echo form_input(
									array(
										'name'  => 'news_tytul',
										'id'    => 'news_tytul',
										'value' => set_value('news_tytul'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div class="form-group">
							<?php 
								echo form_label('Data dodania:', 'news_data');
								$data_dodania = null;
								if(empty(set_value('news_data'))){ $data_dodania = date("Y-m-d"); } else { $data_dodania = set_value('news_data'); }
								echo form_input(
									array(
										'name'  => 'news_data',
										'id'    => 'news_data',
										'value' => $data_dodania,
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div class="form-group">
							<?php 
								echo form_label('Treść:', 'news_zawartosc');
								echo form_textarea(
									array(
										'name'  => 'news_zawartosc',
										'id'    => 'news_zawartosc',
										'value' => set_value('news_zawartosc'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div id="obrazekSelect" class="form-group clearfix">
							<div>
								<div class="selectorPliku">
							<?php 
								echo form_label('Plik graficzny:', 'news_plikGraficzny');
								echo form_upload(
									array(
										'name'  => 'news_plikGraficzny',
										'id'    => 'news_plikGraficzny',
										'value' => set_value('news_plikGraficzny'),
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