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
			<?php echo $this->load->view('play_quizzes/quizzes_panel', array('current' => 'manage_quizzes'.$current_quizz['id'])); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 75%"><h2>  Vase kvizy<span class="badge badge-info"><?php echo $student_info['username'].' - '.$student_info['firstname'].' '.$student_info['lastname'];?></span></h2></td>
					<td><strong><?php echo mdate($datestring, $now) ;?></strong></td>
					<td><a href="play_quizzes_cont/manage/<?php echo $student_info['id'] ;?>"><buton class="btn btn-primary btn-small"> Zpátky </buton></a></td>
				</tr>
			</table>
			<!-- END of header page	-->
			<br>
			<br>
			<?php $status_col = $this->play_quizzes_model->get_seq_status_col($current_quizz['id'], $student_info['id']) ?>
			<?php $status = $this->play_quizzes_model->get_seq_status($current_quizz['id'], $student_info['id']) ?>
			<div class="well">

			<?php if ($status_col == 0) : ?>
				<a href="play_quizzes_cont/run/<?php echo $current_quizz['id'] ;?>/<?php echo $student_info['id'] ;?>"><buton class="btn btn-primary btn-block"><?php echo 'Spustit kviz: '.$current_quizz['name'] ;?></buton></a>
			<?php else : ?>
				<a href="play_quizzes_cont/run/<?php echo $current_quizz['id'] ;?>/<?php echo $student_info['id'] ;?>/0"><buton class="btn btn-primary btn-block"><?php echo 'Spustit kviz: '.$current_quizz['name'] ;?></buton></a>
			<?php endif ?>
			<br>
				<?php if ($status_col == 0) : ?>
					<div style="border: 1px solid grey; padding: 10px; border-radius: 10px">Kviz obsahuje <?php echo $lec_no;?> lekce a potom <?php echo $que_no;?> otazek. Odhadovany cas na dokonceni kvizu je <?php echo $current_quizz['estimated_time'];?> minut. Po stlaceni tlacitka spustit kviz je kviz spusten</div>
				<?php else : ?>
					<?php if ($status['status'] == '2') : ?>
						<div style="border: 1px solid grey; padding: 10px; border-radius: 10px; width: 100%; text-align: center"><b>tento kurz uz byl uspesne ukoncen, opravdu ho xcete pustit znovu? Vazne?</b></div>
					<?php endif ?>
					<?php if ($status['status'] == '3') : ?>
						<div style="border: 1px solid grey; padding: 10px; border-radius: 10px; width: 100%; text-align: center"><b>Tento kviz jste uz jednou posral tak davej pozor at to ted udelas!</b><br>Kviz obsahuje <?php echo $lec_no;?> lekce a potom <?php echo $que_no;?> otazek. Odhadovany cas na dokonceni kvizu je <?php echo $current_quizz['estimated_time'];?> minut. Po stlaceni tlacitka spustit kviz je kviz spusten</div>
					<?php endif ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>

