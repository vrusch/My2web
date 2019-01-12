<div class="row">
	<div class="well">
		<?php if (!isset($company['phase'])) : ?>
			<div class="span4">
				<?php $hidden = array('id' => $company_item['id']); ?>
				<?php echo form_open_multipart('companies/csv_parse', 'class="form-horizontal"', $hidden); ?>
				<?php echo validation_errors(); ?>
				<?php echo form_input(array('name' => 'csv_file', 'id' => 'csv_file', 'type' => 'file'), 'fdhfghgfh', 'required accept=".csv"'); ?>
			</div>
			<?php echo form_submit('import_csv', 'Import CSV', 'name="import_csv"; id="import_csv_btn"; class="btn btn-primary"'); ?>
			<?php echo form_close(); ?>
		<?php endif; ?>
	</div>
	<table class="table table-condensed table-hover">
		<thead>
		<tr>
			<th>#</th>
			<th><?php echo('jmeno'); ?></th>
			<th><?php echo('prijmeni'); ?></th>
			<th><?php echo('email'); ?></th>
			<th><?php echo('pridat'); ?></th>
			<th><?php echo('email aktivace'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $pocitadlo = 1; ?>
		<?php $offset = '0'; ?>
		<?php $check = 'checked'; ?>
		<?php $zak = array(array()); ?>
		<?php echo form_open('companies/add_finaly/' . $company['id'], 'class="form-horizontal"'); ?>
		<?php echo validation_errors(); ?>
		<?php foreach ($zaci as $zaci_item) : ?>
			<tr>
				<td>
					<?php echo $pocitadlo;
					$data = array(
						'name' => $offset."[username]",
						'value' => $zaci_item['username'],
						'type' => 'hidden'
					);
					echo form_input($data); ?>
				</td>
				<td>
					<?php echo form_input(array('name' => $offset."[name]"), $zaci_item['name']); ?>

				</td>
				<td>
					<?php echo form_input(array('name' => $offset."[surname]"), $zaci_item['surname']); ?>
				</td>
				<td>
					<?php echo form_input(array('name' => $offset."[email]"), $zaci_item['email']); ?>
				</td>
				<td>
					<input type="checkbox" name="<?php echo $offset ;?>[addzaka]"
						   value="<?php echo set_value($offset.'[addzaka]', TRUE); ?>" . <?php echo $check; ?> />
				</td>
				<td>
					<input type="checkbox" name="<?php echo $offset ;?>[eactivation]"
						   value="<?php echo set_value($offset.'[eactivation]', TRUE); ?>" . <?php echo $check; ?> />
				</td>
			</tr>
			<?php $pocitadlo++; ?>
			<?php $offset++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>



