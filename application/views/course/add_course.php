<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('otazky pridat'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_course')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Otazky vytvoření"); ?></h2>

			<div class="well">
				<?php echo ("vytváření otazek"); ?>
			</div>

			<?php echo form_open('course/new_course', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="tema"><?php echo ('Tema'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'tema', 'id' => 'tema')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="course"><?php echo ('Kurz'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'course', 'id' => 'course', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('course', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

<?php //echo $this->load->view('footer_n'); ?>

</body>
</html>
