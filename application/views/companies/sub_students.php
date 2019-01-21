<ul class="nav nav-pills">
	<li class="active"><a data-toggle="pill" href="#new_std">Pridavat hromadne</a></li>
	<li><a data-toggle="pill" href="#new_one">Pridat jednotlive</a></li>
</ul>
<div class="tab-content">
	<div id="new_std" class="tab-pane fade in active" style="padding: 10px" >
		<?php echo form_open_multipart('companies_cont/csv_parse/'. $company['id'], 'class="form-horizontal"'); ?>
		<?php echo validation_errors(); ?>
		<?php echo form_input(array('name' => 'csv_file', 'id' => 'csv_file', 'type' => 'file'), 'load_csv', 'required accept=".csv"'); ?>
		<?php echo form_submit('import_csv', 'Spustit import CSV', 'name="import_csv"; id="import_csv_btn"; class="btn btn-primary bt-small"'); ?>
		<?php echo form_close(); ?>
		<hr>
	</div>
	<div id="new_one" class="tab-pane fade">
		<h5>Zadat uplne noveho studenta</h5>
		<p>Zadat username, jmeno, prijmeni, email, bude zarazen jako student a posle se aktivacni mail</p>

		<table class="table table-condensed table-hover">
			<thead>
			<tr>
				<th><?php echo 'Username *'; ?></th>
				<th><?php echo 'email *'; ?></th>
				<th><?php echo 'Jmeno'; ?></th>
				<th><?php echo 'Prijmeni'; ?></th>
			</tr>
			</thead>
			<?php echo form_open('companies_cont/add_student/' . $company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>
			<tbody>
			<tr>
				<td>
					<?php echo form_input(array('name' => 'username', set_value('username'))); ?>
				</td>
				<td>
					<?php echo form_input(array('name' => 'email', set_value('email'))); ?>
				</td>
				<td>
					<?php echo form_input(array('name' => 'firstname', set_value('firstname'))); ?>
				</td>
				<td>
					<?php echo form_input(array('name' => 'lastname', set_value('lastname'))); ?>
				</td>
			</tr>
			</tbody>
		</table>
		<?php echo form_submit('', 'Uložit', 'class="btn btn-primary"'); ?>
		<hr>
		<?php echo form_close(); ?>
	</div>
</div>



<?php //var_dump($students) ;?>
<?php //var_dump() ;?>
<?php //var_dump() ;?>

<p><strong>Stávajíci studenti:</strong></p>

<?php if (count($students) > 0) : ?>
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
		<?php $student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
		<?php $acc_info = $this->companies_model->get_account_info($students_item['student_id']); ?>
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
<?php endif ?>




