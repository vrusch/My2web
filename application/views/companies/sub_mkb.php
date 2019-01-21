<?php $show_change = 0; ?>
<?php if (isset($mkb['user_id'])) : ?>
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
			<em><?php echo $mkb['user_id']; ?></em>
		</td>
		<td>
			<em><?php echo $mkb['username'];?></em>
		</td>
		<td>
			<em><?php echo $mkb['email'];?></em>
		</td>
		<td>
			<em><?php
				if ($mkb['activation'] == '0') {
					echo anchor('companies/' . $company['id'], 'Chyba - znovu poslat', 'class="btn btn-danger btn-small"');
				}
				if ($mkb['activation'] == '1') {
					echo 'Odesláno: ' . $mkb['activation_date'];
				}
				if ($mkb['activation'] == '2') {
					echo 'Aktivní od: ' . $mkb['activation_date'];
				}
			?></em>
		</td>
		<td><em>
			<?php
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
			?>
			</em></td>
	</tr>
	</tbody>
</table>

<?php else : ?> <!-- ak neni mkb -->

<ul class="nav nav-pills">
	<?php if (count($students) > 0) : ?>
	<li class="active"><a data-toggle="pill" href="#new">Uplne novy</a></li>
	<li><a data-toggle="pill" href="#new_from"> Vybrat ze studentu </a></li>
	<?php endif ?>
</ul>
	<div class="tab-content">
		<div id="new" class="tab-pane fade in active">
			<h3>Zadat uplne novy MKB</h3>
			<p>Zadat username, jmeno, prijmeni, email, bude zarazen jako student a posle se aktivacni mail</p>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th><?php echo 'Username *'; ?></th>
					<th><?php echo 'email *'; ?></th>
					<th><?php echo 'Jmeno'; ?></th>
					<th><?php echo 'Prijmeni'; ?></th>
				</tr>
				</thead>
				<?php echo form_open('companies_cont/create_mkb/' . $company['id'], 'class="form-horizontal"'); ?>
				<?php echo validation_errors(); ?>
				<tbody>
				<tr>
					<td>
						<?php echo form_input(array('name' => 'mkb_username', set_value('mkb_username'))); ?>
					</td>
					<td>
						<?php echo form_input(array('name' => 'mkb_email', set_value('mkb_email'))); ?>
					</td>
					<td>
						<?php echo form_input(array('name' => 'mkb_firstname', set_value('mkb_firstname'))); ?>
					</td>
					<td>
						<?php echo form_input(array('name' => 'mkb_lastname', set_value('mkb_lastname'))); ?>
					</td>
				</tr>
				</tbody>
			</table>
			<?php echo form_submit('', 'Uložit', 'class="btn btn-primary"'); ?>
			<hr>
			<?php echo form_close(); ?>
		</div>
		<div id="new_from" class="tab-pane fade">
			<h3>Vybrat ze studentu.</h3>
			<p><em>Studentovy se priradi role mkb, mail se neposila prepokladam ze se aktivuje uz zaslanym mailem. Neda se vybrat sama sebe se seznamu.</em>></p>
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
							<?php echo anchor('companies_cont/create_mkb_from/' . $company['id'] .'/'. $student_info['id'], 'vybrat', 'class="btn btn-small"'); ?>
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
	</div>

<?php endif ?>




<?php if (($show_change == 1) AND (count($students)) > 1) : ?> <!-- vymena MKB -->
	<p><em><small>Muzete MKB vymenit za studenta. Studentovy se priradi role mkb, mail se neposila prepokladam ze se aktivuje uz zaslanym mailem nebo uz je aktivni. Neda se vybrat sama sebe se seznamu. Stavajici MKB bude student odebere se role MKB.</small></em></p>
		<button class="btn btn-info btn-small" data-toggle="collapse" data-target="#students">Vymenit ze studentu</button>

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
							<?php if ($students_item['student_id'] == $mkb['user_id']) : ?>
								<p><strong>MKB</strong></p>
							<?php else : ?>
							<?php echo anchor('companies_cont/change_mkb_from/' . $company['id'] .'/'. $student_info['id'], 'vybrat', 'class="btn btn-small"'); ?>
							<?php endif ?>
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







