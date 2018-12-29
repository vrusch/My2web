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
					<td style="width: 85%"><h2><?php echo ('Pridat zaky'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stánka dovoluje přiřazováni zaku pro jednotlive firmy , divize a oddeleni.'); ?>
			</div>
			<div class="row">
				<div class="span4">
					<?php echo 'Firma: <strong>'.$company['name'].'</strong>'; ?><br>
					<?php echo 'Poznamka: <em>'.$company['notes'].'</em>'; ?><br>
					<?php echo 'Divize: <strong>'.$company['division'].'</strong>'; ?><br>
					<?php echo 'Oddeleni: <strong>'.$company['department'].'</strong>'; ?>
				</div>
				<div class="span4">
					<form method="post" id="import_csv" enctype="multipart/form-data">
						<div class="form-group">
							<label>Vyber CSV soubor [oddelovac ',']</label>
							<input type="file" name="csv_file" id="csv_file" required accept=".csv" />
						</div>

						<button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
					</form>
				</div>
			</div>
				<div class="span8">
						<?php echo anchor('news/', lang('website_update'), 'class="btn btn-small"'); ?>
				</div>
		</div>
	</div>
</div>

</body>
</html>

