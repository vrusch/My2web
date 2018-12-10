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
					This is the homepage for your web-app. You can use this as a starting point for creating with A3M
					and building the rest of your site.
					If you like this project, please help contribute with <b>bug fixes &amp; enhancements</b> on <a
						href="https://github.com/donjakobo/A3M">GitHub</a>.
				</p>

				<p class="pull-left clearfix">
					<a class="btn btn-info" href="https://github.com/donjakobo/A3M/wiki"><i
							class="icon-info-sign icon-white"></i> Wiki</a>&nbsp;
					<a class="btn btn-primary" href="http://stackoverflow.com/questions/tagged/codeigniter-a3m"><i
							class="icon-comment icon-white"></i> Have questions?</a>
				</p>
				<p class="pull-right clearfix">
					<a class="btn btn-danger" href="course"><i class="icon-globe icon-white"></i> Kurzy &raquo;</a>
				</p>
			</div>

		</div>

	</div>

	<div style="width: 1170px; height:500px; border: 1px solid; background-color: #f7f7f7; border-radius: 5px;">
		<div class="row">
			<div class="column">
				<div class="card">..</div>
			</div>
			<div class="column">
				<div class="card">..</div>
			</div>
			<div class="column">
				<div class="card">..</div>
			</div>
			<div class="column">
				<div class="card">..</div>
			</div>
		</div>

	</div>
</div>


<?php echo $this->load->view('footer'); ?>

</body>
</html>
