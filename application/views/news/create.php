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
			<div class="controls" style="color: #0981c6">
				<!-- Main hero unit for a primary marketing message or call to action -->
				<?php //echo validation_errors(); ?>

				<?php echo form_open('news/create'); ?>

				<h5>Životnost</h5>
				<input class="inline" type="input" name="lifetime"/>
				<div class="errors"><?php echo form_error('lifetime'); ?></div><br>


				<h5>Název</h5>
				<input class="inline" type="input" name="title"/>
				<div class="errors"><?php echo form_error('title'); ?></div><br>

				<h5>Text</h5>
				<textarea class="none" name="text" rows="10" cols="60" style = "border: 1px solid #0981c6"></textarea>
				<br>

				<div class="form-actions">
					<button type="submit" name="submit" class="btn btn-primary">Přidání novinky  <i class='far fa-paper-plane'></i></button>
				</div>

				</form>

			</div>
		</div>
	</div>
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>
