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
			<?php echo $this->load->view('play_quizzes/quizzes_panel', array('current' => 'manage_quizzes')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 75%"><h2>  Vase kvizy<span class="badge badge-info"><?php echo $student_info['username'].' - '.$student_info['firstname'].' '.$student_info['lastname'];?></span></h2></td>
					<td><strong><?php echo mdate($datestring, $now) ;?></strong></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"> Zpátky </buton></a></td>
				</tr>
			</table>
			<!-- END of header page	-->
			<div class="well">
				Vam prirazene kvizy za spolecnost {firma} v skupine studentu {skupina}:
				<table class="table table-condensed table-hover">
					<thead>
					<tr>
						<th>Nazev</th>
						<th>Obtiznost</th>
						<th>Delka (v min. cca)</th>
						<th>Dokoncit do</th>
						<th>Vysledek</th>
						<th>Opakovat</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($quizzes as $quizzes_item) : ;?>
					<tr>
						<td><?php echo $quizzes_item['name'] ;?></td>
						<td><?php if ($quizzes_item['difficulty'] == '1'){echo 'lehka';} elseif ($quizzes_item['difficulty'] == '2') { echo 'stredni';} else {echo 'tezka';}?></td>
						<td><?php echo $quizzes_item['estimated_time'] ;?></td>
						<td>31-01-2019</td>
						<?php $status = $this->play_quizzes_model->get_seq_status($quizzes_item['id'], $student_info['id']); ?>
						<?php if (count($status) > 0 ) : ;?>
						<td>
							<?php if ($status['status'] == '1'){echo 'spusten';} elseif ($status['status'] == '2') { echo 'dokoncen';}?>
						</td>
						<?php else : ;?>
							<td>nespusten</td>
						<?php endif ;?>
						<td></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
</body>
</html>
