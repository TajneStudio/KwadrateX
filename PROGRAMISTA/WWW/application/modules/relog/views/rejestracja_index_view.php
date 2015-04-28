<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-registration-mark"></span> Zarejestruj</h1></div>
					<div class="panel-body">

						<?php if(validation_errors()){ ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Zamknij</span></button>
							<strong>Uwaga!</strong> <p></p><?php echo validation_errors(); ?>
						</div>
						<?php } ?>
					
						<?php echo form_open('','id="register_form"'); ?>
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
							<div class="form-group">
							<?php 
								echo form_label('Email:', 'user_email');
								echo form_input(
									array(
										'name'  => 'user_email',
										'id'    => 'user_email',
										'value' => set_value('user_email'),
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<div id="capatcha" class="form-group">
							<?php 
								echo form_label('Przepisz kod z obrazka:', 'user_capatcha');
								echo form_input(
									array(
										'name'  => 'user_capatcha',
										'id'    => 'user_capatcha',
										'class' => 'form-control'
									)
								); 
							?>
							</div>
							<?php
								echo form_button(
									array(
										'name'  => 'register_form_submit',
										'id'    => 'register_form_submit',
										'type' => 'submit',
										'content' => 'Wyślij',
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