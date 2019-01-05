<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => 'webhomepage')); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<?php //$count = count($companies); ?>

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_homepage')); ?>
		</div>

		<div class="span10">
			<?php //$count = count($n_compan); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Home Page'); ?></h2><span class="badge badge-info"><?php //echo $n_company; ?></span></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stánka dovoluje managment Home Page.'); ?>
			</div>
			<table style="width: 100%">
				<tr>
					<td style="width: 80%"></td>
					<td>
						<?php echo anchor('news/create',('Nová'),'class="btn btn-primary btn-small"'); ?>
					</td>
					<td>
						<?php echo anchor('news/create',('Preview'),'class="btn btn-primary btn-small"'); ?>
					</td>
				</tr>
			</table><br>

			<table class="table table-bordered table-hover" style="width: 100%; border: 1px solid darkgray">
				<tbody>
					<tr>
						<td style="width: 20%; border: 1px solid darkgray">
							<?php echo 'menu + banner'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="width: 10%; border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>

						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'slogany'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'o nas'; ?>
						</td>
						<td style="border: 1px solid darkgray">

						</td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'aktuality'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'sluzby'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'reference'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'reseni'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'skoleni'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
					<tr>
						<td style="border: 1px solid darkgray">
							<?php echo 'kontakty + footer'; ?>
						</td>
						<td style="border: 1px solid darkgray"></td>
						<td style="border: 1px solid darkgray">
							<?php echo anchor('news/update/', 'Nahradit', 'class="btn btn-small"'); ?>
							<?php echo anchor('news/delete', 'Odstranit', 'class="btn btn-small"'); ?>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>

