<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_question')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Otazka editace"); ?></h2>

			<div class="well">
				<?php echo ("editovani otazky"); ?>
			</div>
			<?php echo form_open('questions/update/'.$question['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo ('Název'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'id' => 'name'), $question['tema']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="division"><?php echo ('Divize'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'division', 'id' => 'division'), $question['question']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="department"><?php echo ('Oddělení'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'department', 'id' => 'department'), $question['true']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="notes"><?php echo ('Poznamka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'notes', 'id' => 'notes'), $question['false1']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="notes"><?php echo ('Poznamka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'notes', 'id' => 'notes'), $question['false2']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="notes"><?php echo ('Poznamka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'notes', 'id' => 'notes'), $question['false3']); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('questions/manage', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>

	</div>
</div>

</body>
</html>
