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

			<h2><?php echo ('novinka ulozena'); ?></h2>

			<p><?php echo anchor('', ('sign_out_go_to_home'), array('class' => 'button')); ?></p>

		</div>
	</div>
</div>

<?php echo $this->load->view('footer'); ?>
</body>
</html>
