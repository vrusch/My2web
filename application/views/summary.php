<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head', array('title' => ('edit company'))); ?>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="span2">
			<?php echo $this->load->view('account/admin_panel', array('current' => 'manage_summary')); ?>
		</div>
		<div class="span10">

			<table style="width: 100%">
				<tr>
					<td style="width: 85%"><h2>Prehled</h2></td>
					<td><a href="quizzes_cont"><buton class="btn btn-primary btn-small">Back</buton></a></td>
				</tr>
			</table>

			<div class="well">
				<?php echo("Experiment popis."); ?>
			</div>
			<!-- END of header page	-->


			<?php //var_dump($display); ?>
			<!-- TABS start -->
			<?php //if (isset($display['current'])) : ?>
				<div style="width: 100%">
					<h2>Dynamic Pills</h2>
					<p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
					<ul class="nav nav-pills">
						<li class="active"><a data-toggle="pill" href="#sub_students">Firmy</a></li>
						<li><a data-toggle="pill" href="#sub_groups">Studenti</a></li>
						<li><a data-toggle="pill" href="#sub_menu3">Ostatni prehledy</a></li>

					</ul>

					<div class="tab-content">

						<div id="sub_students" class="tab-pane fade in active">
							<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th><?php echo 'Username' ;?></th>
									<th><?php echo 'Jméno' ;?></th>
									<th><?php echo 'Příjmení' ;?></th>
									<th><?php echo 'Firma' ;?></th>
									<th><?php echo 'Skupina' ;?></th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											dfgfs
										</td>
										<td>
											sdfsf
										</td>
										<td>
											sdfsdf
										</td>
										<td>
											sdfsdf
										</td>
									</tr>
								</tbody>
							</table>

						</div>

						<div id="sub_groups" class="tab-pane fade">
							<h3>bla bla:</h3>
							<p>bla bla</p>

						</div>

						<div id="sub_menu3" class="tab-pane fade">
							<h3>dhdfgdghdfg:</h3>
							<p>fghfhfg hgfhfdg fghfgha</p>

						</div>

					</div>
				</div>
			<?php //endif ?>
		</div>
	</div>
</div>
</body>
</html>
