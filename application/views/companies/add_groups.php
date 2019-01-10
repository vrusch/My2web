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

			<h2><?php echo ("Skupiny žáků"); ?></h2>

			<div class="well">
				<?php echo ("Managment skupin žáků"); ?>
			</div>

			<?php echo form_open('companies/add_groups/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Managment skupin pro firmu: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
			</div>


			<?php //var_dump($groups); ?>
			<?php foreach ($groups as $groups_item) : ?>
			<div class="control-group">
				<label class="control-label" for="group">Skupina</label>
				<div class="controls">
					<?php echo form_input(array('name' => 'group'), $groups_item['name_of_group'], 'style="margin: 10px"'); ?>
					<?php
						$query = $this->db->get_where('4m2w_students',array('group_id' => $groups_item['id']));
						$row = $query->num_rows();
						if ($row == 0){
							echo anchor('companies/delgroup/'. $company['id'] . '/' . $groups_item['id'], 'Smazat', 'class="btn btn-danger btn-small"');//todo a smazat studenty ze skupiny
						}
						echo '  Studentů v skupine ' . $row;
					?>
				</div>
			</div>
			<?php endforeach; ?>

			<div class="control-group">
				<label class="control-label" for="group1"><?php echo('Nová skupina'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'group1'), '', 'style="margin: 10px"'); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
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
