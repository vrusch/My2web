<?php $questions = $this->quizzes_model->get_questions();?>
<?php //var_dump($quizz)?>
<div style="background-color: white; border: 1px solid #999999">
	<ul id="sortable-list">
		<?php foreach ($questions as $item) : ?>
		<?php //var_dump($item)?>
			<a href="quizzes_cont/component/<?php echo $quizz['id']?>/add_q/<?php echo $item['id'];?>"><li><i class="fa fa-plus" style="font-size:16px;color:#7684ff"></i> <?php echo $item['question'];?></li></a>
		<?php endforeach;?>
	</ul>
</div>
