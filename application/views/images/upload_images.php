<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('nahravani obrazku'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_images')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Nahrani obrazku'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo ('Tato stánka dovoluje nahravat obrazky z lokalniho zdroje na server.'); ?>
			</div>

			<?php echo $error;?>

			<?php echo form_open_multipart('images/upload');?>

			<input type="file" name="userfile" size="20" />

			<br /><br />

			<input type="submit" value="upload" />

			</form>

		</div>
	</div>
</div>

</body>
</html>

