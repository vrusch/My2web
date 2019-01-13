

			<?php echo form_open('companies/manage_quizzes/'.$company['id'], 'class="form-horizontal"'); ?>
			<?php echo validation_errors(); ?>

				<div class="span4" style="background-color:white;">
				</div>

				<table class="table table-condensed table-hover">
					<thead>
					<tr>
						<th><?php echo 'Skupiny'; ?></th>
						<th><?php echo 'Kvizy'; ?></th>
						<th><?php echo ' | '; ?></th>
						<th><?php echo 'Tema'; ?></th>
						<th><?php echo 'Dostupne kvizy'; ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach( $groups as $groups_item ) : ?>
						<tr>
							<td>
								<?php //echo $groups_item['id']; ?>
								<?php echo $groups_item['name_of_group']; ?>
							</td>
							<td>
								<!--  get_group_quizzes($group_id) -->
								<?php echo 'kvizy group'; ?>
							</td>
							<th><?php echo ' | '; ?></th>
							<td>
								<?php echo form_dropdown(); ?>
							</td>
							<td>
								<?php foreach( $quizzes as $quizzes_item ) : ?>
									<?php //echo $quizzes_item['id']; ?>
									<?php echo $quizzes_item['name'] . '<br>';?>
								<?php endforeach; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

			<?php echo form_close(); ?>




