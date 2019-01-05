<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('otazky pridat'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_question')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Otazky vytvoření"); ?></h2>

			<div class="well">
				<?php echo ("vytváření otazek"); ?>
			</div>

			<?php echo form_open('questions/new_question', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="tema"><?php echo ('Tema'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'tema', 'id' => 'tema')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="question"><?php echo ('Otazka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'question', 'id' => 'question', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="true_answer"><?php echo ('Odpoved Spravna'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'true_answer', 'id' => 'true_answer', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="bad_answer1"><?php echo ('Odpoved spatna'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'bad_answer1', 'id' => 'bad_answer1', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="bad_answer2"><?php echo ('Odpoved spatna'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'bad_answer2', 'id' => 'bad_answer2', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="bad_answer3"><?php echo ('Odpoved spatna'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'bad_answer3', 'id' => 'bad_answer3', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('questions', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

</body>
</html>
