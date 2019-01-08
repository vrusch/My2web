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
					<?php
					//var_dump($company);
					var_dump($groups);
					?>
			<div class="control-group">
				<p>Pridavat skupiny zaku pro firmu: <?php echo '<strong>'.$company['name'].'</strong>'; ?></p>
			</div>
				<?php
				$cout_groups = count($groups);
				$pol = 0;
				?>

				<?php if ($cout_groups == 0) : ?>
					<div class="control-group">
						<div class="controls">
							Název skupiny zaku<?php echo form_input(array('name' => 'skupina[]'),'','style="margin: 10px"'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							Název skupiny zaku<?php echo form_input(array('name' => 'skupina[]'),'','style="margin: 10px"'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							Název skupiny zaku<?php echo form_input(array('name' => 'skupina[]'),'','style="margin: 10px"'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							Název skupiny zaku<?php echo form_input(array('name' => 'skupina[]'),'','style="margin: 10px"'); ?>
						</div>
					</div><br>
				<?php endif; ?>

				<?php if ($cout_groups > 0) : ?>
					<?php foreach ($groups as $groups_item) : ?>
						<?php $pol++; ?>
						<div class="control-group">
							<div class="controls">
								<?php echo form_input(array('name' => 'skupina[]'),$groups_item['name_of_group'],'style="margin: 10px"'); ?>
								<?php echo form_input(array('name' => 'ID_skupina[]'),$groups_item['id'],'style="margin: 10px"'); ?>
							</div>
						</div>
					<?php endforeach; ?>
					<?php while ($pol < 4) : ?>
						<?php $pol++; ?>
						<div class="control-group">
							<div class="controls">
								<?php echo form_input(array('name' => 'skupina[]'),'','style="margin: 10px"'); ?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('companies/edit/' . $company['id'], ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>
	</div>
</div>
</body>
</html>
