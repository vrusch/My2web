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

			<?php echo form_open('quizzes_cont/new', 'class="form-horizontal"'); ?>
			<?php echo validation_errors();?>

			<div class="control-group">
				<label class="control-label" for="quizz"><?php echo ('Kviz - nazev'); ?></label>
				<div class="controls">
					<input type="text" name="quizz" placeholder="Nazev kvizu" style="width:50%"  />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="difficulty"><?php echo ('Narocnost'); ?></label>
				<div class="controls">
					<input type="text" name="difficulty" placeholder="Narocnost kvizu 1:nejlehci - 3:nejtezsi" style="width:50%"  />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="estimated_time"><?php echo ('Delka kvizu'); ?></label>
				<div class="controls">
					<input type="text" name="estimated_time" placeholder="Odhadovana delka kvizu v min." style="width:50%"  />
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="note"><?php echo ('Poznamka/Popis'); ?></label>
				<div class="controls">
					<?php echo form_textarea(array('name' => 'note'), '','placeholder="poznamka, urceni, cile o cem to bude atd."'); ?>
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
