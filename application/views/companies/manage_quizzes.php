<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('manage_quizzes'))); ?>
</head>

<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Managment kvizu"); ?></h2>

			<div class="well">
				<?php echo ("Managment kvizu"); ?>
			</div>

			<?php
			//var_dump ($company);
			//var_dump ($groups);
			//var_dump ($quizzes);
			?>

			<?php echo form_open('companies/manage_quizzes/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Managment kvizu pro firmu: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
			</div>

			<div class="well">
				<div class="span4" style="background-color:white;">
				</div>

				<table class="table table-condensed table-hover">
					<thead>
					<tr>
						<th><?php echo 'Skupiny'; ?></th>
						<th><?php echo 'Kvizy'; ?></th>
						<th><?php echo ' | '; ?></th>
						<th><?php echo 'Tema'; ?></th>
						<th><?php echo 'Dostupne kvizy'; ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach( $groups as $groups_item ) : ?>
					<tr>
						<td>
							<?php //echo $groups_item['id']; ?>
							<?php echo $groups_item['name_of_group']; ?>
						</td>
						<td>
							<!--  get_group_quizzes($group_id) -->
							<?php echo 'kvizy group'; ?>
						</td>
						<th><?php echo ' | '; ?></th>
						<td>
							<?php echo form_dropdown(); ?>
						</td>
						<td>
							<?php foreach( $quizzes as $quizzes_item ) : ?>
								<?php //echo $quizzes_item['id']; ?>
								<?php echo $quizzes_item['name'] . '<br>';?>
							<?php endforeach; ?>
						</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

			</div>

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


