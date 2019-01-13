
<?php //var_dump($mkb);?>
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
						<?php
						$show_change = 0;
						if (isset($mkb['user_id'])) {
							echo $mkb['user_id'];
						}
						?>
					</td>
					<td>
						<?php
						if (isset($mkb['username'])) {
							echo $mkb['username'];
						}
						?>
					</td>
					<td>
						<?php
						if (isset($mkb['email'])) {
							echo $mkb['email'];
						}
						?>
					</td>
					<td>
						<?php
						if (isset($mkb['activation'])) {
							if ($mkb['activation'] == '0') {
								echo anchor('companies/' . $company['id'], 'Chyba - znovu poslat', 'class="btn btn-danger btn-small"');
							}
							if ($mkb['activation'] == '1') {
								echo 'Odesláno: ' . $mkb['activation_date'];
							}
							if ($mkb['activation'] == '2') {
								echo 'Aktivní od: ' . $mkb['activation_date'];
							}
						} else {
							echo 'neexistuje';
						}
						?>
					</td>
					<td>
						<?php
						if (!isset($mkb['activation'])) {
							echo anchor('companies/create_mkb/' . $company['id'], 'Novy', 'class="btn btn-primary btn-small"');
						} else {
							if ($mkb['status'] == NULL) {
								if ($mkb['activation'] == '1') {
									echo anchor('companies/create_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Znovu poslat', 'class="btn btn-primary btn-small"; style="margin: 10px"');
									echo anchor('companies/create_mkb/' . $company['id'], 'Smazat', 'class="btn btn-danger btn-small"');
								}
								if ($mkb['activation'] == '2') {
									//echo anchor('companies/change_mkb/' . $company['id'] . '/' . $mkb[0]['user_id'], 'Vymenit', 'class="btn btn-primary btn-small"; style="margin: 10px"');
									echo anchor('companies/create_mkb/' . $company['id'], 'Smazat', 'class="btn btn-danger btn-small"');
									$show_change = 1;
								}
							} else {
								echo anchor('companies/' . $company['id'] . '/' . $mkb['user_id'], 'Odblokovat', 'class="btn btn-danger btn-small"; style="margin: 10px"');
								echo anchor('companies/create_mkb/' . $company['id'], 'Smazat', 'class="btn btn-danger btn-small"');
							}
						}
						?>
					</td >
				</tr>
				</tbody>
			</table>

			<?php if ($show_change == 1) :?>

				<?php //$students = $this->experiment_model->get_students($company['id']) ?>
				<?php foreach( $students as $students_item ) : ?>
					<?php
					$student = $this->experiment_model->get_students_info($students_item['student_id']);
					$std = ($student['firstname'].' '.$student['lastname'].' | '.$student['email']);
					$opt[$student['id']] = $std;
					?>
				<?php endforeach ?>
				<?php echo form_dropdown('change', $opt, '', 'style="width"'); ?>
				<?php echo anchor('companies/change_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Vymenit za: ', 'class="btn btn-primary btn-small"; style="margin: 10px"');?>

			<?php endif ?>


			<?php echo form_close(); ?>




