<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Zaci -> Firma'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo('Pridat zaky'); ?></h2></td>
					<td><a href="home_n">
							<buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton>
						</a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo('Tato stánka dovoluje přiřazováni zaku pro jednotlive firmy , divize a oddeleni.'); ?>
			</div>
			<div class="row">
				<div class="span4">
					<?php echo 'Firma: <strong>' . $company['name'] . '</strong>'; ?><br>
					<?php echo 'Poznamka: <em>' . $company['notes'] . '</em>'; ?><br>
					<?php echo 'Divize: <strong>' . $company['division'] . '</strong>'; ?><br>
					<?php echo 'Oddeleni: <strong>' . $company['department'] . '</strong>'; ?>
				</div>
				<?php if (!isset($company['phase'])) : ?>
				<div class="span4">
					<?php $hidden = array('id' => $company['id']); ?>
					<?php echo form_open_multipart('companies/csv_parse', 'class="form-horizontal"', $hidden); ?>
					<?php echo validation_errors(); ?>

					<label class="control-label" for="csv_file"><?php echo 'Vyber CSV soubor [oddelovac ]'; ?></label>
					<?php echo form_input(array('name' => 'csv_file', 'id' => 'csv_file', 'type' => 'file'), '', 'required accept=".csv"'); ?>
				</div>
				<?php echo form_submit('import_csv', 'Import CSV', 'name="import_csv"; id="import_csv_btn"; btn btn-info"'); ?>

				<?php echo form_close(); ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if (isset($company['phase'])) : ?>
			<div class="span10">
				<hr>
				<table class="table table-condensed table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th><?php echo('jmeno'); ?></th>
						<th><?php echo('prijmeni'); ?></th>
						<th><?php echo('email'); ?></th>
						<th><?php echo('pridat'); ?></th>
						<th><?php echo('email aktivace'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php $pocitadlo = 1; ?>
					<?php $check = 'checked'; ?>
					<?php echo form_open('news/create', 'class="form-horizontal"'); ?>
					<?php echo validation_errors(); ?>
					<?php foreach ($zaci as $zaci_item) : ?>
						<tr>
							<td>
								<?php echo $pocitadlo; ?>
							</td>
							<td>
								<?php echo $zaci_item['name']; ?>
							</td>
							<td>
								<?php echo $zaci_item['surname']; ?>
							</td>
							<td>
								<?php echo $zaci_item['email']; ?>
							</td>
							<td>
								<input type="checkbox" name="addzaka" value="<?php echo set_value('addzaka', TRUE); ?>"
									   . <?php echo $check; ?> />
							</td>
							<td>
								<input type="checkbox" name="eactivation"
									   value="<?php echo set_value('eactivation', TRUE); ?>" . <?php echo $check; ?> />
							</td>
						</tr>
						<?php $pocitadlo++; ?>
					<?php endforeach; ?>
					</tbody>
				</table>
				<div class="well">
					<?php echo form_submit('', ('Uložit'), 'class="btn btn-primary"'); ?>
					<?php echo anchor('manage_companies', ('Cancel'), 'class="btn"'); ?>
					<?php echo form_close(); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

</body>
</html>

