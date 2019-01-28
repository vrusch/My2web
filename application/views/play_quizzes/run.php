<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Play Quizzes'))); ?>
</head>
<body>
<?php $now = time(); $datestring = 'Datum: %d-%m-%Y ';?>
<div class="container">
	<div class="row">
<?php //var_dump($sequence); ?>
		<div class="span2">
			<?php echo $this->load->view('play_quizzes/run_panel'); ?>
		</div>
		<div class="span10">
			<div class="well">
				<table style="width: 100%">
					<tr>
						<td style="width: 40%"><strong><h3><?php echo $quizz_info['name'] ;?></h3></strong></td>
						<td style="width: 20%; text-align: right"></td>
						<td style="width: 20%; text-align: right"><strong><?php echo mdate($datestring, $now) ;?><h5 style="line-height: 0;"><time>00:00:00</time></h5></strong></td>
						<td style="width: 20%; text-align: right"><a href="play_quizzes_cont/manage/<?php echo $student_info['id'] ;?>"><buton class="btn btn-primary btn-small"> Zpátky </buton></a></td>
					</tr>
				</table>
			</div>
				<?php $seq = $this->play_quizzes_model->load_quizz($sequence); ?>
			<?php //var_dump($seq); ?>
			<div class="well-large">
				<?php foreach ($seq['quizz_lecture'] as $item) : ?>
					<?php
						$lecture = $this->play_quizzes_model->load_lecture($item['lecture_id']);
						echo '<h2>'. $lecture['name'].'</h2>';
						echo $lecture['lecture'];
					?>
				<?php endforeach; ?>

				<?php
				foreach($seq['questions'] as $key => $value) {
					echo $key; // Would output "subkey" in the example array
					print_r($value);
				}
				?>

				<?php foreach ($seq['questions'] as $item) : ?>
					<?php
					//var_dump(key($item));
					//$question = $this->play_quizzes_model->load_question($item['lecture_id']);
					//echo '<h2>'. $lecture['name'].'</h2>';
					//echo $lecture['lecture'];
					?>
				<?php endforeach; ?>

			</div>


		</div>
	</div>
</div>
</body>

<script>
	var h5 = document.getElementsByTagName('h5')[0],
		seconds = 0, minutes = 0, hours = 0,
		t;

	function add() {
		seconds++;
		if (seconds >= 60) {
			seconds = 0;
			minutes++;
			if (minutes >= 60) {
				minutes = 0;
				hours++;
			}
		}

		h5.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

		timer();
	}
	function timer() {
		t = setTimeout(add, 1000);
	}
	timer();
</script>

</html>

