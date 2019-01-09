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

			<h2><?php echo ("Priradit studenty"); ?></h2>

			<div class="well">
				<?php echo ("Priradit studenty"); ?>
			</div>

			<?php echo form_open('companies/add_groups/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Studenti firmy: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
				<p>pridat do skupiny: <?php echo '<strong>'.$group[0]['name_of_group'].'</strong>'; ?></p>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo ('Pridat'); ?></th>
					<th><?php echo ('#'); ?></th>
					<th><?php echo ('Username'); ?></th>
					<th><?php echo ('Email'); ?></th>
					<th><?php echo ('jmeno'); ?></th>
					<th><?php echo ('Prijmeni'); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $students as $students_item ) : ?>
					<?php
						$student = $this->companies_model->get_student_info($students_item['student_id']);
					//<i class='fas fa-folder-plus' style='font-size:48px;color:red'></i>
					?>
					<tr>
						<td>
							<i class='fas fa-folder-plus' style='font-size:22px;'></i>
						</td>
						<td>
							<?php echo ($student[0]['id']); ?>
						</td>
						<td>
							<?php echo ($student[0]['username']); ?>
						</td>
						<td>
							<?php echo ($student[0]['email']); ?>
						</td>
						<td>
							<?php echo ($student[0]['firstname']); ?>
						</td>
						<td>
							<?php echo ($student[0]['lastname']); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('companies/edit/' . $company['id'], 'Cancel', 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>
</body>
</html>
