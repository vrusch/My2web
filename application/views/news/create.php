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


				<h1>Welcome to <?php echo lang('website_title_long'); ?></h1>

				<p>
					to je stranka na editaciu a pridavanie news ...
				</p>

		<!-- Main hero unit for a primary marketing message or call to action -->
		<?php echo validation_errors(); ?>

		<?php echo form_open('news/create'); ?>

		<label for="title">Title</label>
		<input type="input" name="title"/><br/>

		<label for="text">Text</label>
		<textarea name="text"></textarea><br/>

		<input type="submit" name="submit" value="Create news item"/>

		</form>

		<!-- Main hero unit for a primary marketing message or call to action -->

	</div>
	</div>
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>
