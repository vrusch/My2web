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

			<?php //var_dump($group);?>
			<div class="well">
				<p style="color: #0e90d2">Vam prirazene kvizy a skoleni za spolecnost <b><?php echo $company['name'] ;?></b> v skupine studentu <b><?php echo $group['name_of_group'] ;?></b></p>
				<table class="table table-condensed table-hover">
					<thead>
					<tr>
						<th>Nazev</th>
						<th>Obtiznost</th>
						<th>Delka (v min. cca)</th>
						<th>Dokoncit do</th>
						<th>Stav</th>
						<th>Opakovat</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($quizzes as $quizzes_item) : ;?>
					<tr>
						<td style="width: 40%"><?php echo $quizzes_item['name'] ;?></td>
						<td style="width: 10%"><?php if ($quizzes_item['difficulty'] == '1'){echo 'lehka';} elseif ($quizzes_item['difficulty'] == '2') { echo 'stredni';} else {echo 'tezka';}?></td>
						<td style="width: 15%"><?php echo $quizzes_item['estimated_time'] ;?></td>
						<td style="width: 10%">31-01-2019</td>
						<?php $status = $this->play_quizzes_model->get_seq_status($quizzes_item['id'], $student_info['id']); ?>

						<?php if ($quizzes_item['ready'] != 0) : ?>
						<?php if (count($status) > 0 ) : ;?>
						<td style="width: 15%">
							<?php if ($status['status'] == '1')
							{echo '<small>spusten</small><br><small>'.$status['date'].'</small>';}
							elseif ($status['status'] == '2')
							{echo '<small style="color: #00CC00">uspesne dokoncen</small><br><small>'.$status['date'].'</small>';}
							elseif ($status['status'] == '3')
							{echo '<small style="color: #CC0000">neuspesne dokoncen</small><br><small>'.$status['date'].'</small>';}	?>
						</td>
						<?php else : ;?>
								<td><small style="color: #00CC00">zatim nespusten</small></td>
						<?php endif ;?>
						<?php else : ;?>
							<td><small style="color: #CC0000">Kviz nepripraven</small></td>
						<?php endif ;?>
						<td>
							<?php if (count($status) > 0 ) : ;?>
							<?php if ($status['status'] == '3') {echo 'opakovat';} ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table><br>

				<?php if (count($individual_quizzes) > 0 ) : ?>
					<p style="color: #0e90d2">Vase individuani skoleni</p>
					<table class="table table-condensed table-hover">
						<thead>
						<tr>
							<th>Nazev</th>
							<th>Obtiznost</th>
							<th>Delka (v min. cca)</th>
							<th>Dokoncit do</th>
							<th>Stav</th>
							<th>Opakovat</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach($individual_quizzes as $quizzes_item) : ;?>
							<tr>
								<td style="width: 40%"><?php echo $quizzes_item['name'] ;?></td>
								<td style="width: 10%"><?php if ($quizzes_item['difficulty'] == '1'){echo 'lehka';} elseif ($quizzes_item['difficulty'] == '2') { echo 'stredni';} else {echo 'tezka';}?></td>
								<td style="width: 15%"><?php echo $quizzes_item['estimated_time'] ;?></td>
								<td style="width: 10%">31-01-2019</td>
								<?php $status = $this->play_quizzes_model->get_seq_status($quizzes_item['id'], $student_info['id']); ?>
								<?php if (count($status) > 0 ) : ;?>
									<td style="width: 15%">
										<?php if ($status['status'] == '1')
										{echo '<small>spusten</small><br><small>'.$status['date'].'</small>';}
										elseif ($status['status'] == '2')
										{echo '<small style="color: #00CC00">uspesne dokoncen</small><br><small>'.$status['date'].'</small>';}
										elseif ($status['status'] == '3')
										{echo '<small style="color: #CC0000">neuspesne dokoncen</small><br><small>'.$status['date'].'</small>';}	?>
									</td>
								<?php else : ;?>
									<td>nespusten</td>
								<?php endif ;?>
								<td>
									<?php if (count($status) > 0 ) : ;?>
										<?php if ($status['status'] == '3') {echo 'opakovat';} ?>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
