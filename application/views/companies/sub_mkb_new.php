<?php if (count($students) > 0) : ?>
	<button class="btn" data-toggle="collapse" data-target="#new">Zadat uplne novy</button>
<div id="new" class="collapse" style="border: 1px solid #08c">
	<?php endif ?>
	<table class="table table-condensed table-hover">
		<thead>
		<tr>
			<th><?php echo 'Username'; ?></th>
			<th><?php echo 'email'; ?></th>
			<th><?php echo ''; ?></th>
		</tr>
		</thead>
		<?php echo form_open('companies_cont/create_mkb/' . $company['id'], 'class="form-horizontal"'); ?>
		<?php echo validation_errors(); ?>
		<tbody>
		<tr>
			<td>
				<?php echo form_input(array('name' => 'mkb_username', set_value('mkb_username'))); ?>
			</td>
			<td>
				<?php echo form_input(array('name' => 'mkb_email', set_value('mkb_email'))); ?>
			</td>
			<td>
				<?php echo form_submit('', 'Uložit', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
		</tbody>
	</table>
	<hr>
	<?php echo form_close(); ?>
<?php if (count($students) > 0) : ?>
</div>
<?php endif ?>
<?php if (count($students) > 0) : ?>
	<button class="btn" data-toggle="collapse" data-target="#students">Vybrat ze zaku</button>

	<div id="students" class="collapse" style="border: 1px solid #08c">
		<table class="table table-condensed table-hover" style="background-color:white;">
			<thead>
			<tr>
				<th><?php echo 'Vybrat'; ?></th>
				<th><?php echo 'Username'; ?></th>
				<th><?php echo 'Jmeno'; ?></th>
				<th><?php echo 'Prijmeni'; ?></th>
				<th><?php echo 'Email'; ?></th>
			</tr>
			</thead>
			<tbody style="background-color: white">
			<?php foreach ($students as $students_item) : ?>
				<?php $student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
				<tr>
					<td>
						<?php echo anchor('companies_cont/create_mkb_from/' . $company['id'] .'/'. $student_info['id'], 'vybrat', 'class="btn btn-small"'); ?>
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
	</div>
<?php endif ?>





