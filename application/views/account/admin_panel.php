<ul class="nav nav-list">
	<?php if ($this->authorization->is_permitted( array('retrieve_users', 'retrieve_roles', 'retrieve_permissions') )) : ?>
		<li class="nav-header">Admin Panel</li>
		<?php if ($this->authorization->is_permitted('retrieve_users')) : ?>
			<li class="<?php echo ($current == 'manage_users') ? 'active' : ''; ?>"><?php echo anchor('account/manage_users', lang('website_manage_users')); ?></li>
		<?php endif; ?>

		<?php if ($this->authorization->is_permitted('retrieve_roles')) : ?>
			<li class="<?php echo ($current == 'manage_roles') ? 'active' : ''; ?>"><?php echo anchor('account/manage_roles', lang('website_manage_roles')); ?></li>
		<?php endif; ?>

		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_permissions') ? 'active' : ''; ?>"><?php echo anchor('account/manage_permissions', lang('website_manage_permissions')); ?></li>
		<?php endif; ?>
	<?php endif; ?>

</ul>
