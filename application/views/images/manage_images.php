<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Nahrávaní obrázkú'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_images')); ?>
		</div>

		<div class="span10">
			<?php $count = count($files); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Nahrávaní obrázků'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Nahrávaní obrázků na web, pro požití na stránkách.'); ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th><?php echo ('Nazev'); ?></th>
					<th><?php echo ('typ'); ?></th>
					<th><?php echo ('Datum'); ?></th>
					<th>
						<?php echo anchor('images/upload',('pridat'),'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $files as $files_item ) : ?>
					<?php if (strpos($files_item['name'],'.') !== false) : ?>
					<?php if ($files_item['name'] != 'index.html') : ?>
					<tr>
						<td>
							<?php echo $files_item['relative_path']; ?>
						</td>
						<td>
							<?php echo $files_item['name']; ?>
						</td>
						<td>
							<?php
							$userfile_extn = substr($files_item['name'], strrpos($files_item['name'], '.')+1);
							echo $userfile_extn;
							?>
						</td>
						<td>
							<?php echo $files_item['date']; ?>
						</td>
						<td>
							<?php echo anchor('images/delete', ('smazat'), 'class="btn btn-danger btn-small"'); ?>
						</td>
					</tr>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>


