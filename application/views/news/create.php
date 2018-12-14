<!DOCTYPE html>
<html>
<head>

	<?php echo $this->load->view('head'); ?>

</head>
<body>

<?php echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<div class="span2">
			<?php echo $this->load->view('editSite/manage_site_menu', array('current' => 'manage_news')); ?>
		</div>

		<div class="span10">

			<h2><?php echo('Editace novinek'); ?></h2>

			<div class="well">
				<?php echo('Editace a přidávaní novinek'); ?>
			</div>
			<div class="controls">
				<!-- Main hero unit for a primary marketing message or call to action -->
				<?php echo validation_errors(); ?>

				<?php echo form_open('news/create'); ?>

				<label for="title">Title</label>
				<input type="input" name="title"/><br/>

				<label for="text">Text</label>
				<textarea name="text"></textarea><br/>


				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Přidání novinky  <i class='far fa-paper-plane'></i></button>
				</div>

				</form>

				<!-- Main hero unit for a primary marketing message or call to action -->
			</div>
		</div>
	</div>
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>
