<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Skupiny'))); ?>
</head>

<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">
			<?php
			//var_dump($company);
			//var_dump($groups);
			//var_dump($students);
			?>
			<h2><?php echo ("Přiřadit studenty"); ?></h2>

			<div class="well">
				<?php echo ("Přiřadit studenty"); ?>
			</div>

			<?php echo form_open('companies/addStoG/'.$company['id'].'/1', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Studenti firmy: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
				<p>Celkově studentů: <?php echo '<strong>'.count($students).'</strong>'; ?></p>
				<?php $uncharted = $this->db->get_where('4m2w_students', array('company_id' => $company['id'], 'group_id' => '0'));?>
				<p>Z toho nezařazeých: <?php echo '<strong>'.$uncharted->num_rows().'</strong>'; ?></p><br>
				<?php echo 'Přidat do skupiny: ' ?>
				<?php
				foreach ($groups as $group_item){
					$opt[$group_item['id']] = $group_item['name_of_group'];
				}
				$opt += ['0' => 'Žádna skupina'];
				//var_dump($opt);
				echo form_dropdown('group_id', $opt, '0');
				?>
				<?php echo form_submit('', ('Přidat'), 'class="btn btn-primary"'); ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo ('Přidat'); ?></th>
					<th><?php echo ('#'); ?></th>
					<th><?php echo ('Username'); ?></th>
					<th><?php echo ('Email'); ?></th>
					<th><?php echo ('Jméno'); ?></th>
					<th><?php echo ('Přijmení'); ?></th>
					<th><?php echo ('Ve skupině'); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $students as $students_item ) : ?>
					<?php
						$student = $this->companies_model->get_student_info($students_item['student_id']);
						$group = $this->companies_model->get_group($students_item['group_id']);
						//var_dump($group);
					?>
					<tr>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php echo form_checkbox("{$students_item['student_id']}", 'apply', '');; ?>
						</td>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php echo ($student[0]['id']); ?>
						</td>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php echo ($student[0]['username']); ?>
						</td>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php echo ($student[0]['email']); ?>
						</td>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php echo ($student[0]['firstname']); ?>
						</td>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php echo ($student[0]['lastname']); ?>
						</td>
						<?php if (isset($group['name_of_group'])) {echo '<td style="background-color: #c8eaff">';} else {echo '<td>';}?>
							<?php
							if (isset($group['name_of_group'])){echo $group['name_of_group'];}
							?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<div class="form-actions">
				<div class="controls">
					<?php echo anchor('companies/edit/' . $company['id'], 'Cancel', 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>
</body>
</html>
