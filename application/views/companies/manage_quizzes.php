<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('manage_quizzes'))); ?>
</head>

<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Managment kvizu"); ?></h2>

			<div class="well">
				<?php echo ("Managment kvizu"); ?>
			</div>

			<?php echo form_open('companies/add_groups/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Managment kvizu pro firmu: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
			</div>

			<?php //var_dump($groups); ?>

			<div class="control-group">
				<label class="control-label" for="group1"><?php echo('Nová skupina'); ?></label>
				<div class="controls">
					<?php //echo form_input(array('name' => 'group1'), '', 'style="margin: 10px"'); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo anchor('companies/edit/' . $company['id'], 'Cancel', 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>
</body>
</html>


