<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('mMKB'))); ?>
</head>

<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo("Managment MKB"); ?></h2>

			<div class="well">
				<?php echo("Managment MKB"); ?>
			</div>

			<?php //var_dump($mkb); ?>

			<?php echo form_open('companies/add_groups/' . $company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Managment MKB pro firmu: <?php echo '<strong>' . $company['name'] . '</strong>'; ?></p>
			</div>

			<div class="control-group">
				<?php echo 'Soucasny MKB:'; ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo '#'; ?></th>
					<th><?php echo 'Username'; ?></th>
					<th><?php echo 'email'; ?></th>
					<th><?php echo 'Aktivace'; ?></th>
					<th><?php echo 'Akce'; ?></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						<?php
						$show_change = 0;
						if (isset($mkb[0]['user_id'])) {
							echo $mkb[0]['user_id'];
						}
						?>
					</td>
					<td>
						<?php
						if (isset($mkb[0]['username'])) {
							echo $mkb[0]['username'];
						}
						?>
					</td>
					<td>
						<?php
						if (isset($mkb[0]['email'])) {
							echo $mkb[0]['email'];
						}
						?>
					</td>
					<td>
						<?php
						if (isset($mkb[0]['activation'])) {
							if ($mkb[0]['activation'] == '0') {
								echo anchor('companies/' . $company['id'], 'Chyba - znovu poslat', 'class="btn btn-danger btn-small"');
							}
							if ($mkb[0]['activation'] == '1') {
								echo 'Odesláno: ' . $mkb[0]['activation_date'];
							}
							if ($mkb[0]['activation'] == '2') {
								echo 'Aktivní od: ' . $mkb[0]['activation_date'];
							}
						} else {
							echo 'neexistuje';
						}
						?>
					</td>
					<td>
						<?php
						if (!isset($mkb[0]['activation'])) {
							echo anchor('companies/create_mkb/' . $company['id'], 'Novy', 'class="btn btn-primary btn-small"');
						} else {
							if ($mkb[0]['status'] == NULL) {
								if ($mkb[0]['activation'] == '1') {
									echo anchor('companies/create_mkb/' . $company['id'] . '/' . $mkb[0]['user_id'], 'Znovu poslat', 'class="btn btn-primary btn-small"; style="margin: 10px"');
									echo anchor('companies/create_mkb/' . $company['id'], 'Smazat', 'class="btn btn-danger btn-small"');
								}
								if ($mkb[0]['activation'] == '2') {
									//echo anchor('companies/change_mkb/' . $company['id'] . '/' . $mkb[0]['user_id'], 'Vymenit', 'class="btn btn-primary btn-small"; style="margin: 10px"');
									echo anchor('companies/create_mkb/' . $company['id'], 'Smazat', 'class="btn btn-danger btn-small"');
									$show_change = 1;
								}
							} else {
								echo anchor('companies/' . $company['id'] . '/' . $mkb[0]['user_id'], 'Odblokovat', 'class="btn btn-danger btn-small"; style="margin: 10px"');
								echo anchor('companies/create_mkb/' . $company['id'], 'Smazat', 'class="btn btn-danger btn-small"');
							}
						}
						?>
					</td >
				</tr>
				</tbody>
			</table>

			<?php if ($show_change == 1) :?>

				<?php $students = $this->companies_model->get_students($company['id']) ?>
				<?php foreach( $students as $students_item ) : ?>
					<?php
					$student = $this->companies_model->get_student_info($students_item['student_id']);
					$std = ($student[0]['firstname'].' '.$student[0]['lastname'].' | '.$student[0]['email']);
					$opt[$student[0]['id']] = $std;
					?>
				<?php endforeach ?>
				<?php echo anchor('companies/change_mkb/' . $company['id'] . '/' . $mkb[0]['user_id'], 'Vymenit za: ', 'class="btn btn-primary btn-small"; style="margin: 10px"');?>
				<?php echo form_dropdown('change', $opt, '', 'style="width"'); ?>


			<?php endif ?>

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

