<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('add company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("add companies"); ?></h2>

			<div class="well">
				<?php echo ("add companies "); ?>
			</div>

			<?php echo validation_errors(); ?>

			<?php echo form_open('companies/add_companies'); ?>

			<label for="name">name</label>
			<input type="input" name="name" /><br />

			<label for="division">division</label>
			<input type="input" name="division" /><br />

			<label for="department">department</label>
			<input type="input" name="department" /><br />

			<label for="notes">date_publish</label>
			<input type="input" name="notes" /><br />


			<input type="submit" name="submit" value="Create" />

			</form>

		</div>

	</div>
</div>

<?php //echo $this->load->view('footer_n'); ?>

</body>
</html>
