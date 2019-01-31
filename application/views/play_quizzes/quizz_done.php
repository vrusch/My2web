<!DOCTYPE html>
<html>
<head>
	<script type = "text/javascript" >
		function changeHashOnLoad() {
			window.location.href += "#";
			setTimeout("changeHashAgain()", "50");
		}

		function changeHashAgain() {
			window.location.href += "1";
		}

		var storedHash = window.location.hash;
		window.setInterval(function () {
			if (window.location.hash != storedHash) {
				window.location.hash = storedHash;
			}
		}, 50);


	</script>
	<?php echo $this->load->view('head', array('title' => ('Play Quizzes'))); ?>
</head>
<body onload="changeHashOnLoad(); ">
<?php $now = time(); $datestring = 'Datum: %d-%m-%Y ';?>
<div class="container">
	<div class="row">
		<div class="span2">
			<?php //echo $this->load->view('play_quizzes/run_panel'); ?>
		</div>

		<div class="span10">

			<div class="well" style="border: 1px solid black">
				<table style="width: 100%">
					<tr>
						<td style="width: 40%"><strong><h3><?php echo $quizz_info['name'] ;?></h3></strong></td>
						<td style="width: 20%; text-align: right"></td>
						<td style="width: 20%; text-align: right"><strong><?php echo mdate($datestring, $now) ;?></strong></td>
						<td style="width: 20%; text-align: right">
							<a href="play_quizzes_cont/manage/<?php echo $student_info['id'] ;?>"><buton class="btn btn-primary btn-small"> Zpátky </buton></a>
						</td>
					</tr>
				</table>
			</div><br>
			<div class="well" style="border: 1px solid black">
				<?php //var_dump($result);?>

				<?php if (isset($bad)) : ?> <!-- uspesny kviz -->
					<p>Kviz neuspesne dokonceny</p>
				<?php $poc = 1;?>
				<p>Z celkoveho poctu <?php echo (count($result));?> otazek jste spatne odpovedel(a) na <?php echo (count($bad));?> otazky.</p>
					<?php
						foreach ($bad as $item) {
							$question = $this->play_quizzes_model->get_question($item['question']);
							$true_answer = $this->play_quizzes_model->get_answer($item['true_answ']);
							$bad_answer = $this->play_quizzes_model->get_answer($item['user_answ']);
						echo '<p>Chyba #'.$poc.':</p><br>';
						echo '<p>Na otazku: <strong>'.$question['question'].'</strong></p><br>';
						echo '<p>Jste odpovedel: <strong style="color: #942a25">'.$bad_answer['answer'].'</strong></p><br>';
						echo '<p>Spravna odpoved je: <strong style="color: #5eb95e">'.$true_answer['answer'].'</strong></p><br>';
						$poc++;
						}
					?>


				<?php else : ;?> <!-- uspesny kviz -->
					<p>Kviz uspesne dokonceny</p>
				<?php endif;?>


			</div>
		</div>
	</div>
</div>
</body>
</html>

