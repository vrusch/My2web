<!DOCTYPE html>
<html lang="cz">
<head>

	<?php echo $this->load->view('head_small'); ?>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="w3-panel w3-light-grey w3-border w3-round">
			<h3>Nahled na otazku #<?php echo $question['id']; ?></h3>
			<p>Otazka je k tematu: <?php echo $question['tema']; ?></p>
		</div>

		<div class="w3-panel w3-light-grey w3-border w3-round">
			<h4>Otazka:</h4>
			<input class="w3-input w3-border w3-round-large" type="text"><br>

			<h4>Odpovedi:</h4>
			<p>
				<input class="w3-check" type="checkbox" checked="checked">
				<label> <?php echo $question['id']; ?></label></p>
			<p>
				<input class="w3-check" type="checkbox">
				<label> <?php echo $question['id']; ?></label></p>
			<p>
				<input class="w3-check" type="checkbox">
				<label> <?php echo $question['id']; ?></label></p>
			<p>
				<input class="w3-check" type="checkbox">
				<label> <?php echo $question['id']; ?></label></p>
		</div>

	</div>
</div>

</body>
</html>
