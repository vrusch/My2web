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
			<li class="<?php echo ($current == 'manage_images') ? 'active' : ''; ?>"><?php echo anchor('images', ('Nahrávaní obrázkú')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_homepage') ? 'active' : ''; ?>"><?php echo anchor('webhome', ('Nastaveni HomePage')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_colors') ? 'active' : ''; ?>"><?php echo anchor('colors', ('Barevne schema')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('news', ('Novinky')); ?></li>
		<?php endif; ?>
		<li class="nav-header">Admin tvorba kvizu</li>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_companies') ? 'active' : ''; ?>"><?php echo anchor('companies', ('Firmy')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_question') ? 'active' : ''; ?>"><?php echo anchor('questions', ('Otazky')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_lecture') ? 'active' : ''; ?>"><?php echo anchor('lecture', ('Přednášky')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_course') ? 'active' : ''; ?>"><?php echo anchor('course', ('Managment Kurzů')); ?></li>
		<?php endif; ?>
		<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
			<li class="<?php echo ($current == 'manage_assignment') ? 'active' : ''; ?>"><?php echo anchor('assigment', ('Přiřazování')); ?></li>
		<?php endif; ?>
	<?php endif; ?>

		<?php if ($this->authorization->is_role_mkb()) : ?>
			<?php //if ($this->authorization->is_permitted('retrieve_permissions')) : //todo: doplnit permition mkb moze pozerat iba manager kyberbezpecnosti?>
				<li class="nav-header">Manazer kyberbezpecnosti</li>
				<?php //if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
					<li class="<?php echo ($current == 'mkb_manage_companies') ? 'active' : ''; ?>"><?php echo anchor('mkb/company', ('Firma, zaci')); ?></li>
				<?php //endif; ?>
				<?php //if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
				<li class="<?php echo ($current == 'mkb_manage_assignment') ? 'active' : ''; ?>"><?php echo anchor('mkb/assigment', ('Přiřazování')); ?></li>
				<?php //endif; ?>
			<?php //endif; ?>
		<?php endif; ?>


</ul>
