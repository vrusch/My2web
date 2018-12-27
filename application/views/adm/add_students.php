<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Zaci -> Firma'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_companies')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Pridat zaky'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stánka dovoluje přiřazováni zaku pro jednotlive firmy , divize a oddeleni.'); ?>
			</div>

			<form method="post" id="import_csv" enctype="multipart/form-data">
				<div class="form-group">
					<label>Select CSV File</label>
					<input type="file" name="csv_file" id="csv_file" required accept=".csv" />
				</div>

				<button type="submit" name="import_csv" class="btn btn-info"
						id="import_csv_btn">Import CSV</button>
			</form>
			<br>
			<div id="imported_csv_data"></div>

			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th><?php echo ('Nadpis'); ?></th>
					<th><?php echo ('Datum vydani'); ?></th>
					<th><?php echo ('Datum platnosti'); ?></th>
					<th>
						<?php echo anchor('news/create',lang('website_create'),'class="btn btn-primary btn-small"'); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						<?php echo ''; ?>
					</td>
					<td>
						<?php echo ''; ?>
					</td>
					<td>
						<?php echo ''; ?>
					</td>
					<td>
						<?php echo ''; ?>
					</td>
					<td>
						<?php echo anchor('news/', lang('website_update'), 'class="btn btn-small"'); ?>
					</td>
				</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>

</body>
</html>

