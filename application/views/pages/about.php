<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head'); ?>

</head>
<body>

<?php echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<div class="span12">

			<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="hero-unit" style="position: relative;">
				<div class="ribbon-wrapper-green">
					<div class="ribbon-green">v1.0.1</div>
				</div>

				<h1>Welcome to <?php echo lang('website_title_long'); ?></h1>

				<p>
					to je stranka onas blablabla ...
				</p>
			</div>

		</div>
		<div class="span12" style="width: 80%; height:200px; border: 1px solid; background-color: #fdfdfd; border-radius: 5px;">
			<p>Napiste nam - kontaktujte nas</p>
		</div>


	</div>

	<!-- /end row -->
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>
