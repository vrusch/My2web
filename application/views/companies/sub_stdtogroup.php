

<?php echo form_open('companies_cont/add_students_to_group/'.$company['id'], 'class="form-horizontal"'); ?>
<?php echo validation_errors(); ?>
<?php $uncharted = $this->db->get_where('4m2w_students', array('company_id' => $company['id'], 'group_id' => '0'));?>
<div class="control-group">
	<p>Celkově <?php echo '<strong>'.count($students).'</strong>'; ?> studentů z toho nezařazeých <?php echo '<strong>'.$uncharted->num_rows().'</strong>'; ?></p><br>

	<?php echo 'Přidat do skupiny: ' ?>
	<?php
	foreach ($groups as $group_item){
		$opt[$group_item['id']] = $group_item['name_of_group'];
	}
	if (count($groups)){
		$opt += ['0' => 'Žádna skupina'];
	} else {
		$opt = ['0' => 'Žádna skupina'];
	}

	echo form_dropdown('group_id', $opt, '0');
	?>
	<?php echo form_submit('', ('Přidat'), 'class="btn btn-primary"'); ?>
</div>

<table class="table table-condensed table-hover">
	<thead>
	<tr>
		<th><?php echo ('Přidat'); ?></th>
		<th><?php echo ('Ve skupině'); ?></th>
		<th><?php echo ('Username'); ?></th>
		<th><?php echo ('Email'); ?></th>
		<th><?php echo ('Jméno'); ?></th>
		<th><?php echo ('Přijmení'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach( $students as $students_item ) : ?>
		<?php
		$student = $this->companies_model->get_student_info($students_item['student_id']);
		$group = $this->companies_model->get_group_info($students_item['group_id']);
		//var_dump($student);
		?>
		<tr>
			<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
			<?php echo form_checkbox("{$students_item['student_id']}", 'apply', ''); ?>
			</td>
			</td>
			<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
			<?php
			if (isset($group['name_of_group'])){echo $group['name_of_group'];}
			?>
			</td>
			<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
			<?php echo ($student['username']); ?><?php if ($students_item['attribut'] == 'mkb'){echo '<span class="label label-info">mkb</span>';} ?>
			</td>
			<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
			<?php echo ($student['email']); ?>
			</td>
			<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
			<?php echo ($student['firstname']); ?>
			</td>
			<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
			<?php echo ($student['lastname']); ?>

		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php echo form_close(); ?>



