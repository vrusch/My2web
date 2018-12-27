<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Firmy'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">
		<?php $count = count($companies); ?>

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>

		<div class="span10">
			<?php $count = count($companies); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Firmy'); ?><span class="badge badge-info"><?php echo $count; ?></span></h2></td>
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
					<th><?php echo ('divize'); ?></th>
					<th><?php echo ('oddělení'); ?></th>
					<th><?php echo ('Poznamka'); ?></th>
					<th>
						<?php echo anchor('companies/add_companies',lang('website_create'),'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $companies as $companies_item ) : ?>
				<tr>
					<td>
						<?php echo $companies_item['id']; ?>
					</td>
					<td>
						<?php echo $companies_item['name']; ?>
					</td>
					<td>
						<?php echo $companies_item['division']; ?>
					</td>
					<td>
						<?php echo $companies_item['department']; ?>
					</td>
					<td>
						<?php echo $companies_item['notes']; ?>
					</td>
					<td>
						<?php echo anchor('companies/edit', 'Edit', 'class="btn btn-small"'); ?>
						<?php echo anchor('classroom/add_students', 'Pridat Zaky', 'class="btn btn-small"'); ?>
						<?php echo anchor('companies/delete', 'Smazat', 'class="btn btn-danger btn-small"'); ?>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>

