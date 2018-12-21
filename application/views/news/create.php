<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => lang('users_page_name'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_permissions')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Novinky vytvoreni"); ?></h2>

			<div class="well">
				<?php echo ("vytvareni novinek"); ?>
			</div>

			<?php echo form_open(uri_string(), 'class="form-horizontal"'); ?>

			<div class="control-group <?php echo (form_error('permission_key') || isset($permission_key_error)) ? 'error' : ''; ?>">
				<label class="control-label" for="permission_key"><?php echo lang('permissions_key'); ?></label>

				<div class="controls">
					<?php if( $is_system ) : ?>
						<?php echo form_hidden('permission_key', set_value('permission_key') ? set_value('permission_key') : (isset($permission->key) ? $permission->key : '')); ?>

						<span class="input uneditable-input"><?php echo $permission->key; ?></span><span class="help-block"><?php echo lang('permissions_system_name'); ?></span>
					<?php else : ?>
						<?php echo form_input(array('name' => 'permission_key', 'id' => 'permission_key', 'value' => set_value('permission_key') ? set_value('permission_key') : (isset($permission->key) ? $permission->key : ''), 'maxlength' => 80)); ?>

						<?php if (form_error('permission_key') || isset($permission_key_error)) : ?>
							<span class="help-inline">
                <?php
				echo form_error('permission_key');
				echo isset($permission_key_error) ? $permission_key_error : '';
				?>
                </span>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="control-group <?php echo form_error('permission_description') ? 'error' : ''; ?>">
				<label class="control-label" for="permission_description"><?php echo lang('permissions_description'); ?></label>

				<div class="controls">
					<?php echo form_textarea(array('name' => 'permission_description', 'id' => 'permission_description', 'value' => set_value('permission_description') ? set_value('permission_description') : (isset($permission->description) ? $permission->description : ''), 'maxlength' => 160, 'rows'=>'4')); ?>

					<?php if (form_error('permission_description') || isset($permission_name_error)) : ?>
						<span class="help-inline">
              <?php
			  echo form_error('permission_description');
			  ?>
              </span>
					<?php endif; ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="settings_lastname"><?php echo lang('permissions_role'); ?></label>

				<div class="controls">
						<label class="checkbox">
							<?php echo form_checkbox("role_permission_{$role->id}", 'apply', $check_it); ?>
							<?php echo $role->name; ?>
						</label>
				</div>
			</div>

			<div class="form-actions">
				<?php echo form_submit('manage_permission_submit', lang('settings_save'), 'class="btn btn-primary"'); ?>
				<?php echo anchor('news/manage_news', lang('website_cancel'), 'class="btn"'); ?>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

<?php //echo $this->load->view('footer_n'); ?>

</body>
</html>
