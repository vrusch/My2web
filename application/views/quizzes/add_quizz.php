<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Pridat Kviz'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_quizzes')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Kviz vytvoření"); ?></h2>

			<div class="well">
				<?php echo ("vytváření kvizu"); ?>
			</div>

			<?php
			foreach ($themes as $themes_item){
				$opt[$themes_item['id']] = $themes_item['theme'];
			}
			if (count($themes)){
				$opt += ['0' => 'Žádna tema'];
			} else {
				$opt = ['0' => 'Žádna tema'];
			}
			?>
			<?php echo form_open('quizzes_cont/new', 'class="form-horizontal"'); ?>
			<?php echo validation_errors();?>

			<div class="control-group">
				<label class="control-label" for="theme"><?php echo ('Tema'); ?></label>
				<div class="controls">
					<?php echo form_dropdown('theme_old', $opt, '0'); ?> nebo nova tema <?php echo form_input(array('name' => 'theme_new')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="quizz"><?php echo ('Kviz - nazev'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'quizz')); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('quizzes_cont', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

</body>
</html>
