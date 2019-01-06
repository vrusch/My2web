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
					<th><?php echo ('#'); ?></th>
					<th><?php echo ('Název'); ?></th>
					<th><?php echo ('Skupin'); ?></th>
					<th><?php echo 'MKB Aktivovan'; ?></th>
					<th><?php echo ('Žáků'); ?></th>
					<th>
						<?php echo anchor('companies/create','Nova','class="btn btn-primary btn-small"'); ?>
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
						<?php echo '<strong>'.$companies_item['name'].'</strong>'; ?>
					</td>
					<td>
						<?php
						$query = $this->db->get_where('4m2w_company_group', array('company_id' => $companies_item['id']));
						echo $query->num_rows();
						?>
					</td>
					<td>
						<?php
						$this->db->select('activation');
						$query = $this->db->get_where('4m2w_mkb', array('company_id' => $companies_item['id']));
						$result = $query->row_array();
						if ($result == NULL){
							echo anchor('companies/addmkb/'.$companies_item['id'], 'Vytvořit', 'class="btn btn-info btn-small"');
						} else {
							if($result['activation'] == '0'){echo anchor('companies'.$companies_item['id'], 'Chyba', 'class="btn btn-danger btn-small"');;}
							if($result['activation'] == '1'){echo 'Odesláno';}
							if($result['activation'] == '2'){echo 'Aktivní od: dd-mm-yyyy';}
						};
						?>
					</td>
					<td>
						<?php
						$query = $this->db->get_where('4m2w_students', array('company_id' => $companies_item['id']));
						echo $query->num_rows();
						?>
					</td>
					<td>
						<?php echo anchor('companies/edit/' . $companies_item['id'], 'Edit', 'class="btn btn-small"'); ?>
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

