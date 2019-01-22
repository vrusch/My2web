
nastavit platnost pro skupiny:

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
	<?php //var_dump($allcompanyquizzes); ?>
	<?php foreach ($all_quizzes as $all_quizzes_item) : ?>
	<tr>
		<td>
			<?php
			$group_inf = $this->companies_model->get_group_info($all_quizzes_item['group_id']);
			if (isset ($group_inf['name_of_group'])){echo $group_inf['name_of_group'];}
			?>
		</td>
		<td>
			<?php
			$quizz_inf = $this->companies_model->get_quizz_info($all_quizzes_item['quiz_id']);
			if (isset ($quizz_inf['name'])){echo $quizz_inf['name'];}
			?>
		</td>
		<td>
			<?php echo '<input name="platnostdo" type="date">'; ?>
		</td>
		<td>
			<?php echo anchor('companies_cont/blabla/'. $company['id'], 'Nastavit datum', 'class="btn btn-info btn-small"'); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<hr>

vypsat individualne prirazene kvizi pro studenty firmy
<table class="table table-condensed table-hover">
	<thead>
	<tr>
		<th><?php echo 'Username' ;?></th>
		<th><?php echo 'Jméno' ;?></th>
		<th><?php echo 'Příjmení' ;?></th>
		<th><?php echo 'Skupina' ;?></th>
		<th><?php echo 'Kvizy' ;?></th>
		<th><?php echo 'Datum' ;?></th>
		<th><?php echo '' ;?></th>
	</tr>
	</thead>
	<tbody>
	<?php $std_indiv = $this->companies_model->get_std_indiv($company['id'])?>
	<?php foreach ($std_indiv as $std_indiv_item) : ?>
		<?php //$student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
		<?php //$acc_info = $this->companies_model->get_account_info($students_item['student_id']); ?>
	<tr>
		<td>
			Username
		</td>
		<td>
			Jméno
		</td>
		<td>
			Příjmení
		</td>
		<td>
			Skupina
		</td>
		<td>
			Kvizy
		</td>
		<td>
			<?php echo '<input name="platnostdo" type="date">'; ?>
		</td>
		<td>
			<?php echo anchor('companies_cont/blabla/'. $company['id'], 'Nastavit datum', 'class="btn btn-info btn-small"'); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>


