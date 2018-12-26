<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('Managment Kurzů'))); ?>
</head>
<body>

<?php //echo $this->load->view('header'); ?>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_course')); ?>
		</div>

		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2><?php echo ('Managment Kurzů'); ?></h2></td>
					<td><a href="home_n"><buton class="btn btn-primary btn-small"><i></i>Back to Home page</buton></a></td>
				</tr>
			</table>
			<div class="well">
				<?php echo ('Tato stránka dovoluje vytváření a managment kurzů.'); ?>
			</div>

			<div class="container">
				<ul class="nav nav-pills">
					<li class="active"><a data-toggle="pill" href="#kurzy">Kurzy</a></li>
					<li><a data-toggle="pill" href="#otazky">Otazky</a></li>
				</ul>

				<div class="tab-content">

					<div id="kurzy" class="tab-pane fade in active">
						<h3>Kurzy</h3>
						<table class="table table-condensed table-hover">
							<thead>
							<tr>
								<th>#</th>
								<th><?php echo ('Název'); ?></th>
								<th><?php echo ('Poznamka'); ?></th>
								<th></th>
								<th></th>
								<th>
									<?php echo anchor('news/create','Novy','class="btn btn-primary btn-small"'); ?>
									<?php echo anchor('news/create','Preview','class="btn btn-primary btn-small"'); ?>
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
								<td></td>
								<td>
									<?php echo anchor('news/', 'Edit', 'class="btn btn-small"'); ?>
								</td>
							</tr>
							</tbody>
						</table>

					</div>

					<div id="otazky" class="tab-pane fade">
						<h3>Otazky</h3>

					</div>

				</div>
			</div>



		</div>
	</div>
</div>

</body>
</html>



