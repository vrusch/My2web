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

<table class="table table-bordered" style="width: 50%">
	<tbody>
	<?php foreach ($lectures as $lectures_item) : ?>
		<tr>
			<td>
				<p>PREDNASKA</p>
			</td>
			<td>
				<div style="width: 50%"><?php echo $lectures_item['lecture_id'].'/'.$lectures_item['name']; ?></div>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php foreach ($questions as $questions_item) : ?>
		<tr>
			<td>
				<p>
					OTAZKA
				</p>
			</td>
			<td>
				<div style="width: 50%"><?php echo $questions_item['question_id'].'/'.$questions_item['question']; ?></div>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<form id="dd-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">


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
	<br />
	<input type="hidden" name="sort_order" id="sort_order" value="<?php echo implode(',',$order); ?>" />
	<input type="submit" name="do_submit" value="Submit Sortation" class="button" />
</form>

<script>
	/* when the DOM is ready */
	jQuery(document).ready(function() {
		/* grab important elements */
		var sortInput = jQuery('#sort_order');
		var submit = jQuery('#autoSubmit');
		var messageBox = jQuery('#message-box');
		var list = jQuery('#sortable-list');
		/* create requesting function to avoid duplicate code */
		var request = function() {
			jQuery.ajax({
				beforeSend: function() {
					messageBox.text('Updating the sort order in the database.');
				},
				complete: function() {
					messageBox.text('Database has been updated.');
				},
				data: 'sort_order=' + sortInput[0].value + '&ajax=' + submit[0].checked + '&do_submit=1&byajax=1', //need [0]?
				type: 'post',
				url: '<?php echo $_SERVER["REQUEST_URI"]; ?>'
			});
		};
		/* worker function */
		var fnSubmit = function(save) {
			var sortOrder = [];
			list.children('li').each(function(){
				sortOrder.push(jQuery(this).data('id'));
			});
			sortInput.val(sortOrder.join(','));
			console.log(sortInput.val());
			if(save) {
				request();
			}
		};
		/* store values */
		list.children('li').each(function() {
			var li = jQuery(this);
			li.data('id',li.attr('title')).attr('title','');
		});
		/* sortables */
		list.sortable({
			opacity: 0.7,
			update: function() {
				fnSubmit(submit[0].checked);
			}
		});
		list.disableSelection();
		/* ajax form submission */
		jQuery('#dd-form').bind('submit',function(e) {
			if(e) e.preventDefault();
			fnSubmit(true);
		});
	});
</script>
