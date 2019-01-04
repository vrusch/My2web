<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('otazky pridat do kvizu'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_question')); ?>
		</div>
		<div class="span10">

			<h2><?php echo("Otazky prirazeni"); ?></h2>

			<div class="well">
				<?php echo("prirazeni otazky do kvizu"); ?>
			</div>
			<?php echo form_open('questions/addto', 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<table class="table table-condensed table-hover">
				<tr>
					<td>
						<div class="w3-panel w3-light-grey w3-border w3-round">
							<label class="control-label col-sm-2" for="email">Otazku # 'otazka' priradit do kurzu:</label>
						</div>
					</td>
					<td>
						<div class="w3-panel w3-light-grey w3-border w3-round">
							<div class="form-group">
								<label for="sel1">Select list:</label>
								<select class="form-control" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
						</div>
					</td>
				</tr>
			</table>
			<table class="table table-condensed table-hover">
				<tr>
					<td>

					</td>
				</tr>
			</table>

			<div class="form-actions">
				<div class="controls">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('questions/manage', ('Cancel'), 'class="btn"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>

		</div>

	</div>
</div>

</body>
</html>
