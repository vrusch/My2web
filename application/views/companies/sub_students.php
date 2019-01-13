<br>

<?php echo form_open_multipart('companies/csv_parse', 'class="form-horizontal"'); ?>
<?php echo validation_errors(); ?>
<?php echo form_input(array('name' => 'csv_file', 'id' => 'csv_file', 'type' => 'file'), 'load_csv', 'required accept=".csv"'); ?>
<?php echo form_submit('import_csv', 'Import CSV', 'name="import_csv"; id="import_csv_btn"; class="btn btn-primary bt-small"'); ?>
<?php echo form_close(); ?>

<?php //var_dump($students) ;?>
<?php //var_dump() ;?>
<?php //var_dump() ;?>

<hr>
<br>

<table class="table table-condensed table-hover" style="background-color:white;">
	<thead>
	<tr>
		<th><?php echo '#' ;?></th>
		<th><?php echo 'Username' ;?></th>
		<th><?php echo 'Jmeno' ;?></th>
		<th><?php echo 'Prijmeni' ;?></th>
		<th><?php echo 'Email' ;?></th>
	</tr>
	</thead>
	<tbody style="background-color: white">
	<?php foreach ($students as $students_item) : ?>
		<?php $student_info = $this->experiment_model->get_students_info($students_item['student_id']); ?>
		<tr>
			<td>
				<?php echo $student_info['id']; ?>
			</td>
			<td>
				<?php echo $student_info['username']; ?>
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
		</tr>
	<?php endforeach; ?>
	</tbody>

</table>





