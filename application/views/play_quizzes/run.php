<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Play Quizzes'))); ?>
</head>
<body>
<?php $now = time(); $datestring = 'Datum: %d-%m-%Y ';?>
<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('play_quizzes/run_panel'); ?>
		</div>
		<div class="span10">
			<div class="well">
				<table style="width: 100%">
					<tr>
						<td style="width: 40%"><strong><?php echo $quizz_info['name'] ;?></strong></td>
						<td style="width: 20%; text-align: right">(stopky)</td>
						<td style="width: 20%; text-align: right"><strong><?php echo mdate($datestring, $now) ;?></strong></td>
						<td style="width: 20%; text-align: right"><a href="play_quizzes_cont/manage/<?php echo $student_info['id'] ;?>"><buton class="btn btn-primary btn-small"> Zpátky </buton></a></td>
					</tr>
				</table>
			</div>



		</div>
	</div>
</div>
</body>
</html>
