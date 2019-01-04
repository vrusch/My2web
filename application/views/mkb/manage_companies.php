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
			<?php echo $this->load->view('account/admin_panel', array('current' => 'mkb_manage_companies')); ?>
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
					<th><?php echo ('Název'); ?></th>
					<th><?php echo ('Divize'); ?></th>
					<th><?php echo ('Oddělení'); ?></th>
					<th><?php echo ('Poznamka'); ?></th>
					<th><?php echo ('zaku'); ?></th>
					<th>
						<?php echo anchor('companies/create','Nova','class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach( $companies as $companies_item ) : ?>
				<tr>
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
						<?php //echo $companies_item['notes']; ?>
					</td>
					<td>
						<?php echo anchor('companies/update/' . $companies_item['id'], 'Edit', 'class="btn btn-small"'); ?>
						<?php echo anchor('companies/add_students/' . $companies_item['id'], 'Pridat Zaky', 'class="btn btn-small"'); ?>
						<?php echo anchor('companies/delete/' . $companies_item['id'], 'Smazat', 'class="btn btn-danger btn-small"'); ?>
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

