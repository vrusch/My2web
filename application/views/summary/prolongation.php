<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_prolongation')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Prolongace<span class="badge badge-info"></span></h2></td>
					<td><a href="home_n">
							<buton class="btn btn-primary btn-small"> Zpátky</buton>
						</a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo 'popis'; ?>
			</div>
		</div>
		<!-- END of header page	-->
	</div>
</div>
</body>
</html>
