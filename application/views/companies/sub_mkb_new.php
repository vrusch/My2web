
<table class="table table-condensed table-hover">
	<thead>
	<tr>
		<th><?php echo '#'; ?></th>
		<th><?php echo 'Username'; ?></th>
		<th><?php echo 'email'; ?></th>
		<th><?php echo 'Aktivace'; ?></th>
		<th><?php echo 'Akce'; ?></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			<?php echo ''; ?>
		</td>
		<td>
			<?php echo form_input(array('name' => 'mkb_username', set_value('mkb_username'))); ?>
		</td>
		<td>
			<?php echo form_input(array('name' => 'mkb_email', set_value('mkb_email'))); ?>
		</td>
		<td>
			<?php echo ''; ?>
		</td>
		<td>
			<?php echo anchor('companies_cont/create_mkb/' . $company['id'], 'Novy', 'class="btn btn-primary btn-small"'); ?>
		</td>
	</tr>
	</tbody>
</table>







