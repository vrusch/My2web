<ul class="nav nav-list">
	<?php if ($this->authorization->is_permitted( array('retrieve_users', 'retrieve_roles', 'retrieve_permissions') )) : ?>
		<li class="nav-header">Uzivatele Admin menu</li>
		<?php if ($this->authorization->is_permitted('retrieve_users')) : ?>
			<li class="<?php echo ($current == 'manage_users') ? 'active' : ''; ?>"><?php echo anchor('account/manage_users', lang('website_manage_users')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_roles')) : ?>
			<li class="<?php echo ($current == 'manage_roles') ? 'active' : ''; ?>"><?php echo anchor('account/manage_roles', lang('website_manage_roles')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_permissions') ? 'active' : ''; ?>"><?php echo anchor('account/manage_permissions', lang('website_manage_permissions')); ?></li>
		<?php endif; ?>
			<li class="nav-header">Web Admin menu</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_images') ? 'active' : ''; ?>"><?php echo anchor('img', ('Nahrávaní obrázkú')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_homepage') ? 'active' : ''; ?>"><?php echo anchor('manage/manage_home', ('Nastaveni HomePage')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_colors') ? 'active' : ''; ?>"><?php echo anchor('manage/manage_colorschema', ('Barevne schema')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news/manage', ('Novinky')); ?></li>
		<?php endif; ?>
		<li class="nav-header">Admin tvorba kvizu</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_companies') ? 'active' : ''; ?>"><?php echo anchor('companies/manage', ('Firmy')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_question') ? 'active' : ''; ?>"><?php echo anchor('questions/manage', ('Otazky')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_lecture') ? 'active' : ''; ?>"><?php echo anchor('lecture/manage', ('Přednášky')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_course') ? 'active' : ''; ?>"><?php echo anchor('course/manage', ('Managment Kurzů')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_assignment') ? 'active' : ''; ?>"><?php echo anchor('classroom/manage', ('Přiřazování')); ?></li>
		<?php endif; ?>
		<li class="nav-header">Manazer kyberbezpecnosti</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_companies') ? 'active' : ''; ?>"><?php echo anchor('companies/manage', ('Firma, zaci')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_assignment') ? 'active' : ''; ?>"><?php echo anchor('classroom/manage', ('Přiřazování')); ?></li>
		<?php endif; ?>
	<?php endif; ?>

</ul>
