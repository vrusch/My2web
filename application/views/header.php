<div class="container mynav">
	<div class="sitebordertop" style="height: 65px; background-color: #ffffff;">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Logo KTG</a>
		</div>
	</div>
	<div class="navbar">

		<div class="nav-collapse collapse">
			<ul class="nav">
				<li class="divider-vertical"></li>
				<li class='faw'
					style="border-left: 2px solid #0981c6; border-radius: 15px;"><?php echo anchor('service', 'Sluzby'); ?></li>
				<li class='faw'
					style="border-left: 2px solid #0981c6; border-radius: 15px;"><?php echo anchor('news', 'Novinky'); ?></li>
				<li class='faw'
					style="border-left: 2px solid #0981c6; border-radius: 15px;"><?php echo anchor('reference', 'Reference'); ?></li>
				<li class='faw'
					style="border-left: 2px solid #0981c6; border-radius: 15px;"><?php echo anchor('contact', 'Kontakty'); ?></li>
				<li class='faw'
					style="border-left: 2px solid #0981c6; border-radius: 15px;"><?php echo anchor('about', 'O nás'); ?></li>
			</ul>

			<!--/admin buttons -->
			<?php if ($this->authentication->is_signed_in()) : ?>
				<ul class="nav" style="margin-left: 350px;">
					<li style="border-left: 1px solid red; border-radius: 15px;"><?php echo anchor('enews', 'Novinky'); ?></li>
					<li style="border-left: 1px solid red; border-radius: 15px;"><?php echo anchor('earticle', 'Články'); ?></li>
					<li style="border-left: 1px solid red; border-radius: 15px;"><?php echo anchor('ecourse', 'Kurzy'); ?></li>
				</ul>
			<?php endif; ?>
			<!--/end of admin buttons -->

			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #0088cc">
						<?php if ($this->authentication->is_signed_in()) : ?>
						<i class="fas fa-user"></i> <?php echo $account->username; ?> <b class="caret"></b></a>
					<?php else : ?>
						<i class="fas fa-user-alt-slash"></i> <b class="caret"></b></a>
					<?php endif; ?>

					<ul class="dropdown-menu">
						<?php if ($this->authentication->is_signed_in()) : ?>
							<li class="nav-header">Account Info</li>
							<li><?php echo anchor('account/account_profile', lang('website_profile')); ?></li>
							<li><?php echo anchor('account/account_settings', lang('website_account')); ?></li>
							<?php if ($account->password) : ?>
								<li><?php echo anchor('account/account_password', lang('website_password')); ?></li>
							<?php endif; ?>
							<li><?php echo anchor('account/account_linked', lang('website_linked')); ?></li>
							<?php if ($this->authorization->is_permitted(array('retrieve_users', 'retrieve_roles', 'retrieve_permissions'))) : ?>
								<li class="divider"></li>
								<li class="nav-header">Admin Panel</li>
								<?php if ($this->authorization->is_permitted('retrieve_users')) : ?>
									<li><?php echo anchor('account/manage_users', lang('website_manage_users')); ?></li>
								<?php endif; ?>

								<?php if ($this->authorization->is_permitted('retrieve_roles')) : ?>
									<li><?php echo anchor('account/manage_roles', lang('website_manage_roles')); ?></li>
								<?php endif; ?>

								<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
									<li><?php echo anchor('account/manage_permissions', lang('website_manage_permissions')); ?></li>
								<?php endif; ?>
							<?php endif; ?>

							<li class="divider"></li>
							<li><?php echo anchor('account/sign_out', lang('website_sign_out')); ?></li>
						<?php else : ?>
							<li><?php echo anchor('account/sign_in', lang('website_sign_in')); ?></li>
						<?php endif; ?>

					</ul>
				</li>
			</ul>

		</div>
		<!--/.nav-collapse -->
	</div>

</div>
