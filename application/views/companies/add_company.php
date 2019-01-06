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

			<h2><?php echo("Firmy"); ?></h2>

			<div class="well">
				<?php echo("Pridat firmu a MKB - manazer kyberbezpenosti, kdyz zadate username a email bude zaslan aktivacni email s pokyny jak spravovat skupiny zaku, zaky a kurzy, Jinak jde aktivaci provest pozdeji"); ?>
			</div>

			<?php echo form_open('companies/create', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo('Název společnosti * '); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name',set_value('name'))); ?>
				</div>
				<span class="help-inline">
					<span class="field_error"><?php form_error('name'); ?></span>
				</span>
			</div>

			<div class="control-group">
				<label class="control-label" for="mkb_username"><?php echo('MKB username'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'mkb_username', set_value('mkb_username'))); ?>
				</div>
				<span class="help-inline">
					<span class="field_error"><?php form_error('mkb_username'); ?></span>
				</span>
			</div>

			<div class="control-group">
				<label class="control-label" for="mkb_email"><?php echo('MKB email'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'mkb_email', set_value('mkb_email'))); ?>
				</div>
				<span class="help-inline">
					<span class="field_error"><?php form_error('mkb_email'); ?></span>
				</span>
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
