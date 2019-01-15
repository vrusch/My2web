<!DOCTYPE html>
<html>
<head>

	<?php echo $this->load->view('head', array('title' => ('otazky pridat do kvizu'))); ?>

</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_question')); ?>
		</div>
		<div class="span10">

			<h2><?php echo("Otazky prirazeni"); ?></h2>

			<div class="well">
				<?php echo("prirazeni otazky do kvizu"); ?>
			</div>
			<?php echo form_open('questions/addto/' . $question['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>
			<?php
			$quizzes = $this->question_model->get_quizzes();
			foreach ($quizzes as $quizz_item){
				$opt[$quizz_item['id']] = $quizz_item['name'];
			}
			if (count($quizzes)){
				$opt += ['0' => 'Žádny kviz'];
			} else {
				$opt = ['0' => 'Žádne kvizy'];
			}
			?>
			<table class="table table-condensed table-hover">
				<tr>
					<td>
						<div class="w3-panel w3-light-grey w3-border w3-round">
							<label>Otazku <strong>#<?php echo $question['id']; ?> '<?php echo $question['question']; ?>'</strong> priradit do kvizu:</label>
						</div>
					</td>
					<td>
						<div class="w3-panel w3-light-grey w3-border w3-round">
							<?php echo form_dropdown('quizz', $opt, '0'); ?>
						</div>
					</td>
				</tr>
			</table>

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
