<?php $count_groups = count($groups); ?>
<?php if ($count_groups > 0) : ?>
	<div style="width: 100%">
		<p>Tlacitka reprezetuji existujici skupiny studentu, po stisknuti lze pridavat z existujicich kvizu anebo odebirat kvizi ze skupiny, take lze pridat kviz na jednotlivce.</p>
		<?php $act = 1; ?>
		<ul class="nav nav-pills">
			<?php foreach ($groups as $groups_item) : ?>
				<?php $act++; ?>
			<?php if ($act == 2) : ?>
					<li class="active"><a data-toggle="pill" href="#sub_menu<?php echo $groups_item['id']; ?>"><?php echo $groups_item['name_of_group']; ?></a></li>
				<?php else : ?>
				<li><a data-toggle="pill" href="#sub_menu<?php echo $groups_item['id']; ?>"><?php echo $groups_item['name_of_group']; ?></a></li>
				<?php endif ?>
			<?php endforeach; ?>
			<li><a data-toggle="pill" href="#sub_menux">Priradit kvizy jednotlivci</a></li>
		</ul>
		<?php $act = 1; ?>
		<div class="tab-content">
			<?php foreach ($groups as $groups_item) : ?>
				<?php $act++; ?>
			<?php if ($act == 2) : ?>
					<div id="sub_menu<?php echo $groups_item['id']; ?>" class="tab-pane fade in active">
						<h3><?php echo $groups_item['name_of_group']; ?></h3>
						<!-- start -->
						<?php echo form_open('companies_cont/manage_quizzes/' . $company['id'], 'class="form-horizontal"'); ?>
						<?php echo validation_errors(); ?>

						<table class="table table-condensed table-hover">
							<thead>
							<tr>
								<th><?php echo 'Kvizy'; ?></th>
								<th><?php echo '  '; ?></th>
								<th><?php echo '  '; ?></th>
								<th><?php echo 'Dostupne kvizy'; ?></th>
								<th><?php echo 'Tema'; ?></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<?php $group_quizzes = $this->companies_model->get_quizzes_by_group($company['id'], $groups_item['id']); ?>
									<select name="quizzes_old[]" multiple>
										<?php
										foreach ($group_quizzes as $group_quizzes_item) {
											echo '<option value="' . $group_quizzes_item['quiz_id'] . '">' . $group_quizzes_item['name'] . '</option>';
										}
										?>
									</select>
								</td>
								<th>
									<?php echo form_submit('remove_from', ('>>'), 'class="btn btn-primary"'); ?>
								</th>
								<th>
									<?php echo form_submit('add_to', ('<<'), 'class="btn btn-primary"'); ?>
								</th>
								<td>
									<select name="quizzes_new[]" multiple>
										<?php
										foreach ($quizzes as $quizzes_item) {
											echo '<option value="' . $quizzes_item['id'] . '">' . $quizzes_item['name'] . '</option>';
										}
										?>
									</select>
								</td>
								<td>
									<?php $themes = $this->companies_model->get_themes(); ?>
									<?php
									foreach ($themes as $themes_item){
										$opt[$themes_item['id']] = $themes_item['theme'];
									}
									if (count($themes)){
										$opt += ['0' => 'Vsechny temy'];
									} else {
										$opt = ['0' => 'Žádna tema'];
									}
									?>
									<?php echo form_dropdown('theme_id', $opt, '0'); ?>
								</td>
							</tr>
							</tbody>
						</table>

						<?php echo form_close(); ?>
						<!-- end of -->
					</div>
			<?php else : ?>
				<div id="sub_menu<?php echo $groups_item['id']; ?>" class="tab-pane fade">
					<h3><?php echo $groups_item['name_of_group']; ?></h3>
					<!-- start -->
					<?php echo form_open('companies_cont/manage_quizzes/' . $company['id'], 'class="form-horizontal"'); ?>
					<?php echo validation_errors(); ?>

					<table class="table table-condensed table-hover">
						<thead>
						<tr>
							<th><?php echo 'Kvizy'; ?></th>
							<th><?php echo '  '; ?></th>
							<th><?php echo '  '; ?></th>
							<th><?php echo 'Dostupne kvizy'; ?></th>
							<th><?php echo 'Tema'; ?></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								<?php $group_quizzes = $this->companies_model->get_quizzes_by_group($company['id'], $groups_item['id']); ?>
								<select name="quizzes_old[]" multiple>
									<?php
									foreach ($group_quizzes as $group_quizzes_item) {
										echo '<option value="' . $group_quizzes_item['quiz_id'] . '">' . $group_quizzes_item['name'] . '</option>';
									}
									?>
								</select>
							</td>
							<th>
								<?php echo form_submit('remove_from', ('>>'), 'class="btn btn-primary"'); ?>
							</th>
							<th>
								<?php echo form_submit('add_to', ('<<'), 'class="btn btn-primary"'); ?>
							</th>
							<td>
								<select name="quizzes_new[]" multiple>
									<?php
									foreach ($quizzes as $quizzes_item) {
										echo '<option value="' . $quizzes_item['id'] . '">' . $quizzes_item['name'] . '</option>';
									}
									?>
								</select>
							</td>
							<td>
								<?php $themes = $this->companies_model->get_themes(); ?>
								<?php
								foreach ($themes as $themes_item){
									$opt[$themes_item['id']] = $themes_item['theme'];
								}
								if (count($themes)){
									$opt += ['0' => 'Vsechny temy'];
								} else {
									$opt = ['0' => 'Žádna tema'];
								}
								?>
								<?php echo form_dropdown('theme_id', $opt, '0'); ?>
							</td>
						</tr>
						</tbody>
					</table>

					<?php echo form_close(); ?>
					<!-- end of -->
				</div>
				<?php endif ?>
			<?php endforeach; ?>

			<div id="sub_menux" class="tab-pane fade">
				<table class="table table-condensed table-hover" style="background-color:white;">
					<thead>
					<tr>
						<th><?php echo 'Pridat' ;?></th>
						<th><?php echo 'Username' ;?></th>
						<th><?php echo 'Jméno' ;?></th>
						<th><?php echo 'Příjmení' ;?></th>
						<th><?php echo 'Email' ;?></th>
						<th><?php echo 'Kvizy' ;?></th>
					</tr>
					</thead>
					<?php echo form_open('companies_cont/add_student/' . $company['id'], 'class="form-horizontal"'); ?>
					<?php echo validation_errors(); ?>
					<?php
					foreach ($quizzes as $quizzes_item) {
					$optQ[$quizzes_item['id']] = $quizzes_item['name'];
					}
					?>
					<?php echo form_dropdown('theme_id', $optQ, '0'); ?>
					<?php $themes = $this->companies_model->get_themes(); ?>
					<?php
					foreach ($themes as $themes_item){
						$opt[$themes_item['id']] = $themes_item['theme'];
					}
					if (count($themes)){
						$opt += ['0' => 'Vsechny temy'];
					} else {
						$opt = ['0' => 'Žádna tema'];
					}
					?>
					<?php echo form_dropdown('theme_id', $opt, '0'); ?>
					<?php foreach ($students as $students_item) : ?>
						<?php $student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
						<?php $acc_info = $this->companies_model->get_account_info($students_item['student_id']); ?>
						<tr>
							<td>
								<?php echo form_checkbox(); ?>

							</td>
							<td>
								<em><?php echo $student_info['username']; ?></em>
								<?php if ($students_item['attribut'] == 'mkb'){echo '<span class="label label-info">mkb</span>';} ?>
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
							<td>
								<?php
								if ($acc_info['suspendedon'] != NULL){
									echo '<span class="label label-important">Blokován</span>';
								}elseif ($acc_info['verifiedon'] != NULL){
									echo 'active';
								}elseif ($acc_info['createdon'] != NULL){
									echo 'zaslano';
								}
								?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
<?php else :  ?>
	<p>Zadne kvizi protoze nejsou skupiny<kbd>ctrl + p</kbd></p>
<?php endif ?>






