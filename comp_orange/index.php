<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<title><?php echo $Site->title() ?></title>
	<meta name="description" content="<?php echo $Site->description() ?>">
	<meta name="keywords" content="NSA, Nusantara, Speedcubing, Association, Cubing, Rubik, Cube, <?php echo str_replace(" ", ", ", trim($Site->title())) ?>, <?php echo str_replace(" ", ", ", trim($Site->slogan())) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if($Page->coverimage() != "") { ?>
		<meta property="og:image" content="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$Page->coverimage() ?>" />
	<?php } else { ?>
		<meta property="og:image" content="<?php echo 'http://'.$_SERVER['SERVER_NAME'].HTML_PATH_THEME_IMG.'nsafull.png' ?>" />
	<?php } ?>
	<meta property="og:site_name" content="<?php echo $Site->title() ?>" />
	<meta property="og:description" content="<?php echo $Site->description() ?>" />
	<meta property="og:type" content="article" />

	<meta name="author" content="Nusantara Speedcubing Association" />
	<link rel="shortcut icon" href="<?php echo HTML_PATH_THEME_IMG.'nsa32.png' ?>">
	<!--[if IE]><![endif]-->
	<link rel="stylesheet" href="<?php echo HTML_PATH_THEME_CSS.'bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo HTML_PATH_THEME_CSS.'style.min.css' ?>">
	<link rel="stylesheet" href="<?php echo HTML_PATH_THEME_CSS.'font-awesome.min.css' ?>">
	<?php if($Page->key() == "contact") { ?>
		<link rel="stylesheet" href="<?php echo HTML_PATH_THEME_CSS.'sweetalert.min.css' ?>">
	<?php } ?>
	<!-- Plugins site head -->
    <?php Theme::plugins('siteHead') ?>
</head>
<body>
	<div class="container-full">
		<?php if($Url->whereAmI() == "home" || $Page->key() == "home") { ?>
		<div id="top" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
			<img src="<?php echo HTML_PATH_THEME_IMG.'nsa.png' ?>" id="site_logo" alt="Nusantara Speedcubing Association" class="img-responsive" style="margin: 0 auto;">
			<h1><span><?php echo $Site->title() ?></span></h1>
			<h2><?php echo $Site->slogan() ?></h2>
		</div>
		<?php } else { ?>
		<div id="head-navbar" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
			<a href="<?php echo $Site->url() ?>" style="text-decoration: none; color: initial">
				<img src="<?php echo HTML_PATH_THEME_IMG.'nsa.png' ?>" id="site_logo" alt="Nusantara Speedcubing Association">
				<span><?php echo $Site->title() ?><span id="small-tag"><?php echo $Site->slogan() ?></span></span>
			</a>
		</div>
		<?php } ?>
	</div>

	<nav class="navbar navbar-default">
		<div class="container-full" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 400, repeat: true}">
			<div class="navbar-header" style="text-align: center;">
				<button type="button" id="nav-button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-bars" aria-hidden="true"></i> MENU
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<?php $parents = $pagesParents[NO_PARENT_CHAR];
						foreach($parents as $Parent) {
							echo '<li id="li_'.$Parent->key().'"><a href="'.$Parent->permalink().'">'.$Parent->title().'</a></li>';
						}
					?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-full" id="div-content">
		<div id="content" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
			<!-- Plugins Page Begin -->
			<?php Theme::plugins('pageBegin') ?>
			
			<!-- Post's content -->
			<?php if($Page->key() == "contact") { ?>
				<?php include(PATH_THEME_PHP.'contact.php'); ?>
				<div id="contact-form">
					<?php echo $Page->content() ?>
					<form>
						<input type="hidden" name="n" value="<?php echo $token ?>">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<label style="font-weight: 400;">Name:</label>
									<input type="text" class="form-control" data-validation="required" name="name" placeholder="Name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<label style="font-weight: 400;">Email:</label>
									<input type="email" class="form-control" autocapitalize="none" data-validation="email" name="email" placeholder="Email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<label style="font-weight: 400;">Message:</label>
									<textarea style="resize: vertical;" data-validation="required" class="form-control" name="message" placeholder="Message"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-block" style="font-size: 20px;">Send</button>	
								</div>
							</div>
						</div>
					</form>
				</div>
			<?php } else { ?>
				<?php echo $Page->content() ?>
			<?php } ?>

			<!-- Plugins Page End -->
			<?php Theme::plugins('pageEnd') ?>
		</div>
	</div>

	<div class="arrow-separator arrow-themeorange"></div>

	<div class="container-full">
		<div id="footer" class="text-center" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
			<div id="social">
				<?php if(trim($Site->facebook())) { ?>
					<a href="<?php echo $Site->facebook() ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<?php } ?>
				<?php if(trim($Site->twitter())) { ?>
					<a href="<?php echo $Site->twitter() ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<?php } ?>
				<?php if(trim($Site->googlePlus())) { ?>
					<a href="<?php echo $Site->googlePlus() ?>" target="_blank"><i class="fa fa-google-plus-square"></i></a>
				<?php } ?>
				<?php if(trim($Site->instagram())) { ?>
					<a href="<?php echo $Site->instagram() ?>" target="_blank"><i class="fa fa-instagram"></i></a>
				<?php } ?>
				<?php if(trim($Site->github())) { ?>
					<a href="<?php echo $Site->github() ?>" target="_blank"><i class="fa fa-github-square"></i></a>
				<?php } ?>
				<a href="mailto:info@nsa.or.id" target="_blank"><i class="fa fa-envelope"></i></a>
			</div>
			<p><?php echo $Site->footer() ?></p>
		</div>
	</div>
	<script src="<?php echo HTML_PATH_THEME_JS.'jquery.min.js' ?>"></script>
	<script src="<?php echo HTML_PATH_THEME_JS.'bootstrap.min.js' ?>"></script>
	<script src="<?php echo HTML_PATH_THEME_JS.'uikit.scrollspy.js' ?>"></script>
	<?php if($Page->key() == "contact") { ?>
		<script src="<?php echo HTML_PATH_THEME_JS.'sweetalert.min.js' ?>"></script>
		<script src="<?php echo HTML_PATH_THEME_JS.'jquery.form-validator.min.js' ?>"></script>
	<?php } ?>
	<script>
	$(document).ready(function() {
		<?php if($Url->whereAmI() == "page") { ?>
			$('#li_<?php echo $Page->key(); ?>').addClass('active');
		<?php } else if($Url->whereAmI() == "home") { ?>
			$('#li_home').addClass('active');
		<?php } ?>

		$('img').not('#site_logo').addClass('img-responsive');
		$('table').wrap('<div class="tbl-res"></div>');

		<?php if($Page->key() == "contact") { ?>
			$.validate({
				onSuccess : function($form) {
					$('button[type=submit]').html('Send <i class="fa fa-spinner fa-spin"></i>');
					$('button[type=submit]').prop('disabled', true);
					$.ajax({
						type: "POST",
						url: "<?php echo HTML_PATH_THEME.'php/contact.php' ?>",
						data: $('form').serialize(),
						success: function(res) {
							if(res == 200) {
								$('#contact-form').replaceWith('<div class="text-center"><h3>Thanks for contacting us!</h3><span style="font-size: 40px;"><i class="fa fa-smile-o" aria-hidden="true"></i></span></div>');
							} else {
								sweetAlert("Oops...", res, "error");
								$('button[type=submit]').html('Send');
								$('button[type=submit]').prop('disabled', false);
							}
						}
					});
				}
			});
			$('form').submit(function(e) {
				e.preventDefault();
				return false;
			});
		<?php } ?>
	});
	</script>
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!-- Plugins site body end -->
    <?php Theme::plugins('siteBodyEnd') ?>
</body>
</html>