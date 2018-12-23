<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Firmy'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>

		<div class="span10">
			<?php //$count = count($n_compan); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Firmy'); ?></h2><span class="badge badge-info"><?php //echo $n_company; ?></span></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stánka dovoluje vytvářet nové firmy.'); ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th><?php echo ('Název'); ?></th>
					<th><?php echo ('Datum platnosti do'); ?></th>
					<th><?php echo ('oddělení/divize'); ?></th>
					<th>
						<?php echo anchor('news/create',lang('website_create'),'class="btn btn-primary btn-small"'); ?>
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
						<?php echo anchor('news/', lang('website_update'), 'class="btn btn-small"'); ?>
					</td>
				</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>

