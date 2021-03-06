<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-pencil"></span> Zaloguj</h1></div>
					<div class="panel-body">
					
						<?php if(validation_errors()){ ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Zamknij</span></button>
							<strong>Uwaga!</strong> <p></p><?php echo validation_errors(); ?>
						</div>
						<?php } ?>
					
						<?php echo form_open('','id="login_form"'); ?>
							<div class="form-group">
							<?php 
								echo form_label('Login:', 'user_login');
								echo form_input(
									array(
										'name'  => 'user_login',
										'id'    => 'user_login',
										'value' => set_value('user_login'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div class="form-group">
							<?php 
								echo form_label('Hasło:', 'user_pass');
								echo form_input(
									array(
										'name'  => 'user_pass',
										'type'  => 'password',
										'id'    => 'user_pass',
										'value' => set_value('user_pass'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<?php
								echo form_button(
									array(
										'name'  => 'login_form_submit',
										'id'    => 'login_form_submit',
										'type' => 'submit',
										'content' => 'Zaloguj',
										'class' => 'btn btn-default'
									)
								);
							?>
						<?php echo form_close(); ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '/template/static/footer.php'; ?>