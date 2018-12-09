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
					This is the homepage for your web-app. You can use this as a starting point for creating with A3M and building the rest of your site.
					If you like this project, please help contribute with <b>bug fixes &amp; enhancements</b> on <a href="https://github.com/donjakobo/A3M">GitHub</a>.
				</p>

			</div>

		</div>
	</div>
</div>






<?php foreach ($news as $news_item): ?>

	<h3><?php echo $news_item['title']; ?></h3>
	<div>
		<?php echo $news_item['text']; ?>
	</div>
	<p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>







				<?php echo $this->load->view('footer'); ?>

		</body>
</html>
