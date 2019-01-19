<br>

<?php echo form_open_multipart('companies_cont/csv_parse/'. $company['id'], 'class="form-horizontal"'); ?>
<?php echo validation_errors(); ?>
<?php echo form_input(array('name' => 'csv_file', 'id' => 'csv_file', 'type' => 'file'), 'load_csv', 'required accept=".csv"'); ?>
<?php echo form_submit('import_csv', 'Import CSV', 'name="import_csv"; id="import_csv_btn"; class="btn btn-primary bt-small"'); ?>
<?php echo form_close(); ?>

<?php //var_dump($students) ;?>
<?php //var_dump() ;?>
<?php //var_dump() ;?>

<hr>
<br>
<p><strong>Stavajici studenti:</strong></p>
<table class="table table-condensed table-hover" style="background-color:white;">
	<thead>
	<tr>
		<th><?php echo 'Username' ;?></th>
		<th><?php echo 'Jmeno' ;?></th>
		<th><?php echo 'Prijmeni' ;?></th>
		<th><?php echo 'Email' ;?></th>
		<th><?php echo 'Status' ;?></th>
	</tr>
	</thead>
	<tbody style="background-color: white">
	<?php foreach ($students as $students_item) : ?>
		<?php $student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
		<?php $acc_info = $this->companies_model->get_account_info($students_item['student_id']); ?>
		<tr>
			<td>
				<?php echo $student_info['username']; ?>
				<?php if ($students_item['attribut'] == 'mkb'){echo '<span class="label label-info">mkb</span>';} ?>
			</td>
			<td>
				<?php echo $student_info['firstname']; ?>
			</td>
			<td>
				<?php echo $student_info['lastname']; ?>
			</td>
			<td>
				<?php echo $student_info['email']; ?>
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





