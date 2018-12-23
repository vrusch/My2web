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

			<h2><?php echo ("Novinky editace"); ?></h2>

			<div class="well">
				<?php echo ("editovani novinek"); ?>
			</div>

			<?php echo form_open('news/update', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<div class="control-group">
				<label class="control-label" for="date_publish"><?php echo ('Datum vydani'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'date_publish', 'id' => 'date_publish'), $news_item['date_publish']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="title"><?php echo ('platnost do'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'title', 'id' => 'title'), $news_item['title']); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="text">Text</label>
				<div class="controls">
					<?php echo form_textarea(array('name' => 'text', 'id' => 'text'), $news_item['text']); ?>
				</div>
			</div>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('news/manage_news', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

<?php //echo $this->load->view('footer_n'); ?>

</body>
</html>

