<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Play Quizzes'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('play_quizzes/quizzes_panel', array('current' => 'manage_quizzes')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 75%"><h2>  Vase kvizy<span class="badge badge-info"><?php echo $student_info['username'].' - '.$student_info['firstname'].' '.$student_info['lastname'];?></span></h2></td>
					<td><?php echo 'dnes je: <strong>26-01-2019</strong>';?></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"> Zpátky </buton></a></td>
				</tr>
			</table>
			<!-- END of header page	-->
			<div class="well">
				Vam prirazene kvizy ukoncit do
			</div>
		</div>
	</div>
</div>
</body>
</html>



