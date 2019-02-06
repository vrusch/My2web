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
						<?php echo form_open('companies_cont/manage_quizzes/' . $company['id'] . '/' . $groups_item['id'], 'class="form-horizontal"'); ?>
						<?php echo validation_errors(); ?>

						<table class="table table-condensed table-hover">
							<thead>
							<tr>
								<th><?php echo 'Kvizy'; ?></th>
								<th><?php echo '  '; ?></th>
								<th><?php echo '  '; ?></th>
								<th><?php echo 'Dostupne kvizy'; ?></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td style="width: 45%">
									<?php $group_quizzes = $this->companies_model->get_quizzes_by_group($company['id'], $groups_item['id']); ?>
									<select name="quizzes_old[]" multiple style="width: 100%">
										<?php
										foreach ($group_quizzes as $group_quizzes_item) {
											echo '<option value="' . $group_quizzes_item['quiz_id'] . '">' . $group_quizzes_item['name'] . '</option>';
										}
										?>
									</select>
								</td>
								<td style="width: 5%">
									<?php echo form_submit('remove_from', '>>', 'class="btn btn-primary" style="width: 100%"'); ?>
								</td>
								<td style="width: 5%">
									<?php echo form_submit('add_to', '<<', 'class="btn btn-primary" style="width: 100%"'); ?>
								</td>
								<td style="width: 45%">
									<select name="quizzes_new[]" multiple style="width: 100%">
										<?php
										foreach ($quizzes as $quizzes_item) {
											echo '<option value="' . $quizzes_item['id'] . '">' . $quizzes_item['name'] . '</option>';
										}
										?>
									</select>
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
					<?php echo form_open('companies_cont/manage_quizzes/' . $company['id'] . '/' . $groups_item['id'], 'class="form-horizontal"'); ?>
					<?php echo validation_errors(); ?>

					<table class="table table-condensed table-hover">
						<thead>
						<tr>
							<th><?php echo 'Kvizy'; ?></th>
							<th><?php echo '  '; ?></th>
							<th><?php echo '  '; ?></th>
							<th><?php echo 'Dostupne kvizy'; ?></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td style="width: 45%">
								<?php $group_quizzes = $this->companies_model->get_quizzes_by_group($company['id'], $groups_item['id']); ?>
								<select name="quizzes_old[]" multiple style="width: 100%">
									<?php
									foreach ($group_quizzes as $group_quizzes_item) {
										echo '<option value="' . $group_quizzes_item['quiz_id'] . '">' . $group_quizzes_item['name'] . '</option>';
									}
									?>
								</select>
							</td>
							<td style="width: 5%">
								<?php echo form_submit('remove_from', '>>', 'class="btn btn-primary" style="width: 100%"'); ?>
							</td>
							<td style="width: 5%">
								<?php echo form_submit('add_to', '<<', 'class="btn btn-primary" style="width: 100%"'); ?>
							</td>
							<td style="width: 45%">
								<select name="quizzes_new[]" multiple style="width: 100%">
									<?php
									foreach ($quizzes as $quizzes_item) {
										echo '<option value="' . $quizzes_item['id'] . '">' . $quizzes_item['name'] . '</option>';
									}
									?>
								</select>
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
						<th><?php echo 'Skupina' ;?></th>
						<th><?php echo 'Kvizy uz prir. skupine' ;?></th>
					</tr>
					</thead>
					<?php echo form_open('companies_cont/add_ind_quizz_to_student/' . $company['id'], 'class="form-horizontal"'); ?>
					<?php echo validation_errors(); ?>
					<?php
					foreach ($quizzes as $quizzes_item) {
					$optQ[$quizzes_item['id']] = $quizzes_item['name'];
					}
					?>
					<div class="span3"><?php echo form_dropdown('quizz_id', $optQ, '0'); ?></div>
					<div class="span1"><?php echo form_submit('', ('Přidat'), 'class="btn btn-primary"'); ?></div>


					<?php foreach ($students as $students_item) : ?>
						<?php $student_info = $this->companies_model->get_student_info($students_item['student_id']); ?>
						<?php $acc_info = $this->companies_model->get_account_info($students_item['student_id']); ?>
						<tr>
							<td>
								<?php echo form_checkbox("std[]", $students_item['student_id'], '', 'name="std[]"'); ?>
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
								<em>
									<?php
									$group_inf = $this->companies_model->get_group_info($students_item['group_id']);
									if (isset ($group_inf['name_of_group'])){echo $group_inf['name_of_group'];}
									?></em>
							</td>
							<td>
								<?php $quiz = $this->companies_model->get_quizzes_by_group($company['id'], $students_item['group_id']); ?>
								<?php if (count($quiz) > 0) : ?>
								<ul>
									<?php foreach ($quiz as $quiz_item) : //todo: doplnit este individalne kvizy toto su kvizy zo skupiny?>
											<li><em><?php echo $quiz_item['name'] ;?></em></li>
									<?php endforeach; ?>
									<?php endif;?>

									<?php $i_quizz = $this->companies_model->get_std_indiv($company['id'], $students_item['student_id']); ?>
									<?php if (count($i_quizz) > 0) : ?>
									<?php foreach ($i_quizz as $quizz_item) : ?>
										<?php $info = $this->companies_model->get_quizz_info($quizz_item['quizz_id']) ?>
										<li style="color: #0e90d2"><em>individual - <?php echo $info['name'] ;?></em></li>
									<?php endforeach; ?>
									<?php endif;?>
								</ul>

							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<?php echo form_close(); ?>
			</div>

		</div>
	</div>
<?php else :  ?>
	<p>Zadne kvizy protoze nejsou skupiny</p>
<?php endif ?>






