<div style="border-right: 1px solid #ebebeb">
	<div style="width: 100%; height: 100px;border: 1px solid blue" class="logo">

	</div>
<br>
<ul class="nav nav-list" style="padding-right: 20px">

		<li class="nav-header">Prirazene kvizy</li>
			<?php foreach($quizzes as $quizzes_item) : ;?>
				<li class="<?php echo ($current == 'manage_quizzes'.$quizzes_item['id']) ? 'active' : ''; ?>"><?php echo anchor('play_quizzes_cont/gen/'.$quizzes_item['id'], $quizzes_item['name']); ?></li>
			<?php endforeach;?>
		<li class="nav-header">Individualni kvizy</li>
			<?php if (count($individual_quizzes) > 0) : ?>
			<?php foreach($quizzes as $quizzes_item) : ;?>
				<li class="<?php echo ($current == 'manage_quizzes'.$quizzes_item['id']) ? 'active' : ''; ?>"><?php echo anchor('play_quizzes_cont/gen/'.$quizzes_item['id'], $quizzes_item['name']); ?></li>
			<?php endforeach;?>
			<?php else : ?>
				<li class="<?php echo ($current == 'manage_quizzes'.$quizzes_item['id']) ? 'active' : ''; ?>"><?php echo '<small><em>  Nemate zadne individualne kvizy</em></small>'; ?></li>
			<?php endif;?>
</ul>
</div>
