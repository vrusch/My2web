
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
		<td><em>
			<?php
			$show_change = 0;
			if (isset($mkb['user_id'])) {
				echo $mkb['user_id'];
			}
			?>
			</em></td>
		<td><em>
			<?php
			if (isset($mkb['username'])) {
				echo $mkb['username'];
			}
			?>
			</em></td>
		<td><em>
			<?php
			if (isset($mkb['email'])) {
				echo $mkb['email'];
			}
			?>
			</em></td>
		<td><em>
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
				</em></td>
		<td><em>
			<?php
			if (!isset($mkb['activation'])) {
				echo anchor('companies_cont/create_mkb/' . $company['id'], 'Novy', 'class="btn btn-primary btn-small"');
			} else {
				if ($mkb['suspendedon'] == NULL) {
					if ($mkb['activation'] == '1') {
						echo anchor('companies_cont/delete_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Smazat', 'class="btn btn-danger btn-small"');
					}
					if ($mkb['activation'] == '2') {
						echo anchor('companies_cont/delete_mkb/' . $company['id'] . '/' . $mkb['user_id'], 'Smazat', 'class="btn btn-danger btn-small"');
						$show_change = 1;
					}
				} else {
					echo '<span class="label label-important">MKB blokován</span>';
				}
			}
			?>
			</em></td>
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
							<em><?php echo $student_info['username']; ?></em>
						</td>
						<td>
							<em><?php echo $student_info['firstname']; ?></em>
						</td>
						<td>
							<em><?php echo $student_info['lastname']; ?></em>
						</td>
						<td>
							<em><?php echo $student_info['email']; ?></em>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php endif ?>


<?php endif ?>







