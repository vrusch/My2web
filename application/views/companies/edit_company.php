<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Firma editace"); ?></h2>

			<div class="well">
				<?php echo ("editovani firmy"); ?>
			</div>
			<?php echo form_open('companies/edit/'.$company_item['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="name"><?php echo ('Název'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'id' => 'name'), $company_item['name']); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div><br>

			<div class="well">
				<?php echo anchor('companies/add_students/' . $company_item['id'], 'Přidat žáky', 'class="btn btn-info btn-small"'); ?>
				<?php echo anchor('companies/add_groups/' . $company_item['id'], 'Přidat Skupiny', 'class="btn btn-primary btn-small"'); ?>
				<?php echo anchor('companies', 'Přidat Kurzy', 'class="btn btn-primary btn-small"'); ?>
				<span><?php echo '&nbsp anebo &nbsp'; ?></span>

				<?php
				if ($company_item['status'] == 'banned'){
					echo anchor('companies/delete/' . $company_item['id'], 'Smazat', 'class="btn btn-danger btn-small"');
					echo anchor('companies/unban/'. $company_item['id'], 'unBan Firmy', 'class="btn btn-danger btn-small"');
				} else {
					echo anchor('companies/ban/'. $company_item['id'], 'Ban Firmy', 'class="btn btn-danger btn-small"');
				}
				?>

			</div>

			<div class="form-actions">
				<div class="controls">

					<?php echo anchor('companies', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>

</body>
</html>


