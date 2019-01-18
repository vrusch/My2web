<?php echo form_open('companies/manage_quizzes/' . $company['id'], 'class="form-horizontal"'); ?>
<?php echo validation_errors(); ?>

<div class="span4" style="background-color:white;">
</div>

<table class="table table-condensed table-hover">
	<thead>
	<tr>
		<th><?php echo 'Skupiny'; ?></th>
		<th><?php echo 'Kvizy'; ?></th>
		<th><?php echo '  '; ?></th>
		<th><?php echo '  '; ?></th>
		<th><?php echo 'Dostupne kvizy'; ?></th>
		<th><?php echo 'Tema'; ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($groups as $groups_item) : ?>
		<tr>
			<td>
				<?php //echo $groups_item['id']; ?>
				<?php echo $groups_item['name_of_group']; ?>
			</td>
			<td>
				<form method="post">
					<select name="quizzes[]" multiple>
						<?php
						foreach ($quizzes as $quizzes_item) {
							echo '<option value="' . $quizzes_item['id'] . '">' . $quizzes_item['name'] . '</option>';
						}
						?>
					</select>
				</form>
			</td>
			<th>
				<button>>></button>
			</th>
			<th>
				<button><<</button>
			</th>
			<td>
				<form method="post">
					<select name="quizzes[]" multiple>
						<?php
						foreach ($quizzes as $quizzes_item) {
							echo '<option value="' . $quizzes_item['id'] . '">' . $quizzes_item['name'] . '</option>';
						}
						?>
					</select>
				</form>

			</td>
			<td>
				<?php echo form_dropdown(); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php echo form_close(); ?>




