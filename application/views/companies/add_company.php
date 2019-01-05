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

			<?php echo form_open('companies/create', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo ('Název'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'id' => 'name', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="division"><?php echo ('Divize'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'division', 'id' => 'division', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="department"><?php echo ('Oddělení'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'department', 'id' => 'department', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="notes"><?php echo ('Poznamka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'notes', 'id' => 'notes', '', 'maxlength' => 100)); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('companies', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>

</body>
</html>
