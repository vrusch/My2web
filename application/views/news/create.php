<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('manage_news_SAVE'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_news')); ?>
		</div>
		<div class="span10">

			<h2><?php echo ("Novinky vytvoření"); ?></h2>

			<div class="well">
				<?php echo ("vytváření novinek"); ?>
			</div>

			<?php echo form_open('news/create', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="date_publish"><?php echo ('Datum vydani'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'date_publish', 'id' => 'date_publish'), date('Y-m-d'), 'readonly'); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="title"><?php echo ('Nazev'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'title', 'id' => 'title', '', 'maxlength' => 80)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="text"><?php echo ('Text'); ?></label>
				<div class="controls">
					<?php echo form_textarea(array('name' => 'text', 'id' => 'text')); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				 <?php echo anchor('news', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

<?php //echo $this->load->view('footer_n'); ?>

</body>
</html>
