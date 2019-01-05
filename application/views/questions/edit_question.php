<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_question')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Otazka editace"); ?></h2>

			<div class="well">
				<?php echo "editovani otazky #".$question['id']; ?>
			</div>
			<?php echo form_open('questions/update/'.$question['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="tema"><?php echo ('Tema'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'tema', 'id' => 'tema'), $question['tema']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="question"><?php echo ('Otazka'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'question', 'id' => 'question'), $question['question']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="true_answer"><?php echo ('Spravna odpoved'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'true_answer', 'id' => 'true_answer'), $question['true']['answer']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="bad_answer1"><?php echo ('Spatna odpoved #1'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'bad_answer1', 'id' => 'bad_answer1'), $question['false1']['answer']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="bad_answer2"><?php echo ('Spatna odpoved #2'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'bad_answer2', 'id' => 'bad_answer2'), $question['false2']['answer']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="bad_answer3"><?php echo ('Spatna odpoved #3'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'bad_answer3', 'id' => 'bad_answer3'), $question['false3']['answer']); ?>
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
