<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Managment přednášek'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_lecture')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Managment přednášek'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stránka dovoluje vytváření a mangment přednášek.'); ?>
			</div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th><?php echo ('Název'); ?></th>
					<th><?php echo ('tema'); ?></th>
					<th><?php echo ('kurzy'); ?></th>
					<th><?php echo ('Nahled'); ?></th>
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
						<?php echo ''; ?>
					</td>
					<td>
						<?php echo anchor('news/', 'edit', 'class="btn btn-small"'); ?>
						<?php echo anchor('news/', 'priradit do kurzu', 'class="btn btn-small"'); ?>
					</td>
				</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>



