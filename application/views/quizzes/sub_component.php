<?php //echo $quizz['name']; ?>
<?php //echo $quizz['id']; ?>
<?php $lectures = $this->quizzes_model->get_lectures_by_quizz($quizz['id']); ?>
<?php $count_lectures = count($lectures); ?>
<?php //var_dump($count_lectures); ?>
<?php //var_dump($lectures); ?>
<?php $questions = $this->quizzes_model->get_question_by_quizz($quizz['id']); ?>
<?php $count_questions = count($questions); ?>
<?php //var_dump($count_questions); ?>
<?php //var_dump($questions); ?>


		<ul id="sortable-list">
			<?php
			$order = array();
			foreach ($lectures as $lectures_item) {
				echo '<li title="',$lectures_item['lecture_id'],'">',$lectures_item['name'],'</li>';
				$order[] = $lectures_item['lecture_id'];
			}
			foreach ($questions as $questions_item) {
				echo '<li title="',$questions_item['question_id'],'">',$questions_item['question'],'</li>';
				$order[] = $questions_item['question_id'];
			}
			?>
		</ul>








