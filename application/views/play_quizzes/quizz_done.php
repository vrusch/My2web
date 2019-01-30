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
			</div>
		</div>
	</div>
</div>
</body>
</html>

