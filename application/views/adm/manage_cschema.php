<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Color scheme'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<?php //$count = count($companies); ?>

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_colors')); ?>
		</div>

		<div class="span10">
			<?php //$count = count($n_compan); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo 'Color scheme'; ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stánka dovoluje managment Color scheme.'); ?>
			</div>

			<table class="table table-bordered table-hover" style="width: 100%; border: 2px solid #2e81ff">
				<tbody>
				<tr>
					<td style="width: 20%; border: 1px solid #2e81ff">
						<?php echo 'theme #1'; ?>
					</td>
					<td style="border: 1px solid #2e81ff"></td>
					<td style="width: 10%; border: 1px solid #2e81ff">
						<?php echo anchor('news/update/', ' Edit ', 'class="label label-success"'); ?>
						<?php echo anchor('news/delete', 'Smazat', 'class="label label-warning"'); ?>
					</td>
				</tr>
				<tr>
					<td style="border: 1px solid #2e81ff">
						<?php echo 'theme #2'; ?>
					</td>
					<td style="border: 1px solid #2e81ff"></td>
					<td style="border: 1px solid #2e81ff">
						<?php echo anchor('news/update/', ' Edit ', 'class="label label-success"'); ?>
						<?php echo anchor('news/delete', 'Smazat', 'class="label label-warning"'); ?>
					</td>
				</tr>
				<tr>
					<td style="border: 1px solid #2e81ff">
						<?php echo 'theme #3'; ?>
					</td>
					<td style="border: 1px solid #2e81ff">

					</td>
					<td style="border: 1px solid #2e81ff">
						<?php echo anchor('news/update/', ' Edit ', 'class="label label-success"'); ?>
						<?php echo anchor('news/delete', 'Smazat', 'class="label label-warning"'); ?>
					</td>
				</tr>
				<tr>
					<td style="border: 1px solid #2e81ff">
						<?php echo 'theme #4'; ?>
					</td>
					<td style="border: 1px solid #2e81ff"></td>
					<td style="border: 1px solid #2e81ff">
						<?php echo anchor('news/update/', ' Edit ', 'class="label label-success"'); ?>
						<?php echo anchor('news/delete', 'Smazat', 'class="label label-warning"'); ?>
					</td>
				</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>

