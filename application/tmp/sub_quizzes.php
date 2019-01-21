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




