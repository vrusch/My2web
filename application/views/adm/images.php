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
			<?php echo $this->load->view('account/admin_panel', array('current' => 'upload_images')); ?>
		</div>

		<div class="span10">

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
						<?php echo anchor('upload_image',('pridat'),'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php echo ''; ?>
						</td>
						<td>
							<?php echo ''; ?>
						</td>
						<td>
							<?php echo ''; ?>
						</td>
						<td>
							<?php echo ''; ?>
						</td>
						<td>
							<?php echo anchor('img/manipulate', ('manipulace'), 'class="btn btn-small"'); ?>
						</td>
						<td>
							<?php echo anchor('img/delete', ('smazat'), 'class="btn btn-small"'); ?>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>


