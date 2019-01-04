<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Přiřazování'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_assignment')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Přiřazování'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>


			<div class="well">
				<?php echo ('Tato stánka dovoluje managment přiřazováni kurzů a prednášek pro firmy a žáky.'); ?>
			</div>



		</div>
	</div>
</div>

</body>
</html>
