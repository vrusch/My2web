<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Firma editace"); ?></h2>

			<div class="well">
				<?php echo ("editovani firmy"); ?>
			</div>
			<?php $hidden = array ('id' => $companies_item['id']); ?>
			<?php echo form_open('companies/update/'.$companies_item['id'], 'class="form-horizontal"', $hidden); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo ('Název'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'id' => 'name'), $companies_item['name']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="division"><?php echo ('Divize'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'division', 'id' => 'division'), $companies_item['division']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="department"><?php echo ('Oddělení'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'department', 'id' => 'department'), $companies_item['department']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="notes"><?php echo ('Poznamka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'notes', 'id' => 'notes'), $companies_item['notes']); ?>
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


