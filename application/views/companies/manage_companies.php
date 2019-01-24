<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>
		<div class="span10">

			<?php $count = count($companies); ?>
			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Firmy<span class="badge badge-info"><?php echo $count; ?></span></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"> Zpátky </buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo("Firmy popis."); ?>
			</div>
			<!-- END of header page	-->

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo '#'; ?></th>
					<th><?php echo 'Název'; ?></th>
					<th><?php echo 'Skupin'; ?></th>
					<th><?php echo 'Žáků'; ?></th>
					<th><?php echo 'Nezařazených'; ?></th>
					<th><?php echo 'MKB status'; ?></th>
					<th>
						<?php echo anchor('companies_cont/create', 'Nová firma', 'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($companies as $companies_item) : ?>
					<tr>
						<td>
							<?php echo $companies_item['id']; ?>
						</td>
						<td>
							<?php echo $companies_item['name']; if ($companies_item['status'] != NULL) echo '<span class="label label-important">blokována</span>'; ?>

						</td>
						<td>
							<?php
							$query = $this->db->get_where('4m2w_company_group', array('company_id' => $companies_item['id']));
							if ($query->num_rows() > 0) {
								echo '<span class="badge badge-info">' . $query->num_rows() . '</span>';
							} else {
								echo '<span class="badge">' . $query->num_rows() . '</span>';
							}
							?>
						</td>
						<td>
							<?php
							$query = $this->db->get_where('4m2w_students', array('company_id' => $companies_item['id']));
							if ($query->num_rows() > 0) {
								echo '<span class="badge badge-info">' . $query->num_rows() . '</span>';
							} else {
								echo '<span class="badge">' . $query->num_rows() . '</span></a>';
							}
							?>
						</td>
						<td>
							<?php
							$uncharted = $this->db->get_where('4m2w_students', array('company_id' => $companies_item['id'], 'group_id' => '0'));
							if ($query->num_rows() > 0) {
								echo '<span class="badge badge-info">' . $uncharted->num_rows() . '</span>';
							} else {
								echo '<span class="badge">' . $query->num_rows() . '</span>';
							}
							?>
						</td>
						<td>
							<?php
							$result = $this->companies_model->get_mkb($companies_item['id']);
							if ($result == NULL) {
								echo '';
							} else if ($result['suspendedon'] != NULL) {
								echo '<span class="label label-important">MKB blokován</span>';
							} else {
								if ($result['activation'] == '0') {
									echo '<span class="label label-important">Chyba</span>';
								}
								if ($result['activation'] == '1') {
									echo 'Odesláno: ' . $result['activation_date'];
								}
								if ($result['activation'] == '2') {
									echo '<strong>Aktivní od: ' . $result['activation_date'] . '</strong>';
								}
							};
							?>
						</td>
						<td>
							<?php echo anchor('companies_cont/edit/' . $companies_item['id'], 'Edit', 'class="btn btn-small"'); ?>
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


