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

			<h2><?php echo("Novinky editace"); ?></h2>

			<div class="well">
				<?php echo("editovani novinek"); ?>
			</div>
			<?php $hidden = array('id' => $news_item['id']); ?>
			<?php echo form_open('news/update/' . $news_item['id'], 'class="form-horizontal"', $hidden); ?>
			<?php echo validation_errors(); ?>
			<table style="width: 40%">
				<tr>
					<td>
						<div class="control-group">
							<label class="control-label"
								   for="active"><?php echo('<strong>Aktivni?</strong>'); ?></label>
							<div class="controls">
								<?php
								$check = '0';
								if ($news_item['active'] === '1') {
									$check = 'checked';
								}
								?>
								<input type="checkbox" name="active" value="<?php echo set_value('active', TRUE); ?>"
									   . <?php echo $check; ?> />
							</div>
						</div>
					</td>
					<td>
						<div class="control-group">
							<label class="control-label"
								   for="highlight"><?php echo('<strong>Zvyraznena?</strong>'); ?></label>
							<div class="controls">
								<?php
								$check = '0';
								if ($news_item['highlight'] === '1') {
									$check = 'checked';
								}
								?>
								<input type="checkbox" name="highlight"
									   value="<?php echo set_value('highlight', TRUE); ?>" . <?php echo $check; ?> />
							</div>
						</div>
					</td>
				</tr>
			</table>

			<div class="control-group">
				<label class="control-label" for="date_publish"><?php echo('Datum vydani'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'date_publish', 'id' => 'date_publish'), date('Y-m-d'), 'readonly'); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="title"><?php echo('title'); ?></label>
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
					<?php echo anchor('news', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>

	</div>
</div>

</body>
</html>

