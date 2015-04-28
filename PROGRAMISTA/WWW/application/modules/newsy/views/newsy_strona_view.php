<?php require '/template/static/header.php'; ?>

<div id="exampleContainer" class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="exampleZawartosc">
				<div class="panel panel-default">
					<div class="panel-heading"><h1><span class="glyphicon glyphicon-bullhorn"></span> Newsy</h1></div>
					<div class="panel-body">
					
						<?php foreach ($pobrane_newsy as $news){ ?>
						<div class="well well-lg aktualnosc">
							<div class="row">
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<img class="img-responsive img-thumbnail" src="<?php echo $this->config->base_url(); ?>newsy/<?php echo $news["news_plikGraficzny"]; ?>" />
								</div>
								<div class="zawartosc col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<h2><?php echo $news["news_tytul"]; ?></h2>
									<h5>dodany dnia: <?php echo $news["news_data"]; ?></h5>
									<h5>dodany przez: <?php echo $news["news_stworzonyPrzez"]; ?></h5>
									<p><?php echo $news["news_zawartosc"]; ?></p>
									<div class="read-more">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
												<?php if($news["news_edytowanyPrzez"] != null){ ?>
												<h5>ostatnio edytowany przez: <?php echo $news["news_edytowanyPrzez"]; ?></h5>
												<?php } ?>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
												<a href="<?php echo site_url("newsy/pokaz_news")."/".$news["news_id"]; ?>" class="btn btn-info">Czytaj więcej</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="paginacja text-center">
									<?php echo $paginacja; ?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require '/template/static/footer.php'; ?>