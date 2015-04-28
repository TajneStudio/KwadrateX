<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KwadrateX</title>
		
		<link href="<?php echo $this->config->base_url(); ?>template/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo $this->config->base_url(); ?>template/css/reset.min.css" rel="stylesheet">
		
		<?php if($this->config->item('module_plugin_css') != ""){ ?>
			<?php foreach($this->config->item('module_plugin_css') as $css_pobrany){ ?>
		<link href="<?php echo $this->config->base_url(); ?>template/css/<?php echo $css_pobrany; ?>" rel="stylesheet">
			<?php } ?>
		<?php } ?>
		<link href="<?php echo $this->config->base_url(); ?>template/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		
		<link href="<?php echo $this->config->base_url(); ?>template/css/glowny.css" rel="stylesheet">
		<?php if($this->config->item('module_css') != ""){ ?>
		<style>
			<?=$this->config->item('module_css');?>
		</style>
		<?php } ?>
		
		<script src="<?php echo $this->config->base_url(); ?>template/js/jquery-1.11.2.min.js"></script>
		<script src="<?php echo $this->config->base_url(); ?>template/js/bootstrap.min.js"></script>
		
		<?php if($this->config->item('module_plugin_js') != ""){ ?>
			<?php foreach($this->config->item('module_plugin_js') as $js_pobrany){ ?>
		<script src="<?php echo $this->config->base_url(); ?>template/js/<?php echo $js_pobrany; ?>"></script>
			<?php } ?>
		<?php } ?>
		
		<script src="<?php echo $this->config->base_url(); ?>template/js/globalnyJs.js"></script>
	

		
	</head>
	<body>
	
	<div id="header" class="container">
		<div class="row">
	
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nawigacjaCollapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url(); ?>">KwadrateX</a>
				</div>

				<div class="collapse navbar-collapse" id="nawigacjaCollapse">
					<ul class="nav navbar-nav">
						<?php if(is_logged_in($this->session->userdata('user_type'))){ ?>
						<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"gra"); ?>">
							<a href="<?php echo site_url("zagraj"); ?>"><span class="glyphicon glyphicon-play"></span> Graj!</a>
						</li>
						<?php } ?>
						<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"strona_startowa"); ?>">
							<a href="<?php echo site_url("newsy/strona"); ?>"><span class="glyphicon glyphicon-bullhorn"></span> Newsy</a>
						</li>
					</ul>
					
					<?php if(is_logged_in($this->session->userdata('user_type'))){ ?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown <?php echo sprawdz_czy_segment_aktywny($segment_listy,"lista_opcje"); ?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('user_login'); ?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								
								<?php if(is_admin($this->session->userdata('user_type'))){ ?>
								<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"panel_admina_newsy"); ?>">
									<a href="<?php echo site_url("panel_admina/newsy"); ?>"><span class="glyphicon glyphicon-eye-open"></span> Newsy</a>
								</li>
								<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"panel_admina_kategorie"); ?>">
									<a href="<?php echo site_url("panel_admina/kategorie"); ?>"><span class="glyphicon glyphicon-eye-open"></span> Kategorie</a>
								</li>
								<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"panel_admina_rzeczy"); ?>">
									<a href="<?php echo site_url("panel_admina/rzeczy"); ?>"><span class="glyphicon glyphicon-eye-open"></span> Przedmioty</a>
								</li>
								<?php } ?>
								
								<li>
									<a href="<?php echo site_url("wylogowanie"); ?>"><span class="glyphicon glyphicon-hand-left"></span> Wyloguj</a>
								</li>
							</ul>
						</li>
					</ul>
					<?php } ?>
					
					<?php if(is_not_logged_in($this->session->userdata('user_type'))){ ?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown <?php echo sprawdz_czy_segment_aktywny($segment_listy,"lista_relog"); ?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Start <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"logowanie"); ?>">
									<a href="<?php echo site_url("logowanie"); ?>"><span class="glyphicon glyphicon-pencil"></span> Zaloguj</a>
								</li>
								<li class="<?php echo sprawdz_czy_segment_aktywny($segment_strony,"rejestracja"); ?>">
									<a href="<?php echo site_url("rejestracja"); ?>"><span class="glyphicon glyphicon-registration-mark"></span> Zarejestruj</a>
								</li>
							</ul>
						</li>
					</ul>
					<?php } ?>
				</div>
			</nav>
			
		</div>
	</div>