		<div id="footerContainer" class="container well">
			<div class="row">
				<div id="info" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
					<p><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> 2015/2016 <strong>Tajne studio</strong></p>
				</div>
				<div id="info" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
					<p>Strona wyrenderowana w: <strong>{elapsed_time}</strong> sekund</p>
				</div>
			</div>
		</div>
	
		<script src="<?php echo $this->config->base_url(); ?>template/js/jquery-ui/jquery-ui.min.js"></script>
		<?php if($this->config->item('module_js') != ""){ ?>
		<script>
			<?=$this->config->item('module_js');?>
		</script>
		<?php } ?>
		
	</body>
</html>