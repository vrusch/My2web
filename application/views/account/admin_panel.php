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
			<li class="nav-header">Site Admin Panel</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'images') ? 'active' : ''; ?>"><?php echo anchor('images', ('Nahrávaní obrázkú')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_homepage') ? 'active' : ''; ?>"><?php echo anchor('manage_homepage', ('Nastaveni HomePage')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_colors') ? 'active' : ''; ?>"><?php echo anchor('manage_colors', ('Barevne schema')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/manage_news', ('Novinky')); ?></li>
		<?php endif; ?>
		<li class="nav-header">Customer mangment</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_companies') ? 'active' : ''; ?>"><?php echo anchor('manage_companies', ('Firmy')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_course') ? 'active' : ''; ?>"><?php echo anchor('manage_course', ('Managment Kurzů')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_lecture') ? 'active' : ''; ?>"><?php echo anchor('manage_lecture', ('Přednášky')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_assignment') ? 'active' : ''; ?>"><?php echo anchor('manage_assignment', ('Přiřazování')); ?></li>
		<?php endif; ?>
	<?php endif; ?>

</ul>
