<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head_b', array('title' => ('pridat prednasku'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_lecture')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Nova prednaska"); ?></h2>

			<div class="well">
				<?php echo ("vytvorit novou prednasku nebo prezentaci"); ?>
			</div>

			<?php echo form_open('lecture/create', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo ('Název'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'id' => 'name', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="tema"><?php echo ('Tema'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'tema', 'id' => 'tema', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="lecture"><?php echo ('Text'); ?></label>
				<div class="controls">
					<?php echo form_textarea(array('name' => 'lecture', 'id' => 'lecture')); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('lecture/manage', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>

</body>
</html>

