<!DOCTYPE html>
<html lang="cz">
<head>

	<?php echo $this->load->view('head_small'); ?>

</head>
<body>
<?php var_dump($question);?>
<?php var_dump($rnd_answer);?>
<div class="container">
	<div class="row">
		<div class="w3-panel w3-light-grey w3-border w3-round">
			<h3>Nahled na otazku #<?php echo $question['id']; ?></h3><br>
		</div>

		<div class="w3-panel w3-light-grey w3-border w3-round">
			<h4>Otazka:</h4>
			<input class="w3-input w3-border w3-round-large" type="text" value="<?php echo $question['question']; ?>"><br>

			<h4>Odpovedi:</h4>
				<?php
				foreach ($rnd_answer as $rnd_item){
					$ans = $this->question_model->get_answer($rnd_item)
					//var_dump ($this->question_model->get_answer($rnd_item));
					echo ($ans['answer']);
				}
				?>
		</div>

	</div>
</div>

</body>
</html>
