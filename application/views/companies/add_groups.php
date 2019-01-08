<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('pridat skupiny'))); ?>
</head>

<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Vytvorit skupiny zaku"); ?></h2>

			<div class="well">
				<?php echo ("vytvareni skupin"); ?>
			</div>

			<?php echo form_open('companies/add_groups/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<p>Pridavat skupiny zaku pro firmu: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
			</div>


			<?php //var_dump($groups); ?>
			<?php foreach ($groups as $groups_item) : ?>
			<div class="control-group">
				<label class="control-label" for="group"><?php echo('Skupina zaku'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'group'), $groups_item['name_of_group'], 'style="margin: 10px"'); ?>
					<?php
						$query = $this->db->get_where('4m2w_students',array('company_id' => $company['id'], 'group_id' => $groups_item['id']));
						$row = $query->num_rows();
						if ($row == 0){
							echo anchor('companies/delgroup/' . $groups_item['id'], 'Smazat', 'class="btn"');
						}
						echo '  Pocet zaku v skupine ' . $row;
					?>
				</div>
			</div>
			<?php endforeach; ?>

			<div class="control-group">
				<label class="control-label" for="group1"><?php echo('Nova skupina zaku'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'group1'), '', 'style="margin: 10px"'); ?>
				</div>
			</div>




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
