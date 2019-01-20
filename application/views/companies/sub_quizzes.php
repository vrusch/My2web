<?php $count_groups = count($groups); ?>
<?php if ($count_groups > 0) : ?>
	<div style="width: 100%">
		<p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
		<?php $act = 1; ?>
		<ul class="nav nav-pills">
			<?php foreach ($groups as $groups_item) : ?>
				<?php $act++; ?>
			<?php if ($act == 2) : ?>
					<li class="active"><a data-toggle="pill" href="#sub_menu<?php echo $groups_item['id']; ?>"><?php echo $groups_item['name_of_group']; ?></a></li>
				<?php else : ?>
				<li><a data-toggle="pill" href="#sub_menu<?php echo $groups_item['id']; ?>"><?php echo $groups_item['name_of_group']; ?></a></li>
				<?php endif ?>
			<?php endforeach; ?>

		</ul>

		<div class="tab-content">
			<?php foreach ($groups as $groups_item) : ?>
				<div id="sub_menu<?php echo $groups_item['id']; ?>" class="tab-pane fade">
					<h3><?php echo $groups_item['name_of_group']; ?></h3>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php else :  ?>
Zadne kvizi protoze nejsou skupiny
<?php endif ?>






