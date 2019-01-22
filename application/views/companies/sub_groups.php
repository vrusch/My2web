<p>Muzete pridavat nebo mazat skupiny studentu. Smazat muzete jenom skupinu ktera nema prirazene studenty.</p>
			<?php echo form_open('companies_cont/add_group/'.$company['id'], 'class="form-horizontal"'); ?>


			<?php foreach ($groups as $groups_item) : ?>
				<div class="control-group">
					<label class="control-label" for="group">Skupina</label>
					<div class="controls">
						<?php echo form_input(array('name' => 'group'), $groups_item['name_of_group'], 'style="margin: 10px"'); ?>
						<?php
						$query = $this->db->get_where('4m2w_students',array('group_id' => $groups_item['id']));
						$row = $query->num_rows();
						if ($row == 0){
							echo anchor('companies_cont/del_group/'. $company['id'] . '/' . $groups_item['id'], 'Smazat', 'class="btn btn-danger btn-small"');
						}
						echo '  Studentů v skupině ' . $row;
						?>
					</div>
				</div>
			<?php endforeach; ?>


			<div class="control-group">
				<label class="control-label" for="group1"><?php echo('Nová skupina'); ?></label>
				<div class="controls">
					<?php echo validation_errors(); ?>
					<?php echo form_input(array('name' => 'group1', 'id' => 'group1'), '', 'style="margin: 10px"'); ?>
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
				</div>
			</div><br>

			<?php echo form_close(); ?>




