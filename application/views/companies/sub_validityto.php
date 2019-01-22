

nastavit platnost pro skupiny:
<?php foreach ($groups as $groups_item) : ?>
<?php endforeach; ?>

<table class="table table-condensed table-hover" style="border: 1px solid #0000FF">
	<thead>
	<tr>
		<th><?php echo 'Skupina'; ?></th>
		<th><?php echo 'kvizy'; ?></th>
		<th><?php echo 'Datum'; ?></th>
	</tr>
	</thead>
	<tbody>
	<tr style="border: 1px solid #0000FF">
		<td style="border: 1px solid #0000FF">
			skupina
		</td>
		<td>
			kviz from 4m2w_company_quizzes
		</td style="border: 1px solid #0000FF">
		<td>
			<?php echo '<input name="platnostdo" type="date">'; ?>
		</td>
	</tr>
	</tbody>
</table>

<hr>






vypsat individualne prirazene kvizi pro studenty firmy

<?php echo '<input name="platnostdo" type="date">'; ?>
