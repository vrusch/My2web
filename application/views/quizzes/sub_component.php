
<?php $lectures = $this->quizzes_model->get_lectures_by_quizz($quizz['id']); ?>
<?php $count_lectures = count($lectures); ?>
<?php $questions = $this->quizzes_model->get_question_by_quizz($quizz['id']); ?>
<?php $count_questions = count($questions); ?>

<?php //var_dump($quizz);?>
<?php
	if($quizz['quizz_order'] == 'rnd'){$poradi = 'nahodne';}else{$poradi = 'specificke';}
	if ($quizz['quizz_type'] == 'long'){$typ = 'dlouhy seznam';}else{$typ = 'otazka na 1 stranku';}
	if ($quizz['quizz_point'] == 'yes'){$bodovy = 'ano';}else{$bodovy = 'ne';}
?>


<p>Poradi otazek:<b><?php echo $poradi ?></b>; Typ:<b><?php echo $typ ?></b>; Bodovy kviz:<b><?php echo $bodovy ?></b>; Celkovy pocet otazek:<b><?php echo $count_questions ?></b>; Vybira se:<b><?php echo $quizz['question_num'] ?></b> otazek</p>
<p>Pocet lekci v kvizu: <b><?php echo $count_lectures ?></b></p>
<table class="table">
	<tr>
		<td style="width: 30%">
			<br><br>
			<ul id="sortable-list">
				<?php
				if ($count_lectures > 0 ) {
					$order = array();
					foreach ($lectures as $lectures_item) {
						//var_dump($lectures_item);
						echo '<a href="quizzes_cont/component/'.$quizz['id'].'/del_l/'.$lectures_item['lecture_id'].'"><li><i class="fa fa-remove" style="font-size:16px;color:red"></i> ' . $lectures_item['name'] . '</li></a>';
					};
				} else {echo 'zadne lekce';}
				echo '<hr>';
				if ($count_lectures > 0){
					foreach ($questions as $questions_item) {
						//var_dump($questions_item);
						echo '<a href="quizzes_cont/component/'.$quizz['id'].'/del_q/'.$questions_item['question_id'].'"><li><i class="fa fa-remove" style="font-size:16px;color:red"></i> '.$questions_item['question'].'</li></a>';
					};
				} else {echo 'zadne otazky';}
				?>
			</ul>
		</td>
		<td style="width: 1%">
		</td>
		<td style="width: auto">
			<!-- SUBMENU -->
			<ul class="nav nav-pills navbar-right">
				<li class="active"><a data-toggle="pill" href="#que">Otazky</a></li>
				<li><a data-toggle="pill" href="#lec">Lekce</a></li>
			</ul>

			<div class="tab-content">
				<div id="que" class="tab-pane fade in active">
					<?php echo $this->load->view('quizzes/sub_subquestions', array('title' => ('manage quizzes'))); ?>
				</div>
				<div id="lec" class="tab-pane fade">
					<?php// echo $this->load->view('quizzes/sub_sublectures', array('title' => ('manage quizzes'))); ?>
				</div>
			</div>
			<!-- END SUBMENU -->
		</td>
	</tr>
</table>

