<br>

<?php //var_dump($students) ;?>
<?php //var_dump() ;?>
<?php //var_dump() ;?>

<hr>
<br>
<p><strong>Aktuálne přidávaní studenti:</strong></p>
<table class="table table-condensed table-hover" style="background-color: #f4f4f4;">
	<thead>
	<tr>
		<th><?php echo 'Přidat?' ;?></th>
		<th><?php echo 'Username' ;?></th>
		<th><?php echo 'Jméno' ;?></th>
		<th><?php echo 'Příjmení' ;?></th>
		<th><?php echo 'Email' ;?></th>
	</tr>
	</thead>
	<?php echo form_open('companies_cont/add_students/'.$company['id'], 'class="form-horizontal"'); ?>
	<?php echo validation_errors(); ?>
	<tbody style="background-color: #f4f4f4">
	<?php $offset = '0'; ?>
	<?php foreach ($zaci as $zaci_item) : ?>
		<tr>
			<td>
				<input type="checkbox" name="<?php echo $offset ;?>[addzaka]"
					   value="<?php echo set_value($offset.'[addzaka]', TRUE); ?>" checked />
			</td>
			<td>
				<?php echo form_input(array('name' => $offset."[username]"), $zaci_item['username'], 'style="width: 50%"'); ?>
			</td>
			<td>
				<?php echo form_input(array('name' => $offset."[name]"), $zaci_item['name'], 'style="width: 50%"'); ?>
			</td>
			<td>
				<?php echo form_input(array('name' => $offset."[surname]"), $zaci_item['surname'], 'style="width: 60%"'); ?>
			</td>
			<td>
				<?php echo form_input(array('name' => $offset."[email]"), $zaci_item['email']); ?>
			</td>
		</tr>
		<?php $offset++; ?>
	<?php endforeach; ?>
	</tbody>
</table>
<?php echo form_submit('', ('Přidat'), 'class="btn btn-primary"'); ?>
<?php echo form_close(); ?>






