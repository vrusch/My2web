<!DOCTYPE html>
<html lang="cz">
<head>

	<?php echo $this->load->view('head_small'); ?>

</head>
<body>
<?php //var_dump($question);?>
<?php //var_dump($rnd_answer);?>
<div class="container">
	<div class="row">
		<?php echo form_open('questions/validate/'. $question['id'], 'class="form-horizontal"'); ?>
		<?php echo validation_errors(); ?>
		<div class="w3-panel w3-light-grey w3-border w3-round">
			<h3>Nahled na otazku #<?php echo $question['id']; ?></h3><br>
		</div>

		<div class="w3-panel w3-light-grey w3-border w3-round">
			<h4>Otazka:</h4>
			<div class="well-small" style="background-color: white; border-radius: 15px; padding-left: 20px">
				<p><strong><?php echo $question['question']; ?></strong></p>
			</div><br>
			<h4>Odpovedi:</h4>
			<table>
				<?php if (isset($warn)){echo '<h4 style="background-color: white; text-align: center; color: '.$warncl.'"><strong>'.$warn.'</strong></h4>';} ?>
				<?php foreach ($rnd_answer as $rnd_item) : ?>
					<?php $ans = $this->question_model->get_answer($rnd_item); ?>
				<tr>
					<td>
						<input class="w3-check" type="radio" name="user_answ[<?php echo $question['id']; ?>]" value="<?php echo $ans['id']; ?>">
						<label> <?php echo $ans['answer']; ?></label>
					</td>
				</tr>
				<?php endforeach; ?>

			</table><br>
		</div>
		<?php echo form_submit('', 'Dalsi', 'class="btn btn-primary"'); ?>
		<br>
	<hr>
	</div>

	<?php echo form_close(); ?>
</div>

</body>
</html>
