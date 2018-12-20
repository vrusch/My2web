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
			<li class="<?php echo ($current == 'upload_images') ? 'active' : ''; ?>"><?php echo anchor('site/upload_images', ('nahravani obrazku')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_companies') ? 'active' : ''; ?>"><?php echo anchor('site/slogan_manage', ('Slogany')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/create', ('Novinky')); ?></li>
		<?php endif; ?>
		<li class="nav-header">Customer mangment</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/create', ('Firmy')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/create', ('Kurzy')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/create', ('Prednasky')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/create', ('Prirazovani')); ?></li>
		<?php endif; ?>
	<?php endif; ?>

</ul>
