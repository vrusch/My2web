

			<?php echo form_open('companies/add_groups/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

			<?php foreach ($groups as $groups_item) : ?>
				<div class="control-group">
					<label class="control-label" for="group">Skupina</label>
					<div class="controls">
						<?php echo form_input(array('name' => 'group'), $groups_item['name_of_group'], 'style="margin: 10px"'); ?>
						<?php
						$query = $this->db->get_where('4m2w_students',array('group_id' => $groups_item['id']));
						$row = $query->num_rows();
						if ($row == 0){
							echo anchor('companies/delgroup/'. $company['id'] . '/' . $groups_item['id'], 'Smazat', 'class="btn btn-danger btn-small"');//todo a smazat studenty ze skupiny
						}
						echo '  Studentů v skupine ' . $row;
						?>
					</div>
				</div>
			<?php endforeach; ?>

			<div class="control-group">
				<label class="control-label" for="group1"><?php echo('Nová skupina'); ?></label>
				<div class="controls">
					<?php echo form_input(array('name' => 'group1'), '', 'style="margin: 10px"'); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div>

			<?php echo form_close(); ?>



