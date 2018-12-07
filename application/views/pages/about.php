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

		<div class="offset1 span5">
			<h3>Nejake kontakty
				<small>tak tu su rozne:</small>
			</h3>

			<div class="media">
				<img class="media-object" data-src="holder.js/64x64">

				<div class="media-body">
					<h4 class="media-heading">kontakt 1</h4>
					<code>bla bla ..</code>
				</div>
			</div>

			<div class="media">
				<img class="media-object" data-src="holder.js/64x64">

				<div class="media-body">
					<h4 class="media-heading">kontakt 2</h4>
					<code>bla bla ..</code>
				</div>
			</div>

			<div class="media">
				<img class="media-object" data-src="holder.js/64x64">

				<div class="media-body">
					<h4 class="media-heading">Kontakt 3</h4>
					<code>bla bla ..</code>
				</div>
			</div>
		</div>

		<div class="offset1 span5">
			<h3>Kde sme?
				<small>the Images, Icons &amp; CSS ?</small>
			</h3>

			<div class="media">
				<a class="pull-left" href="#"><img class="media-object" data-src="holder.js/64x64"></a>

				<div class="media-body">
					<h4 class="media-heading">
						<a href="http://getbootstrap.com/2.3.2/" title="Go-to Bootstrap site">
					</h4>
				</div>
			</div>

		</div>

	</div>
	<!-- /end row -->
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>
