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
				echo anchor('companies_cont/create_mkb/' . $company['id'], 'Novy', 'class="btn btn-primary btn-small"');
			} else {
				if ($mkb['status'] == NULL) {
					if ($mkb['activation'] == '1') {
						echo anchor('companies_cont/delete_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Smazat', 'class="btn btn-danger btn-small"');
					}
					if ($mkb['activation'] == '2') {
						echo anchor('companies_cont/delete_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Smazat', 'class="btn btn-danger btn-small"');
						$show_change = 1;
					}
				} else {
					echo anchor('companies/unban_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Odblokovat', 'class="btn btn-danger btn-small"; style="margin: 10px"');
					echo anchor('companies_cont/delete_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Smazat', 'class="btn btn-danger btn-small"');
				}
			}
			?>
		</td>
	</tr>
	</tbody>
</table>

<?php if ($show_change == 1) : ?>

	<?php if (count($students) > 0) : ?>
		<button class="btn" data-toggle="collapse" data-target="#students">Vymenit ze studentu</button>

		<div id="students" class="collapse" style="border: 1px solid #08c">
			<table class="table table-condensed table-hover" style="background-color:white;">
				<thead>
				<tr>
					<th><?php echo 'Vybrat'; ?></th>
					<th><?php echo 'Username'; ?></th>
					<th><?php echo 'Jmeno'; ?></th>
					<th><?php echo 'Prijmeni'; ?></th>
					<th><?php echo 'Email'; ?></th>
				</tr>
				</thead>
				<tbody style="background-color: white">
				<?php foreach ($students as $students_item) : ?>
					<?php $student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
					<tr>
						<td>
							<?php echo anchor('companies_cont/change_mkb_from/' . $company['id'] .'/'. $student_info['id'], 'vybrat', 'class="btn btn-small"'); ?>
						</td>
						<td>
							<?php echo $student_info['username']; ?>
						</td>
						<td>
							<?php echo $student_info['firstname']; ?>
						</td>
						<td>
							<?php echo $student_info['lastname']; ?>
						</td>
						<td>
							<?php echo $student_info['email']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php endif ?>


<?php endif ?>







