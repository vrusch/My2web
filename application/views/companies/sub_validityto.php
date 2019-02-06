
Nastavit platnost pro skupiny:

<table class="table table-condensed table-hover">
	<thead>
	<tr>
		<th><?php echo 'Skupina'; ?></th>
		<th><?php echo 'kvizy'; ?></th>
		<th><?php echo 'Datum'; ?></th>
		<th><?php echo ''; ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $all_quizzes = $this->companies_model->get_all_quizzes_by_company($company['id']);?>
	<?php foreach ($all_quizzes as $all_quizzes_item) : ?>
	<tr>
		<td><strong>
			<?php
			$group_inf = $this->companies_model->get_group_info($all_quizzes_item['group_id']);
			if (isset ($group_inf['name_of_group'])){echo $group_inf['name_of_group'];}
			?>
			</strong></td>
		<td>
			<?php
			$quizz_inf = $this->companies_model->get_quizz_info($all_quizzes_item['quiz_id']);
			if (isset ($quizz_inf['name'])){echo $quizz_inf['name'];}
			?>
		</td>
		<td>
			<?php echo form_open('companies_cont/set_validity/'. $company['id'].'/'.$group_inf['id'].'/'.$quizz_inf['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>
			<?php $datum = $all_quizzes_item['valid_to'] ;?>
			<?php echo '<input name="platnostdo" type="date" value="'.$datum.'">'; ?>
		</td>
		<td>
			<?php echo form_submit('', 'Nastavit datum', 'class="btn btn-primary btn-small"'); ?>
			<?php echo form_close(); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>

</table>

<hr>

Individualne prirazene kvizi pro studenty firmy:
<table class="table table-condensed table-hover">
	<thead>
	<tr>
		<th><?php echo 'Username' ;?></th>
		<th><?php echo 'Jméno' ;?></th>
		<th><?php echo 'Příjmení' ;?></th>
		<th><?php echo 'Kviz' ;?></th>
		<th><?php echo 'Datum' ;?></th>
		<th><?php echo '' ;?></th>
	</tr>
	</thead>
	<tbody>
	<?php $std_indiv = $this->companies_model->get_std_indiv($company['id'])?>
	<?php foreach ($std_indiv as $std_indiv_item) : ?>
		<?php $student_info = $this->companies_model->get_student_info($std_indiv_item['student_id']); ?>
		<?php $quizz_info = $this->companies_model->get_quizz_info($std_indiv_item['quizz_id']); ?>
		<?php //var_dump($std_indiv_item);?>
	<tr>
		<td>
			<?php echo $student_info['username'];?>
		</td>
		<td>
			<?php echo $student_info['firstname'];?>
		</td>
		<td>
			<?php echo $student_info['lastname'];?>
		</td>
		<td>
			<?php echo $quizz_info['name'];?>
		</td>
		<td>
			<?php echo form_open('companies_cont/set_validity_indiv/'. $company['id'].'/'.$std_indiv_item['student_id'].'/'.$quizz_inf['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>
			<?php $datum = $std_indiv_item['valid_to'] ;?>
			<?php echo '<input name="platnostdo" type="date" value="'.$datum.'">'; ?>
		</td>
		<td>
			<?php echo form_submit('', 'Nastavit datum', 'class="btn btn-primary btn-small"'); ?>
			<?php echo form_close(); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>


