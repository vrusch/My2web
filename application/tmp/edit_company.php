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
				<?php echo ("Editovaní názvu firmy"); ?>
			</div>
<?php
//var_dump($company_item);
//var_dump($groups);
?>
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
				<?php
				$count = count($this->companies_model->get_students($company_item['id']));
				if ( $count > 0){
					echo anchor('companies/addStoG/' . $company_item['id'], 'Žáci', 'class="btn btn-info btn-small"');
					}
				?>
				<span><?php echo '&nbsp&nbsp | &nbsp&nbsp'; ?></span>
				<?php echo anchor('companies/add_groups/' . $company_item['id'], 'Skupiny', 'class="btn btn-primary btn-small"'); ?>
				<?php echo anchor('companies/manage_quizzes/'. $company_item['id'], 'Přidat Kurzy', 'class="btn btn-primary btn-small"'); ?>
				<?php echo anchor('companies/manage_mkb/'. $company_item['id'], 'MKB', 'class="btn btn-primary btn-small"'); ?>
				<span><?php echo '&nbsp&nbsp | &nbsp&nbsp'; ?></span>

				<?php
				if ($company_item['status'] == 'banned'){
					echo anchor('companies/delete/' . $company_item['id'], 'Smazat', 'class="btn btn-danger btn-small"'); //todo POZOR mazat aj ziakov mkb
					echo anchor('companies/unban/'. $company_item['id'], 'Odblokovat Firmu', 'class="btn btn-danger btn-small"');
				} else {
					echo anchor('companies/ban/'. $company_item['id'], 'Blokovat Firmu', 'class="btn btn-danger btn-small"'); //todo POZOR blokovat aj ziakov mkb
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


