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
			<?php echo $this->load->view('account/account_menu', array('current' => 'manage_users')); ?>
		</div>

		<div class="span10">

			<h2>Editace kurzu</h2>

			<div class="well">
				<p>Editace a přidávaní kurzu</p>
			</div>
			<div class="controls">

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">vytvorit kurz</button>
				</div>

			</div>
		</div>
	</div>
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>



