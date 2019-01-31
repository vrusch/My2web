<table class="table table-condensed table-hover" style="background-color:white;">
	<thead>
	<tr>
		<th><?php echo 'Username' ;?></th>
		<th><?php echo 'Jméno' ;?></th>
		<th><?php echo 'Příjmení' ;?></th>
		<th><?php echo 'Email' ;?></th>
		<th><?php echo 'Status' ;?></th>
	</tr>
	</thead>
	<?php foreach ($students as $students_item) : ?>
		<?php $student_info = $this->summary_model->get_student_info($students_item['student_id']); ?>
		<?php $acc_info = $this->summary_model->get_account_info($students_item['student_id']); ?>
		<tr>
			<td>
				<em><?php echo $student_info['username']; ?></em>
				<?php if ($students_item['attribut'] == 'mkb'){echo '<span class="label label-info">mkb</span>';} ?>
			</td>
			<td>
				<em><?php echo $student_info['firstname']; ?></em>
			</td>
			<td>
				<em><?php echo $student_info['lastname']; ?></em>
			</td>
			<td>
				<em><?php echo $student_info['email']; ?></em>
			</td>
			<td>
				<?php
				if ($acc_info['suspendedon'] != NULL){
					echo '<span class="label label-important">Blokován</span>';
				}elseif ($acc_info['verifiedon'] != NULL){
					echo 'active';
				}elseif ($acc_info['createdon'] != NULL){
					echo 'zaslano';
				}
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
