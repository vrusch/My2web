<ul class="nav nav-list">
  <li class="nav-header">Site Admin Panel</li>

<?php if ($this->authorization->is_permitted( array('retrieve_users', 'retrieve_roles', 'retrieve_permissions') )) : ?>
	<?php if ($this->authorization->is_permitted('retrieve_users')) : ?>
		<li class="<?php echo ($current == 'manage_news') ? 'active' : ''; ?>"><?php echo anchor('enews','Novinky'); ?></li>
	<?php endif; ?>

	<?php if ($this->authorization->is_permitted('retrieve_roles')) : ?>
		<li class="<?php echo ($current == 'manage_article') ? 'active' : ''; ?>"><?php echo anchor('earticle','Články'); ?></li>
	<?php endif; ?>

	<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
		<li class="<?php echo ($current == 'manage_course') ? 'active' : ''; ?>"><?php echo anchor('ecourse','Kurzy'); ?></li>
	<?php endif; ?>
<?php endif; ?>
	<li class="nav-header">Site Edit menu</li>
</ul>
